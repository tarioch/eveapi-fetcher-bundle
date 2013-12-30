<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charMailMessage")
 */
class CharMailMessage
{
    /**
     * @ORM\Id @ORM\Column(name="messageID", type="bigint", options={"unsigned"=true})
     */
    private $messageId;

    /**
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @ORM\Column(name="senderID", type="bigint", options={"unsigned"=true})
     */
    private $senderId;

    /**
     * @ORM\Column(name="sentDate", type="datetime")
     */
    private $sentDate;

    /**
     * @ORM\Column(name="title", type="text", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    private $body;

    /**
     * @ORM\Column(name="toCharacterIDs", type="text", nullable=true)
     */
    private $toCharacterIds;

    /**
     * @ORM\Column(name="toCorpOrAllianceId", type="text", nullable=true)
     */
    private $toCorpOrAllianceId;

    /**
     * @ORM\Column(name="toListId", type="text", nullable=true)
     */
    private $toListId;

    public function __construct($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * Get messageId
     *
     * @return integer
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * Set ownerId
     *
     * @param integer $ownerId
     * @return CharMailMessage
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
     * Set senderId
     *
     * @param integer $senderId
     * @return CharMailMessage
     */
    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;

        return $this;
    }

    /**
     * Get senderId
     *
     * @return integer
     */
    public function getSenderId()
    {
        return $this->senderId;
    }

    /**
     * Set sentDate
     *
     * @param \DateTime $sentDate
     * @return CharMailMessage
     */
    public function setSentDate($sentDate)
    {
        $this->sentDate = $sentDate;

        return $this;
    }

    /**
     * Get sentDate
     *
     * @return \DateTime
     */
    public function getSentDate()
    {
        return $this->sentDate;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return CharMailMessage
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
     * Set body
     *
     * @param string $body
     * @return CharMailMessage
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set toCharacterIds
     *
     * @param string $toCharacterIds
     * @return CharMailMessage
     */
    public function setToCharacterIds($toCharacterIds)
    {
        $this->toCharacterIds = $toCharacterIds;

        return $this;
    }

    /**
     * Get toCharacterIds
     *
     * @return string
     */
    public function getToCharacterIds()
    {
        return $this->toCharacterIds;
    }

    /**
     * Set toCorpOrAllianceId
     *
     * @param string $toCorpOrAllianceId
     * @return CharMailMessage
     */
    public function setToCorpOrAllianceId($toCorpOrAllianceId)
    {
        $this->toCorpOrAllianceId = $toCorpOrAllianceId;

        return $this;
    }

    /**
     * Get toCorpOrAllianceId
     *
     * @return string
     */
    public function getToCorpOrAllianceId()
    {
        return $this->toCorpOrAllianceId;
    }

    /**
     * Set toListId
     *
     * @param string $toListId
     * @return CharMailMessage
     */
    public function setToListId($toListId)
    {
        $this->toListId = $toListId;

        return $this;
    }

    /**
     * Get toListId
     *
     * @return string
     */
    public function getToListId()
    {
        return $this->toListId;
    }
}
