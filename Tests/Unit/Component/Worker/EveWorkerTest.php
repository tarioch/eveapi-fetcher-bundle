<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\Worker;

use Mockery as m;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;
use Tarioch\EveapiFetcherBundle\Component\Worker\ApiUpdater;
use Tarioch\EveapiFetcherBundle\Component\Worker\EveWorker;
use Doctrine\DBAL\Connection;

class EveWorkerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var ApiUpdater
     */
    private $apiUpdater;
    /**
     * @var Connection
     */
    private $connection;
    /**
     * @var \GearmanJob;
     */
    private $job;

    /**
     * @var EveWorker
     */
    private $eveWorker;

    public function testApiUpdateGood()
    {
        $apiCallId = 'apiCallId';

        $this->job->shouldReceive('workload')
            ->andReturn($apiCallId);
        $this->entityManager->shouldReceive('transactional');

        $this->eveWorker->apiUpdate($this->job);
    }

    public function testApiUpdateException()
    {
        $apiCallId = 'apiCallId';
        $exception = new \Exception('myexception');

        $this->job->shouldReceive('workload')
            ->andReturn($apiCallId);
        $this->entityManager->shouldReceive('transactional')->andThrow($exception);
        $this->logger->shouldReceive('critical')
            ->with(
                '{callId}: Unhandled exception',
                array('callId' => $apiCallId, 'exception' => $exception)
            );

        try {
            $this->eveWorker->apiUpdate($this->job);
            $this->fail('Exception expected');
        } catch (\Exception $e) {
            $this->assertEquals($exception->getMessage(), $e->getMessage());
        }
    }

    public function setUp()
    {
        $this->entityManager = m::mock('Doctrine\ORM\EntityManager');
        $this->logger = m::mock('Psr\Log\LoggerInterface');
        $this->apiUpdater = m::mock('Tarioch\EveapiFetcherBundle\Component\Worker\ApiUpdater');
        $this->connection = m::mock('Doctrine\DBAL\Connection');
        $this->job = m::mock('\GearmanJob');

        $this->eveWorker = new EveWorker($this->entityManager, $this->logger, $this->apiUpdater);
    }
}
