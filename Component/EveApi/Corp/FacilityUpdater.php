<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpFacility;

/**
 * @DI\Service("tarioch.eveapi.corp.Facilities")
 */
class FacilityUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $corpId = $owner->getCorporationId();
        $api = $pheal->corpScope->Facilities();

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CorpFacility c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $corpId)
            ->execute();

        $this->addFacilities($api->facilities, $corpId);

        return $api->cached_until;
    }

    private function addFacilities($facilities, $corpId)
    {
        foreach ($facilities as $facility) {
            $entity = new CorpFacility();
            $entity->setOwnerId($corpId);
            $entity->setFacilityId($facility->facilityID);
            $entity->setTypeId($facility->typeID);
            $entity->setTypeName($facility->typeName);
            $entity->setSolarSystemId($facility->solarSystemID);
            $entity->setSolarSystemName($facility->solarSystemName);
            $entity->setRegionId($facility->regionID);
            $entity->setRegionName($facility->regionName);
            $entity->setStarbaseModifier($facility->starbaseModifier);
            $entity->setTax($facility->tax);

            $this->entityManager->persist($entity);
        }
    }
}
