<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charSkill")
 */
class CharSkill
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="level", type="smallint", options={"unsigned"=true})
     */
    private $level;

    /**
     * @ORM\Column(name="skillpoints", type="bigint", options={"unsigned"=true})
     */
    private $skillpoints;

    /**
     * @ORM\Column(name="typeID", type="bigint", options={"unsigned"=true})
     */
    private $typeId;

    /**
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    /**
     * @ORM\ManyToOne(targetEntity="CharCharacterSheet", inversedBy="skills")
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
     * Set level
     *
     * @param integer $level
     * @return CharSkill
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set skillpoints
     *
     * @param integer $skillpoints
     * @return CharSkill
     */
    public function setSkillpoints($skillpoints)
    {
        $this->skillpoints = $skillpoints;

        return $this;
    }

    /**
     * Get skillpoints
     *
     * @return integer
     */
    public function getSkillpoints()
    {
        return $this->skillpoints;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     * @return CharSkill
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return CharSkill
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function isPublished()
    {
        return $this->published;
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
