<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="eveConquerableStation")
 */
class EveConquerableStation
{
    /**
     * @ORM\Id @ORM\Column(name="stationID", type="bigint", options={"unsigned"=true})
     */
    private $stationId;

    /**
     * @ORM\Column(name="stationName", type="string")
     */
    private $stationName;

    /**
     * @ORM\Column(name="stationTypeID", type="bigint", options={"unsigned"=true})
     */
    private $stationTypeId;

    /**
     * @ORM\Column(name="solarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemId;

    /**
     * @ORM\Column(name="corporationID", type="bigint", options={"unsigned"=true})
     */
    private $corporationId;

    /**
     * @ORM\Column(name="corporationName", type="string")
     */
    private $corporationName;

    public function __construct(
        $stationId,
        $stationName,
        $stationTypeId,
        $solarSystemId,
        $corporationId,
        $corporationName
    ) {
        $this->stationId = $stationId;
        $this->stationName = $stationName;
        $this->stationTypeId = $stationTypeId;
        $this->solarSystemId = $solarSystemId;
        $this->corporationId = $corporationId;
        $this->corporationName = $corporationName;
    }

    /**
     * Get stationId
     *
     * @return integer
     */
    public function getStationId()
    {
        return $this->stationId;
    }

    /**
     * Get stationName
     *
     * @return string
     */
    public function getStationName()
    {
        return $this->stationName;
    }

    /**
     * Get stationTypeId
     *
     * @return integer
     */
    public function getStationTypeId()
    {
        return $this->stationTypeId;
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
     * Get corporationId
     *
     * @return integer
     */
    public function getCorporationId()
    {
        return $this->corporationId;
    }

    /**
     * Get corporationName
     *
     * @return string
     */
    public function getCorporationName()
    {
        return $this->corporationName;
    }
}
