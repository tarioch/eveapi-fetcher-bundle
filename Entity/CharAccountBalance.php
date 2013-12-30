<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charAccountBalance", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="owner_account", columns={"ownerId", "accountKey"})
 * })
 */
class CharAccountBalance
{
    /**
     * @ORM\Id @ORM\Column(name="accountID", type="bigint", options={"unsigned"=true})
     */
    private $accountId;

    /**
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @ORM\Column(name="accountKey", type="bigint", options={"unsigned"=true})
     */
    private $accountKey;

    /**
     * @ORM\Column(name="balance", type="decimal", precision=17, scale=2)
     */
    private $balance;

    public function __construct($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * Get accountId
     *
     * @return integer
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Set ownerId
     *
     * @param integer $ownerId
     * @return CorpAccountBalance
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
     * @return CorpAccountBalance
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
     * Set balance
     *
     * @param float $balance
     * @return CorpAccountBalance
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
}
