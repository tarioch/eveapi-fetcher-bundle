<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Pheal\Pheal;

/**
 * @DI\Service("tarioch.eveapi.corp.IndustryJobsHistory")
 */
class IndustryJobHistoryUpdater extends AbstractIndustryJobUpdater
{
    protected function doApiCall(Pheal $pheal, $charId)
    {
        return $pheal->corpScope->IndustryJobsHistory(array('characterID' => $charId));
    }
}
