<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="charSkillInTraining")
 */
class CharSkillInTraining
{
    /**
     * @ORM\Id @ORM\Column(name="characterID", type="bigint", options={"unsigned"=true})
     */
    private $characterId;

    /**
     * @ORM\Column(name="skillInTraining", type="boolean")
     */
    private $skillInTraining;

    /**
     * @var \DateTime
     * @ORM\Column(name="trainingStartTime", type="datetime")
     */
    private $trainingStartTime;

    /**
     * @var \DateTime
     * @ORM\Column(name="trainingEndTime", type="datetime")
     */
    private $trainingEndTime;
    
    /**
     * @ORM\Id @ORM\Column(name="trainingTypeID", type="bigint", options={"unsigned"=true})
     */
    private $trainingTypeId;

    /**
     * @ORM\Id @ORM\Column(name="trainingStartSp", type="bigint", options={"unsigned"=true})
     */
    private $trainingStartSp;

    /**
     * @ORM\Id @ORM\Column(name="trainingDestinationSp", type="bigint", options={"unsigned"=true})
     */
    private $trainingDestinationSp;

    /**
     * @ORM\Id @ORM\Column(name="trainingToLevel", type="integer", options={"unsigned"=true})
     */
    private $trainingToLevel;

    public function __construct($characterId)
    {
        $this->characterId = $characterId;
    }

    /**
     * Set characterId
     *
     * @param integer $characterId
     * @return CharCharacterSheet
     */
    public function setCharacterId($characterId)
    {
        $this->characterId = $characterId;

        return $this;
    }

    /**
     * Get characterId
     *
     * @return integer
     */
    public function getCharacterId()
    {
        return $this->characterId;
    }

    /**
     * Set skillInTraining
     *
     * @param boolean $skillInTraining
     * @return CharCharacterSheet
     */
    public function setSkillInTraining($skillInTraining)
    {
        $this->skillInTraining = $skillInTraining;

        return $this;
    }

    /**
     * Get skillInTraining
     *
     * @return boolean
     */
    public function isSkillInTraining()
    {
        return $this->skillInTraining;
    }


    /**
     * Get skillInTraining
     *
     * @return boolean 
     */
    public function getSkillInTraining()
    {
        return $this->skillInTraining;
    }

    /**
     * Set trainingStartTime
     *
     * @param \DateTime $trainingStartTime
     * @return CharSkillInTraining
     */
    public function setTrainingStartTime($trainingStartTime)
    {
        $this->trainingStartTime = $trainingStartTime;
    
        return $this;
    }

    /**
     * Get trainingStartTime
     *
     * @return \DateTime 
     */
    public function getTrainingStartTime()
    {
        return $this->trainingStartTime;
    }

    /**
     * Set trainingEndTime
     *
     * @param \DateTime $trainingEndTime
     * @return CharSkillInTraining
     */
    public function setTrainingEndTime($trainingEndTime)
    {
        $this->trainingEndTime = $trainingEndTime;
    
        return $this;
    }

    /**
     * Get trainingEndTime
     *
     * @return \DateTime 
     */
    public function getTrainingEndTime()
    {
        return $this->trainingEndTime;
    }

    /**
     * Set trainingTypeId
     *
     * @param integer $trainingTypeId
     * @return CharSkillInTraining
     */
    public function setTrainingTypeId($trainingTypeId)
    {
        $this->trainingTypeId = $trainingTypeId;
    
        return $this;
    }

    /**
     * Get trainingTypeId
     *
     * @return integer 
     */
    public function getTrainingTypeId()
    {
        return $this->trainingTypeId;
    }

    /**
     * Set trainingStartSp
     *
     * @param integer $trainingStartSp
     * @return CharSkillInTraining
     */
    public function setTrainingStartSp($trainingStartSp)
    {
        $this->trainingStartSp = $trainingStartSp;
    
        return $this;
    }

    /**
     * Get trainingStartSp
     *
     * @return integer 
     */
    public function getTrainingStartSp()
    {
        return $this->trainingStartSp;
    }

    /**
     * Set trainingDestinationSp
     *
     * @param integer $trainingDestinationSp
     * @return CharSkillInTraining
     */
    public function setTrainingDestinationSp($trainingDestinationSp)
    {
        $this->trainingDestinationSp = $trainingDestinationSp;
    
        return $this;
    }

    /**
     * Get trainingDestinationSp
     *
     * @return integer 
     */
    public function getTrainingDestinationSp()
    {
        return $this->trainingDestinationSp;
    }

    /**
     * Set trainingToLevel
     *
     * @param integer $trainingToLevel
     * @return CharSkillInTraining
     */
    public function setTrainingToLevel($trainingToLevel)
    {
        $this->trainingToLevel = $trainingToLevel;
    
        return $this;
    }

    /**
     * Get trainingToLevel
     *
     * @return integer 
     */
    public function getTrainingToLevel()
    {
        return $this->trainingToLevel;
    }
}