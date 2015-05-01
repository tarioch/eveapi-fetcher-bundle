<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\Corp;

use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Corp\BlueprintUpdater;
use Pheal\Pheal;

class BlueprintTest extends AbstractFunctionalTestCase
{
    private $api;
    private $pheal;

    public function testLoadEveRefTypes()
    {
        $key = new ApiKey(123, 'dummyvcode');
        $owner = new AccountCharacter($key, 123);
        $owner->setCorporationId(11);
        $call = new ApiCall("dummyapi", $owner, $key);
        $this->api->update($call, $key, $this->pheal);
        $this->entityManager->flush();
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpBlueprint');
        $blueprint = $repo->findOneByItemId(42);
        $this->assertEquals(11, $blueprint->getLocationId());
        $this->assertEquals(22, $blueprint->getTypeId());
        $this->assertEquals("TypeName", $blueprint->getTypeName());
        $this->assertEquals("33", $blueprint->getFlag());
        $this->assertEquals("-44", $blueprint->getQuantity());
        $this->assertEquals("12", $blueprint->getTimeEfficiency());
        $this->assertEquals("13", $blueprint->getMaterialEfficiency());
        $this->assertEquals("-55", $blueprint->getRuns());
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->api = new BlueprintUpdater($this->entityManager);
        $this->pheal = new Pheal(123, 'dummyvcode');
    }
}
