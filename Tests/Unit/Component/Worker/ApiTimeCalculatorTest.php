<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\Worker;

use Mockery as m;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\Worker\ApiTimeCalculator;

class ApiTimeCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ApiCall
     */
    private $apiCall;
    /**
     * @var Api
     */
    private $api;

    /**
     * @var ApiTimeCalculator
     */
    private $apiTimeCalculator;

    public function testIsCallStillValidNull()
    {
        $this->assertFalse($this->apiTimeCalculator->isCallStillValid(null));
    }

    public function testIsCallStillValidStillCached()
    {
        $futureTime = new \DateTime('tomorrow', new \DateTimeZone('UTC'));

        $this->apiCall->shouldReceive('getCachedUntil')->andReturn($futureTime);

        $this->assertFalse($this->apiTimeCalculator->isCallStillValid($this->apiCall));
    }

    public function testIsCallStillValidNotYetAfterEarliestNextCall()
    {
        $pastTime = new \DateTime('yesterday', new \DateTimeZone('UTC'));
        $futureTime = new \DateTime('tomorrow', new \DateTimeZone('UTC'));

        $this->apiCall->shouldReceive('getCachedUntil')->andReturn($pastTime);
        $this->apiCall->shouldReceive('getEarliestNextCall')->andReturn($futureTime);

        $this->assertFalse($this->apiTimeCalculator->isCallStillValid($this->apiCall));
    }

    public function testIsCallStillValid()
    {
        $pastTime = new \DateTime('yesterday', new \DateTimeZone('UTC'));

        $this->apiCall->shouldReceive('getCachedUntil')->andReturn($pastTime);
        $this->apiCall->shouldReceive('getEarliestNextCall')->andReturn($pastTime);

        $this->assertTrue($this->apiTimeCalculator->isCallStillValid($this->apiCall));
    }

    public function setUp()
    {
        $this->apiCall = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->api = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');

        $this->apiTimeCalculator = new ApiTimeCalculator();
    }
}
