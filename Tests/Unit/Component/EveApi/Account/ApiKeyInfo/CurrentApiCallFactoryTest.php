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
    private $owner1;

    private $factory;

    public function testCreate()
    {
        $apiId = 'apiId';
        $ownerId1 = 'ownerId1';

        $expected = array($apiId => array(
            $ownerId1 => $this->apiCall1,
            0 => $this->apiCall2
        ));

        $this->entityManager->shouldReceive('getRepository')
            ->with('TariochEveapiFetcherBundle:ApiCall')
            ->andReturn($this->repository);
        $this->repository->shouldReceive('findNormalCallsByKey')
            ->with($this->apiKey)
            ->andReturn(array($this->apiCall1, $this->apiCall2));
        $this->api->shouldReceive('getApiId')->andReturn($apiId);

        $this->apiCall1->shouldReceive('getApi')->andReturn($this->api);
        $this->apiCall1->shouldReceive('getOwner')->andReturn($this->owner1);
        $this->owner1->shouldReceive('getId')->andReturn($ownerId1);

        $this->apiCall2->shouldReceive('getApi')->andReturn($this->api);
        $this->apiCall2->shouldReceive('getOwner')->andReturn(null);


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
        $this->owner1 = m::mock('Tarioch\EveapiFetcherBundle\Entity\AccountCharacter');

        $this->factory = new CurrentApiCallFactory($this->entityManager);
    }
}
