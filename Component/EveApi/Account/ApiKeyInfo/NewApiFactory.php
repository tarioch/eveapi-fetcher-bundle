<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;

/**
 * @DI\Service(id = "tarioch.eveapi.account.api_key_info.new_api_factory", public = false)
 */
class NewApiFactory
{
    private $entityManager;
    private $newApiOwnersFactory;

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager"),
     * "newApiOwnersFactory" = @DI\Inject("tarioch.eveapi.account.api_key_info.new_api_owners_factory")
     * })
     */
    public function __construct(EntityManager $entityManager, NewApiOwnersFactory $newApiOwnersFactory)
    {
        $this->entityManager = $entityManager;
        $this->newApiOwnersFactory = $newApiOwnersFactory;
    }

    public function createNewApiMap($accessMask, $keyType, $keyId, array $chars)
    {
        $apiRepo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:Api');
        $validApis = $apiRepo->loadValidApis($accessMask, $keyType);

        $newApiMap = array();
        foreach ($validApis as $api) {
            $apiId = $api->getApiId();
            $newApiMap[$apiId] = array();

            $section = $api->getSection();
            $owners = $this->newApiOwnersFactory->createOwners($section, $keyId, $chars);
            foreach ($owners as $owner) {
                $newApiMap[$apiId][$owner] = $api;
            }
        }

        return $newApiMap;
    }
}
