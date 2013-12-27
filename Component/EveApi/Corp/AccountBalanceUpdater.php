<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpAccountBalance;

/**
 * @DI\Service("tarioch.eveapi.corp.AccountBalance")
 */
class AccountBalanceUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $charId = $call->getOwnerId();
        $corpId = $this->getCorpId($charId);
        $api = $pheal->corpScope->AccountBalance(array('characterID' => $charId));

        foreach ($api->accounts as $account) {
            $entity = $this->loadOrCreate($account->accountID);

            $entity->setOwnerId($corpId);
            $entity->setAccountKey($account->accountKey);
            $entity->setBalance($account->balance);
        }

        return $api->cached_until;
    }

    private function loadOrCreate($accountId)
    {
        $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CorpAccountBalance', $accountId);
        if ($entity == null) {
            $entity = new CorpAccountBalance($accountId);
            $this->entityManager->persist($entity);
        }

        return $entity;
    }
}
