<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharWalletJournal;

/**
 * @DI\Service("tarioch.eveapi.char.WalletJournal")
 */
class WalletJournalUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();

        $accountRepo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharAccountBalance');
        $accounts = $accountRepo->findByOwnerId($charId);

        foreach ($accounts as $account) {
            $accountKey = $account->getAccountKey();

            $api = $pheal->charScope->WalletJournal(array(
                'characterID' => $charId,
                'rowCount' => 2560,
                'accountKey' => $accountKey
            ));

            foreach ($api->entries as $entry) {
                $refId = $entry->refID;

                $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CharWalletJournal', $refId);
                if ($entity == null) {
                    $entity = new CharWalletJournal($refId);
                    $this->entityManager->persist($entity);

                    $entity->setOwnerId($charId);
                    $entity->setAccountKey($accountKey);
                    $entity->setDate(new \DateTime($entry->date));
                    $entity->setRefTypeId($entry->refTypeID);
                    $entity->setOwnerName1($entry->ownerName1);
                    $entity->setOwnerId1($entry->ownerID1);
                    $entity->setOwnerName2($entry->ownerName2);
                    $entity->setOwnerId2($entry->ownerID2);
                    $entity->setArgName1($entry->argName1);
                    $entity->setArgId1($entry->argID1);
                    $entity->setAmount($entry->amount);
                    $entity->setBalance($entry->balance);
                    $entity->setReason($entry->reason);
                    $entity->setOwner1TypeId($entry->owner1TypeID);
                    $entity->setOwner2TypeId($entry->owner2TypeID);
                }
            }
        }

        return $api->cached_until;
    }
}
