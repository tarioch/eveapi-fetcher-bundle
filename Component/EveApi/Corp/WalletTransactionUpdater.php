<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpWalletTransaction;

/**
 * @DI\Service("tarioch.eveapi.corp.WalletTransactions")
 */
class WalletTransactionUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();
        $corpId = $owner->getCorporationId();

        $accountRepo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpAccountBalance');
        $accounts = $accountRepo->findByOwnerId($corpId);

        foreach ($accounts as $account) {
            $accountKey = $account->getAccountKey();

            $api = $pheal->corpScope->WalletTransactions(array(
                'characterID' => $charId,
                'rowCount' => 2560,
                'accountKey' => $accountKey
            ));

            $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpWalletTransaction');
            foreach ($api->transactions as $transaction) {
                $transId = $transaction->transactionID;

                $criteria = array('transactionId' => $transId, 'ownerId' => $corpId, 'accountKey' => $accountKey);
                $entity = $repo->findOneBy($criteria);
                if ($entity == null) {
                    $entity = new CorpWalletTransaction($transId, $corpId, $accountKey);
                    $this->entityManager->persist($entity);

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

                    $this->entityManager->flush($entity);
                }
            }
        }

        return $api->cached_until;
    }
}
