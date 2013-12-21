<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ApiCallRepository")
 * @ORM\Table(name="apiCall", indexes={
 *     @ORM\Index(name="ownerId", columns={"ownerId"}),
 *     @ORM\Index(name="cachedUntil", columns={"cachedUntil"})
 * })
 */
class ApiCall
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="apiCallID", type="bigint", options={"unsigned"=true})
     */
    private $apiCallId;

    /**
     * @ORM\Column(name="ownerID", type="bigint", nullable=true, options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @ORM\Column(name="earliestNextCall", type="datetime", nullable=true)
     */
    private $earliestNextCall;

    /**
     * @ORM\Column(name="cachedUntil", type="datetime", nullable=true)
     */
    private $cachedUntil;

    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(name="errorCount", type="smallint", options={"unsigned"=true, "default"=0})
     */
    private $errorCount;

    /**
     * @ORM\ManyToOne(targetEntity="Api", fetch="EAGER")
     * @ORM\JoinColumn(name="apiID", referencedColumnName="apiID", nullable=false, onDelete="cascade")
     */
    private $api;

    /**
     * @ORM\ManyToOne(targetEntity="ApiKey", fetch="EAGER")
     * @ORM\JoinColumn(name="keyID", referencedColumnName="keyID", nullable=true, onDelete="cascade")
     */
    private $key;

    public function __construct($api, $ownerId = null, $key = null)
    {
        $this->api = $api;
        $this->ownerId = $ownerId;
        $this->key = $key;
        $this->active = true;
        $this->errorCount = 0;
    }

    public function getApiCallId()
    {
        return $this->apiCallId;
    }

    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function getEarliestNextCall()
    {
        return $this->earliestNextCall;
    }

    public function setEarliestNextCall($earliestNextCall)
    {
        $this->earliestNextCall = $earliestNextCall;
    }

    public function getCachedUntil()
    {
        return $this->cachedUntil;
    }

    public function setCachedUntil($cachedUntil)
    {
        $this->cachedUntil = $cachedUntil;
    }

    public function getApi()
    {
        return $this->api;
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

    public function getKey()
    {
        return $this->key;
    }
}
