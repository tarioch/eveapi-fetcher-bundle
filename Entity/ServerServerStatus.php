<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="serverServerStatus")
 */
class ServerServerStatus
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="serverOpen", type="boolean")
     */
    private $serverOpen;

    /**
     * @ORM\Column(name="onlinePlayers", type="integer")
     */
    private $onlinePlayers;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function isServerOpen()
    {
        return $this->serverOpen;
    }

    public function setServerOpen($serverOpen)
    {
        $this->serverOpen = $serverOpen;
    }

    public function getOnlinePlayers()
    {
        return $this->onlinePlayers;
    }

    public function setOnlinePlayers($onlinePlayers)
    {
        $this->onlinePlayers = $onlinePlayers;
    }
}
