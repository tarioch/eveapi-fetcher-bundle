<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Pheal\Core\Element;
use Tarioch\EveapiFetcherBundle\Component\EveApi\KeyApi;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\AccountAPIKeyInfo;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo\NewApiFactory;

/**
 * @DI\Service("tarioch.eveapi.account.APIKeyInfo")
 */
class ApiKeyInfoUpdater implements KeyApi
{

    private $entityManager;
    private $currentApiCallFactory;
    private $newApiFactory;
    private $diffCalculator;

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager"),
     * "currentApiCallFactory" = @DI\Inject("tarioch.eveapi.account.api_key_info.current_api_call_factory"),
     * "newApiFactory" = @DI\Inject("tarioch.eveapi.account.api_key_info.new_api_factory"),
     * "diffCalculator" = @DI\Inject("tarioch.eveapi.account.api_key_info.diff_calculator")
     * })
     */
    public function __construct(
        EntityManager $entityManager,
        CurrentApiCallFactory $currentApiCallFactory,
        NewApiFactory $newApiFactory,
        DiffCalculator $diffCalculator
    ) {
        $this->entityManager = $entityManager;
        $this->currentApiCallFactory = $currentApiCallFactory;
        $this->newApiFactory = $newApiFactory;
        $this->diffCalculator = $diffCalculator;
    }

    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $api = $pheal->accountScope->APIKeyInfo();
        $apiKey = $api->key;

        $this->updateApiKeyInfo($key, $apiKey);

        // update associated characters
        $repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:AccountCharacter');
        $characterEntities = $repository->findByKey($key);
        $charEntityMap = array();
        foreach ($characterEntities as $characterEntity) {
            $charEntityMap[$characterEntity->getCharacterId()] = $characterEntity;
        }

        $chars = array();
        foreach ($apiKey->characters as $char) {
            $charId = $char->characterID;
            if (isset($charEntityMap[$charId])) {
                $charEntity = $charEntityMap[$charId];
                unset($charEntityMap[$charId]);
            } else {
                $charEntity = new AccountCharacter($key, $charId);
                $this->entityManager->persist($charEntity);
            }

            $charEntity->setCharacterName($char->characterName);

            $corpId = $char->corporationID;
            $charEntity->setCorporationId($corpId);
            $charEntity->setCorporationName($char->corporationName);

            $this->entityManager->flush($charEntity);
            $chars[] = $charEntity->getId();
        }

        // remove old, no longer valid characters
        foreach ($characterEntities as $characterEntity) {
            $this->entityManager->remove($characterEntity);
        }

        $this->updateApiCalls($key, $apiKey->accessMask, $apiKey->type, $chars);

        return $api->cached_until;
    }

    private function updateApiCalls(ApiKey $key, $accessMask, $keyType, array $chars)
    {
        $currentApiCallMap = $this->currentApiCallFactory->createCurrentApiCallMap($key);
        $newApiMap = $this->newApiFactory->createNewApiMap($accessMask, $keyType, $chars);
        $apisToAdd = $this->diffCalculator->getOnlyInSource($newApiMap, $currentApiCallMap);

        foreach ($apisToAdd as $apis) {
            foreach ($apis as $ownerId => $api) {
                if ($ownerId != 0) {
                    $owner = $this->entityManager->find('TariochEveapiFetcherBundle:AccountCharacter', $ownerId);
                } else {
                    $owner = null;
                }

                $this->entityManager->persist(new ApiCall($api, $owner, $key));
            }
        }

        $apisToRemove = $this->diffCalculator->getOnlyInSource($currentApiCallMap, $newApiMap);
        foreach ($apisToRemove as $apis) {
            foreach ($apis as $calls) {
                $this->entityManager->remove($calls);
            }
        }
    }

    private function updateApiKeyInfo(ApiKey $key, Element $apiKey)
    {
        $entity = $this->loadOrCreate($key);
        $entity->setAccessMask($apiKey->accessMask);
        if (! empty($apiKey->expires)) {
            $entity->setExpires(new \DateTime($apiKey->expires));
        }
        $entity->setType($apiKey->type);
    }

    private function loadOrCreate(ApiKey $key)
    {
        $repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:AccountAPIKeyInfo');
        $entity = $repository->findOneByKey($key);
        if ($entity == null) {
            $entity = new AccountAPIKeyInfo($key);
            $this->entityManager->persist($entity);
        }

        return $entity;
    }
}
