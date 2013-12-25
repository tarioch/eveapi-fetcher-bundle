<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="eveAlliance")
 */
class EveAlliance
{
    /**
     * @ORM\Id @ORM\Column(name="allianceID", type="bigint", options={"unsigned"=true})
     */
    private $allianceId;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="shortName", type="string")
     */
    private $shortName;

    /**
     * @ORM\Column(name="executorCorpID", type="bigint", options={"unsigned"=true})
     */
    private $executorCorpId;

    /**
     * @ORM\Column(name="memberCount", type="bigint", options={"unsigned"=true})
     */
    private $memberCount;

    /**
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @ORM\OneToMany(targetEntity="EveMemberCorporation", mappedBy="allianceId")
     */
    private $memberCorporations;

    public function __construct(
        $allianceId,
        $name,
        $shortName,
        $executorCorpId,
        $memberCount,
        $startDate
    ) {
        $this->allianceId = $allianceId;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->executorCorpId = $executorCorpId;
        $this->memberCount = $memberCount;
        $this->startDate = $startDate;
        $this->memberCorporations = new ArrayCollection();
    }

    public function addMemberCorp(EveMemberCorporation $memberCorp)
    {
        $this->memberCorporations->add($memberCorp);
    }

    /**
     * Get allianceId
     *
     * @return integer
     */
    public function getAllianceId()
    {
        return $this->allianceId;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Get executorCorpId
     *
     * @return integer
     */
    public function getExecutorCorpId()
    {
        return $this->executorCorpId;
    }

    /**
     * Get memberCount
     *
     * @return integer
     */
    public function getMemberCount()
    {
        return $this->memberCount;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Get memberCorporations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMemberCorporations()
    {
        return $this->memberCorporations;
    }
}
