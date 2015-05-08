<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Pheal\Pheal;

/**
 * @DI\Service("tarioch.eveapi.corp.IndustryJobs")
 */
class IndustryJobUpdater extends AbstractIndustryJobUpdater
{
    protected function doApiCall(Pheal $pheal, $charId)
    {
        return $pheal->corpScope->IndustryJobs(array('characterID' => $charId));
    }
}
