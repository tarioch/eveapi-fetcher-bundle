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
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @ORM\Column(name="jobID", type="bigint", options={"unsigned"=true})
     */
    private $jobId;

    /**
     * @ORM\Column(name="installerID", type="bigint", options={"unsigned"=true})
     */
    private $installerId;

    /**
     * @ORM\Column(name="installerName", type="string", length=255, options={"unsigned"=true})
     */
    private $installerName;

    /**
     * @ORM\Column(name="facilityID", type="bigint", options={"unsigned"=true})
     */
    private $facilityId;

    /**
     * @ORM\Column(name="solarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemId;

    /**
     * @ORM\Column(name="solarSystemName", type="string", length=255, options={"unsigned"=true})
     */
    private $solarSystemName;

    /**
     * @ORM\Column(name="stationID", type="bigint", options={"unsigned"=true})
     */
    private $stationId;

    /**
     * @ORM\Column(name="activityID", type="smallint", options={"unsigned"=true})
     */
    private $activityId;

    /**
     * @ORM\Column(name="blueprintID", type="bigint", options={"unsigned"=true})
     */
    private $blueprintId;

    /**
     * @ORM\Column(name="blueprintTypeID", type="bigint", options={"unsigned"=true})
     */
    private $blueprintTypeId;

    /**
     * @ORM\Column(name="blueprintTypeName", type="string", length=255, options={"unsigned"=true})
     */
    private $blueprintTypeName;

    /**
     * @ORM\Column(name="blueprintLocationID", type="bigint", options={"unsigned"=true})
     */
    private $blueprintLocationId;

    /**
     * @ORM\Column(name="outputLocationID", type="bigint", options={"unsigned"=true})
     */
    private $outputLocationId;

    /**
     * @ORM\Column(name="runs", type="bigint", options={"unsigned"=true})
     */
    private $runs;

    /**
     * @ORM\Column(name="cost", type="bigint", options={"unsigned"=true})
     */
    private $cost;

    /**
     * @ORM\Column(name="teamID", type="bigint", options={"unsigned"=true})
     */
    private $teamId;

    /**
     * @ORM\Column(name="licensedRuns", type="bigint", options={"unsigned"=true})
     */
    private $licensedRuns;

    /**
     * @ORM\Column(name="probability", type="bigint", options={"unsigned"=true})
     */
    private $probability;

    /**
     * @ORM\Column(name="productTypeID", type="bigint", options={"unsigned"=true})
     */
    private $productTypeId;

    /**
     * @ORM\Column(name="productTypeName", type="string", length=255, options={"unsigned"=true})
     */
    private $productTypeName;

    /**
     * @ORM\Column(name="status", type="smallint", options={"unsigned"=true})
     */
    private $status;

    /**
     * @ORM\Column(name="timeInSeconds", type="bigint", options={"unsigned"=true})
     */
    private $timeInSeconds;

    /**
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @ORM\Column(name="pauseDate", type="datetime")
     */
    private $pauseDate;

    /**
     * @ORM\Column(name="completedDate", type="datetime")
     */
    private $completedDate;

    /**
     * @ORM\Column(name="completedCharacterID", type="bigint", options={"unsigned"=true})
     */
    private $completedCharacterId;

    /**
     * @ORM\Column(name="successfulRuns", type="bigint", options={"unsigned"=true})
     */
    private $successfulRuns;

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
     * Set jobId
     *
     * @param integer $jobId
     * @return CorpIndustryJob
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;

        return $this;
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
     * Set installerName
     *
     * @param string $installerName
     * @return CorpIndustryJob
     */
    public function setInstallerName($installerName)
    {
        $this->installerName = $installerName;

        return $this;
    }

    /**
     * Get installerName
     *
     * @return string 
     */
    public function getInstallerName()
    {
        return $this->installerName;
    }

    /**
     * Set facilityId
     *
     * @param integer $facilityId
     * @return CorpIndustryJob
     */
    public function setFacilityId($facilityId)
    {
        $this->facilityId = $facilityId;

        return $this;
    }

    /**
     * Get facilityId
     *
     * @return integer 
     */
    public function getFacilityId()
    {
        return $this->facilityId;
    }

    /**
     * Set solarSystemId
     *
     * @param integer $solarSystemId
     * @return CorpIndustryJob
     */
    public function setSolarSystemId($solarSystemId)
    {
        $this->solarSystemId = $solarSystemId;

        return $this;
    }

    /**
     * Get solarSystemId
     *
     * @return integer 
     */
    public function getSolarSystemId()
    {
        return $this->solarSystemId;
    }

    /**
     * Set solarSystemName
     *
     * @param string $solarSystemName
     * @return CorpIndustryJob
     */
    public function setSolarSystemName($solarSystemName)
    {
        $this->solarSystemName = $solarSystemName;

        return $this;
    }

    /**
     * Get solarSystemName
     *
     * @return string 
     */
    public function getSolarSystemName()
    {
        return $this->solarSystemName;
    }

    /**
     * Set stationId
     *
     * @param integer $stationId
     * @return CorpIndustryJob
     */
    public function setStationId($stationId)
    {
        $this->stationId = $stationId;

        return $this;
    }

    /**
     * Get stationId
     *
     * @return integer 
     */
    public function getStationId()
    {
        return $this->stationId;
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
     * Set blueprintId
     *
     * @param integer $blueprintId
     * @return CorpIndustryJob
     */
    public function setBlueprintId($blueprintId)
    {
        $this->blueprintId = $blueprintId;

        return $this;
    }

    /**
     * Get blueprintId
     *
     * @return integer 
     */
    public function getBlueprintId()
    {
        return $this->blueprintId;
    }

    /**
     * Set blueprintTypeId
     *
     * @param integer $blueprintTypeId
     * @return CorpIndustryJob
     */
    public function setBlueprintTypeId($blueprintTypeId)
    {
        $this->blueprintTypeId = $blueprintTypeId;

        return $this;
    }

    /**
     * Get blueprintTypeId
     *
     * @return integer 
     */
    public function getBlueprintTypeId()
    {
        return $this->blueprintTypeId;
    }

    /**
     * Set blueprintTypeName
     *
     * @param string $blueprintTypeName
     * @return CorpIndustryJob
     */
    public function setBlueprintTypeName($blueprintTypeName)
    {
        $this->blueprintTypeName = $blueprintTypeName;

        return $this;
    }

    /**
     * Get blueprintTypeName
     *
     * @return string 
     */
    public function getBlueprintTypeName()
    {
        return $this->blueprintTypeName;
    }

    /**
     * Set blueprintLocationId
     *
     * @param integer $blueprintLocationId
     * @return CorpIndustryJob
     */
    public function setBlueprintLocationId($blueprintLocationId)
    {
        $this->blueprintLocationId = $blueprintLocationId;

        return $this;
    }

    /**
     * Get blueprintLocationId
     *
     * @return integer 
     */
    public function getBlueprintLocationId()
    {
        return $this->blueprintLocationId;
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
     * Set cost
     *
     * @param integer $cost
     * @return CorpIndustryJob
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set teamId
     *
     * @param integer $teamId
     * @return CorpIndustryJob
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;

        return $this;
    }

    /**
     * Get teamId
     *
     * @return integer 
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Set licensedRuns
     *
     * @param integer $licensedRuns
     * @return CorpIndustryJob
     */
    public function setLicensedRuns($licensedRuns)
    {
        $this->licensedRuns = $licensedRuns;

        return $this;
    }

    /**
     * Get licensedRuns
     *
     * @return integer 
     */
    public function getLicensedRuns()
    {
        return $this->licensedRuns;
    }

    /**
     * Set probability
     *
     * @param integer $probability
     * @return CorpIndustryJob
     */
    public function setProbability($probability)
    {
        $this->probability = $probability;

        return $this;
    }

    /**
     * Get probability
     *
     * @return integer 
     */
    public function getProbability()
    {
        return $this->probability;
    }

    /**
     * Set productTypeId
     *
     * @param integer $productTypeId
     * @return CorpIndustryJob
     */
    public function setProductTypeId($productTypeId)
    {
        $this->productTypeId = $productTypeId;

        return $this;
    }

    /**
     * Get productTypeId
     *
     * @return integer 
     */
    public function getProductTypeId()
    {
        return $this->productTypeId;
    }

    /**
     * Set productTypeName
     *
     * @param string $productTypeName
     * @return CorpIndustryJob
     */
    public function setProductTypeName($productTypeName)
    {
        $this->productTypeName = $productTypeName;

        return $this;
    }

    /**
     * Get productTypeName
     *
     * @return string 
     */
    public function getProductTypeName()
    {
        return $this->productTypeName;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return CorpIndustryJob
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set timeInSeconds
     *
     * @param integer $timeInSeconds
     * @return CorpIndustryJob
     */
    public function setTimeInSeconds($timeInSeconds)
    {
        $this->timeInSeconds = $timeInSeconds;

        return $this;
    }

    /**
     * Get timeInSeconds
     *
     * @return integer 
     */
    public function getTimeInSeconds()
    {
        return $this->timeInSeconds;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return CorpIndustryJob
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return CorpIndustryJob
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set pauseDate
     *
     * @param \DateTime $pauseDate
     * @return CorpIndustryJob
     */
    public function setPauseDate($pauseDate)
    {
        $this->pauseDate = $pauseDate;

        return $this;
    }

    /**
     * Get pauseDate
     *
     * @return \DateTime 
     */
    public function getPauseDate()
    {
        return $this->pauseDate;
    }

    /**
     * Set completedDate
     *
     * @param \DateTime $completedDate
     * @return CorpIndustryJob
     */
    public function setCompletedDate($completedDate)
    {
        $this->completedDate = $completedDate;

        return $this;
    }

    /**
     * Get completedDate
     *
     * @return \DateTime 
     */
    public function getCompletedDate()
    {
        return $this->completedDate;
    }

    /**
     * Set completedCharacterId
     *
     * @param integer $completedCharacterId
     * @return CorpIndustryJob
     */
    public function setCompletedCharacterId($completedCharacterId)
    {
        $this->completedCharacterId = $completedCharacterId;

        return $this;
    }

    /**
     * Get completedCharacterId
     *
     * @return integer 
     */
    public function getCompletedCharacterId()
    {
        return $this->completedCharacterId;
    }

    /**
     * Set successfulRuns
     *
     * @param integer $successfulRuns
     * @return CorpIndustryJob
     */
    public function setSuccessfulRuns($successfulRuns)
    {
        $this->successfulRuns = $successfulRuns;

        return $this;
    }

    /**
     * Get successfulRuns
     *
     * @return integer 
     */
    public function getSuccessfulRuns()
    {
        return $this->successfulRuns;
    }
}
