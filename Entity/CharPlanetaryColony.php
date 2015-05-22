<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charPlanetaryColony", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="entry_owner", columns={"planetId", "ownerId"})
 * })
 */
class CharPlanetaryColony
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
     * @ORM\Column(name="ownerName", type="string")
     */
    private $ownerName;

    /**
     * @ORM\Column(name="planetID", type="bigint", options={"unsigned"=true})
     */
    private $planetId;

    /**
     * @ORM\Column(name="planetName", type="string")
     */
    private $planetName;

    /**
     * @ORM\Column(name="planetTypeID", type="bigint", options={"unsigned"=true})
     */
    private $planetTypeId;

    /**
     * @ORM\Column(name="planetTypeName", type="string")
     */
    private $planetTypeName;

    /**
     * @ORM\Column(name="solarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemId;

    /**
     * @ORM\Column(name="solarSystemName", type="string")
     */
    private $solarSystemName;

    /**
     * @ORM\Column(name="upgradeLevel", type="integer", options={"unsigned"=true})
     */
    private $upgradeLevel;

    /**
     * @ORM\Column(name="numberOfPins", type="integer", options={"unsigned"=true})
     */
    private $numberOfPins;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="lastUpdate", type="datetime")
     */
    private $lastUpdate;


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
     * @return CharPlanetaryColony
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
     * Set ownerName
     *
     * @param string $ownerName
     * @return CharPlanetaryColony
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $ownerName;
    
        return $this;
    }

    /**
     * Get ownerName
     *
     * @return string
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * Set planetId
     *
     * @param integer $planetId
     * @return CharPlanetaryColony
     */
    public function setPlanetId($planetId)
    {
        $this->planetId = $planetId;
    
        return $this;
    }

    /**
     * Get planetId
     *
     * @return integer
     */
    public function getPlanetId()
    {
        return $this->planetId;
    }

    /**
     * Set planetName
     *
     * @param string $planetName
     * @return CharPlanetaryColony
     */
    public function setPlanetName($planetName)
    {
        $this->planetName = $planetName;
    
        return $this;
    }

    /**
     * Get planetName
     *
     * @return string
     */
    public function getPlanetName()
    {
        return $this->planetName;
    }

    /**
     * Set planetTypeId
     *
     * @param integer $planetTypeId
     * @return CharPlanetaryColony
     */
    public function setPlanetTypeId($planetTypeId)
    {
        $this->planetTypeId = $planetTypeId;
    
        return $this;
    }

    /**
     * Get planetTypeId
     *
     * @return integer
     */
    public function getPlanetTypeId()
    {
        return $this->planetTypeId;
    }

    /**
     * Set planetTypeName
     *
     * @param string $planetTypeName
     * @return CharPlanetaryColony
     */
    public function setPlanetTypeName($planetTypeName)
    {
        $this->planetTypeName = $planetTypeName;
    
        return $this;
    }

    /**
     * Get planetTypeName
     *
     * @return string
     */
    public function getPlanetTypeName()
    {
        return $this->planetTypeName;
    }

    /**
     * Set solarSystemId
     *
     * @param integer $solarSystemId
     * @return CharPlanetaryColony
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
     * @return CharPlanetaryColony
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
     * Set upgradeLevel
     *
     * @param integer $upgradeLevel
     * @return CharPlanetaryColony
     */
    public function setUpgradeLevel($upgradeLevel)
    {
        $this->upgradeLevel = $upgradeLevel;
    
        return $this;
    }

    /**
     * Get upgradeLevel
     *
     * @return integer
     */
    public function getUpgradeLevel()
    {
        return $this->upgradeLevel;
    }

    /**
     * Set numberOfPins
     *
     * @param integer $numberOfPins
     * @return CharPlanetaryColony
     */
    public function setNumberOfPins($numberOfPins)
    {
        $this->numberOfPins = $numberOfPins;
    
        return $this;
    }

    /**
     * Get numberOfPins
     *
     * @return integer
     */
    public function getNumberOfPins()
    {
        return $this->numberOfPins;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     * @return CharPlanetaryColony
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    
        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }
}
