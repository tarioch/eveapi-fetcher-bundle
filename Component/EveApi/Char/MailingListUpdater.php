<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharMailingList;

/**
 * @DI\Service("tarioch.eveapi.char.MailingLists")
 */
class MailingListUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $charId = $call->getOwner()->getCharacterId();

        $query = 'delete from TariochEveapiFetcherBundle:CharMailingList c where c.ownerId=:ownerId';
        $this->entityManager
            ->createQuery($query)
            ->setParameter('ownerId', $charId)
            ->execute();

        $api = $pheal->charScope->MailingLists(array('characterID' => $charId));

        foreach ($api->mailingLists as $listApi) {
            $entity = new CharMailingList($charId, $listApi->listID);
            $entity->setDisplayName($listApi->displayName);
            $this->entityManager->persist($entity);
        }

        return $api->cached_until;
    }
}
