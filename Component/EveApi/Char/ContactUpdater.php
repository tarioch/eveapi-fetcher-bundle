<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharContact;
use Tarioch\EveapiFetcherBundle\Entity\CharCorporateContact;
use Tarioch\EveapiFetcherBundle\Entity\CharAllianceContact;

/**
 * @DI\Service("tarioch.eveapi.char.ContactList")
 */
class ContactUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $charId = $call->getOwner()->getCharacterId();

        $query = 'delete from TariochEveapiFetcherBundle:CharContact c where c.ownerId=:ownerId';
        $this->entityManager
            ->createQuery($query)
            ->setParameter('ownerId', $charId)
            ->execute();

        $query = 'delete from TariochEveapiFetcherBundle:CharCorporateContact c where c.ownerId=:ownerId';
        $this->entityManager
            ->createQuery($query)
            ->setParameter('ownerId', $charId)
            ->execute();

        $query = 'delete from TariochEveapiFetcherBundle:CharAllianceContact c where c.ownerId=:ownerId';
        $this->entityManager
            ->createQuery($query)
            ->setParameter('ownerId', $charId)
            ->execute();

        $api = $pheal->charScope->ContactList(array('characterID' => $charId));

        foreach ($api->contactList as $contactApi) {
            $entity = new CharContact($charId, $contactApi->contactID);
            $entity->setContactName($contactApi->contactName);
            $entity->setStanding($contactApi->standing);
            $entity->setInWatchlist(filter_var($contactApi->inWatchlist, FILTER_VALIDATE_BOOLEAN));
        }

        foreach ($api->corporateContactList as $contactApi) {
            $entity = new CharCorporateContact($charId, $contactApi->contactID);
            $entity->setContactName($contactApi->contactName);
            $entity->setStanding($contactApi->standing);
        }

        foreach ($api->allianceContactList as $contactApi) {
            $entity = new CharAllianceContact($charId, $contactApi->contactID);
            $entity->setContactName($contactApi->contactName);
            $entity->setStanding($contactApi->standing);
        }

        return $api->cached_until;
    }
}
