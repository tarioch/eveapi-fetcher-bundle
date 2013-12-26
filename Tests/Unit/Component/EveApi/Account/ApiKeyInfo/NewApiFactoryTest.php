<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\EveApi\Account\ApiKeyInfo;

use Mockery as m;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo\NewApiFactory;

class NewApiFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $entityManager;
    private $repository;
    private $api1;
    private $api2;
    private $newApiOwnersFactory;

    private $factory;

    public function testCreate()
    {
        $accessMask = 'accessMask';
        $keyType = 'keyType';
        $apiId1 = 'apiId1';
        $apiId2 = 'apiId2';
        $section1 = 'section1';
        $section2 = 'section2';
        $ownerId11 = 'ownerId11';
        $ownerId12 = 'ownerId12';
        $ownerId21 = 'ownerId21';
        $ownerId22 = 'ownerId22';
        $keyId = 'keyId';
        $chars = array();

        $expected = array(
            $apiId1 => array(
                $ownerId11 => $this->api1,
                $ownerId12 => $this->api1
            ),
            $apiId2 => array(
                $ownerId21 => $this->api2,
                $ownerId22 => $this->api2
            )
        );

        $this->entityManager->shouldReceive('getRepository')
            ->with('TariochEveapiFetcherBundle:Api')
            ->andReturn($this->repository);
        $this->repository->shouldReceive('loadValidApis')
            ->with($accessMask, $keyType)
            ->andReturn(array($this->api1, $this->api2));


        $this->api1->shouldReceive('getApiId')->andReturn($apiId1);
        $this->api1->shouldReceive('getSection')->andReturn($section1);
        $this->newApiOwnersFactory->shouldReceive('createOwners')
            ->with($section1, $keyId, $chars)
            ->andReturn(array($ownerId11, $ownerId12));

        $this->api2->shouldReceive('getApiId')->andReturn($apiId2);
        $this->api2->shouldReceive('getSection')->andReturn($section2);
        $this->newApiOwnersFactory->shouldReceive('createOwners')
            ->with($section2, $keyId, $chars)
            ->andReturn(array($ownerId21, $ownerId22));

        $actual = $this->factory->createNewApiMap($accessMask, $keyType, $keyId, $chars);

        $this->assertEquals($expected, $actual);
    }

    protected function setUp()
    {
        $this->entityManager = m::mock('Doctrine\ORM\EntityManager');
        $this->repository = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiRepository');
        $this->api1 = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');
        $this->api2 = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');
        $apiKeyInfoNamespace = 'Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo';
        $this->newApiOwnersFactory = m::mock($apiKeyInfoNamespace . '\NewApiOwnersFactory');

        $this->factory = new NewApiFactory($this->entityManager, $this->newApiOwnersFactory);
    }
}
