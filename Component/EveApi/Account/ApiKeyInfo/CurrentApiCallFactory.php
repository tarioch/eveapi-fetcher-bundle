<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\Api;

/**
 * @DI\Service(id = "tarioch.eveapi.account.api_key_info.current_api_call_factory", public = false)
 */
class CurrentApiCallFactory
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

    public function createCurrentApiCallMap(ApiKey $key)
    {
        $apiCallRepo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:ApiCall');
        $currentApiCalls = $apiCallRepo->findNormalCallsByKey($key);

        $currentApiCallMap = array();
        foreach ($currentApiCalls as $apiCall) {
            $apiId = $apiCall->getApi()->getApiId();
            if (!isset($currentApiCallMap[$apiId])) {
                $currentApiCallMap[$apiId] = array();
            }

            $owner = $apiCall->getOwner();
            $currentApiCallMap[$apiId][$owner === null ? 0 : $owner->getId()] = $apiCall;
        }

        return $currentApiCallMap;
    }
}
