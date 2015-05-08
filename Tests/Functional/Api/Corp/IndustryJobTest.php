<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\Corp;

use Tarioch\EveapiFetcherBundle\Component\EveApi\Corp\IndustryJobUpdater;

class IndustryJobTest extends AbstractIndustryJobTest
{
    public function setUp()
    {
        parent::setUp();
        $this->api = new IndustryJobUpdater($this->entityManager);
    }
}
