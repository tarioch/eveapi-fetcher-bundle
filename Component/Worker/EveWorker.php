<?php
namespace Tarioch\EveapiFetcherBundle\Worker;

use Mmoreram\GearmanBundle\Driver\Gearman;
use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Pheal\Exceptions\PhealException;
use Symfony\Component\DependencyInjection\Container;
use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @DI\Service("tarioch.eveapi.worker.eve")
 * @Gearman\Work(service = "tarioch.eveapi.worker.eve")
 */
class EveWorker
{
    const ERROR_MAX = 5;

    private $logger;
    private $phealFactory;
    private $entityManager;
    private $container;

    /**
     * @DI\InjectParams({
     * "phealFactory" = @DI\Inject("tarioch.pheal.factory"),
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager"),
     * "container" = @DI\Inject("service_container"),
     * "logger" = @DI\Inject("logger")
     * })
     */
    public function __construct(PhealFactory $phealFactory, EntityManager $entityManager, Container $container, LoggerInterface $logger)
    {
        $this->phealFactory = $phealFactory;
        $this->entityManager = $entityManager;
        $this->container = $container;
        $this->logger = $logger;
    }

    /**
     * @Gearman\Job()
     */
    public function apiUpdate(\GearmanJob $job)
    {
        $this->entityManager->getConnection()->beginTransaction();
        try {
            $apiCallId = $job->workload();
            $call = $this->entityManager->find('TariochEveapiFetcherBundle:ApiCall', $apiCallId);
            if ($this->isCallStillValid($call)) {
                $api = $call->getApi();
                $apiInfo = $api->getSection() . ' ' . $api->getName();

                $stopwatch = new Stopwatch();
                $stopwatch->start($apiInfo);
                try {
                    $cachedUntil = $this->updateApi($call);
                    $call->clearErrorCount();
                    $call->setCachedUntil(new \DateTime($cachedUntil));
                } catch (PhealException $e) {
                    $this->logger->error($apiCallId . ': Api call failed: ' . $e->getMessage());
                    $call->increaseErrorCount();
                    if ($call->getErrorCount() > self::ERROR_MAX) {
                        $call->setDisabled(true);
                    }
                }

                $minutesToEarliestNextCall = $call->getApi()->getCallInterval() * (1 + $call->getErrorCount());
                $earliestNextCall = new \DateTime('now', new \DateTimeZone('UTC'));
                $earliestNextCall->add(new \DateInterval('PT' . $minutesToEarliestNextCall . 'M'));
                $call->setEarliestNextCall($earliestNextCall);

                $event = $stopwatch->stop($apiInfo);
		$this->logger->info('{callId}: {apiInfo} duration: {duration} memory: {memory}', array(
		    'callId' => $apiCallId,
		    'apiInfo' => $apiInfo,
		    'duration' => $event->getDuration(),
		    'memory' => $event->getMemory()
		));
            }

            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();
        } catch (\Exception $e) {
            $this->logger->critical('{callId}: Unhandled exception', array('callId' => $apiCallId, 'exception' => $e));
            $this->entityManager->getConnection()->rollback();
            $this->entityManager->close();

            throw $e;
        }
    }

    private function isCallStillValid(ApiCall $call)
    {
        return $call != null && $call->getCachedUntil() < new \DateTime('now', new \DateTimeZone('UTC'));
    }

    private function updateApi(ApiCall $call)
    {
        $section = $call->getApi()->getSection();
        switch ($section) {
            case 'account':
                $cachedUntil = $this->accountApi($call);
                break;
            case 'char':
                $cachedUntil = $this->charApi($call);
                break;
            case 'corp':
                $cachedUntil = $this->corpApi($call);
                break;
            case 'server':
            case 'eve':
            case 'map':
                $cachedUntil = $this->noKeyApi($call);
                break;
            default:
                throw new \InvalidArgumentException('Unsupported section ' . $section);
        }

        return $cachedUntil;
    }

    private function noKeyApi(ApiCall $call)
    {
        $pheal = $this->phealFactory->createEveOnline();
        $updateService = $this->getUpdateService($call);

        return $updateService->update($call, $pheal);
    }

    private function accountApi(ApiCall $call)
    {
        $keyId = $call->getOwnerId();
        $key = $this->entityManager->getRepository('TariochEveapiFetcherBundle:Key')->find($keyId);
        if ($key->isActive()) {
            $pheal = $this->phealFactory->createEveOnline($key->getKeyId(), $key->getVcode());
            $updateService = $this->getUpdateService($call);

            return $updateService->update($call, $key, $pheal);
        } else {
            $call->setActive(false);

            return $call->getCachedUntil();
        }
    }

    private function charApi(ApiCall $call)
    {
        return $call->getCachedUntil();
    }

    private function corpApi(ApiCall $call)
    {
        return $call->getCachedUntil();
    }

    private function getUpdateService(ApiCall $call)
    {
        $api = $call->getApi();
        return $this->container->get('tarioch.eveapi.' . $api->getSection() . '.' . $api->getName());
    }
}
