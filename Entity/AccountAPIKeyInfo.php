<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="accountAPIKeyInfo")
 */
class AccountAPIKeyInfo
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="accessMask", type="bigint", options={"unsigned"=true})
     */
    private $accessMask;

    /**
     * @ORM\Column(name="expires", type="datetime", nullable=true)
     */
    private $expires;

    /**
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="ApiKey", fetch="EAGER")
     * @ORM\JoinColumn(name="keyID", referencedColumnName="keyID", nullable=false, onDelete="cascade")
     */
    private $key;

    public function __construct(ApiKey $key)
    {
        $this->key = $key;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAccessMask()
    {
        return $this->accessMask;
    }

    public function setAccessMask($accessMask)
    {
        $this->accessMask = $accessMask;
    }

    public function getExpires()
    {
        return $this->expires;
    }

    public function setExpires($expires)
    {
        $this->expires = $expires;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return ApiKey
     */
    public function getKey()
    {
        return $this->key;
    }
}
