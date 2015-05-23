<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charPlanetaryPin", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="entry_owner", columns={"pinId", "ownerId", "planetId", "contentTypeId"})
 * })
 */
class CharPlanetaryPin
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
     * @ORM\Column(name="planetID", type="bigint", options={"unsigned"=true})
     */
    private $planetId;

    /**
     * @ORM\Column(name="pinID", type="bigint", options={"unsigned"=true})
     */
    private $pinId;

    /**
     * @ORM\Column(name="typeID", type="bigint", options={"unsigned"=true})
     */
    private $typeId;

    /**
     * @ORM\Column(name="typeName", type="string")
     */
    private $typeName;

    /**
     * @ORM\Column(name="schematicID", type="bigint", options={"unsigned"=true})
     */
    private $schematicId;

    /**
     * @var \DateTime
     * @ORM\Column(name="lastLaunchTime", type="datetime")
     */
    private $lastLaunchTime;

    /**
     * @ORM\Column(name="cycleTime", type="bigint", options={"unsigned"=true})
     */
    private $cycleTime;

    /**
     * @ORM\Column(name="quantityPerCycle", type="bigint", options={"unsigned"=true})
     */
    private $quantityPerCycle;

    /**
     * @var \DateTime
     * @ORM\Column(name="installTime", type="datetime")
     */
    private $installTime;

    /**
     * @var \DateTime
     * @ORM\Column(name="expiryTime", type="datetime")
     */
    private $expiryTime;

    /**
     * @ORM\Column(name="contentTypeID", type="bigint", options={"unsigned"=true})
     */
    private $contentTypeId;

    /**
     * @ORM\Column(name="contentTypeName", type="string")
     */
    private $contentTypeName;

    /**
     * @ORM\Column(name="contentQuantity", type="bigint", options={"unsigned"=true})
     */
    private $contentQuantity;
    
    /**
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;
    
    /**
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

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
     * @return CharPlanetaryPin
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
     * Set pinId
     *
     * @param integer $pinId
     * @return CharPlanetaryPin
     */
    public function setPinId($pinId)
    {
        $this->pinId = $pinId;
    
        return $this;
    }

    /**
     * Get pinId
     *
     * @return integer
     */
    public function getPinId()
    {
        return $this->pinId;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     * @return CharPlanetaryPin
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    
        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set typeName
     *
     * @param string $typeName
     * @return CharPlanetaryPin
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;
    
        return $this;
    }

    /**
     * Get typeName
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->typeName;
    }

    /**
     * Set schematicId
     *
     * @param integer $schematicId
     * @return CharPlanetaryPin
     */
    public function setSchematicId($schematicId)
    {
        $this->schematicId = $schematicId;
    
        return $this;
    }

    /**
     * Get schematicId
     *
     * @return integer
     */
    public function getSchematicId()
    {
        return $this->schematicId;
    }

    /**
     * Set lastLaunchTime
     *
     * @param \DateTime $lastLaunchTime
     * @return CharPlanetaryPin
     */
    public function setLastLaunchTime($lastLaunchTime)
    {
        $this->lastLaunchTime = $lastLaunchTime;
    
        return $this;
    }

    /**
     * Get lastLaunchTime
     *
     * @return \DateTime
     */
    public function getLastLaunchTime()
    {
        return $this->lastLaunchTime;
    }

    /**
     * Set cycleTime
     *
     * @param integer $cycleTime
     * @return CharPlanetaryPin
     */
    public function setCycleTime($cycleTime)
    {
        $this->cycleTime = $cycleTime;
    
        return $this;
    }

    /**
     * Get cycleTime
     *
     * @return integer
     */
    public function getCycleTime()
    {
        return $this->cycleTime;
    }

    /**
     * Set quantityPerCycle
     *
     * @param integer $quantityPerCycle
     * @return CharPlanetaryPin
     */
    public function setQuantityPerCycle($quantityPerCycle)
    {
        $this->quantityPerCycle = $quantityPerCycle;
    
        return $this;
    }

    /**
     * Get quantityPerCycle
     *
     * @return integer
     */
    public function getQuantityPerCycle()
    {
        return $this->quantityPerCycle;
    }

    /**
     * Set installTime
     *
     * @param \DateTime $installTime
     * @return CharPlanetaryPin
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
     * Set expiryTime
     *
     * @param \DateTime $expiryTime
     * @return CharPlanetaryPin
     */
    public function setExpiryTime($expiryTime)
    {
        $this->expiryTime = $expiryTime;
    
        return $this;
    }

    /**
     * Get expiryTime
     *
     * @return \DateTime
     */
    public function getExpiryTime()
    {
        return $this->expiryTime;
    }

    /**
     * Set contentTypeId
     *
     * @param integer $contentTypeId
     * @return CharPlanetaryPin
     */
    public function setContentTypeId($contentTypeId)
    {
        $this->contentTypeId = $contentTypeId;
    
        return $this;
    }

    /**
     * Get contentTypeId
     *
     * @return integer
     */
    public function getContentTypeId()
    {
        return $this->contentTypeId;
    }

    /**
     * Set contentTypeName
     *
     * @param string $contentTypeName
     * @return CharPlanetaryPin
     */
    public function setContentTypeName($contentTypeName)
    {
        $this->contentTypeName = $contentTypeName;
    
        return $this;
    }

    /**
     * Get contentTypeName
     *
     * @return string
     */
    public function getContentTypeName()
    {
        return $this->contentTypeName;
    }

    /**
     * Set contentQuantity
     *
     * @param integer $contentQuantity
     * @return CharPlanetaryPin
     */
    public function setContentQuantity($contentQuantity)
    {
        $this->contentQuantity = $contentQuantity;
    
        return $this;
    }

    /**
     * Get contentQuantity
     *
     * @return integer
     */
    public function getContentQuantity()
    {
        return $this->contentQuantity;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return CharPlanetaryPin
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return CharPlanetaryPin
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}
