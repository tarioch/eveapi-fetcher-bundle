<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="accountCharacter", indexes={
 *     @ORM\Index(name="characterID", columns={"characterId"}),
 *     @ORM\Index(name="corporationID", columns={"corporationId"})
 * })
 */
class AccountCharacter
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="characterID", type="bigint", options={"unsigned"=true})
     */
    private $characterId;

    /**
     * @ORM\Column(name="characterName", type="string")
     */
    private $characterName;

    /**
     * @ORM\Column(name="corporationID", type="bigint", options={"unsigned"=true})
     */
    private $corporationId;

    /**
     * @ORM\Column(name="corporationName", type="string")
     */
    private $corporationName;

    /**
     * @ORM\ManyToOne(targetEntity="ApiKey", fetch="EAGER")
     * @ORM\JoinColumn(name="keyID", referencedColumnName="keyID", nullable=false, onDelete="cascade")
     */
    private $key;

    public function __construct(ApiKey $key, $characterId)
    {
        $this->key = $key;
        $this->characterId = $characterId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getCharacterId()
    {
        return $this->characterId;
    }

    public function getCharacterName()
    {
        return $this->characterName;
    }

    public function setCharacterName($characterName)
    {
        $this->characterName = $characterName;
    }

    public function getCorporationId()
    {
        return $this->corporationId;
    }

    public function setCorporationId($corporationId)
    {
        $this->corporationId = $corporationId;
    }

    public function getCorporationName()
    {
        return $this->corporationName;
    }

    public function setCorporationName($corporationName)
    {
        $this->corporationName = $corporationName;
    }

    public function __toString()
    {
        return $this->id . ': characterId: ' . $this->characterId . ' corpId: ' . $this->corporationId;
    }
}
