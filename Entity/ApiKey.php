<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="ApiKeyRepository")
 * @ORM\Table(name="apiKey")
 */
class ApiKey
{
    /**
     * @ORM\Id @ORM\Column(name="keyID", type="bigint", options={"unsigned"=true})
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

    /**
     * @ORM\OneToMany(targetEntity="ApiCall", mappedBy="key")
     */
    private $apiCalls;

    public function __construct($keyId, $vCode)
    {
        $this->keyId = $keyId;
        $this->vCode = $vCode;
        $this->apiCalls = new ArrayCollection();
        $this->active = true;
        $this->errorCount = 0;
    }

    public function getKeyId()
    {
        return $this->keyId;
    }

    public function getVcode()
    {
        return $this->vCode;
    }

    public function setVcode($vcode)
    {
        $this->vCode = $vcode;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getErrorCount()
    {
        return $this->errorCount;
    }

    public function increaseErrorCount()
    {
        $this->errorCount++;
    }

    public function clearErrorCount()
    {
        $this->errorCount = 0;
    }

    public function getApiCalls()
    {
        return $this->apiCalls;
    }
}
