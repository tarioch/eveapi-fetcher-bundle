<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ApiCallRepository")
 * @ORM\Table(name="hpl_eveapi.apiCall")
 */
class ApiCall
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="apiCallID", type="integer")
     */
    private $apiCallId;

    /**
     * @ORM\Column(name="ownerID", type="integer")
     */
    private $ownerId;

    /**
     * @ORM\Column(name="earliestNextCall", type="datetime")
     */
    private $earliestNextCall;

    /**
     * @ORM\Column(name="cachedUntil", type="datetime")
     */
    private $cachedUntil;

    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(name="errorCount", type="integer")
     */
    private $errorCount;

    /**
     * @ORM\OneToOne(targetEntity="Api", fetch="EAGER")
     * @ORM\JoinColumn(name="apiID", referencedColumnName="apiID")
     */
    private $api;

    public function __construct($api, $ownerId = null)
    {
        $this->ownerId = $ownerId;
        $this->api = $api;
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
}
