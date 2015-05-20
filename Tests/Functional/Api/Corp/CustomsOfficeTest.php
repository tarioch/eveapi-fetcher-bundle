<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\Corp;

use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Corp\CustomsOfficeUpdater;
use Pheal\Pheal;

class CustomsOfficeTest extends AbstractFunctionalTestCase
{
    private $api;
    private $pheal;

    public function testUpdate()
    {
        $key = new ApiKey(123, 'dummyvcode');
        $owner = new AccountCharacter($key, 123);
        $owner->setCorporationId(11);
        $call = new ApiCall('dummyapi', $owner, $key);
        $this->api->update($call, $key, $this->pheal);
        $this->entityManager->flush();
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpCustomsOffice');
        $customsOffice = $repo->findOneByItemId(42);
        $this->assertEquals(11, $customsOffice->getSolarSystemId());
        $this->assertEquals('SolarSystemName', $customsOffice->getSolarSystemName());
        $this->assertEquals(22, $customsOffice->getReinforceHour());
        $this->assertEquals(true, $customsOffice->isAllowAlliance());
        $this->assertEquals(true, $customsOffice->isAllowStandings());
        $this->assertEquals(-2, $customsOffice->getStandingLevel());
        $this->assertEquals(0.01, $customsOffice->getTaxRateAlliance());
        $this->assertEquals(0.02, $customsOffice->getTaxRateCorp());
        $this->assertEquals(0.03, $customsOffice->getTaxRateStandingHigh());
        $this->assertEquals(0.04, $customsOffice->getTaxRateStandingGood());
        $this->assertEquals(0.05, $customsOffice->getTaxRateStandingNeutral());
        $this->assertEquals(0.06, $customsOffice->getTaxRateStandingBad());
        $this->assertEquals(0.07, $customsOffice->getTaxRateStandingHorrible());
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->api = new CustomsOfficeUpdater($this->entityManager);
        $this->pheal = new Pheal(123, 'dummyvcode');
    }
}
