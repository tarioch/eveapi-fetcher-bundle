<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpAsset")
 */
class CorpAsset
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
     * @ORM\Column(name="quantity", type="bigint")
     */
    private $quantity;

    /**
     * @ORM\Column(name="rawQuantity", type="bigint", nullable=true)
     */
    private $rawQuantity;

    /**
     * @ORM\Column(name="flag", type="integer")
     */
    private $flag;

    /**
     * @ORM\Column(name="singleton", type="boolean")
     */
    private $singleton;

    /**
     * @ORM\Column(name="lft", type="bigint", options={"unsigned"=true})
     */
    private $left;

    /**
     * @ORM\Column(name="rgt", type="bigint", options={"unsigned"=true})
     */
    private $right;

    /**
     * @ORM\Column(name="lvl", type="bigint", options={"unsigned"=true})
     */
    private $level;


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
     * @return CorpAsset
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
     * @return CorpAsset
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
     * @return CorpAsset
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
     * @return CorpAsset
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
     * Set quantity
     *
     * @param integer $quantity
     * @return CorpAsset
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
     * Set rawQuantity
     *
     * @param integer $rawQuantity
     * @return CorpAsset
     */
    public function setRawQuantity($rawQuantity)
    {
        $this->rawQuantity = $rawQuantity;

        return $this;
    }

    /**
     * Get rawQuantity
     *
     * @return integer
     */
    public function getRawQuantity()
    {
        return $this->rawQuantity;
    }

    /**
     * Set flag
     *
     * @param integer $flag
     * @return CorpAsset
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
     * Set singleton
     *
     * @param boolean $singleton
     * @return CorpAsset
     */
    public function setSingleton($singleton)
    {
        $this->singleton = $singleton;

        return $this;
    }

    /**
     * Get singleton
     *
     * @return boolean
     */
    public function isSingleton()
    {
        return $this->singleton;
    }

    /**
     * Set left
     *
     * @param integer $left
     * @return CorpAsset
     */
    public function setLeft($left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * Get left
     *
     * @return integer
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Set right
     *
     * @param integer $right
     * @return CorpAsset
     */
    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Get right
     *
     * @return integer
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return CorpAsset
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }
}
