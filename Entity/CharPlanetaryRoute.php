<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charPlanetaryRoute", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="entry_owner", columns={"routeId", "ownerId"})
 * })
 */
class CharPlanetaryRoute
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
     * @ORM\Column(name="routeID", type="bigint", options={"unsigned"=true})
     */
    private $routeId;

    /**
     * @ORM\Column(name="sourcePinID", type="bigint", options={"unsigned"=true})
     */
    private $sourcePinId;

    /**
     * @ORM\Column(name="destinationPinID", type="bigint", options={"unsigned"=true})
     */
    private $destinationPinId;

    /**
     * @ORM\Column(name="contentTypeID", type="bigint", options={"unsigned"=true})
     */
    private $contentTypeId;

    /**
     * @ORM\Column(name="contentTypeName", type="string")
     */
    private $contentTypeName;

    /**
     * @ORM\Column(name="quantity", type="bigint", options={"unsigned"=true})
     */
    private $quantity;
    
    /**
     * @ORM\Column(name="waypoint1", type="bigint", options={"unsigned"=true})
     */
    private $waypoint1;

    /**
     * @ORM\Column(name="waypoint2", type="bigint", options={"unsigned"=true})
     */
    private $waypoint2;

    /**
     * @ORM\Column(name="waypoint3", type="bigint", options={"unsigned"=true})
     */
    private $waypoint3;

    /**
     * @ORM\Column(name="waypoint4", type="bigint", options={"unsigned"=true})
     */
    private $waypoint4;

    /**
     * @ORM\Column(name="waypoint5", type="bigint", options={"unsigned"=true})
     */
    private $waypoint5;


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
     * @return CharPlanetaryRoute
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
     * Set routeId
     *
     * @param integer $routeId
     * @return CharPlanetaryRoute
     */
    public function setRouteId($routeId)
    {
        $this->routeId = $routeId;
    
        return $this;
    }

    /**
     * Get routeId
     *
     * @return integer
     */
    public function getRouteId()
    {
        return $this->routeId;
    }

    /**
     * Set sourcePinId
     *
     * @param integer $sourcePinId
     * @return CharPlanetaryRoute
     */
    public function setSourcePinId($sourcePinId)
    {
        $this->sourcePinId = $sourcePinId;
    
        return $this;
    }

    /**
     * Get sourcePinId
     *
     * @return integer
     */
    public function getSourcePinId()
    {
        return $this->sourcePinId;
    }

    /**
     * Set destinationPinId
     *
     * @param integer $destinationPinId
     * @return CharPlanetaryRoute
     */
    public function setDestinationPinId($destinationPinId)
    {
        $this->destinationPinId = $destinationPinId;
    
        return $this;
    }

    /**
     * Get destinationPinId
     *
     * @return integer
     */
    public function getDestinationPinId()
    {
        return $this->destinationPinId;
    }

    /**
     * Set contentTypeId
     *
     * @param integer $contentTypeId
     * @return CharPlanetaryRoute
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
     * @return CharPlanetaryRoute
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
     * Set quantity
     *
     * @param integer $quantity
     * @return CharPlanetaryRoute
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
     * Set waypoint1
     *
     * @param integer $waypoint1
     * @return CharPlanetaryRoute
     */
    public function setWaypoint1($waypoint1)
    {
        $this->waypoint1 = $waypoint1;
    
        return $this;
    }

    /**
     * Get waypoint1
     *
     * @return integer
     */
    public function getWaypoint1()
    {
        return $this->waypoint1;
    }

    /**
     * Set waypoint2
     *
     * @param integer $waypoint2
     * @return CharPlanetaryRoute
     */
    public function setWaypoint2($waypoint2)
    {
        $this->waypoint2 = $waypoint2;
    
        return $this;
    }

    /**
     * Get waypoint2
     *
     * @return integer
     */
    public function getWaypoint2()
    {
        return $this->waypoint2;
    }

    /**
     * Set waypoint3
     *
     * @param integer $waypoint3
     * @return CharPlanetaryRoute
     */
    public function setWaypoint3($waypoint3)
    {
        $this->waypoint3 = $waypoint3;
    
        return $this;
    }

    /**
     * Get waypoint3
     *
     * @return integer
     */
    public function getWaypoint3()
    {
        return $this->waypoint3;
    }

    /**
     * Set waypoint4
     *
     * @param integer $waypoint4
     * @return CharPlanetaryRoute
     */
    public function setWaypoint4($waypoint4)
    {
        $this->waypoint4 = $waypoint4;
    
        return $this;
    }

    /**
     * Get waypoint4
     *
     * @return integer
     */
    public function getWaypoint4()
    {
        return $this->waypoint4;
    }

    /**
     * Set waypoint5
     *
     * @param integer $waypoint5
     * @return CharPlanetaryRoute
     */
    public function setWaypoint5($waypoint5)
    {
        $this->waypoint5 = $waypoint5;
    
        return $this;
    }

    /**
     * Get waypoint5
     *
     * @return integer
     */
    public function getWaypoint5()
    {
        return $this->waypoint5;
    }
}
