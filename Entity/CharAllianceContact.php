<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charAllianceContact")
 */
class CharAllianceContact
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
     * @ORM\Column(name="contactID", type="bigint", options={"unsigned"=true})
     */
    private $contactId;

    /**
     * @ORM\Column(name="contactName", type="string")
     */
    private $contactName;

    /**
     * @ORM\Column(name="standing", type="smallint")
     */
    private $standing;

    public function __construct($ownerId, $contactId)
    {
        $this->ownerId = $ownerId;
        $this->contactId = $contactId;
    }

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
     * Get ownerId
     *
     * @return integer
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Get contactId
     *
     * @return integer
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     * @return CharAllianceContact
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set standing
     *
     * @param integer $standing
     * @return CharAllianceContact
     */
    public function setStanding($standing)
    {
        $this->standing = $standing;

        return $this;
    }

    /**
     * Get standing
     *
     * @return integer
     */
    public function getStanding()
    {
        return $this->standing;
    }
}
