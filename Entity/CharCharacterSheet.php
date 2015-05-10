<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="charCharacterSheet")
 */
class CharCharacterSheet
{
    /**
     * @ORM\Id @ORM\Column(name="characterID", type="bigint", options={"unsigned"=true})
     */
    private $characterId;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="DoB", type="datetime")
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(name="race", type="string")
     */
    private $race;

    /**
     * @ORM\Column(name="bloodLine", type="string")
     */
    private $bloodLine;

    /**
     * @ORM\Column(name="ancestry", type="string")
     */
    private $ancestry;

    /**
     * @ORM\Column(name="gender", type="string")
     */
    private $gender;

    /**
     * @ORM\Column(name="corporationID", type="bigint", options={"unsigned"=true})
     */
    private $corporationId;

    /**
     * @ORM\Column(name="corporationName", type="string")
     */
    private $corporationName;

    /**
     * @ORM\Column(name="allianceID", type="bigint", options={"unsigned"=true}, nullable=true)
     */
    private $allianceId;

    /**
     * @ORM\Column(name="allianceName", type="string", nullable=true)
     */
    private $allianceName;

    /**
     * @ORM\Column(name="cloneName", type="string", nullable=true)
     */
    private $cloneName;

    /**
     * @ORM\Column(name="cloneSkillPoints", type="bigint", options={"unsigned"=true})
     */
    private $cloneSkillPoints;

    /**
     * @ORM\Column(name="taxRate", type="decimal", precision=17, scale=2)
     */
    private $balance;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CharSkill", mappedBy="character", cascade="all")
     */
    private $skills;

    /**
     * @ORM\OneToMany(targetEntity="CharCorporationRole", mappedBy="character", cascade="all")
     */
    private $corporationRoles;

    /**
     * @ORM\OneToMany(targetEntity="CharCorporationRoleAtHq", mappedBy="character", cascade="all")
     */
    private $corporationRolesAtHq;

    /**
     * @ORM\OneToMany(targetEntity="CharCorporationRoleAtBase", mappedBy="character", cascade="all")
     */
    private $corporationRolesAtBase;

    /**
     * @ORM\OneToMany(targetEntity="CharCorporationRoleAtOther", mappedBy="character", cascade="all")
     */
    private $corporationRolesAtOther;

    /**
     * @ORM\OneToMany(targetEntity="CharCorporationTitle", mappedBy="character", cascade="all")
     */
    private $corporationTitles;

    /**
     * @ORM\OneToOne(targetEntity="CharAttributes", cascade="all")
     * @JoinColumn(name="attributesId", referencedColumnName="id", onDelete="cascade")
     */
    private $attributes;


    public function __construct($characterId)
    {
        $this->characterId = $characterId;
        $this->corporationRoles = new ArrayCollection();
        $this->corporationRolesAtHq = new ArrayCollection();
        $this->corporationRolesAtBase = new ArrayCollection();
        $this->corporationRolesAtOther = new ArrayCollection();
        $this->corporationTitles = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return CharCharacterSheet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return CharCharacterSheet
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set race
     *
     * @param string $race
     * @return CharCharacterSheet
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set bloodLine
     *
     * @param string $bloodLine
     * @return CharCharacterSheet
     */
    public function setBloodLine($bloodLine)
    {
        $this->bloodLine = $bloodLine;

        return $this;
    }

    /**
     * Get bloodLine
     *
     * @return string
     */
    public function getBloodLine()
    {
        return $this->bloodLine;
    }

    /**
     * Set ancestry
     *
     * @param string $ancestry
     * @return CharCharacterSheet
     */
    public function setAncestry($ancestry)
    {
        $this->ancestry = $ancestry;

        return $this;
    }

    /**
     * Get ancestry
     *
     * @return string
     */
    public function getAncestry()
    {
        return $this->ancestry;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return CharCharacterSheet
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set corporationId
     *
     * @param integer $corporationId
     * @return CharCharacterSheet
     */
    public function setCorporationId($corporationId)
    {
        $this->corporationId = $corporationId;

        return $this;
    }

    /**
     * Get corporationId
     *
     * @return integer
     */
    public function getCorporationId()
    {
        return $this->corporationId;
    }

    /**
     * Set corporationName
     *
     * @param string $corporationName
     * @return CharCharacterSheet
     */
    public function setCorporationName($corporationName)
    {
        $this->corporationName = $corporationName;

        return $this;
    }

    /**
     * Get corporationName
     *
     * @return string
     */
    public function getCorporationName()
    {
        return $this->corporationName;
    }

    /**
     * Set allianceId
     *
     * @param integer $allianceId
     * @return CharCharacterSheet
     */
    public function setAllianceId($allianceId)
    {
        $this->allianceId = $allianceId;

        return $this;
    }

    /**
     * Get allianceId
     *
     * @return integer
     */
    public function getAllianceId()
    {
        return $this->allianceId;
    }

    /**
     * Set allianceName
     *
     * @param string $allianceName
     * @return CharCharacterSheet
     */
    public function setAllianceName($allianceName)
    {
        $this->allianceName = $allianceName;

        return $this;
    }

    /**
     * Get allianceName
     *
     * @return string
     */
    public function getAllianceName()
    {
        return $this->allianceName;
    }

    /**
     * Set cloneName
     *
     * @param string $cloneName
     * @return CharCharacterSheet
     */
    public function setCloneName($cloneName)
    {
        $this->cloneName = $cloneName;

        return $this;
    }

    /**
     * Get cloneName
     *
     * @return string
     */
    public function getCloneName()
    {
        return $this->cloneName;
    }

    /**
     * Set cloneSkillPoints
     *
     * @param integer $cloneSkillPoints
     * @return CharCharacterSheet
     */
    public function setCloneSkillPoints($cloneSkillPoints)
    {
        $this->cloneSkillPoints = $cloneSkillPoints;

        return $this;
    }

    /**
     * Get cloneSkillPoints
     *
     * @return integer
     */
    public function getCloneSkillPoints()
    {
        return $this->cloneSkillPoints;
    }

    /**
     * Set balance
     *
     * @param float $balance
     * @return CharCharacterSheet
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Add skills
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharSkill $skills
     * @return CharCharacterSheet
     */
    public function addSkill(\Tarioch\EveapiFetcherBundle\Entity\CharSkill $skills)
    {
        $this->skills[] = $skills;

        return $this;
    }

    /**
     * Remove skills
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharSkill $skills
     */
    public function removeSkill(\Tarioch\EveapiFetcherBundle\Entity\CharSkill $skills)
    {
        $this->skills->removeElement($skills);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Add corporationRoles
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationRole $corporationRoles
     * @return CharCharacterSheet
     */
    public function addCorporationRole(\Tarioch\EveapiFetcherBundle\Entity\CharCorporationRole $corporationRoles)
    {
        $this->corporationRoles[] = $corporationRoles;

        return $this;
    }

    /**
     * Remove corporationRoles
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationRole $corporationRoles
     */
    public function removeCorporationRole(\Tarioch\EveapiFetcherBundle\Entity\CharCorporationRole $corporationRoles)
    {
        $this->corporationRoles->removeElement($corporationRoles);
    }

    /**
     * Get corporationRoles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorporationRoles()
    {
        return $this->corporationRoles;
    }

    /**
     * Add corporationRolesAtHq
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationRoleAtHq $corporationRolesAtHq
     * @return CharCharacterSheet
     */
    public function addCorporationRolesAtHq(CharCorporationRoleAtHq $corporationRolesAtHq)
    {
        $this->corporationRolesAtHq[] = $corporationRolesAtHq;

        return $this;
    }

    /**
     * Remove corporationRolesAtHq
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationRoleAtHq $corporationRolesAtHq
     */
    public function removeCorporationRolesAtHq(CharCorporationRoleAtHq $corporationRolesAtHq)
    {
        $this->corporationRolesAtHq->removeElement($corporationRolesAtHq);
    }

    /**
     * Get corporationRolesAtHq
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorporationRolesAtHq()
    {
        return $this->corporationRolesAtHq;
    }

    /**
     * Add corporationRolesAtBase
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationRoleAtBase $corporationRolesAtBase
     * @return CharCharacterSheet
     */
    public function addCorporationRolesAtBase(CharCorporationRoleAtBase $corporationRolesAtBase)
    {
        $this->corporationRolesAtBase[] = $corporationRolesAtBase;

        return $this;
    }

    /**
     * Remove corporationRolesAtBase
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationRoleAtBase $corporationRolesAtBase
     */
    public function removeCorporationRolesAtBase(CharCorporationRoleAtBase $corporationRolesAtBase)
    {
        $this->corporationRolesAtBase->removeElement($corporationRolesAtBase);
    }

    /**
     * Get corporationRolesAtBase
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorporationRolesAtBase()
    {
        return $this->corporationRolesAtBase;
    }

    /**
     * Add corporationRolesAtOther
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationRoleAtOther $corporationRolesAtOther
     * @return CharCharacterSheet
     */
    public function addCorporationRolesAtOther(CharCorporationRoleAtOther $corporationRolesAtOther)
    {
        $this->corporationRolesAtOther[] = $corporationRolesAtOther;

        return $this;
    }

    /**
     * Remove corporationRolesAtOther
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationRoleAtOther $corporationRolesAtOther
     */
    public function removeCorporationRolesAtOther(CharCorporationRoleAtOther $corporationRolesAtOther)
    {
        $this->corporationRolesAtOther->removeElement($corporationRolesAtOther);
    }

    /**
     * Get corporationRolesAtOther
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorporationRolesAtOther()
    {
        return $this->corporationRolesAtOther;
    }

    /**
     * Add corporationTitles
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationTitle $corporationTitles
     * @return CharCharacterSheet
     */
    public function addCorporationTitle(\Tarioch\EveapiFetcherBundle\Entity\CharCorporationTitle $corporationTitles)
    {
        $this->corporationTitles[] = $corporationTitles;

        return $this;
    }

    /**
     * Remove corporationTitles
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharCorporationTitle $corporationTitles
     */
    public function removeCorporationTitle(\Tarioch\EveapiFetcherBundle\Entity\CharCorporationTitle $corporationTitles)
    {
        $this->corporationTitles->removeElement($corporationTitles);
    }

    /**
     * Get corporationTitles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorporationTitles()
    {
        return $this->corporationTitles;
    }

    /**
     * Set attributes
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CharAttributes $attributes
     * @return CharCharacterSheet
     */
    public function setAttributes(\Tarioch\EveapiFetcherBundle\Entity\CharAttributes $attributes = null)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Get attributes
     *
     * @return \Tarioch\EveapiFetcherBundle\Entity\CharAttributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
