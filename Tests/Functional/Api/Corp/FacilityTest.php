<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\Corp;

use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Corp\FacilityUpdater;
use Pheal\Pheal;

class FacilityTest extends AbstractFunctionalTestCase
{
    private $api;
    private $pheal;

    public function testUpdate()
    {
        $key = new ApiKey(123, 'dummyvcode');
        $owner = new AccountCharacter($key, 123);
        $owner->setCorporationId(11);
        $call = new ApiCall("dummyapi", $owner, $key);
        $this->api->update($call, $key, $this->pheal);
        $this->entityManager->flush();
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpFacility');
        $facility = $repo->findOneByFacilityId(1);
        $this->assertEquals(2, $facility->getTypeId());
        $this->assertEquals("TypeName", $facility->getTypeName());
        $this->assertEquals(3, $facility->getSolarSystemId());
        $this->assertEquals("SolarSystemName", $facility->getSolarSystemName());
        $this->assertEquals(4, $facility->getRegionId());
        $this->assertEquals("RegionName", $facility->getRegionName());
        $this->assertEquals(5, $facility->getStarbaseModifier());
        $this->assertEquals(6, $facility->getTax());
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->api = new FacilityUpdater($this->entityManager);
        $this->pheal = new Pheal(123, 'dummyvcode');
    }
}
