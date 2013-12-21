<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charUpcomingEvent", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="event_owner", columns={"eventId", "ownerId"})
 * }, indexes={
 *     @ORM\Index(name="eventDate", columns={"eventDate"})
 * })
 */
class CharUpcomingEvent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="eventID", type="bigint", options={"unsigned"=true})
     */
    private $eventId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="eventOwnerID", type="bigint", options={"unsigned"=true})
     */
    private $eventOwnerId;

    /**
     * @var string
     *
     * @ORM\Column(name="eventOwnerName", type="string")
     */
    private $eventOwnerName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="eventDate", type="datetime")
     */
    private $eventDate;

    /**
     * @var string
     *
     * @ORM\Column(name="eventTitle", type="text")
     */
    private $eventTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var boolean
     *
     * @ORM\Column(name="importance", type="boolean")
     */
    private $importance;

    /**
     * @var string
     *
     * @ORM\Column(name="eventText", type="text")
     */
    private $eventText;

    /**
     * @var string
     *
     * @ORM\Column(name="response", type="string")
     */
    private $response;

    /**
     * @param integer $eventId
     * @param integer $ownerId
     */
    public function __construct($eventId, $ownerId)
    {
        $this->eventId = $eventId;
        $this->ownerId = $ownerId;
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
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->eventId;
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
     * Set eventOwnerId
     *
     * @param integer $eventOwnerId
     */
    public function setEventOwnerId($eventOwnerId)
    {
        $this->eventOwnerId = $eventOwnerId;
    }

    /**
     * Get eventOwnerId
     *
     * @return integer
     */
    public function getEventOwnerId()
    {
        return $this->eventOwnerId;
    }


    /**
     * Set eventOwnerName
     *
     * @param string $eventOwnerName
     */
    public function setEventOwnerName($eventOwnerName)
    {
        $this->eventOwnerName = $eventOwnerName;
    }

    /**
     * Get eventOwnerName
     *
     * @return string
     */
    public function getEventOwnerName()
    {
        return $this->eventOwnerName;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set eventTitle
     *
     * @param string $eventTitle
     */
    public function setEventTitle($eventTitle)
    {
        $this->eventTitle = $eventTitle;
    }

    /**
     * Get eventTitle
     *
     * @return string
     */
    public function getEventTitle()
    {
        return $this->eventTitle;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set importance
     *
     * @param boolean $importance
     */
    public function setImportance($importance)
    {
        $this->importance = $importance;
    }

    /**
     * Get importance
     *
     * @return boolean
     */
    public function isImportance()
    {
        return $this->importance;
    }

    /**
     * Set eventText
     *
     * @param string $eventText
     */
    public function setEventText($eventText)
    {
        $this->eventText = $eventText;
    }

    /**
     * Get eventText
     *
     * @return string
     */
    public function getEventText()
    {
        return $this->eventText;
    }

    /**
     * Set response
     *
     * @param string $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * Get response
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }
}
