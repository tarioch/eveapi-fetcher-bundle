<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpIndustryJob;

/**
 * @DI\Service("tarioch.eveapi.corp.IndustryJobs")
 */
class IndustryJobUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();
        $corpId = $owner->getCorporationId();
        $api = $pheal->corpScope->IndustryJobs(array('characterID' => $charId));

        foreach ($api->jobs as $job) {
            $entity = $this->loadOrCreate($job->jobID);

            $entity->setOwnerId($corpId);
            $entity->setAssemblyLineId($job->assemblyLineID);
            $entity->setContainerId($job->containerID);
            $entity->setInstalledItemId($job->installedItemID);
            $entity->setInstalledItemLocationId($job->installedItemLocationID);
            $entity->setInstalledItemQuantity($job->installedItemQuantity);
            $entity->setInstalledItemProductivityLevel($job->installedItemProductivityLevel);
            $entity->setInstalledItemMaterialLevel($job->installedItemMaterialLevel);
            $runsRemain = $job->installedItemLicensedProductionRunsRemaining;
            $entity->setInstalledItemLicensedProductionRunsRemaining($runsRemain);
            $entity->setOutputLocationId($job->outputLocationID);
            $entity->setInstallerId($job->installerID);
            $entity->setRuns($job->runs);
            $entity->setLicensedProductionRuns($job->licensedProductionRuns);
            $entity->setInstalledInSolarSystemId($job->installedInSolarSystemID);
            $entity->setContainerLocationId($job->containerLocationID);
            $entity->setMaterialMultiplier($job->materialMultiplier);
            $entity->setCharMaterialMultiplier($job->charMaterialMultiplier);
            $entity->setTimeMultiplier($job->timeMultiplier);
            $entity->setCharTimeMultiplier($job->charTimeMultiplier);
            $entity->setInstalledItemTypeId($job->installedItemTypeID);
            $entity->setOutputTypeId($job->outputTypeID);
            $entity->setContainerTypeId($job->containerTypeID);
            $entity->setInstalledItemCopy($job->installedItemCopy);
            $entity->setCompleted(filter_var($job->completed, FILTER_VALIDATE_BOOLEAN));
            $entity->setCompletedSuccessfully($job->completedSuccessfully);
            $entity->setInstalledItemFlag($job->installedItemFlag);
            $entity->setOutputFlag($job->outputFlag);
            $entity->setActivityId($job->activityID);
            $entity->setCompletedStatus($job->completedStatus);
            $entity->setInstallTime(new \DateTime($job->installTime));
            $entity->setBeginProductionTime(new \DateTime($job->beginProductionTime));
            $entity->setEndProductionTime(new \DateTime($job->endProductionTime));
            $entity->setPauseProductionTime(new \DateTime($job->pauseProductionTime));
        }

        return $api->cached_until;
    }

    private function loadOrCreate($jobId)
    {
        $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CorpIndustryJob', $jobId);
        if ($entity == null) {
            $entity = new CorpIndustryJob($jobId);
            $this->entityManager->persist($entity);
        }

        return $entity;
    }
}
