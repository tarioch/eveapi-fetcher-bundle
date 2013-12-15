<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\Section;

use Mockery as m;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\Section\SectionApiFactory;
use Tarioch\EveapiFetcherBundle\Component\Section\NoKeySectionApi;
use Tarioch\EveapiFetcherBundle\Component\Section\KeySectionApi;

class SectionApiFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NoKeySectionApi
     */
    private $noKeySectionApi;
    /**
     * @var KeySectionApi
     */
    private $keySectionApi;
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

        $this->assertSame($this->keySectionApi, $this->factory->create($this->apiCall));
    }

    public function testCreateCharSection()
    {
        $this->api->shouldReceive('getSection')->andReturn('char');

        $this->assertSame($this->keySectionApi, $this->factory->create($this->apiCall));
    }

    public function testCreateCorpSection()
    {
        $this->api->shouldReceive('getSection')->andReturn('corp');

        $this->assertSame($this->keySectionApi, $this->factory->create($this->apiCall));
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

    public function setUp()
    {
        $this->noKeySectionApi = m::mock('Tarioch\EveapiFetcherBundle\Component\Section\NoKeySectionApi');
        $this->keySectionApi = m::mock('Tarioch\EveapiFetcherBundle\Component\Section\KeySectionApi');
        $this->apiCall = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->api = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');

        $this->factory = new SectionApiFactory(
            $this->keySectionApi,
            $this->noKeySectionApi
        );

        $this->apiCall->shouldReceive('getApi')->andReturn($this->api);
    }
}
