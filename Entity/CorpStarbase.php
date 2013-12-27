<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpStarbase")
 */
class CorpStarbase
{
    /**
     * @ORM\Id @ORM\Column(name="itemID", type="bigint", options={"unsigned"=true})
     */
    private $itemId;

    /**
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @ORM\Column(name="typeID", type="bigint", options={"unsigned"=true})
     */
    private $typeId;

    /**
     * @ORM\Column(name="locationID", type="bigint", options={"unsigned"=true})
     */
    private $locationId;

    /**
     * @ORM\Column(name="moonID", type="bigint", options={"unsigned"=true})
     */
    private $moonId;

    /**
     * @ORM\Column(name="state", type="integer", options={"unsigned"=true})
     */
    private $state;

    /**
     * @ORM\Column(name="stateTimestamp", type="datetime")
     */
    private $stateTimestamp;

    /**
     * @ORM\Column(name="onlineTimestamp", type="datetime")
     */
    private $onlineTimestamp;

    /**
     * @ORM\Column(name="standingOwnerID", type="bigint", options={"unsigned"=true})
     */
    private $standingOwnerId;

    public function __construct($itemId)
    {
        $this->itemId = $itemId;
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
     * Set ownerId
     *
     * @param integer $ownerId
     * @return CorpStarbase
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
     * Set typeId
     *
     * @param integer $typeId
     * @return CorpStarbase
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
     * Set locationId
     *
     * @param integer $locationId
     * @return CorpStarbase
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
     * Set moonId
     *
     * @param integer $moonId
     * @return CorpStarbase
     */
    public function setMoonId($moonId)
    {
        $this->moonId = $moonId;

        return $this;
    }

    /**
     * Get moonId
     *
     * @return integer
     */
    public function getMoonId()
    {
        return $this->moonId;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return CorpStarbase
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set stateTimestamp
     *
     * @param \DateTime $stateTimestamp
     * @return CorpStarbase
     */
    public function setStateTimestamp($stateTimestamp)
    {
        $this->stateTimestamp = $stateTimestamp;

        return $this;
    }

    /**
     * Get stateTimestamp
     *
     * @return \DateTime
     */
    public function getStateTimestamp()
    {
        return $this->stateTimestamp;
    }

    /**
     * Set onlineTimestamp
     *
     * @param \DateTime $onlineTimestamp
     * @return CorpStarbase
     */
    public function setOnlineTimestamp($onlineTimestamp)
    {
        $this->onlineTimestamp = $onlineTimestamp;

        return $this;
    }

    /**
     * Get onlineTimestamp
     *
     * @return \DateTime
     */
    public function getOnlineTimestamp()
    {
        return $this->onlineTimestamp;
    }

    /**
     * Set standingOwnerId
     *
     * @param integer $standingOwnerId
     * @return CorpStarbase
     */
    public function setStandingOwnerId($standingOwnerId)
    {
        $this->standingOwnerId = $standingOwnerId;

        return $this;
    }

    /**
     * Get standingOwnerId
     *
     * @return integer
     */
    public function getStandingOwnerId()
    {
        return $this->standingOwnerId;
    }
}
