<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharAccountBalance;

/**
 * @DI\Service("tarioch.eveapi.char.AccountBalance")
 */
class AccountBalanceUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();
        $api = $pheal->charScope->AccountBalance(array('characterID' => $charId));

        foreach ($api->accounts as $account) {
            $entity = $this->loadOrCreate($account->accountID);

            $entity->setOwnerId($charId);
            $entity->setAccountKey($account->accountKey);
            $entity->setBalance($account->balance);
        }

        return $api->cached_until;
    }

    private function loadOrCreate($accountId)
    {
        $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CharAccountBalance', $accountId);
        if ($entity === null) {
            $entity = new CharAccountBalance($accountId);
            $this->entityManager->persist($entity);
            $this->entityManager->flush($entity);
        }

        return $entity;
    }
}
