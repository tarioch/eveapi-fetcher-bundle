<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpWalletTransaction", indexes={
 *     @ORM\Index(name="transactionDate", columns={"transactionDateTime"}),
 *     @ORM\Index(name="owner", columns={"ownerID", "accountKey"}),
 *     @ORM\Index(name="journalTransactionID", columns={"journalTransactionID"}),
 *     @ORM\Index(name="transactionType", columns={"transactionType"}),
 *     @ORM\Index(name="typeID", columns={"typeID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="transaction_owner", columns={"transactionId", "ownerId", "accountKey"})
 * })
 */
class CorpWalletTransaction
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
     * @ORM\Column(name="transactionID", type="bigint", options={"unsigned"=true})
     */
    private $transactionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="accountKey", type="smallint", options={"unsigned"=true})
     */
    private $accountKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="characterID", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $characterId;

    /**
     * @var string
     *
     * @ORM\Column(name="characterName", type="string", length=255, nullable=true)
     */
    private $characterName;

    /**
     * @var integer
     *
     * @ORM\Column(name="clientID", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="clientName", type="string", length=255, nullable=true)
     */
    private $clientName;

    /**
     * @var integer
     *
     * @ORM\Column(name="journalTransactionID", type="bigint", options={"unsigned"=true})
     */
    private $journalTransactionId;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal", precision=17, scale=2)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="bigint", options={"unsigned"=true})
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="stationID", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $stationId;

    /**
     * @var string
     *
     * @ORM\Column(name="stationName", type="string", length=255, nullable=true)
     */
    private $stationName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="transactionDateTime", type="datetime")
     */
    private $transactionDateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="transactionFor", type="string", length=255)
     */
    private $transactionFor;

    /**
     * @var string
     *
     * @ORM\Column(name="transactionType", type="string", length=255)
     */
    private $transactionType;

    /**
     * @var integer
     *
     * @ORM\Column(name="typeID", type="bigint", options={"unsigned"=true})
     */
    private $typeId;

    /**
     * @var string
     *
     * @ORM\Column(name="typeName", type="string", length=255)
     */
    private $typeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="clientTypeID", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $clientTypeId;

    /**
     * @param integer $transactionId
     */
    public function __construct($transactionId, $ownerId, $accountKey)
    {
        $this->transactionId = $transactionId;
        $this->ownerId = $ownerId;
        $this->accountKey = $accountKey;
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
     * Get transactionId
     *
     * @return integer
     */
    public function getTransactionId()
    {
        return $this->transactionId;
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
     * Get accountKey
     *
     * @return integer
     */
    public function getAccountKey()
    {
        return $this->accountKey;
    }

    /**
     * Set characterId
     *
     * @param integer $characterId
     * @return CorpWalletTransaction
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
     * Set characterName
     *
     * @param string $characterName
     * @return CorpWalletTransaction
     */
    public function setCharacterName($characterName)
    {
        $this->characterName = $characterName;

        return $this;
    }

    /**
     * Get characterName
     *
     * @return string
     */
    public function getCharacterName()
    {
        return $this->characterName;
    }

    /**
     * Set clientId
     *
     * @param integer $clientId
     * @return CorpWalletTransaction
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return integer
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     * @return CorpWalletTransaction
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set journalTransactionId
     *
     * @param integer $journalTransactionId
     * @return CorpWalletTransaction
     */
    public function setJournalTransactionId($journalTransactionId)
    {
        $this->journalTransactionId = $journalTransactionId;

        return $this;
    }

    /**
     * Get journalTransactionId
     *
     * @return integer
     */
    public function getJournalTransactionId()
    {
        return $this->journalTransactionId;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return CorpWalletTransaction
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
     * Set quantity
     *
     * @param integer $quantity
     * @return CorpWalletTransaction
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
     * Set stationId
     *
     * @param integer $stationId
     * @return CorpWalletTransaction
     */
    public function setStationId($stationId)
    {
        $this->stationId = $stationId;

        return $this;
    }

    /**
     * Get stationId
     *
     * @return integer
     */
    public function getStationId()
    {
        return $this->stationId;
    }

    /**
     * Set stationName
     *
     * @param string $stationName
     * @return CorpWalletTransaction
     */
    public function setStationName($stationName)
    {
        $this->stationName = $stationName;

        return $this;
    }

    /**
     * Get stationName
     *
     * @return string
     */
    public function getStationName()
    {
        return $this->stationName;
    }

    /**
     * Set transactionDateTime
     *
     * @param \DateTime $transactionDateTime
     * @return CorpWalletTransaction
     */
    public function setTransactionDateTime($transactionDateTime)
    {
        $this->transactionDateTime = $transactionDateTime;

        return $this;
    }

    /**
     * Get transactionDateTime
     *
     * @return \DateTime
     */
    public function getTransactionDateTime()
    {
        return $this->transactionDateTime;
    }

    /**
     * Set transactionFor
     *
     * @param string $transactionFor
     * @return CorpWalletTransaction
     */
    public function setTransactionFor($transactionFor)
    {
        $this->transactionFor = $transactionFor;

        return $this;
    }

    /**
     * Get transactionFor
     *
     * @return string
     */
    public function getTransactionFor()
    {
        return $this->transactionFor;
    }

    /**
     * Set transactionType
     *
     * @param string $transactionType
     * @return CorpWalletTransaction
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    /**
     * Get transactionType
     *
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     * @return CorpWalletTransaction
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
     * Set typeName
     *
     * @param string $typeName
     * @return CorpWalletTransaction
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * Get typeName
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->typeName;
    }

    /**
     * Set clientTypeId
     *
     * @param integer $clientTypeId
     * @return CorpWalletTransaction
     */
    public function setClientTypeId($clientTypeId)
    {
        $this->clientTypeId = $clientTypeId;

        return $this;
    }

    /**
     * Get clientTypeId
     *
     * @return integer
     */
    public function getClientTypeId()
    {
        return $this->clientTypeId;
    }
}
