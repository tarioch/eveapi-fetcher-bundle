<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\NoKey;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Component\EveApi\NoKeyApi;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ServerServerStatus;
use Tarioch\EveapiFetcherBundle\Entity\MapSovereignty;
use Tarioch\EveapiFetcherBundle\TariochEveapiFetcherBundle;

/**
 * @DI\Service("tarioch.eveapi.map.Sovereignty")
 */
class MapSovereigntyUpdater implements NoKeyApi
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
        $this->entityManager->createQuery('delete from TariochEveapiFetcherBundle:MapSovereignty')->execute();

        $api = $pheal->mapScope->Sovereignty();
        foreach ($api->solarSystems as $solarSystem) {
            $mapSov = new MapSovereignty(
                $solarSystem->solarSystemID,
                $solarSystem->allianceID,
                $solarSystem->corporationID,
                $solarSystem->factionID,
                $solarSystem->solarSystemName
            );
            $this->entityManager->persist($mapSov);
        }

        return $api->cached_until;
    }
}
