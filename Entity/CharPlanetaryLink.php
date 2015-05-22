<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charPlanetaryLink", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="entry_owner", columns={"sourcePinID", "destinationPinID", "ownerId"})
 * })
 */
class CharPlanetaryLink
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
     * @ORM\Column(name="sourcePinID", type="bigint", options={"unsigned"=true})
     */
    private $sourcePinId;

    /**
     * @ORM\Column(name="destinationPinID", type="bigint", options={"unsigned"=true})
     */
    private $destinationPinId;


    /**
     * @ORM\Column(name="linkLevel", type="integer", options={"unsigned"=true})
     */
    private $linkLevel;


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
     * @return CharPlanetaryLink
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
     * Set sourcePinId
     *
     * @param integer $sourcePinId
     * @return CharPlanetaryLink
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
     * @return CharPlanetaryLink
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
     * Set linkLevel
     *
     * @param integer $linkLevel
     * @return CharPlanetaryLink
     */
    public function setLinkLevel($linkLevel)
    {
        $this->linkLevel = $linkLevel;
    
        return $this;
    }

    /**
     * Get linkLevel
     *
     * @return integer
     */
    public function getLinkLevel()
    {
        return $this->linkLevel;
    }
}
