<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\NoKey;

use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;

class EveRefTypesTest extends AbstractFunctionalTestCase
{
    private $api;
    private $pheal;

    public function testLoadEveRefTypes()
    {
        $api->update(new ApiCall("dummy"), $this->pheal);
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->api = $this->get('tarioch.eveapi.eve.RefTypes');
        $phealFactory = $this->get('tarioch.pheal.factory');
        $this->pheal = $phealFactory->createEveOnline();
    }
}
