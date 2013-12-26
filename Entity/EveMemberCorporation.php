<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="eveMemberCorporation")
 */
class EveMemberCorporation
{
    /**
     * @ORM\Id @ORM\Column(name="corporationID", type="bigint", options={"unsigned"=true})
     */
    private $corporationId;

    /**
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @ORM\ManyToOne(targetEntity="EveAlliance", fetch="EAGER", inversedBy="memberCorporations")
     * @ORM\JoinColumn(name="allianceID", referencedColumnName="allianceID", nullable=false, onDelete="cascade")
     */
    private $alliance;

    public function __construct(
        $corporationId,
        $startDate,
        EveAlliance $alliance
    ) {
        $this->corporationId = $corporationId;
        $this->startDate = $startDate;
        $this->alliance = $alliance;
        $this->alliance->addMemberCorp($this);
    }

    /**
     * Get corporationId
     *
     * @return integer
     */
    public function getCorporationId()
    {
        return $this->corporationId;
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
     * Get alliance
     *
     * @return \Tarioch\EveapiFetcherBundle\Entity\EveAlliance
     */
    public function getAlliance()
    {
        return $this->alliance;
    }
}
