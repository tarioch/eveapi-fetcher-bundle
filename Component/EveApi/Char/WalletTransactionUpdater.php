<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharWalletTransaction;

/**
 * @DI\Service("tarioch.eveapi.char.WalletTransactions")
 */
class WalletTransactionUpdater extends AbstractCharUpdater
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

            $api = $pheal->charScope->WalletTransactions(array(
                'characterID' => $charId,
                'rowCount' => 2560,
                'accountKey' => $accountKey
            ));

            foreach ($api->transactions as $transaction) {
                $transId = $transaction->transactionID;

                $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CharWalletTransaction', $transId);
                if ($entity == null) {
                    $entity = new CharWalletTransaction($transId);
                    $this->entityManager->persist($entity);

                    $entity->setOwnerId($charId);
                    $entity->setAccountKey($accountKey);
                    $entity->setJournalTransactionId($transaction->journalTransactionID);
                    $entity->setTransactionDateTime(new \DateTime($transaction->transactionDateTime));
                    $entity->setQuantity($transaction->quantity);
                    $entity->setTypeName($transaction->typeName);
                    $entity->setTypeId($transaction->typeID);
                    $entity->setPrice($transaction->price);
                    $entity->setClientId($transaction->clientID);
                    $entity->setClientName($transaction->clientName);
                    $entity->setClientTypeId($transaction->clientTypeID);
                    $entity->setStationId($transaction->stationID);
                    $entity->setStationName($transaction->stationName);
                    $entity->setTransactionType($transaction->transactionType);
                    $entity->setTransactionFor($transaction->transactionFor);
                    $entity->setCharacterId($transaction->characterID);
                    $entity->setCharacterName($transaction->characterName);
                }
            }
        }

        return $api->cached_until;
    }
}
