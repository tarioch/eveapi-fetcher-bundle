<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charWalletJournal", indexes={
 *     @ORM\Index(name="entryDate", columns={"date"}),
 *     @ORM\Index(name="owner", columns={"ownerID", "accountKey"}),
 *     @ORM\Index(name="owner1", columns={"ownerID1"}),
 *     @ORM\Index(name="owner2", columns={"ownerID2"}),
 *     @ORM\Index(name="refType", columns={"refTypeID"})
 * })
 */
class CharWalletJournal
{
    /**
     * @var integer
     *
     * @ORM\Id @ORM\Column(name="refID", type="bigint", options={"unsigned"=true})
     */
    private $refid;

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
     * @var float
     *
     * @ORM\Column(name="amount", type="decimal", precision=17, scale=2)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="argID1", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $argId1;

    /**
     * @var string
     *
     * @ORM\Column(name="argName1", type="string", length=255, nullable=true)
     */
    private $argName1;

    /**
     * @var float
     *
     * @ORM\Column(name="balance", type="decimal", precision=17, scale=2)
     */
    private $balance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="ownerID1", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $ownerId1;

    /**
     * @var integer
     *
     * @ORM\Column(name="ownerID2", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $ownerId2;

    /**
     * @var string
     *
     * @ORM\Column(name="ownerName1", type="string", length=255, nullable=true)
     */
    private $ownerName1;

    /**
     * @var string
     *
     * @ORM\Column(name="ownerName2", type="string", length=255, nullable=true)
     */
    private $ownerName2;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="text", nullable=true)
     */
    private $reason;

    /**
     * @var integer
     *
     * @ORM\Column(name="refTypeID", type="smallint", options={"unsigned"=true})
     */
    private $refTypeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="owner1TypeID", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $owner1TypeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="owner2TypeID", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $owner2TypeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="taxReceiverID", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $taxReceiverId;

    /**
     * @var float
     *
     * @ORM\Column(name="taxAmount", type="decimal", precision=17, scale=2)
     */
    private $taxAmount;


    /**
     * @param integer $refid
     */
    public function __construct($refid)
    {
        $this->refid = $refid;
    }

    /**
     * Get refid
     *
     * @return integer
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * Set ownerId
     *
     * @param integer $ownerId
     * @return CorpWalletJournal
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
     * Set accountKey
     *
     * @param integer $accountKey
     * @return CorpWalletJournal
     */
    public function setAccountKey($accountKey)
    {
        $this->accountKey = $accountKey;

        return $this;
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
     * Set amount
     *
     * @param float $amount
     * @return CorpWalletJournal
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set argId1
     *
     * @param integer $argId1
     * @return CorpWalletJournal
     */
    public function setArgId1($argId1)
    {
        $this->argId1 = $argId1;

        return $this;
    }

    /**
     * Get argId1
     *
     * @return integer
     */
    public function getArgId1()
    {
        return $this->argId1;
    }

    /**
     * Set argName1
     *
     * @param string $argName1
     * @return CorpWalletJournal
     */
    public function setArgName1($argName1)
    {
        $this->argName1 = $argName1;

        return $this;
    }

    /**
     * Get argName1
     *
     * @return string
     */
    public function getArgName1()
    {
        return $this->argName1;
    }

    /**
     * Set balance
     *
     * @param float $balance
     * @return CorpWalletJournal
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return CorpWalletJournal
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set ownerId1
     *
     * @param integer $ownerId1
     * @return CorpWalletJournal
     */
    public function setOwnerId1($ownerId1)
    {
        $this->ownerId1 = $ownerId1;

        return $this;
    }

    /**
     * Get ownerId1
     *
     * @return integer
     */
    public function getOwnerId1()
    {
        return $this->ownerId1;
    }

    /**
     * Set ownerId2
     *
     * @param integer $ownerId2
     * @return CorpWalletJournal
     */
    public function setOwnerId2($ownerId2)
    {
        $this->ownerId2 = $ownerId2;

        return $this;
    }

    /**
     * Get ownerId2
     *
     * @return integer
     */
    public function getOwnerId2()
    {
        return $this->ownerId2;
    }

    /**
     * Set ownerName1
     *
     * @param string $ownerName1
     * @return CorpWalletJournal
     */
    public function setOwnerName1($ownerName1)
    {
        $this->ownerName1 = $ownerName1;

        return $this;
    }

    /**
     * Get ownerName1
     *
     * @return string
     */
    public function getOwnerName1()
    {
        return $this->ownerName1;
    }

    /**
     * Set ownerName2
     *
     * @param string $ownerName2
     * @return CorpWalletJournal
     */
    public function setOwnerName2($ownerName2)
    {
        $this->ownerName2 = $ownerName2;

        return $this;
    }

    /**
     * Get ownerName2
     *
     * @return string
     */
    public function getOwnerName2()
    {
        return $this->ownerName2;
    }

    /**
     * Set reason
     *
     * @param string $reason
     * @return CorpWalletJournal
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set refTypeId
     *
     * @param integer $refTypeId
     * @return CorpWalletJournal
     */
    public function setRefTypeId($refTypeId)
    {
        $this->refTypeId = $refTypeId;

        return $this;
    }

    /**
     * Get refTypeId
     *
     * @return integer
     */
    public function getRefTypeId()
    {
        return $this->refTypeId;
    }

    /**
     * Set owner1TypeId
     *
     * @param integer $owner1TypeId
     * @return CorpWalletJournal
     */
    public function setOwner1TypeId($owner1TypeId)
    {
        $this->owner1TypeId = $owner1TypeId;

        return $this;
    }

    /**
     * Get owner1TypeId
     *
     * @return integer
     */
    public function getOwner1TypeId()
    {
        return $this->owner1TypeId;
    }

    /**
     * Set owner2TypeId
     *
     * @param integer $owner2TypeId
     * @return CorpWalletJournal
     */
    public function setOwner2TypeId($owner2TypeId)
    {
        $this->owner2TypeId = $owner2TypeId;

        return $this;
    }

    /**
     * Get owner2TypeId
     *
     * @return integer
     */
    public function getOwner2TypeId()
    {
        return $this->owner2TypeId;
    }

    /**
     * Set taxReceiverId
     *
     * @param integer $taxReceiverId
     * @return CorpWalletJournal
     */
    public function setTaxReceiverId($taxReceiverId)
    {
        $this->taxReceiverId = $taxReceiverId;

        return $this;
    }

    /**
     * Get taxReceiverId
     *
     * @return integer
     */
    public function getTaxReceiver()
    {
        return $this->taxReceiverId;
    }

    /**
     * Set taxAmount
     *
     * @param float $taxAmount
     * @return CorpWalletJournal
     */
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * Get taxAmount
     *
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }
}
