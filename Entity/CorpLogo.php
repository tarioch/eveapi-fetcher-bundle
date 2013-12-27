<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpLogo")
 */
class CorpLogo
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="id", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="graphicId", type="integer", options={"unsigned"=true})
     */
    private $graphicId;

    /**
     * @ORM\Column(name="shape1", type="integer", options={"unsigned"=true})
     */
    private $shape1;

    /**
     * @ORM\Column(name="shape2", type="integer", options={"unsigned"=true})
     */
    private $shape2;

    /**
     * @ORM\Column(name="shape3", type="integer", options={"unsigned"=true})
     */
    private $shape3;

    /**
     * @ORM\Column(name="color1", type="integer", options={"unsigned"=true})
     */
    private $color1;

    /**
     * @ORM\Column(name="color2", type="integer", options={"unsigned"=true})
     */
    private $color2;

    /**
     * @ORM\Column(name="color3", type="integer", options={"unsigned"=true})
     */
    private $color3;

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
     * Get graphicId
     *
     * @return integer
     */
    public function getGraphicId()
    {
        return $this->graphicId;
    }

    /**
     * Get shape1
     *
     * @return integer
     */
    public function getShape1()
    {
        return $this->shape1;
    }

    /**
     * Get shape2
     *
     * @return integer
     */
    public function getShape2()
    {
        return $this->shape2;
    }

    /**
     * Get shape3
     *
     * @return integer
     */
    public function getShape3()
    {
        return $this->shape3;
    }

    /**
     * Get color1
     *
     * @return integer
     */
    public function getColor1()
    {
        return $this->color1;
    }

    /**
     * Get color2
     *
     * @return integer
     */
    public function getColor2()
    {
        return $this->color2;
    }

    /**
     * Get color3
     *
     * @return integer
     */
    public function getColor3()
    {
        return $this->color3;
    }

    /**
     * Set graphicId
     *
     * @param integer $graphicId
     * @return CorpLogo
     */
    public function setGraphicId($graphicId)
    {
        $this->graphicId = $graphicId;

        return $this;
    }

    /**
     * Set shape1
     *
     * @param integer $shape1
     * @return CorpLogo
     */
    public function setShape1($shape1)
    {
        $this->shape1 = $shape1;

        return $this;
    }

    /**
     * Set shape2
     *
     * @param integer $shape2
     * @return CorpLogo
     */
    public function setShape2($shape2)
    {
        $this->shape2 = $shape2;

        return $this;
    }

    /**
     * Set shape3
     *
     * @param integer $shape3
     * @return CorpLogo
     */
    public function setShape3($shape3)
    {
        $this->shape3 = $shape3;

        return $this;
    }

    /**
     * Set color1
     *
     * @param integer $color1
     * @return CorpLogo
     */
    public function setColor1($color1)
    {
        $this->color1 = $color1;

        return $this;
    }

    /**
     * Set color2
     *
     * @param integer $color2
     * @return CorpLogo
     */
    public function setColor2($color2)
    {
        $this->color2 = $color2;

        return $this;
    }

    /**
     * Set color3
     *
     * @param integer $color3
     * @return CorpLogo
     */
    public function setColor3($color3)
    {
        $this->color3 = $color3;

        return $this;
    }
}
