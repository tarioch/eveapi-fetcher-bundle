<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="accountAccountStatus")
 */
class AccountAccountStatus
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="createDate", type="datetime")
     */
    private $createDate;

    /**
     * @ORM\Column(name="logonCount", type="bigint", options={"unsigned"=true})
     */
    private $logonCount;

    /**
     * @ORM\Column(name="logonMinutes", type="bigint", options={"unsigned"=true})
     */
    private $logonMinutes;

    /**
     * @ORM\Column(name="paidUntil", type="datetime")
     */
    private $paidUntil;

    /**
     * @ORM\OneToOne(targetEntity="Key", fetch="EAGER")
     * @ORM\JoinColumn(name="keyID", referencedColumnName="keyID", nullable=false, onDelete="cascade")
     */
    private $key;

    public function __construct(Key $key)
    {
        $this->key = $key;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreateDate()
    {
        return $this->createDate;
    }

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function getLogonCount()
    {
        return $this->logonCount;
    }

    public function setLogonCount($logonCount)
    {
        $this->logonCount = $logonCount;
    }

    public function getLogonMinutes()
    {
        return $this->logonMinutes;
    }

    public function setLogonMinutes($logonMinutes)
    {
        $this->logonMinutes = $logonMinutes;
    }

    public function getPaidUntil()
    {
        return $this->paidUntil;
    }

    public function setPaidUntil($paidUntil)
    {
        $this->paidUntil = $paidUntil;
    }

    public function getKey()
    {
        return $this->createDate;
    }
}
