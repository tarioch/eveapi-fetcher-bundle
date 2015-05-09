<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpIndustryJob;

abstract class AbstractIndustryJobUpdater extends AbstractCorpUpdater
{

    protected abstract function doApiCall(Pheal $pheal, $charId);

    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();
        $corpId = $owner->getCorporationId();
        $api = $this->doApiCall($pheal, $charId);

        foreach ($api->jobs as $job) {
            $entity = $this->loadOrCreate($job->jobID, $corpId);

            $entity->setInstallerId($job->installerID);
            $entity->setInstallerName($job->installerName);
            $entity->setFacilityId($job->facilityID);
            $entity->setSolarSystemId($job->solarSystemID);
            $entity->setSolarSystemName($job->solarSystemName);
            $entity->setStationId($job->stationID);
            $entity->setActivityId($job->activityID);
            $entity->setBlueprintId($job->blueprintID);
            $entity->setBlueprintTypeId($job->blueprintTypeID);
            $entity->setBlueprintTypeName($job->blueprintTypeName);
            $entity->setBlueprintLocationId($job->blueprintLocationID);
            $entity->setOutputLocationId($job->outputLocationID);
            $entity->setRuns($job->runs);
            $entity->setCost($job->cost);
            $entity->setTeamId($job->teamID);
            $entity->setLicensedRuns($job->licensedRuns);
            $entity->setProbability($job->probability);
            $entity->setProductTypeId($job->productTypeID);
            $entity->setProductTypeName($job->productTypeName);
            $entity->setStatus($job->status);
            $entity->setTimeInSeconds($job->timeInSeconds);
            $entity->setStartDate(new \DateTime($job->startDate));
            $entity->setEndDate(new \DateTime($job->endDate));
            $entity->setPauseDate(new \DateTime($job->pauseDate));
            $entity->setCompletedDate(new \DateTime($job->completedDate));
            $entity->setCompletedCharacterId($job->completedCharacterID);
            $entity->setSuccessfulRuns($job->successfulRuns);
            $this->entityManager->flush($entity);
        }

        return $api->cached_until;
    }

    private function loadOrCreate($jobId, $installerId)
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpIndustryJob');
        $entity = $repo->findOneBy(array('jobId' => $jobId, 'installerId' => $installerId));
        if ($entity === null) {
            $entity = new CorpIndustryJob($jobId, $installerId);
            $this->entityManager->persist($entity);
            $this->entityManager->flush($entity);
        }

        return $entity;
    }
}
