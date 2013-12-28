<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpMemberTracking")
 */
class CorpMemberTracking
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
     * @ORM\Column(name="characterID", type="bigint", options={"unsigned"=true})
     */
    private $characterId;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="startDateTime", type="datetime")
     */
    private $startDateTime;

    /**
     * @ORM\Column(name="baseID", type="bigint", options={"unsigned"=true})
     */
    private $baseId;

    /**
     * @ORM\Column(name="base", type="string")
     */
    private $base;

    /**
     * @ORM\Column(name="title", type="text")
     */
    private $title;

    /**
     * @ORM\Column(name="logonDateTime", type="datetime")
     */
    private $logonDateTime;

    /**
     * @ORM\Column(name="logoffDateTime", type="datetime")
     */
    private $logoffDateTime;

    /**
     * @ORM\Column(name="locationID", type="bigint", options={"unsigned"=true})
     */
    private $locationId;

    /**
     * @ORM\Column(name="location", type="string")
     */
    private $location;

    /**
     * @ORM\Column(name="shipTypeID", type="bigint", options={"unsigned"=true})
     */
    private $shipTypeId;

    /**
     * @ORM\Column(name="shipType", type="string")
     */
    private $shipType;

    /**
     * @ORM\Column(name="roles", type="bigint", options={"unsigned"=true})
     */
    private $roles;

    /**
     * @ORM\Column(name="grantableRoles", type="bigint", options={"unsigned"=true})
     */
    private $grantableRoles;

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
     * @return CorpMemberTracking
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
     * Set characterId
     *
     * @param integer $characterId
     * @return CorpMemberTracking
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
     * @return CorpMemberTracking
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
     * Set startDateTime
     *
     * @param \DateTime $startDateTime
     * @return CorpMemberTracking
     */
    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    /**
     * Get startDateTime
     *
     * @return \DateTime
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * Set baseId
     *
     * @param integer $baseId
     * @return CorpMemberTracking
     */
    public function setBaseId($baseId)
    {
        $this->baseId = $baseId;

        return $this;
    }

    /**
     * Get baseId
     *
     * @return integer
     */
    public function getBaseId()
    {
        return $this->baseId;
    }

    /**
     * Set base
     *
     * @param string $base
     * @return CorpMemberTracking
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * Get base
     *
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return CorpMemberTracking
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set logonDateTime
     *
     * @param \DateTime $logonDateTime
     * @return CorpMemberTracking
     */
    public function setLogonDateTime($logonDateTime)
    {
        $this->logonDateTime = $logonDateTime;

        return $this;
    }

    /**
     * Get logonDateTime
     *
     * @return \DateTime
     */
    public function getLogonDateTime()
    {
        return $this->logonDateTime;
    }

    /**
     * Set logoffDateTime
     *
     * @param \DateTime $logoffDateTime
     * @return CorpMemberTracking
     */
    public function setLogoffDateTime($logoffDateTime)
    {
        $this->logoffDateTime = $logoffDateTime;

        return $this;
    }

    /**
     * Get logoffDateTime
     *
     * @return \DateTime
     */
    public function getLogoffDateTime()
    {
        return $this->logoffDateTime;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     * @return CorpMemberTracking
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
     * Set location
     *
     * @param string $location
     * @return CorpMemberTracking
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set shipTypeId
     *
     * @param integer $shipTypeId
     * @return CorpMemberTracking
     */
    public function setShipTypeId($shipTypeId)
    {
        $this->shipTypeId = $shipTypeId;

        return $this;
    }

    /**
     * Get shipTypeId
     *
     * @return integer
     */
    public function getShipTypeId()
    {
        return $this->shipTypeId;
    }

    /**
     * Set shipType
     *
     * @param string $shipType
     * @return CorpMemberTracking
     */
    public function setShipType($shipType)
    {
        $this->shipType = $shipType;

        return $this;
    }

    /**
     * Get shipType
     *
     * @return string
     */
    public function getShipType()
    {
        return $this->shipType;
    }

    /**
     * Set roles
     *
     * @param integer $roles
     * @return CorpMemberTracking
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return integer
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set grantableRoles
     *
     * @param integer $grantableRoles
     * @return CorpMemberTracking
     */
    public function setGrantableRoles($grantableRoles)
    {
        $this->grantableRoles = $grantableRoles;

        return $this;
    }

    /**
     * Get grantableRoles
     *
     * @return integer
     */
    public function getGrantableRoles()
    {
        return $this->grantableRoles;
    }
}
