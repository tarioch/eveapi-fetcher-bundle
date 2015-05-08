<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\Corp;

use Tarioch\EveapiFetcherBundle\Component\EveApi\Corp\IndustryJobHistoryUpdater;

class IndustryJobHistoryTest extends AbstractIndustryJobTest
{
    public function setUp()
    {
        parent::setUp();
        $this->api = new IndustryJobHistoryUpdater($this->entityManager);
    }
}
