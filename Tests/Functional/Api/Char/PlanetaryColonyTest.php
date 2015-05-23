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
    }

    private function assertLink()
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharPlanetaryLink');
        $link = $repo->findOneByPlanetId(42);

        $this->assertEquals(11, $link->getOwnerId());
    }

    private function assertRoute()
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharPlanetaryRoute');
        $route = $repo->findOneByPlanetId(42);

        $this->assertEquals(11, $route->getOwnerId());
    }


    public function setUp()
    {
        parent::setUp();
        $this->api = new PlanetaryColonyUpdater($this->entityManager);
        $this->pheal = new Pheal(123, 'dummyvcode');
    }
}
