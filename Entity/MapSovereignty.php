<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="mapSovereignty")
 */
class MapSovereignty
{
    /**
     * @ORM\Id @ORM\Column(name="solarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemId;

    /**
     * @ORM\Column(name="allianceID", type="bigint", options={"unsigned"=true})
     */
    private $allianceId;

    /**
     * @ORM\Column(name="corporationID", type="bigint", options={"unsigned"=true})
     */
    private $corporationId;

    /**
     * @ORM\Column(name="factionID", type="bigint", options={"unsigned"=true})
     */
    private $factionId;

    /**
     * @ORM\Column(name="solarSystemName", type="string")
     */
    private $solarSystemName;

    public function __construct(
        $solarSystemId,
        $allianceId,
        $corporationId,
        $factionId,
        $solarSystemName
    ) {
        $this->solarSystemId = $solarSystemId;
        $this->allianceId = $allianceId;
        $this->corporationId = $corporationId;
        $this->factionId = $factionId;
        $this->solarSystemName = $solarSystemName;
    }

    /**
     * Get solarSystemId
     *
     * @return integer
     */
    public function getSolarSystemId()
    {
        return $this->solarSystemId;
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
     * Get corporationId
     *
     * @return integer
     */
    public function getCorporationId()
    {
        return $this->corporationId;
    }

    /**
     * Get factionId
     *
     * @return integer
     */
    public function getFactionId()
    {
        return $this->factionId;
    }

    /**
     * Get solarSystemName
     *
     * @return string
     */
    public function getSolarSystemName()
    {
        return $this->solarSystemName;
    }
}
