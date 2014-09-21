<?php
namespace Tarioch\EveapiFetcherBundle\Component\Worker;

use Mmoreram\GearmanBundle\Driver\Gearman;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;

/**
 * @DI\Service("tarioch.eveapi.worker.eve")
 * @Gearman\Work(name = "TariochEveapiFetcherEveWorker", service = "tarioch.eveapi.worker.eve")
 */
class EveWorker
{
    private $logger;
    private $entityManager;
    private $apiUpdater;

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager"),
     * "logger" = @DI\Inject("logger"),
     * "apiUpdater" = @DI\Inject("tarioch.eveapi_fetcher_bundle.component.worker.api_updater")
     * })
     */
    public function __construct(EntityManager $entityManager, LoggerInterface $logger, ApiUpdater $apiUpdater)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
        $this->apiUpdater = $apiUpdater;
    }

    /**
     * @Gearman\Job()
     */
    public function apiUpdate(\GearmanJob $job)
    {
        $apiCallId = '?';

        try {
            $apiCallId = $job->workload();
            $this->entityManager->getConnection()->beginTransaction();

            $this->apiUpdater->update($apiCallId);

            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();
        } catch (\Exception $e) {
            $this->entityManager->getConnection()->rollback();
            $this->entityManager->close();
            $this->logger->critical('{callId}: Unhandled exception', array('callId' => $apiCallId, 'exception' => $e));

            throw $e;
        }
    }
}
