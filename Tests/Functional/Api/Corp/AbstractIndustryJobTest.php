<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\Corp;

use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Corp\IndustryJobUpdater;
use Pheal\Pheal;

abstract class AbstractIndustryJobTest extends AbstractFunctionalTestCase
{
    protected $api;
    private $pheal;

    public function testUpdate()
    {
        $key = new ApiKey(123, 'dummyvcode');
        $owner = new AccountCharacter($key, 123);
        $owner->setCorporationId(11);
        $call = new ApiCall("dummyapi", $owner, $key);
        $this->api->update($call, $key, $this->pheal);
        $this->entityManager->flush();
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpIndustryJob');
        $job = $repo->findOneByJobId(11);
        $this->assertEquals(11, $job->getOwnerId());
        $this->assertEquals(22, $job->getInstallerId());
        $this->assertEquals('InstallerName', $job->getInstallerName());
        $this->assertEquals(33, $job->getFacilityId());
        $this->assertEquals(44, $job->getSolarSystemId());
        $this->assertEquals('SolarSystemName', $job->getSolarSystemName());
        $this->assertEquals(55, $job->getStationId());
        $this->assertEquals(66, $job->getActivityId());
        $this->assertEquals(77, $job->getBlueprintId());
        $this->assertEquals('BlueprintTypeName', $job->getBlueprintTypeName());
        $this->assertEquals(99, $job->getBlueprintLocationId());
        $this->assertEquals(2, $job->getOutputLocationId());
        $this->assertEquals(3, $job->getRuns());
        $this->assertEquals(4.1, $job->getCost());
        $this->assertEquals(0, $job->getTeamId());
        $this->assertEquals(5, $job->getLicensedRuns());
        $this->assertEquals(0.2, $job->getProbability());
        $this->assertEquals(6, $job->getProductTypeId());
        $this->assertEquals('ProductTypeName', $job->getProductTypeName());
        $this->assertEquals(1, $job->getStatus());
        $this->assertEquals(816000, $job->getTimeInSeconds());
        $this->assertEquals(new \DateTime('2015-04-01 12:32:59'), $job->getStartDate());
        $this->assertEquals(new \DateTime('2015-05-02 23:12:59'), $job->getEndDate());
        $this->assertEquals(new \DateTime('0001-01-01 00:00:00'), $job->getPauseDate());
        $this->assertEquals(new \DateTime('0001-01-01 00:00:00'), $job->getCompletedDate());
        $this->assertEquals(0, $job->getCompletedCharacterId());
        $this->assertEquals(0, $job->getSuccessfulRuns());
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->pheal = new Pheal(123, 'dummyvcode');
    }
}
