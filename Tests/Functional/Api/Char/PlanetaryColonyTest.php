<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\Corp;

use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Char\PlanetaryColonyUpdater;
use Pheal\Pheal;

class PlanetaryColonyTest extends AbstractFunctionalTestCase
{
    private $api;
    private $pheal;

    public function testUpdate()
    {
        $key = new ApiKey(123, 'dummyvcode');
        $owner = new AccountCharacter($key, 11);
        $call = new ApiCall('dummyapi', $owner, $key);
        $this->api->update($call, $key, $this->pheal);
        $this->entityManager->flush();

        $this->assertColony();
        $this->assertPin();
        $this->assertLink();
        $this->assertRoute();
    }

    private function assertColony()
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharPlanetaryColony');
        $colony = $repo->findOneByPlanetId(42);

        $this->assertEquals(11, $colony->getOwnerId());
        $this->assertEquals('OwnerName', $colony->getOwnerName());
        $this->assertEquals(22, $colony->getSolarSystemId());
        $this->assertEquals('SolarSystemName', $colony->getSolarSystemName());
        $this->assertEquals('PlanetName', $colony->getPlanetName());
        $this->assertEquals(33, $colony->getPlanetTypeId());
        $this->assertEquals('PlanetTypeName', $colony->getPlanetTypeName());
        $this->assertEquals(new \DateTime('2010-10-15 22:33:44'), $colony->getLastUpdate());
        $this->assertEquals(44, $colony->getUpgradeLevel());
        $this->assertEquals(55, $colony->getNumberOfPins());
    }

    private function assertPin()
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharPlanetaryPin');
        $pin = $repo->findOneByPlanetId(42);

        $this->assertEquals(11, $pin->getOwnerId());
        $this->assertEquals(88, $pin->getPinId());
        $this->assertEquals(22, $pin->getTypeId());
        $this->assertEquals('TypeName', $pin->getTypeName());
        $this->assertEquals(33, $pin->getSchematicId());
        $this->assertEquals(new \DateTime('2010-10-15 22:33:44'), $pin->getLastLaunchTime());
        $this->assertEquals(44, $pin->getCycleTime());
        $this->assertEquals(55, $pin->getQuantityPerCycle());
        $this->assertEquals(new \DateTime('2011-12-25 12:13:14'), $pin->getInstallTime());
        $this->assertEquals(new \DateTime('2012-12-16 13:14:15'), $pin->getExpiryTime());
        $this->assertEquals(66, $pin->getContentTypeId());
        $this->assertEquals('ContentTypeName', $pin->getContentTypeName());
        $this->assertEquals(77, $pin->getContentQuantity());
        $this->assertEquals(-1.11, $pin->getLongitude());
        $this->assertEquals(2.22, $pin->getLatitude());
    }

    private function assertLink()
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharPlanetaryLink');
        $link = $repo->findOneByPlanetId(42);

        $this->assertEquals(11, $link->getOwnerId());
        $this->assertEquals(22, $link->getSourcePinId());
        $this->assertEquals(33, $link->getDestinationPinId());
        $this->assertEquals(44, $link->getLinkLevel());
    }

    private function assertRoute()
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharPlanetaryRoute');
        $route = $repo->findOneByPlanetId(42);

        $this->assertEquals(11, $route->getOwnerId());
        $this->assertEquals(22, $route->getRouteId());
        $this->assertEquals(33, $route->getSourcePinId());
        $this->assertEquals(44, $route->getDestinationPinId());
        $this->assertEquals(55, $route->getContentTypeId());
        $this->assertEquals('ContentTypeName', $route->getContentTypeName());
        $this->assertEquals(66, $route->getQuantity());
        $this->assertEquals(77, $route->getWaypoint1());
        $this->assertEquals(88, $route->getWaypoint2());
        $this->assertEquals(99, $route->getWaypoint3());
        $this->assertEquals(122, $route->getWaypoint4());
        $this->assertEquals(133, $route->getWaypoint5());
    }

    public function setUp()
    {
        parent::setUp();
        $this->api = new PlanetaryColonyUpdater($this->entityManager);
        $this->pheal = new Pheal(123, 'dummyvcode');
    }
}
