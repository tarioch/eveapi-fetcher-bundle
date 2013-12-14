<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\Section;

use Mockery as m;
use Tarioch\EveapiFetcherBundle\Component\Section\SectionApiFactory;
use Tarioch\EveapiFetcherBundle\Component\Section\AccountSectionApi;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;

class AccountSectionApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var SpecificApiFactory
     */
    private $specificApiFactory;
    /**
     * @var ApiCall
     */
    private $apiCall;
    /**
     * @var PhealFactory
     */
    private $phealFactory;

    /**
     * @var AccountSectionApi
     */
    private $accountSectionApi;

    public function testGetKeyId()
    {
        $ownerId = 'ownerId';
        $this->apiCall->shouldReceive('getOwnerId')
            ->andReturn($ownerId);

        $this->assertEquals($ownerId, $this->accountSectionApi->getKeyId($this->apiCall));
    }

    public function setUp()
    {
        $this->entityManager = m::mock('Doctrine\ORM\EntityManager');
        $this->specificApiFactory = m::mock('Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory');
        $this->apiCall = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->phealFactory = m::mock('Tarioch\PhealBundle\DependencyInjection\PhealFactory');

        $this->accountSectionApi = new AccountSectionApi(
            $this->phealFactory,
            $this->entityManager,
            $this->specificApiFactory
        );
    }
}
