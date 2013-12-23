<?php
namespace Tarioch\EveapiFetcherBundle\Component\Worker;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Pheal\Exceptions\PhealException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;
use Tarioch\EveapiFetcherBundle\Component\Section\SectionApiFactory;

/**
 * @DI\Service(public=false)
 */
class ApiUpdater
{
    const ERROR_MAX = 5;

    private $logger;
    private $entityManager;
    private $apiTimeCalculator;
    private $sectionApiFactory;

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager"),
     * "logger" = @DI\Inject("logger"),
     * "apiTimeCalculator" = @DI\Inject("tarioch.eveapi_fetcher_bundle.component.worker.api_time_calculator"),
     * "sectionApiFactory" = @DI\Inject("tarioch.eveapi_fetcher_bundle.component.section.section_api_factory")
     * })
     */
    public function __construct(
        EntityManager $entityManager,
        LoggerInterface $logger,
        ApiTimeCalculator $apiTimeCalculator,
        SectionApiFactory $sectionApiFactory
    ) {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
        $this->apiTimeCalculator = $apiTimeCalculator;
        $this->sectionApiFactory = $sectionApiFactory;
    }

    public function update($apiCallId)
    {
        $call = $this->entityManager->find('TariochEveapiFetcherBundle:ApiCall', $apiCallId);
        if ($this->apiTimeCalculator->isCallStillValid($call)) {
            $api = $call->getApi();
            $apiInfo = $api->getSection() . ' ' . $api->getName();

            $stopwatch = new Stopwatch();
            $stopwatch->start($apiInfo);
            try {
                $sectionApi = $this->sectionApiFactory->create($call);

                $cachedUntil = $sectionApi->update($call);

                $call->clearErrorCount();
                $call->setCachedUntil($cachedUntil);
            } catch (PhealException $e) {
                $this->logger->error('{callId}: Api call failed', array('callId' => $apiCallId, 'exception' => $e));
                $call->increaseErrorCount();
                if ($call->getErrorCount() > self::ERROR_MAX) {
                    $call->setActive(false);
                }
            }
            $call->setEarliestNextCall($this->apiTimeCalculator->calculateEarliestNextCall($call));

            $event = $stopwatch->stop($apiInfo);
            $this->logger->info('{callId}: {apiInfo} duration: {duration} memory: {memory}', array(
                'callId' => $apiCallId,
                'apiInfo' => $apiInfo,
                'duration' => $event->getDuration(),
                'memory' => $event->getMemory()
            ));
        }
    }
}
