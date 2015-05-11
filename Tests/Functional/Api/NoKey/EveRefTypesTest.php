<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\NoKey;

use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Component\EveApi\NoKey\EveRefTypesUpdater;
use Pheal\Pheal;

class EveRefTypesTest extends AbstractFunctionalTestCase
{
    private $api;
    private $pheal;

    public function testUpdate()
    {
        $this->api->update(new ApiCall('dummyiapi'), $this->pheal);
        $this->entityManager->flush();
        $refType = $this->entityManager->getRepository('TariochEveapiFetcherBundle:EveRefType')->findOneByRefTypeId(42);
        $this->assertEquals('Dummy', $refType->getRefTypeName());
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->api = new EveRefTypesUpdater($this->entityManager);
        $this->pheal = new Pheal(null, null);
    }
}
