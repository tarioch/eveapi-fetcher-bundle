<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\Worker;

use Mockery as m;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;
use Tarioch\EveapiFetcherBundle\Component\Worker\ApiUpdater;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Pheal\Exceptions\PhealException;

class ApiUpdaterTest extends \PHPUnit_Framework_TestCase
{
    const API_CALL_ID = 'API_CALL_ID';
    const EARLIEST_NEXT_CALL = 'EARLIEST_NEXT_CALL';

    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var ApiTimeCalculator
     */
    private $apiTimeCalculator;
    /**
     * @var SectionApiFactory
     */
    private $sectionApiFactory;
    /**
     * @var ApiCall
     */
    private $apiCall;
    /**
     * @var Api
     */
    private $api;
    /**
     * @var SectionApi
     */
    private $sectionApi;

    /**
     * @var ApiUpdater
     */
    private $apiUpdater;

    public function testUpdateNoLongerValid()
    {
        $this->entityManager->shouldReceive('find')
            ->with('TariochEveapiFetcherBundle:ApiCall', self::API_CALL_ID)
            ->andReturn($this->apiCall);
        $this->apiTimeCalculator->shouldReceive('isCallStillValid')
            ->with($this->apiCall)
            ->andReturn(false);

        $this->apiUpdater->update(self::API_CALL_ID);
    }

    public function testUpdateSuccess()
    {
        $cachedUntil = '@1234';

        $this->mockPrepareApiCall();

        $this->sectionApi->shouldReceive('update')
            ->with($this->apiCall)
            ->andReturn($cachedUntil);

        $this->apiCall->shouldReceive('clearErrorCount');
        $this->apiCall->shouldReceive('setCachedUntil');

        $this->mockFinishApiCall();

        $this->apiUpdater->update(self::API_CALL_ID);
    }

    public function testUpdateFailed()
    {
        $this->mockPrepareApiCall();

        $this->sectionApi->shouldReceive('update')
            ->with($this->apiCall)
            ->andThrow(new PhealException());

        $this->logger->shouldReceive('error');
        $this->apiCall->shouldReceive('increaseErrorCount');
        $this->apiCall->shouldReceive('getErrorCount')->andReturn(5);

        $this->mockFinishApiCall();

        $this->apiUpdater->update(self::API_CALL_ID);
    }

    public function testUpdateFailedMaxReached()
    {
        $this->mockPrepareApiCall();

        $this->sectionApi->shouldReceive('update')
            ->with($this->apiCall)
            ->andThrow(new PhealException());

        $this->logger->shouldReceive('error');
        $this->apiCall->shouldReceive('increaseErrorCount');
        $this->apiCall->shouldReceive('getErrorCount')->andReturn(21);
        $this->apiCall->shouldReceive('setActive')->with(false)->once();

        $this->mockFinishApiCall();

        $this->apiUpdater->update(self::API_CALL_ID);
    }


    private function mockPrepareApiCall()
    {
        $this->entityManager->shouldReceive('find')
            ->with('TariochEveapiFetcherBundle:ApiCall', self::API_CALL_ID)
            ->andReturn($this->apiCall);
        $this->apiTimeCalculator->shouldReceive('isCallStillValid')
            ->with($this->apiCall)
            ->andReturn(true);

        $this->apiCall->shouldReceive('getApi')->andReturn($this->api);
        $this->api->shouldReceive('getSection')->andReturn('section');
        $this->api->shouldReceive('getName')->andReturn('name');

        $this->sectionApiFactory->shouldReceive('create')
            ->with($this->apiCall)
            ->andReturn($this->sectionApi);
    }

    private function mockFinishApiCall()
    {
        $this->apiTimeCalculator->shouldReceive('calculateEarliestNextCall')
            ->with($this->apiCall)
            ->andReturn(self::EARLIEST_NEXT_CALL);
        $this->apiCall->shouldReceive('setEarliestNextCall')->with(self::EARLIEST_NEXT_CALL);

        $this->logger->shouldReceive('info');
    }

    public function setUp()
    {
        $this->entityManager = m::mock('Doctrine\ORM\EntityManager');
        $this->logger = m::mock('Psr\Log\LoggerInterface');
        $this->apiTimeCalculator = m::mock('Tarioch\EveapiFetcherBundle\Component\Worker\ApiTimeCalculator');
        $this->sectionApiFactory = m::mock('Tarioch\EveapiFetcherBundle\Component\Section\SectionApiFactory');
        $this->apiCall = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->api = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');
        $this->sectionApi = m::mock('Tarioch\EveapiFetcherBundle\Component\Section\SectionApi');

        $this->apiUpdater = new ApiUpdater(
            $this->entityManager,
            $this->logger,
            $this->apiTimeCalculator,
            $this->sectionApiFactory
        );
    }
}
