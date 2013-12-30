<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charAttributeEnhancer")
 */
class CharAttributeEnhancer
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="augmentatorValue", type="integer", options={"unsigned"=true})
     */
    private $augmentatorValue;

    /**
     * @ORM\Column(name="augmentatorName", type="string")
     */
    private $augmentatorName;

    /**
     * @ORM\Column(name="bonusName", type="string")
     */
    private $bonusName;

    /**
     * @ORM\ManyToOne(targetEntity="CharCharacterSheet", inversedBy="attributeEnhancers")
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
     * Set augmentatorValue
     *
     * @param integer $augmentatorValue
     * @return CharAttributeEnhancer
     */
    public function setAugmentatorValue($augmentatorValue)
    {
        $this->augmentatorValue = $augmentatorValue;

        return $this;
    }

    /**
     * Get augmentatorValue
     *
     * @return integer
     */
    public function getAugmentatorValue()
    {
        return $this->augmentatorValue;
    }

    /**
     * Set augmentatorName
     *
     * @param string $augmentatorName
     * @return CharAttributeEnhancer
     */
    public function setAugmentatorName($augmentatorName)
    {
        $this->augmentatorName = $augmentatorName;

        return $this;
    }

    /**
     * Get augmentatorName
     *
     * @return string
     */
    public function getAugmentatorName()
    {
        return $this->augmentatorName;
    }

    /**
     * Set bonusName
     *
     * @param string $bonusName
     * @return CharAttributeEnhancer
     */
    public function setBonusName($bonusName)
    {
        $this->bonusName = $bonusName;

        return $this;
    }

    /**
     * Get bonusName
     *
     * @return string
     */
    public function getBonusName()
    {
        return $this->bonusName;
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
