<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\Section;

use Mockery as m;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\Section\KeySectionApi;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Pheal\Pheal;
use Pheal\Exceptions\PhealException;

class KeySectionApiTest extends \PHPUnit_Framework_TestCase
{
    const CACHED_UNTIL = '2001-11-21 23:21:22.333';

    /**
     * @var SpecificApiFactory
     */
    private $specificApiFactory;
    /**
     * @var ApiCall
     */
    private $apiCall;
    /**
     * @var ApiKey
     */
    private $key;
    /**
     * @var PhealFactory
     */
    private $phealFactory;
    /**
     * @var Pheal
     */
    private $pheal;
    /**
     * @var Api
     */
    private $api;
    /**
     * @var KeyApi
     */
    private $specificApi;

    /**
     * @var KeySectionApi
     */
    private $keySectionApi;

    public function testUpdateNotActive()
    {
        $this->apiCall->shouldReceive('getKey')->andReturn($this->key);
        $this->key->shouldReceive('isActive')
            ->andReturn(false);
        $this->apiCall->shouldReceive('setActive')
            ->with(false)
            ->once();
        $this->apiCall->shouldReceive('getCachedUntil')->andReturn(self::CACHED_UNTIL);

        $this->assertEquals(self::CACHED_UNTIL, $this->keySectionApi->update($this->apiCall));
    }

    public function testUpdateSuccess()
    {
        $this->mockPrepareApiCall();
        $this->specificApi->shouldReceive('update')
            ->with($this->apiCall, $this->key, $this->pheal)
            ->andReturn(self::CACHED_UNTIL);
        $this->key->shouldReceive('clearErrorCount')->once();

        $this->assertEquals(new \DateTime(self::CACHED_UNTIL), $this->keySectionApi->update($this->apiCall));
    }

    public function testUpdateFailed()
    {
        $this->mockPrepareApiCall();
        $this->specificApi->shouldReceive('update')
            ->with($this->apiCall, $this->key, $this->pheal)
            ->andThrow(new PhealException());

        $this->key->shouldReceive('increaseErrorCount');
        $this->key->shouldReceive('getErrorCount')->andReturn(20);

        try {
            $this->keySectionApi->update($this->apiCall);
            $this->fail('Exception expected');
        } catch (PhealException $e) {
            // ok
        }
    }

    public function testUpdateFailedMaxReached()
    {
        $this->mockPrepareApiCall();
        $this->specificApi->shouldReceive('update')
            ->with($this->apiCall, $this->key, $this->pheal)
            ->andThrow(new PhealException());

        $this->key->shouldReceive('increaseErrorCount');
        $this->key->shouldReceive('getErrorCount')->andReturn(21);
        $this->key->shouldReceive('setActive')
            ->with(false)
            ->once();

        try {
            $this->keySectionApi->update($this->apiCall);
            $this->fail('Exception expected');
        } catch (PhealException $e) {
            // ok
        }
    }

    private function mockPrepareApiCall()
    {
        $keyId = 'keyId';
        $vcode = 'vcode';

        $this->apiCall->shouldReceive('getKey')->andReturn($this->key);
        $this->key->shouldReceive('isActive')
            ->andReturn(true);

        $this->key->shouldReceive('getKeyId')->andReturn($keyId);
        $this->key->shouldReceive('getVcode')->andReturn($vcode);
        $this->phealFactory->shouldReceive('createEveOnline')
            ->with($keyId, $vcode)
            ->andReturn($this->pheal);
        $this->apiCall->shouldReceive('getApi')->andReturn($this->api);
        $this->specificApiFactory->shouldReceive('create')
            ->with($this->api)
            ->andReturn($this->specificApi);
    }

    public function setUp()
    {
        $this->specificApiFactory = m::mock('Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory');
        $this->apiCall = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->api = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');
        $this->key = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiKey');
        $this->pheal = m::mock('Pheal\Pheal');
        $this->phealFactory = m::mock('Tarioch\PhealBundle\DependencyInjection\PhealFactory');
        $this->specificApi = m::mock('Tarioch\EveapiFetcherBundle\Component\KeyApi');

        $this->keySectionApi = new KeySectionApi(
            $this->phealFactory,
            $this->specificApiFactory
        );
    }
}
