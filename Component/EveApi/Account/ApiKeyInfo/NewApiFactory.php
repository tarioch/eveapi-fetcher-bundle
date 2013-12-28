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

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager")
     * })
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createNewApiMap($accessMask, $keyType, array $chars)
    {
        $apiRepo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:Api');
        $validApis = $apiRepo->loadValidApis($accessMask, $keyType);

        $newApiMap = array();
        foreach ($validApis as $api) {
            $apiId = $api->getApiId();
            $newApiMap[$apiId] = array();

            $section = $api->getSection();
            if ($section == 'account') {
                $newApiMap[$apiId][0] = $api;
            } else {
                foreach ($chars as $ownerId) {
                    $newApiMap[$apiId][$ownerId] = $api;
                }
            }
        }

        return $newApiMap;
    }
}
