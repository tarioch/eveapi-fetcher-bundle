<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpStarbase;

/**
 * @DI\Service("tarioch.eveapi.corp.StarbaseList")
 */
class StarbaseListUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $corpId = $owner->getCorporationId();
        $api = $pheal->corpScope->StarbaseList();

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CorpStarbase cs where cs.ownerId=:ownerId')
            ->setParameter('ownerId', $corpId)
            ->execute();

        foreach ($api->starbases as $starbase) {
            $entity = new CorpStarbase($starbase->itemID);
            $entity->setOwnerId($corpId);
            $entity->setTypeId($starbase->typeID);
            $entity->setLocationId($starbase->locationID);
            $entity->setMoonId($starbase->moonID);
            $entity->setState($starbase->state);
            $entity->setStateTimestamp(new \DateTime($starbase->stateTimestamp));
            $entity->setOnlineTimestamp(new \DateTime($starbase->onlineTimestamp));
            $entity->setStandingOwnerId($starbase->standingOwnerID);

            $this->entityManager->persist($entity);
        }

        return $api->cached_until;
    }
}
