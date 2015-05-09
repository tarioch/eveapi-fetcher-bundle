<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpFacility", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="facility_owner", columns={"facilityId", "ownerId"})
 * })
 */
class CorpFacility
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
     * @ORM\Column(name="facilityID", type="bigint", options={"unsigned"=true})
     */
    private $facilityId;

    /**
     * @ORM\Column(name="typeID", type="bigint", options={"unsigned"=true})
     */
    private $typeId;

    /**
     * @ORM\Column(name="typeName", type="string")
     */
    private $typeName;

    /**
     * @ORM\Column(name="solarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemId;

    /**
     * @ORM\Column(name="solarSystemName", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemName;

    /**
     * @ORM\Column(name="regionID", type="bigint", options={"unsigned"=true})
     */
    private $regionId;

    /**
     * @ORM\Column(name="regionName", type="bigint", options={"unsigned"=true})
     */
    private $regionName;

    /**
     * @ORM\Column(name="starbaseModifier", type="integer")
     */
    private $starbaseModifier;

    /**
     * @ORM\Column(name="tax", type="integer")
     */
    private $tax;


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
     * @return CorpFacility
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
     * Set facilityId
     *
     * @param integer $facilityId
     * @return CorpFacility
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
     * Set typeId
     *
     * @param integer $typeId
     * @return CorpFacility
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
     * @return CorpFacility
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
     * Set solarSystemId
     *
     * @param integer $solarSystemId
     * @return CorpFacility
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
     * @param integer $solarSystemName
     * @return CorpFacility
     */
    public function setSolarSystemName($solarSystemName)
    {
        $this->solarSystemName = $solarSystemName;
    
        return $this;
    }

    /**
     * Get solarSystemName
     *
     * @return integer 
     */
    public function getSolarSystemName()
    {
        return $this->solarSystemName;
    }

    /**
     * Set regionId
     *
     * @param integer $regionId
     * @return CorpFacility
     */
    public function setRegionId($regionId)
    {
        $this->regionId = $regionId;
    
        return $this;
    }

    /**
     * Get regionId
     *
     * @return integer 
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Set regionName
     *
     * @param integer $regionName
     * @return CorpFacility
     */
    public function setRegionName($regionName)
    {
        $this->regionName = $regionName;
    
        return $this;
    }

    /**
     * Get regionName
     *
     * @return integer 
     */
    public function getRegionName()
    {
        return $this->regionName;
    }

    /**
     * Set starbaseModifier
     *
     * @param integer $starbaseModifier
     * @return CorpFacility
     */
    public function setStarbaseModifier($starbaseModifier)
    {
        $this->starbaseModifier = $starbaseModifier;
    
        return $this;
    }

    /**
     * Get starbaseModifier
     *
     * @return integer 
     */
    public function getStarbaseModifier()
    {
        return $this->starbaseModifier;
    }

    /**
     * Set tax
     *
     * @param integer $tax
     * @return CorpFacility
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    
        return $this;
    }

    /**
     * Get tax
     *
     * @return integer 
     */
    public function getTax()
    {
        return $this->tax;
    }
}