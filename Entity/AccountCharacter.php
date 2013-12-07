<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="hpl_eveapi.accountCharacter")
 */
class AccountCharacter
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="characterID", type="integer")
     */
    private $characterId;

    /**
     * @ORM\Column(name="characterName", type="string")
     */
    private $characterName;

    /**
     * @ORM\Column(name="corporationID", type="integer")
     */
    private $corporationId;

    /**
     * @ORM\Column(name="corporationName", type="string")
     */
    private $corporationName;

    /**
     * @ORM\OneToOne(targetEntity="Key", fetch="EAGER")
     * @ORM\JoinColumn(name="keyID", referencedColumnName="keyID")
     */
    private $key;

    public function __construct(Key $key, $characterId)
    {
        $this->key = $key;
        $this->characterId = $characterId;
    }

    public function getId()
    {
        return $this->id;
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

    public function getKey()
    {
        return $this->createDate;
    }
}
