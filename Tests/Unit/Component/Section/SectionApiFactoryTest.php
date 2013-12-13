<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\Section;

use Mockery as m;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\Section\SectionApiFactory;
use Tarioch\EveapiFetcherBundle\Component\Section\NoKeySectionApi;
use Tarioch\EveapiFetcherBundle\Component\Section\AccountSectionApi;

class SectionApiFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NoKeySectionApi
     */
    private $noKeySectionApi;
    /**
     * @var AccountSectionApi
     */
    private $accountSectionApi;
    /**
     * @var ApiCall
     */
    private $apiCall;
    /**
     * @var Api
     */
    private $api;

    /**
     * @var SectionApiFactory
     */
    private $factory;

    public function testCreateAccountSection()
    {
        $this->api->shouldReceive('getSection')->andReturn('account');

        $this->assertSame($this->accountSectionApi, $this->factory->create($this->apiCall));
    }

    public function testCreateServerSection()
    {
        $this->api->shouldReceive('getSection')->andReturn('server');

        $this->assertSame($this->noKeySectionApi, $this->factory->create($this->apiCall));
    }

    public function testCreateEveSection()
    {
        $this->api->shouldReceive('getSection')->andReturn('eve');

        $this->assertSame($this->noKeySectionApi, $this->factory->create($this->apiCall));
    }

    public function testCreateMapSection()
    {
        $this->api->shouldReceive('getSection')->andReturn('map');

        $this->assertSame($this->noKeySectionApi, $this->factory->create($this->apiCall));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCreateUnknownSection()
    {
        $this->api->shouldReceive('getSection')->andReturn('dummy');

        $this->factory->create($this->apiCall);
    }

    public function setUp()
    {
        $this->noKeySectionApi = m::mock('Tarioch\EveapiFetcherBundle\Component\Section\NoKeySectionApi');
        $this->accountSectionApi = m::mock('Tarioch\EveapiFetcherBundle\Component\Section\AccountSectionApi');
        $this->apiCall = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->api = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');

        $this->factory = new SectionApiFactory(
            $this->accountSectionApi,
            $this->noKeySectionApi
        );

        $this->apiCall->shouldReceive('getApi')->andReturn($this->api);
    }
}
