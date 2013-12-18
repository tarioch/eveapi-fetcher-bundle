<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\EveApi\Account\ApiKeyInfo;

use Mockery as m;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\Section\KeySectionApi;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Pheal\Pheal;
use Pheal\Exceptions\PhealException;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo\CurrentApiCallFactory;

class CurrentApiCallFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $entityManager;
    private $repository;
    private $apiKey;
    private $apiCall1;
    private $apiCall2;
    private $api;

    private $factory;

    public function testCreate()
    {
        $apiId = 'apiId';
        $ownerId1 = 'ownerId1';
        $ownerId2 = 'ownerId2';

        $expected = array($apiId => array(
            $ownerId1 => $this->apiCall1,
            $ownerId2 => $this->apiCall2
        ));

        $this->entityManager->shouldReceive('getRepository')
            ->with('TariochEveapiFetcherBundle:ApiCall')
            ->andReturn($this->repository);
        $this->repository->shouldReceive('findByKey')
            ->with($this->apiKey)
            ->andReturn(array($this->apiCall1, $this->apiCall2));
        $this->api->shouldReceive('getApiId')->andReturn($apiId);

        $this->apiCall1->shouldReceive('getApi')->andReturn($this->api);
        $this->apiCall1->shouldReceive('getOwnerId')->andReturn($ownerId1);

        $this->apiCall2->shouldReceive('getApi')->andReturn($this->api);
        $this->apiCall2->shouldReceive('getOwnerId')->andReturn($ownerId2);


        $actual = $this->factory->createCurrentApiCallMap($this->apiKey);

        $this->assertEquals($expected, $actual);
    }

    protected function setUp()
    {
        $this->entityManager = m::mock('Doctrine\ORM\EntityManager');
        $this->repository = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCallRepository');
        $this->apiKey = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiKey');
        $this->apiCall1 = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->apiCall2 = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->api = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');

        $this->factory = new CurrentApiCallFactory($this->entityManager);
    }
}
