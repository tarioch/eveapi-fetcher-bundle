<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charUpcomingEvents", uniqueConstraints={
 *	@ORM\UniqueConstraint(name="event_owner", columns={"eventId", "ownerId"})
 * }, indexes={
 * 	@ORM\Index(name="eventDate", columns={"eventDate"})
 * })
 */
class CharUpcomingEvents
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
     * @var string
     *
     * @ORM\Column(name="ownerName", type="string")
     */
    private $ownerName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="eventDate", type="datetime")
     */
    private $eventDate;

    /**
     * @var string
     *
     * @ORM\Column(name="eventTitle", type="string")
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


}
