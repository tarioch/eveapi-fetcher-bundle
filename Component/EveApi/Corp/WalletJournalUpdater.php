<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpWalletJournal;

/**
 * @DI\Service("tarioch.eveapi.corp.WalletJournal")
 */
class WalletJournalUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();
        $corpId = $owner->getCorporationId();
        $api = $pheal->corpScope->WalletJournal(array('characterID' => $charId));

        foreach ($api->transactions as $transaction) {
            $refId = $transaction->refID;

            $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CorpWalletJournal', $refId);
            if ($entity == null) {
                $entity = new CorpWalletJournal($refId);
                $this->entityManager->persist($entity);

                $entity->setOwnerId($corpId);
                $entity->setDate(new \DateTime($transaction->date));
                $entity->setRefTypeId($transaction->refTypeID);
                $entity->setOwnerName1($transaction->ownerName1);
                $entity->setOwnerId1($transaction->ownerID1);
                $entity->setOwnerName2($transaction->ownerName2);
                $entity->setOwnerId2($transaction->ownerID2);
                $entity->setArgName1($transaction->argName1);
                $entity->setArgId1($transaction->argID1);
                $entity->setAmount($transaction->amount);
                $entity->setBalance($transaction->balance);
                $entity->setReason($transaction->reason);
            }
        }

        return $api->cached_until;
    }
}
