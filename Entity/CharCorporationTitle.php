<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charCorporationTitle")
 */
class CharCorporationTitle
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="titleID", type="bigint", options={"unsigned"=true})
     */
    private $titleId;

    /**
     * @ORM\Column(name="titleName", type="string")
     */
    private $titleName;

    /**
     * @ORM\ManyToOne(targetEntity="CharCharacterSheet", inversedBy="corporationTitles")
     * @ORM\JoinColumn(name="ownerID", referencedColumnName="characterID", nullable=false, onDelete="cascade")
     */
    private $character;

    public function __construct(CharCharacterSheet $character)
    {
        $this->character = $character;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titleId
     *
     * @param integer $titleId
     * @return CharCorporationTitle
     */
    public function setTitleId($titleId)
    {
        $this->titleId = $titleId;

        return $this;
    }

    /**
     * Get titleId
     *
     * @return integer
     */
    public function getTitleId()
    {
        return $this->titleId;
    }

    /**
     * Set titleName
     *
     * @param string $titleName
     * @return CharCorporationTitle
     */
    public function setTitleName($titleName)
    {
        $this->titleName = $titleName;

        return $this;
    }

    /**
     * Get titleName
     *
     * @return string
     */
    public function getTitleName()
    {
        return $this->titleName;
    }

    /**
     * Get character
     *
     * @return \Tarioch\EveapiFetcherBundle\Entity\CharCharacterSheet
     */
    public function getCharacter()
    {
        return $this->character;
    }
}
