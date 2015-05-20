<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpCustomsOffice", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="entry_owner", columns={"itemId", "ownerId"})
 * })
 */
class CorpCustomsOffice
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="ownerID", type="bigint", options={"unsigned"=true})
     */
    private $ownerId;

    /**
     * @ORM\Column(name="itemID", type="bigint", options={"unsigned"=true})
     */
    private $itemId;

    /**
     * @ORM\Column(name="solarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemId;

    /**
     * @ORM\Column(name="reinforceHour", type="integer", options={"unsigned"=true})
     */
    private $reinforceHour;
    
    /**
     * @ORM\Column(name="allowAlliance", type="boolean")
     */
    private $allowAlliance;
    
    /**
     * @ORM\Column(name="allowStandings", type="boolean")
     */
    private $allowStandings;

    /**
     * @ORM\Column(name="standingLevel", type="decimal", precision=17, scale=2)
     */
    private $standingLevel;
    
    /**
     * @ORM\Column(name="taxRateAlliance", type="decimal", precision=17, scale=2)
     */
    private $taxRateAlliance;

    /**
     * @ORM\Column(name="taxRateCorp", type="decimal", precision=17, scale=2)
     */
    private $taxRateCorp;

    /**
     * @ORM\Column(name="taxRateStandingHigh", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingHigh;

    /**
     * @ORM\Column(name="taxRateStandingGood", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingGood;

    /**
     * @ORM\Column(name="taxRateStandingNeutral", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingNeutral;

    /**
     * @ORM\Column(name="taxRateStandingNeutral", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingNeutral;

    /**
     * @ORM\Column(name="taxRateStandingHorrible", type="decimal", precision=17, scale=2)
     */
    private $taxRateStandingHorrible;
}
