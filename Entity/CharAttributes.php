<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charAttributes")
 */
class CharAttributes
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="id", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="charisma", type="integer", options={"unsigned"=true})
     */
    private $charisma;

    /**
     * @ORM\Column(name="intelligence", type="integer", options={"unsigned"=true})
     */
    private $intelligence;

    /**
     * @ORM\Column(name="memory", type="integer", options={"unsigned"=true})
     */
    private $memory;

    /**
     * @ORM\Column(name="perception", type="integer", options={"unsigned"=true})
     */
    private $perception;

    /**
     * @ORM\Column(name="willpower", type="integer", options={"unsigned"=true})
     */
    private $willpower;


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
     * Set charisma
     *
     * @param integer $charisma
     * @return CharAttributes
     */
    public function setCharisma($charisma)
    {
        $this->charisma = $charisma;

        return $this;
    }

    /**
     * Get charisma
     *
     * @return integer
     */
    public function getCharisma()
    {
        return $this->charisma;
    }

    /**
     * Set intelligence
     *
     * @param integer $intelligence
     * @return CharAttributes
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    /**
     * Get intelligence
     *
     * @return integer
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * Set memory
     *
     * @param integer $memory
     * @return CharAttributes
     */
    public function setMemory($memory)
    {
        $this->memory = $memory;

        return $this;
    }

    /**
     * Get memory
     *
     * @return integer
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * Set perception
     *
     * @param integer $perception
     * @return CharAttributes
     */
    public function setPerception($perception)
    {
        $this->perception = $perception;

        return $this;
    }

    /**
     * Get perception
     *
     * @return integer
     */
    public function getPerception()
    {
        return $this->perception;
    }

    /**
     * Set willpower
     *
     * @param integer $willpower
     * @return CharAttributes
     */
    public function setWillpower($willpower)
    {
        $this->willpower = $willpower;

        return $this;
    }

    /**
     * Get willpower
     *
     * @return integer
     */
    public function getWillpower()
    {
        return $this->willpower;
    }
}
