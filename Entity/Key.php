<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="hpl_eveapi.key")
 */
class Key
{
    /**
     * @ORM\Id @ORM\Column(name="keyID", type="integer")
     */
    private $keyId;

    /**
     * @ORM\Column(name="vCode", type="string")
     */
    private $vCode;

    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(name="errorCount", type="integer")
     */
    private $errorCount;

    public function __construct($keyId, $vCode)
    {
        $this->keyId = $keyId;
        $this->vCode = $vCode;
    }

    public function getKeyId()
    {
        return $this->keyId;
    }

    public function getVcode()
    {
        return $this->vCode;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function increaseErrorCount()
    {
        $this->errorCount++;
    }

    public function clearErrorCount()
    {
        $this->errorCount = 0;
    }
}
