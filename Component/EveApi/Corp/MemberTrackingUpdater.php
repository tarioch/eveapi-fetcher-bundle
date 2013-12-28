<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpMemberTracking;

/**
 * @DI\Service("tarioch.eveapi.corp.MemberTracking")
 */
class MemberTrackingUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $corpId = $owner->getCorporationId();
        $api = $pheal->corpScope->MemberTracking(array('extended' => 1));

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CorpMemberTracking c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $corpId)
            ->execute();

        foreach ($api->members as $member) {
            $entity = new CorpMemberTracking();
            $entity->setOwnerId($corpId);
            $entity->setCharacterId($member->characterID);
            $entity->setName($member->name);
            $entity->setStartDateTime(new \DateTime($member->startDateTime));
            $entity->setBaseId($member->baseID);
            $entity->setBase($member->base);
            $entity->setTitle($member->title);
            $entity->setLogonDateTime(new \DateTime($member->logonDateTime));
            $entity->setLogoffDateTime(new \DateTime($member->logoffDateTime));
            $entity->setLocationId($member->locationID);
            $entity->setLocation($member->location);
            $entity->setShipTypeId($member->shipTypeID);
            $entity->setShipType($member->shipType);
            $entity->setRoles($member->roles);
            $entity->setGrantableRoles($member->grantableRoles);

            $this->entityManager->persist($entity);
        }

        return $api->cached_until;
    }
}
