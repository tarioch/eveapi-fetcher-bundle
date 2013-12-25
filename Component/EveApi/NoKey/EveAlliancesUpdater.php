<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\NoKey;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Component\EveApi\NoKeyApi;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\EveRefType;
use Tarioch\EveapiFetcherBundle\Entity\EveAlliance;
use Tarioch\EveapiFetcherBundle\Entity\EveMemberCorporation;

/**
 * @DI\Service("tarioch.eveapi.eve.AllianceList")
 */
class EveAlliancesUpdater implements NoKeyApi
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
        $this->entityManager->createQuery('delete from TariochEveapiFetcherBundle:EveAlliance')->execute();

        $api = $pheal->eveScope->AllianceList();
        foreach ($api->alliances as $alliance) {
            $allianceEntity = new EveAlliance(
                $alliance->allianceID,
                $alliance->name,
                $alliance->shortName,
                $alliance->executorCorpID,
                $alliance->memberCount,
                new \DateTime($alliance->startDate)
            );
            $this->entityManager->persist($allianceEntity);
            foreach ($alliance->memberCorporations as $corp) {
                $corpEntity = new EveMemberCorporation(
                    $corp->corporationID,
                    new \DateTime($corp->startDate),
                    $allianceEntity
                );
                $this->entityManager->persist($corpEntity);
            }
        }

        return $api->cached_until;
    }
}
