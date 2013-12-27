<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpDivision")
 */
class CorpDivision
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="id", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="accountKey", type="bigint", options={"unsigned"=true})
     */
    private $accountKey;

    /**
     * @ORM\Column(name="description", type="string")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="CorpCorporationSheet", inversedBy="divisions")
     * @ORM\JoinColumn(name="ownerID", referencedColumnName="corporationID", nullable=false, onDelete="cascade")
     */
    private $corporation;

    public function __construct($accountKey, $corporation)
    {
        $this->accountKey = $accountKey;
        $this->corporation = $corporation;
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
     * Get accountKey
     *
     * @return integer
     */
    public function getAccountKey()
    {
        return $this->accountKey;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CorpDivision
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get corporation
     *
     * @return CorpCorporationSheet
     */
    public function getCorporation()
    {
        return $this->corporation;
    }
}
