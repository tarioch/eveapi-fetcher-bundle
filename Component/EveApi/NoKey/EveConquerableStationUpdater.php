<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\NoKey;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Component\EveApi\NoKeyApi;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\EveConquerableStation;

/**
 * @DI\Service("tarioch.eveapi.eve.ConquerableStationList")
 */
class EveConquerableStationUpdater implements NoKeyApi
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
    public function update(ApiCall $call, Pheal $pheal)
    {
        $this->entityManager->createQuery('delete from TariochEveapiFetcherBundle:EveConquerableStation')->execute();

        $api = $pheal->eveScope->ConquerableStationList();
        foreach ($api->outposts as $station) {
            $entity = new EveConquerableStation(
                $station->stationID,
                $station->stationName,
                $station->stationTypeID,
                $station->solarSystemID,
                $station->corporationID,
                $station->corporationName
            );
            $this->entityManager->persist($entity);
        }

        return $api->cached_until;
    }
}
