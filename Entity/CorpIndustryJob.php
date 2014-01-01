<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpIndustryJob", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="job_owner", columns={"jobId", "ownerId"})
 * })
 */
class CorpIndustryJob
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="jobID", type="bigint", options={"unsigned"=true})
     */
    private $jobId;

    /**
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @ORM\Column(name="assemblyLineID", type="bigint", options={"unsigned"=true})
     */
    private $assemblyLineId;

    /**
     * @ORM\Column(name="containerID", type="bigint", options={"unsigned"=true})
     */
    private $containerId;

    /**
     * @ORM\Column(name="containerLocationID", type="bigint", options={"unsigned"=true})
     */
    private $containerLocationId;

    /**
     * @ORM\Column(name="containerTypeID", type="bigint", options={"unsigned"=true})
     */
    private $containerTypeId;

    /**
     * @ORM\Column(name="installedInSolarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $installedInSolarSystemId;

    /**
     * @ORM\Column(name="installedItemCopy", type="bigint", options={"unsigned"=true})
     */
    private $installedItemCopy;

    /**
     * @ORM\Column(name="installedItemID", type="bigint", options={"unsigned"=true})
     */
    private $installedItemId;

    /**
     * @ORM\Column(name="installedItemLocationID", type="bigint", options={"unsigned"=true})
     */
    private $installedItemLocationId;

    /**
     * @ORM\Column(name="installedItemQuantity", type="bigint", options={"unsigned"=true})
     */
    private $installedItemQuantity;

    /**
     * @ORM\Column(name="installedItemTypeID", type="bigint", options={"unsigned"=true})
     */
    private $installedItemTypeId;

    /**
     * @ORM\Column(name="installerID", type="bigint", options={"unsigned"=true})
     */
    private $installerId;

    /**
     * @ORM\Column(name="outputLocationID", type="bigint", options={"unsigned"=true})
     */
    private $outputLocationId;

    /**
     * @ORM\Column(name="outputTypeID", type="bigint", options={"unsigned"=true})
     */
    private $outputTypeId;

    /**
     * @ORM\Column(name="runs", type="bigint", options={"unsigned"=true})
     */
    private $runs;

    /**
     * @ORM\Column(name="licensedProductionRuns", type="bigint")
     */
    private $licensedProductionRuns;

    /**
     * @ORM\Column(name="installedItemMaterialLevel", type="bigint")
     */
    private $installedItemMaterialLevel;

    /**
     * @ORM\Column(name="installedItemProductivityLevel", type="bigint")
     */
    private $installedItemProductivityLevel;

    /**
     * @ORM\Column(name="installedItemLicensedProductionRunsRemaining", type="bigint")
     */
    private $installedItemLicensedProductionRunsRemaining;

    /**
     * @ORM\Column(name="beginProductionTime", type="datetime")
     */
    private $beginProductionTime;

    /**
     * @ORM\Column(name="endProductionTime", type="datetime")
     */
    private $endProductionTime;

    /**
     * @ORM\Column(name="installTime", type="datetime")
     */
    private $installTime;

    /**
     * @ORM\Column(name="pauseProductionTime", type="datetime")
     */
    private $pauseProductionTime;

    /**
     * @ORM\Column(name="completed", type="boolean")
     */
    private $completed;

    /**
     * @ORM\Column(name="activityID", type="smallint", options={"unsigned"=true})
     */
    private $activityId;

    /**
     * @ORM\Column(name="completedStatus", type="smallint", options={"unsigned"=true})
     */
    private $completedStatus;

    /**
     * @ORM\Column(name="completedSuccessfully", type="smallint", options={"unsigned"=true})
     */
    private $completedSuccessfully;

    /**
     * @ORM\Column(name="installedItemFlag", type="smallint", options={"unsigned"=true})
     */
    private $installedItemFlag;

    /**
     * @ORM\Column(name="outputFlag", type="smallint", options={"unsigned"=true})
     */
    private $outputFlag;

    /**
     * @ORM\Column(name="materialMultiplier", type="decimal", precision=4, scale=2)
     */
    private $materialMultiplier;

    /**
     * @ORM\Column(name="charMaterialMultiplier", type="decimal", precision=4, scale=2)
     */
    private $charMaterialMultiplier;

    /**
     * @ORM\Column(name="charTimeMultiplier", type="decimal", precision=4, scale=2)
     */
    private $charTimeMultiplier;

    /**
     * @ORM\Column(name="timeMultiplier", type="decimal", precision=4, scale=2)
     */
    private $timeMultiplier;

    public function __construct($jobId, $ownerId)
    {
        $this->jobId = $jobId;
        $this->ownerId = $ownerId;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get jobId
     *
     * @return integer
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * Get ownerId
     *
     * @return integer
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set assemblyLineId
     *
     * @param integer $assemblyLineId
     * @return CorpIndustryJob
     */
    public function setAssemblyLineId($assemblyLineId)
    {
        $this->assemblyLineId = $assemblyLineId;

        return $this;
    }

    /**
     * Get assemblyLineId
     *
     * @return integer
     */
    public function getAssemblyLineId()
    {
        return $this->assemblyLineId;
    }

    /**
     * Set containerId
     *
     * @param integer $containerId
     * @return CorpIndustryJob
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;

        return $this;
    }

    /**
     * Get containerId
     *
     * @return integer
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * Set containerLocationId
     *
     * @param integer $containerLocationId
     * @return CorpIndustryJob
     */
    public function setContainerLocationId($containerLocationId)
    {
        $this->containerLocationId = $containerLocationId;

        return $this;
    }

    /**
     * Get containerLocationId
     *
     * @return integer
     */
    public function getContainerLocationId()
    {
        return $this->containerLocationId;
    }

    /**
     * Set containerTypeId
     *
     * @param integer $containerTypeId
     * @return CorpIndustryJob
     */
    public function setContainerTypeId($containerTypeId)
    {
        $this->containerTypeId = $containerTypeId;

        return $this;
    }

    /**
     * Get containerTypeId
     *
     * @return integer
     */
    public function getContainerTypeId()
    {
        return $this->containerTypeId;
    }

    /**
     * Set installedInSolarSystemId
     *
     * @param integer $installedInSolarSystemId
     * @return CorpIndustryJob
     */
    public function setInstalledInSolarSystemId($installedInSolarSystemId)
    {
        $this->installedInSolarSystemId = $installedInSolarSystemId;

        return $this;
    }

    /**
     * Get installedInSolarSystemId
     *
     * @return integer
     */
    public function getInstalledInSolarSystemId()
    {
        return $this->installedInSolarSystemId;
    }

    /**
     * Set installedItemCopy
     *
     * @param integer $installedItemCopy
     * @return CorpIndustryJob
     */
    public function setInstalledItemCopy($installedItemCopy)
    {
        $this->installedItemCopy = $installedItemCopy;

        return $this;
    }

    /**
     * Get installedItemCopy
     *
     * @return integer
     */
    public function getInstalledItemCopy()
    {
        return $this->installedItemCopy;
    }

    /**
     * Set installedItemId
     *
     * @param integer $installedItemId
     * @return CorpIndustryJob
     */
    public function setInstalledItemId($installedItemId)
    {
        $this->installedItemId = $installedItemId;

        return $this;
    }

    /**
     * Get installedItemId
     *
     * @return integer
     */
    public function getInstalledItemId()
    {
        return $this->installedItemId;
    }

    /**
     * Set installedItemLocationId
     *
     * @param integer $installedItemLocationId
     * @return CorpIndustryJob
     */
    public function setInstalledItemLocationId($installedItemLocationId)
    {
        $this->installedItemLocationId = $installedItemLocationId;

        return $this;
    }

    /**
     * Get installedItemLocationId
     *
     * @return integer
     */
    public function getInstalledItemLocationId()
    {
        return $this->installedItemLocationId;
    }

    /**
     * Set installedItemQuantity
     *
     * @param integer $installedItemQuantity
     * @return CorpIndustryJob
     */
    public function setInstalledItemQuantity($installedItemQuantity)
    {
        $this->installedItemQuantity = $installedItemQuantity;

        return $this;
    }

    /**
     * Get installedItemQuantity
     *
     * @return integer
     */
    public function getInstalledItemQuantity()
    {
        return $this->installedItemQuantity;
    }

    /**
     * Set installedItemTypeId
     *
     * @param integer $installedItemTypeId
     * @return CorpIndustryJob
     */
    public function setInstalledItemTypeId($installedItemTypeId)
    {
        $this->installedItemTypeId = $installedItemTypeId;

        return $this;
    }

    /**
     * Get installedItemTypeId
     *
     * @return integer
     */
    public function getInstalledItemTypeId()
    {
        return $this->installedItemTypeId;
    }

    /**
     * Set installerId
     *
     * @param integer $installerId
     * @return CorpIndustryJob
     */
    public function setInstallerId($installerId)
    {
        $this->installerId = $installerId;

        return $this;
    }

    /**
     * Get installerId
     *
     * @return integer
     */
    public function getInstallerId()
    {
        return $this->installerId;
    }

    /**
     * Set outputLocationId
     *
     * @param integer $outputLocationId
     * @return CorpIndustryJob
     */
    public function setOutputLocationId($outputLocationId)
    {
        $this->outputLocationId = $outputLocationId;

        return $this;
    }

    /**
     * Get outputLocationId
     *
     * @return integer
     */
    public function getOutputLocationId()
    {
        return $this->outputLocationId;
    }

    /**
     * Set outputTypeId
     *
     * @param integer $outputTypeId
     * @return CorpIndustryJob
     */
    public function setOutputTypeId($outputTypeId)
    {
        $this->outputTypeId = $outputTypeId;

        return $this;
    }

    /**
     * Get outputTypeId
     *
     * @return integer
     */
    public function getOutputTypeId()
    {
        return $this->outputTypeId;
    }

    /**
     * Set runs
     *
     * @param integer $runs
     * @return CorpIndustryJob
     */
    public function setRuns($runs)
    {
        $this->runs = $runs;

        return $this;
    }

    /**
     * Get runs
     *
     * @return integer
     */
    public function getRuns()
    {
        return $this->runs;
    }

    /**
     * Set licensedProductionRuns
     *
     * @param integer $licensedProductionRuns
     * @return CorpIndustryJob
     */
    public function setLicensedProductionRuns($licensedProductionRuns)
    {
        $this->licensedProductionRuns = $licensedProductionRuns;

        return $this;
    }

    /**
     * Get licensedProductionRuns
     *
     * @return integer
     */
    public function getLicensedProductionRuns()
    {
        return $this->licensedProductionRuns;
    }

    /**
     * Set installedItemMaterialLevel
     *
     * @param integer $installedItemMaterialLevel
     * @return CorpIndustryJob
     */
    public function setInstalledItemMaterialLevel($installedItemMaterialLevel)
    {
        $this->installedItemMaterialLevel = $installedItemMaterialLevel;

        return $this;
    }

    /**
     * Get installedItemMaterialLevel
     *
     * @return integer
     */
    public function getInstalledItemMaterialLevel()
    {
        return $this->installedItemMaterialLevel;
    }

    /**
     * Set installedItemProductivityLevel
     *
     * @param integer $installedItemProductivityLevel
     * @return CorpIndustryJob
     */
    public function setInstalledItemProductivityLevel($installedItemProductivityLevel)
    {
        $this->installedItemProductivityLevel = $installedItemProductivityLevel;

        return $this;
    }

    /**
     * Get installedItemProductivityLevel
     *
     * @return integer
     */
    public function getInstalledItemProductivityLevel()
    {
        return $this->installedItemProductivityLevel;
    }

    /**
     * Set installedItemLicensedProductionRunsRemaining
     *
     * @param integer $installedItemLicensedProductionRunsRemaining
     * @return CorpIndustryJob
     */
    public function setInstalledItemLicensedProductionRunsRemaining($installedItemLicensedProductionRunsRemaining)
    {
        $this->installedItemLicensedProductionRunsRemaining = $installedItemLicensedProductionRunsRemaining;

        return $this;
    }

    /**
     * Get installedItemLicensedProductionRunsRemaining
     *
     * @return integer
     */
    public function getInstalledItemLicensedProductionRunsRemaining()
    {
        return $this->installedItemLicensedProductionRunsRemaining;
    }

    /**
     * Set beginProductionTime
     *
     * @param \DateTime $beginProductionTime
     * @return CorpIndustryJob
     */
    public function setBeginProductionTime($beginProductionTime)
    {
        $this->beginProductionTime = $beginProductionTime;

        return $this;
    }

    /**
     * Get beginProductionTime
     *
     * @return \DateTime
     */
    public function getBeginProductionTime()
    {
        return $this->beginProductionTime;
    }

    /**
     * Set endProductionTime
     *
     * @param \DateTime $endProductionTime
     * @return CorpIndustryJob
     */
    public function setEndProductionTime($endProductionTime)
    {
        $this->endProductionTime = $endProductionTime;

        return $this;
    }

    /**
     * Get endProductionTime
     *
     * @return \DateTime
     */
    public function getEndProductionTime()
    {
        return $this->endProductionTime;
    }

    /**
     * Set installTime
     *
     * @param \DateTime $installTime
     * @return CorpIndustryJob
     */
    public function setInstallTime($installTime)
    {
        $this->installTime = $installTime;

        return $this;
    }

    /**
     * Get installTime
     *
     * @return \DateTime
     */
    public function getInstallTime()
    {
        return $this->installTime;
    }

    /**
     * Set pauseProductionTime
     *
     * @param \DateTime $pauseProductionTime
     * @return CorpIndustryJob
     */
    public function setPauseProductionTime($pauseProductionTime)
    {
        $this->pauseProductionTime = $pauseProductionTime;

        return $this;
    }

    /**
     * Get pauseProductionTime
     *
     * @return \DateTime
     */
    public function getPauseProductionTime()
    {
        return $this->pauseProductionTime;
    }

    /**
     * Set completed
     *
     * @param boolean $completed
     * @return CorpIndustryJob
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * Get completed
     *
     * @return boolean
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * Set activityId
     *
     * @param integer $activityId
     * @return CorpIndustryJob
     */
    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;

        return $this;
    }

    /**
     * Get activityId
     *
     * @return integer
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * Set completedStatus
     *
     * @param integer $completedStatus
     * @return CorpIndustryJob
     */
    public function setCompletedStatus($completedStatus)
    {
        $this->completedStatus = $completedStatus;

        return $this;
    }

    /**
     * Get completedStatus
     *
     * @return integer
     */
    public function getCompletedStatus()
    {
        return $this->completedStatus;
    }

    /**
     * Set completedSuccessfully
     *
     * @param integer $completedSuccessfully
     * @return CorpIndustryJob
     */
    public function setCompletedSuccessfully($completedSuccessfully)
    {
        $this->completedSuccessfully = $completedSuccessfully;

        return $this;
    }

    /**
     * Get completedSuccessfully
     *
     * @return integer
     */
    public function getCompletedSuccessfully()
    {
        return $this->completedSuccessfully;
    }

    /**
     * Set installedItemFlag
     *
     * @param integer $installedItemFlag
     * @return CorpIndustryJob
     */
    public function setInstalledItemFlag($installedItemFlag)
    {
        $this->installedItemFlag = $installedItemFlag;

        return $this;
    }

    /**
     * Get installedItemFlag
     *
     * @return integer
     */
    public function getInstalledItemFlag()
    {
        return $this->installedItemFlag;
    }

    /**
     * Set outputFlag
     *
     * @param integer $outputFlag
     * @return CorpIndustryJob
     */
    public function setOutputFlag($outputFlag)
    {
        $this->outputFlag = $outputFlag;

        return $this;
    }

    /**
     * Get outputFlag
     *
     * @return integer
     */
    public function getOutputFlag()
    {
        return $this->outputFlag;
    }

    /**
     * Set materialMultiplier
     *
     * @param float $materialMultiplier
     * @return CorpIndustryJob
     */
    public function setMaterialMultiplier($materialMultiplier)
    {
        $this->materialMultiplier = $materialMultiplier;

        return $this;
    }

    /**
     * Get materialMultiplier
     *
     * @return float
     */
    public function getMaterialMultiplier()
    {
        return $this->materialMultiplier;
    }

    /**
     * Set charMaterialMultiplier
     *
     * @param float $charMaterialMultiplier
     * @return CorpIndustryJob
     */
    public function setCharMaterialMultiplier($charMaterialMultiplier)
    {
        $this->charMaterialMultiplier = $charMaterialMultiplier;

        return $this;
    }

    /**
     * Get charMaterialMultiplier
     *
     * @return float
     */
    public function getCharMaterialMultiplier()
    {
        return $this->charMaterialMultiplier;
    }

    /**
     * Set charTimeMultiplier
     *
     * @param float $charTimeMultiplier
     * @return CorpIndustryJob
     */
    public function setCharTimeMultiplier($charTimeMultiplier)
    {
        $this->charTimeMultiplier = $charTimeMultiplier;

        return $this;
    }

    /**
     * Get charTimeMultiplier
     *
     * @return float
     */
    public function getCharTimeMultiplier()
    {
        return $this->charTimeMultiplier;
    }

    /**
     * Set timeMultiplier
     *
     * @param float $timeMultiplier
     * @return CorpIndustryJob
     */
    public function setTimeMultiplier($timeMultiplier)
    {
        $this->timeMultiplier = $timeMultiplier;

        return $this;
    }

    /**
     * Get timeMultiplier
     *
     * @return float
     */
    public function getTimeMultiplier()
    {
        return $this->timeMultiplier;
    }
}
