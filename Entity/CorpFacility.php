<?php

namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpFacility", indexes={
 *     @ORM\Index(name="owner", columns={"ownerID"})}, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="facility_owner", columns={"facilityId", "ownerId"})
 * })
 */
class CorpFacility
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
     * @ORM\Column(name="facilityID", type="bigint", options={"unsigned"=true})
     */
    private $facilityId;

    /**
     * @ORM\Column(name="typeID", type="bigint", options={"unsigned"=true})
     */
    private $typeId;

    /**
     * @ORM\Column(name="typeName", type="string")
     */
    private $typeName;

    /**
     * @ORM\Column(name="solarSystemID", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemId;

    /**
     * @ORM\Column(name="solarSystemName", type="bigint", options={"unsigned"=true})
     */
    private $solarSystemName;

    /**
     * @ORM\Column(name="regionID", type="bigint", options={"unsigned"=true})
     */
    private $regionId;

    /**
     * @ORM\Column(name="regionName", type="bigint", options={"unsigned"=true})
     */
    private $regionName;

    /**
     * @ORM\Column(name="starbaseModifier", type="integer")
     */
    private $starbaseModifier;

    /**
     * @ORM\Column(name="tax", type="integer")
     */
    private $tax;

}
