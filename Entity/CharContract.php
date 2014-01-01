<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charContract", indexes={
 *     @ORM\Index(name="dateIssues", columns={"dateIssued"}),
 *     @ORM\Index(name="dateExpired", columns={"dateExpired"}),
 *     @ORM\Index(name="dateAccepted", columns={"dateAccepted"}),
 *     @ORM\Index(name="dateCompleted", columns={"dateCompleted"}),
 *     @ORM\Index(name="owner", columns={"ownerID"})
 * })
 */
class CharContract
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="contractID", type="bigint", options={"unsigned"=true})
     */
    private $contractId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="issuerID", type="bigint", options={"unsigned"=true})
     */
    private $issuerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="issuerCorpID", type="bigint", options={"unsigned"=true})
     */
    private $issuerCorpId;

    /**
     * @var integer
     *
     * @ORM\Column(name="assigneeID", type="bigint", options={"unsigned"=true})
     */
    private $assigneeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="acceptorID", type="bigint", options={"unsigned"=true})
     */
    private $acceptorId;

    /**
     * @var integer
     *
     * @ORM\Column(name="startStationID", type="bigint", options={"unsigned"=true})
     */
    private $startStationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="endStationID", type="bigint", options={"unsigned"=true})
     */
    private $endStationId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="forCorp", type="boolean")
     */
    private $forCorp;

    /**
     * @var string
     *
     * @ORM\Column(name="availability", type="string", length=255)
     */
    private $availability;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateIssued", type="datetime")
     */
    private $dateIssued;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExpired", type="datetime")
     */
    private $dateExpired;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAccepted", type="datetime", nullable=true)
     */
    private $dateAccepted;

    /**
     * @var integer
     *
     * @ORM\Column(name="numDays", type="smallint")
     */
    private $numDays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCompleted", type="datetime", nullable=true)
     */
    private $dateCompleted;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal", precision=17, scale=2)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="reward", type="decimal", precision=17, scale=2)
     */
    private $reward;

    /**
     * @var float
     *
     * @ORM\Column(name="collateral", type="decimal", precision=17, scale=2)
     */
    private $collateral;

    /**
     * @var float
     *
     * @ORM\Column(name="buyout", type="decimal", precision=17, scale=2)
     */
    private $buyout;

    /**
     * @var integer
     *
     * @ORM\Column(name="volume", type="bigint", options={"unsigned"=true})
     */
    private $volume;

    public function __construct($contractId, $ownerId)
    {
        $this->contractId = $contractId;
        $this->ownerId = $ownerId;
    }

    /**
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get contractId
     *
     * @return integer
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * Set ownerId
     *
     * @param integer $ownerId
     * @return CharContract
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
     * Set issuerId
     *
     * @param integer $issuerId
     * @return CharContract
     */
    public function setIssuerId($issuerId)
    {
        $this->issuerId = $issuerId;

        return $this;
    }

    /**
     * Get issuerId
     *
     * @return integer
     */
    public function getIssuerId()
    {
        return $this->issuerId;
    }

    /**
     * Set issuerCorpId
     *
     * @param integer $issuerCorpId
     * @return CharContract
     */
    public function setIssuerCorpId($issuerCorpId)
    {
        $this->issuerCorpId = $issuerCorpId;

        return $this;
    }

    /**
     * Get issuerCorpId
     *
     * @return integer
     */
    public function getIssuerCorpId()
    {
        return $this->issuerCorpId;
    }

    /**
     * Set assigneeId
     *
     * @param integer $assigneeId
     * @return CharContract
     */
    public function setAssigneeId($assigneeId)
    {
        $this->assigneeId = $assigneeId;

        return $this;
    }

    /**
     * Get assigneeId
     *
     * @return integer
     */
    public function getAssigneeId()
    {
        return $this->assigneeId;
    }

    /**
     * Set acceptorId
     *
     * @param integer $acceptorId
     * @return CharContract
     */
    public function setAcceptorId($acceptorId)
    {
        $this->acceptorId = $acceptorId;

        return $this;
    }

    /**
     * Get acceptorId
     *
     * @return integer
     */
    public function getAcceptorId()
    {
        return $this->acceptorId;
    }

    /**
     * Set startStationId
     *
     * @param integer $startStationId
     * @return CharContract
     */
    public function setStartStationId($startStationId)
    {
        $this->startStationId = $startStationId;

        return $this;
    }

    /**
     * Get startStationId
     *
     * @return integer
     */
    public function getStartStationId()
    {
        return $this->startStationId;
    }

    /**
     * Set endStationId
     *
     * @param integer $endStationId
     * @return CharContract
     */
    public function setEndStationId($endStationId)
    {
        $this->endStationId = $endStationId;

        return $this;
    }

    /**
     * Get endStationId
     *
     * @return integer
     */
    public function getEndStationId()
    {
        return $this->endStationId;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return CharContract
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return CharContract
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return CharContract
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
     * Set forCorp
     *
     * @param boolean $forCorp
     * @return CharContract
     */
    public function setForCorp($forCorp)
    {
        $this->forCorp = $forCorp;

        return $this;
    }

    /**
     * Get forCorp
     *
     * @return boolean
     */
    public function isForCorp()
    {
        return $this->forCorp;
    }

    /**
     * Set availability
     *
     * @param string $availability
     * @return CharContract
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return string
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set dateIssued
     *
     * @param \DateTime $dateIssued
     * @return CharContract
     */
    public function setDateIssued($dateIssued)
    {
        $this->dateIssued = $dateIssued;

        return $this;
    }

    /**
     * Get dateIssued
     *
     * @return \DateTime
     */
    public function getDateIssued()
    {
        return $this->dateIssued;
    }

    /**
     * Set dateExpired
     *
     * @param \DateTime $dateExpired
     * @return CharContract
     */
    public function setDateExpired($dateExpired)
    {
        $this->dateExpired = $dateExpired;

        return $this;
    }

    /**
     * Get dateExpired
     *
     * @return \DateTime
     */
    public function getDateExpired()
    {
        return $this->dateExpired;
    }

    /**
     * Set dateAccepted
     *
     * @param \DateTime $dateAccepted
     * @return CharContract
     */
    public function setDateAccepted($dateAccepted)
    {
        $this->dateAccepted = $dateAccepted;

        return $this;
    }

    /**
     * Get dateAccepted
     *
     * @return \DateTime
     */
    public function getDateAccepted()
    {
        return $this->dateAccepted;
    }

    /**
     * Set numDays
     *
     * @param integer $numDays
     * @return CharContract
     */
    public function setNumDays($numDays)
    {
        $this->numDays = $numDays;

        return $this;
    }

    /**
     * Get numDays
     *
     * @return integer
     */
    public function getNumDays()
    {
        return $this->numDays;
    }

    /**
     * Set dateCompleted
     *
     * @param \DateTime $dateCompleted
     * @return CharContract
     */
    public function setDateCompleted($dateCompleted)
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }

    /**
     * Get dateCompleted
     *
     * @return \DateTime
     */
    public function getDateCompleted()
    {
        return $this->dateCompleted;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return CharContract
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set reward
     *
     * @param float $reward
     * @return CharContract
     */
    public function setReward($reward)
    {
        $this->reward = $reward;

        return $this;
    }

    /**
     * Get reward
     *
     * @return float
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * Set collateral
     *
     * @param float $collateral
     * @return CharContract
     */
    public function setCollateral($collateral)
    {
        $this->collateral = $collateral;

        return $this;
    }

    /**
     * Get collateral
     *
     * @return float
     */
    public function getCollateral()
    {
        return $this->collateral;
    }

    /**
     * Set buyout
     *
     * @param float $buyout
     * @return CharContract
     */
    public function setBuyout($buyout)
    {
        $this->buyout = $buyout;

        return $this;
    }

    /**
     * Get buyout
     *
     * @return float
     */
    public function getBuyout()
    {
        return $this->buyout;
    }

    /**
     * Set volume
     *
     * @param integer $volume
     * @return CharContract
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer
     */
    public function getVolume()
    {
        return $this->volume;
    }
}
