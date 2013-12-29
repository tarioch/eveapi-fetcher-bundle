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
        $api = $pheal->corpScope->WalletTransactions(array('characterID' => $charId));

        foreach ($api->transactions as $transaction) {
            $transactionId = $transaction->transactionID;

            $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CorpWalletTransaction', $transactionId);
            if ($entity == null) {
                $entity = new CorpWalletTransaction($transactionId);
                $this->entityManager->persist($entity);

                $entity->setOwnerId($corpId);
                $entity->setTransactionDateTime(new \DateTime($transaction->transactionDateTime));
                $entity->setQuantity($transaction->quantity);
                $entity->setTypeName($transaction->typeName);
                $entity->setTypeId($transaction->typeID);
                $entity->setPrice($transaction->price);
                $entity->setClientId($transaction->clientID);
                $entity->setClientName($transaction->clientName);
                $entity->setStationId($transaction->stationID);
                $entity->setStationName($transaction->stationName);
                $entity->setTransaction($transaction->transactionType);
                $entity->setTransactionFor($transaction->transactionFor);
            }
        }

        return $api->cached_until;
    }
}
