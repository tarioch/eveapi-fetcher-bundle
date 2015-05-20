<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpCustomsOffice;

/**
 * @DI\Service("tarioch.eveapi.corp.CustomsOffices")
 */
class CustomsOfficeUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $corpId = $owner->getCorporationId();
        $api = $pheal->corpScope->customsOffices();

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CorpCustomsOffice c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $corpId)
            ->execute();

        $this->addCustomsOffices($api->pocos, $corpId);

        return $api->cached_until;
    }

    private function addCustomsOffices($customOffices, $corpId)
    {
        foreach ($customOffices as $customOffice) {
            $entity = new CorpCustomsOffice();
            $entity->setOwnerId($corpId);
            $entity->setItemId($customOffice->itemID);
            $entity->setSolarSystemId($customOffice->solarSystemID);
            $entity->setSolarSystemName($customOffice->solarSystemName);
            $entity->setReinforceHour($customOffice->reinforceHour);
            $entity->setAllowAlliance(filter_var($customOffice->allowAlliance, FILTER_VALIDATE_BOOLEAN));
            $entity->setAllowStandings(filter_var($customOffice->allowStandings, FILTER_VALIDATE_BOOLEAN));
            $entity->setStandingLevel($customOffice->standingLevel);
            $entity->setTaxRateAlliance($customOffice->taxRateAlliance);
            $entity->setTaxRateCorp($customOffice->taxRateCorp);
            $entity->setTaxRateStandingHigh($customOffice->taxRateStandingHigh);
            $entity->setTaxRateStandingGood($customOffice->taxRateStandingGood);
            $entity->setTaxRateStandingNeutral($customOffice->taxRateStandingNeutral);
            $entity->setTaxRateStandingBad($customOffice->taxRateStandingBad);
            $entity->setTaxRateStandingHorrible($customOffice->taxRateStandingHorrible);

            $this->entityManager->persist($entity);
        }
    }
}
