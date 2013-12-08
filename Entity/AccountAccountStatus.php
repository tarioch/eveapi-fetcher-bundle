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
     * @var integer
     *
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createDate", type="datetime")
     */
    private $createDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="logonCount", type="bigint", options={"unsigned"=true})
     */
    private $logonCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="logonMinutes", type="bigint", options={"unsigned"=true})
     */
    private $logonMinutes;

    /**
     * @var \DateTime 
     *
     * @ORM\Column(name="paidUntil", type="datetime")
     */
    private $paidUntil;

    /**
     * @var Key
     *
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
