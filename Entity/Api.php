<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="api")
 */
class Api
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="apiID", type="integer")
     */
    private $apiId;

    /**
     * @ORM\Column(name="mask", type="integer", nullable=true)
     */
    private $mask;

    /**
     * @ORM\Column(name="worker", type="string")
     */
    private $worker;

    /**
     * @ORM\Column(name="section", type="string")
     */
    private $section;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="callInterval", type="integer", options={"default"=0})
     */
    private $callInterval;

    public function __construct($worker, $section, $name, $callInterval, $mask = null)
    {
        $this->worker = $worker;
        $this->section = $section;
        $this->name = $name;
        $this->callInterval = $callInterval;
        $this->mask = $mask;
    }

    public function getApiId()
    {
        return $this->apiId;
    }

    public function getMask()
    {
        return $this->mask;
    }

    public function getWorker()
    {
        return $this->worker;
    }

    public function getSection()
    {
        return $this->section;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCallInterval()
    {
        return $this->callInterval;
    }
}
