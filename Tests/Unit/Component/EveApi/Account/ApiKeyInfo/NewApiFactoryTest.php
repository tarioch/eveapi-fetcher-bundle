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

    private $factory;

    public function testCreate()
    {
        $accessMask = 'accessMask';
        $keyType = 'keyType';
        $apiId1 = 'apiId1';
        $apiId2 = 'apiId2';
        $section1 = 'section1';
        $ownerId1 = 'ownerId1';
        $ownerId2 = 'ownerId2';

        $expected = array(
            $apiId1 => array(
                $ownerId1 => $this->api1,
                $ownerId2 => $this->api1
            ),
            $apiId2 => array(
                0 => $this->api2
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

        $this->api2->shouldReceive('getApiId')->andReturn($apiId2);
        $this->api2->shouldReceive('getSection')->andReturn('account');

        $actual = $this->factory->createNewApiMap($accessMask, $keyType, array($ownerId1, $ownerId2));

        $this->assertEquals($expected, $actual);
    }

    protected function setUp()
    {
        $this->entityManager = m::mock('Doctrine\ORM\EntityManager');
        $this->repository = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiRepository');
        $this->api1 = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');
        $this->api2 = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');

        $this->factory = new NewApiFactory($this->entityManager);
    }
}
