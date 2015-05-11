<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpBlueprint", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="entry_owner", columns={"itemId", "ownerId"})
 * })
 */
class CorpBlueprint
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
     * @ORM\Column(name="locationID", type="bigint", options={"unsigned"=true})
     */
    private $locationId;

    /**
     * @ORM\Column(name="typeID", type="bigint", options={"unsigned"=true})
     */
    private $typeId;

    /**
     * @ORM\Column(name="typeName", type="string")
     */
    private $typeName;

    /**
     * @ORM\Column(name="quantity", type="bigint")
     */
    private $quantity;

    /**
     * @ORM\Column(name="flag", type="integer")
     */
    private $flag;

    /**
     * @ORM\Column(name="timeEfficiency", type="integer", options={"unsigned"=true})
     */
    private $timeEfficiency;

    /**
     * @ORM\Column(name="materialEfficiency", type="integer", options={"unsigned"=true})
     */
    private $materialEfficiency;

    /**
     * @ORM\Column(name="runs", type="integer")
     */
    private $runs;


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
     * @return CorpBlueprint
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
     * @return CorpBlueprint
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
     * Set locationId
     *
     * @param integer $locationId
     * @return CorpBlueprint
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    
        return $this;
    }

    /**
     * Get locationId
     *
     * @return integer
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     * @return CorpBlueprint
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
     * @return CorpBlueprint
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
     * Set quantity
     *
     * @param integer $quantity
     * @return CorpBlueprint
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set flag
     *
     * @param integer $flag
     * @return CorpBlueprint
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    
        return $this;
    }

    /**
     * Get flag
     *
     * @return integer
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set timeEfficiency
     *
     * @param integer $timeEfficiency
     * @return CorpBlueprint
     */
    public function setTimeEfficiency($timeEfficiency)
    {
        $this->timeEfficiency = $timeEfficiency;
    
        return $this;
    }

    /**
     * Get timeEfficiency
     *
     * @return integer
     */
    public function getTimeEfficiency()
    {
        return $this->timeEfficiency;
    }

    /**
     * Set materialEfficiency
     *
     * @param integer $materialEfficiency
     * @return CorpBlueprint
     */
    public function setMaterialEfficiency($materialEfficiency)
    {
        $this->materialEfficiency = $materialEfficiency;
    
        return $this;
    }

    /**
     * Get materialEfficiency
     *
     * @return integer
     */
    public function getMaterialEfficiency()
    {
        return $this->materialEfficiency;
    }

    /**
     * Set runs
     *
     * @param integer $runs
     * @return CorpBlueprint
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
}
