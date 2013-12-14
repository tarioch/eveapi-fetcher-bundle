<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Account;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Component\EveApi\KeyApi;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\AccountAPIKeyInfo;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;

/**
 * @DI\Service("tarioch.eveapi.account.APIKeyInfo")
 */
class APIKeyInfoUpdater implements KeyApi
{

    private $entityManager;

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager")
     * })
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $entity = $this->loadOrCreate($key);
        $api = $pheal->accountScope->APIKeyInfo();

        $apiKey = $api->key;
        $entity->setAccessMask($apiKey->accessMask);
        if (! empty($apiKey->expires)) {
            $entity->setExpires(new \DateTime($apiKey->expires));
        }
        $entity->setType($apiKey->type);

        $repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:AccountCharacter');
        $characterEntities = $repository->findByKey($key);
        $charEntityMap = array();
        foreach ($characterEntities as $characterEntity) {
            $charEntityMap[$characterEntity->getCharacterId()] = $characterEntity;
        }
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
            $charEntity->setCorporationId($char->corporationID);
            $charEntity->setCorporationName($char->corporationName);
        }

        return $api->cached_until;
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
