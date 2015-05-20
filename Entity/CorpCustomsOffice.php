<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpCustomsOffice", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="entry_owner", columns={"itemId", "ownerId"})
 * })
 */
class CorpCustomsOffice
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @ORM\Column(name="itemID", type="bigint", options={"unsigned"=true})
     */
    private $itemId;

    /**
     * @ORM\Column(name="solarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemId;

    /**
     * @ORM\Column(name="solarSystemName", type="string")
     */
    private $solarSystemName;

    /**
     * @ORM\Column(name="reinforceHour", type="integer", options={"unsigned"=true})
     */
    private $reinforceHour;
    
    /**
     * @ORM\Column(name="allowAlliance", type="boolean")
     */
    private $allowAlliance;
    
    /**
     * @ORM\Column(name="allowStandings", type="boolean")
     */
    private $allowStandings;

    /**
     * @ORM\Column(name="standingLevel", type="decimal", precision=17, scale=2)
     */
    private $standingLevel;
    
    /**
     * @ORM\Column(name="taxRateAlliance", type="decimal", precision=17, scale=2)
     */
    private $taxRateAlliance;

    /**
     * @ORM\Column(name="taxRateCorp", type="decimal", precision=17, scale=2)
     */
    private $taxRateCorp;

    /**
     * @ORM\Column(name="taxRateStandingHigh", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingHigh;

    /**
     * @ORM\Column(name="taxRateStandingGood", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingGood;

    /**
     * @ORM\Column(name="taxRateStandingNeutral", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingNeutral;

    /**
     * @ORM\Column(name="taxRateStandingBad", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingBad;

    /**
     * @ORM\Column(name="taxRateStandingHorrible", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingHorrible;

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
     * Set ownerId
     *
     * @param integer $ownerId
     * @return CorpCustomsOffice
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    
        return $this;
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
     * Set itemId
     *
     * @param integer $itemId
     * @return CorpCustomsOffice
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    
        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set solarSystemId
     *
     * @param integer $solarSystemId
     * @return CorpCustomsOffice
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
     * @return CorpCustomsOffice
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
     * Set reinforceHour
     *
     * @param integer $reinforceHour
     * @return CorpCustomsOffice
     */
    public function setReinforceHour($reinforceHour)
    {
        $this->reinforceHour = $reinforceHour;
    
        return $this;
    }

    /**
     * Get reinforceHour
     *
     * @return integer
     */
    public function getReinforceHour()
    {
        return $this->reinforceHour;
    }

    /**
     * Set allowAlliance
     *
     * @param boolean $allowAlliance
     * @return CorpCustomsOffice
     */
    public function setAllowAlliance($allowAlliance)
    {
        $this->allowAlliance = $allowAlliance;
    
        return $this;
    }

    /**
     * Get allowAlliance
     *
     * @return boolean
     */
    public function getAllowAlliance()
    {
        return $this->allowAlliance;
    }

    /**
     * Set allowStandings
     *
     * @param boolean $allowStandings
     * @return CorpCustomsOffice
     */
    public function setAllowStandings($allowStandings)
    {
        $this->allowStandings = $allowStandings;
    
        return $this;
    }

    /**
     * Get allowStandings
     *
     * @return boolean
     */
    public function getAllowStandings()
    {
        return $this->allowStandings;
    }

    /**
     * Set standingLevel
     *
     * @param string $standingLevel
     * @return CorpCustomsOffice
     */
    public function setStandingLevel($standingLevel)
    {
        $this->standingLevel = $standingLevel;
    
        return $this;
    }

    /**
     * Get standingLevel
     *
     * @return string
     */
    public function getStandingLevel()
    {
        return $this->standingLevel;
    }

    /**
     * Set taxRateAlliance
     *
     * @param string $taxRateAlliance
     * @return CorpCustomsOffice
     */
    public function setTaxRateAlliance($taxRateAlliance)
    {
        $this->taxRateAlliance = $taxRateAlliance;
    
        return $this;
    }

    /**
     * Get taxRateAlliance
     *
     * @return string
     */
    public function getTaxRateAlliance()
    {
        return $this->taxRateAlliance;
    }

    /**
     * Set taxRateCorp
     *
     * @param string $taxRateCorp
     * @return CorpCustomsOffice
     */
    public function setTaxRateCorp($taxRateCorp)
    {
        $this->taxRateCorp = $taxRateCorp;
    
        return $this;
    }

    /**
     * Get taxRateCorp
     *
     * @return string
     */
    public function getTaxRateCorp()
    {
        return $this->taxRateCorp;
    }

    /**
     * Set taxRateStandingHigh
     *
     * @param string $taxRateStandingHigh
     * @return CorpCustomsOffice
     */
    public function setTaxRateStandingHigh($taxRateStandingHigh)
    {
        $this->taxRateStandingHigh = $taxRateStandingHigh;
    
        return $this;
    }

    /**
     * Get taxRateStandingHigh
     *
     * @return string
     */
    public function getTaxRateStandingHigh()
    {
        return $this->taxRateStandingHigh;
    }

    /**
     * Set taxRateStandingGood
     *
     * @param string $taxRateStandingGood
     * @return CorpCustomsOffice
     */
    public function setTaxRateStandingGood($taxRateStandingGood)
    {
        $this->taxRateStandingGood = $taxRateStandingGood;
    
        return $this;
    }

    /**
     * Get taxRateStandingGood
     *
     * @return string
     */
    public function getTaxRateStandingGood()
    {
        return $this->taxRateStandingGood;
    }

    /**
     * Set taxRateStandingNeutral
     *
     * @param string $taxRateStandingNeutral
     * @return CorpCustomsOffice
     */
    public function setTaxRateStandingNeutral($taxRateStandingNeutral)
    {
        $this->taxRateStandingNeutral = $taxRateStandingNeutral;
    
        return $this;
    }

    /**
     * Get taxRateStandingNeutral
     *
     * @return string
     */
    public function getTaxRateStandingNeutral()
    {
        return $this->taxRateStandingNeutral;
    }

    /**
     * Set taxRateStandingBad
     *
     * @param string $taxRateStandingBad
     * @return CorpCustomsOffice
     */
    public function setTaxRateStandingBad($taxRateStandingBad)
    {
        $this->taxRateStandingBad = $taxRateStandingBad;
    
        return $this;
    }

    /**
     * Get taxRateStandingBad
     *
     * @return string
     */
    public function getTaxRateStandingBad()
    {
        return $this->taxRateStandingBad;
    }

    /**
     * Set taxRateStandingHorrible
     *
     * @param string $taxRateStandingHorrible
     * @return CorpCustomsOffice
     */
    public function setTaxRateStandingHorrible($taxRateStandingHorrible)
    {
        $this->taxRateStandingHorrible = $taxRateStandingHorrible;
    
        return $this;
    }

    /**
     * Get taxRateStandingHorrible
     *
     * @return string
     */
    public function getTaxRateStandingHorrible()
    {
        return $this->taxRateStandingHorrible;
    }
}
