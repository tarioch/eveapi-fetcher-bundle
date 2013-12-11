<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Account;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Component\EveApi\AccountApi;
use Tarioch\EveapiFetcherBundle\Entity\Key;
use Tarioch\EveapiFetcherBundle\Entity\AccountAccountStatus;

/**
 * @DI\Service("tarioch.eveapi.account.AccountStatus")
 */
class AccountStatusUpdater implements AccountApi
{
    private $entityManager;

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager")
     * })
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, Key $key, Pheal $pheal)
    {
        $entity = $this->loadOrCreate($key);
        $api = $pheal->accountScope->AccountStatus();

        $entity->setCreateDate(new \DateTime($api->createDate));
        $entity->setLogonCount($api->logonCount);
        $entity->setLogonMinutes($api->logonMinutes);
        $entity->setPaidUntil(new \DateTime($api->paidUntil));

        return $api->cached_until;
    }

    private function loadOrCreate(Key $key)
    {
        $repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:AccountAccountStatus');
        $entity = $repository->findOneByKey($key);
        if ($entity == null) {
            $entity = new AccountAccountStatus($key);
            $this->entityManager->persist($entity);
        }

        return $entity;
    }
}
