<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="hpl_eveapi.accountAPIKeyInfo")
 */
class AccountAPIKeyInfo
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="accessMask", type="integer")
     */
    private $accessMask;

    /**
     * @ORM\Column(name="expires", type="datetime")
     */
    private $expires;

    /**
     * @ORM\Column(name="type", type="string")
     */
    private $type;


    /**
     * @ORM\OneToOne(targetEntity="Key", fetch="EAGER")
     * @ORM\JoinColumn(name="keyID", referencedColumnName="keyID")
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

    public function getKey()
    {
        return $this->createDate;
    }
}
