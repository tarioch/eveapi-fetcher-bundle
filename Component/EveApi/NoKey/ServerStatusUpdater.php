<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\NoKey;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Component\EveApi\NoKeyApi;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ServerServerStatus;

/**
 * @DI\Service("tarioch.eveapi.server.ServerStatus")
 */
class ServerStatusUpdater implements NoKeyApi
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
    public function update(ApiCall $call, Pheal $pheal)
    {
        $entity = $this->loadOrCreate();
        $api = $pheal->serverScope->ServerStatus();

        $entity->setServerOpen(filter_var($api->serverOpen, FILTER_VALIDATE_BOOLEAN));
        $entity->setOnlinePlayers(intval($api->onlinePlayers));

        return $api->cached_until;
    }

    private function loadOrCreate()
    {
        $repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:ServerServerStatus');
        $entity = $repository->findOneBy(array());
        if ($entity == null) {
            $entity = new ServerServerStatus();
            $this->entityManager->persist($entity);
        }

        return $entity;
    }
}
