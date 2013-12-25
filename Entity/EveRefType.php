<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="eveRefType")
 */
class EveRefType
{
    /**
     * @ORM\Id @ORM\Column(name="refTypeID", type="bigint", options={"unsigned"=true})
     */
    private $refTypeId;

    /**
     * @ORM\Column(name="refTypeName", type="string")
     */
    private $refTypeName;

    public function __construct(
        $refTypeId,
        $refTypeName
    ) {
        $this->refTypeId = $refTypeId;
        $this->refTypeName = $refTypeName;
    }

    /**
     * Get refTypeId
     *
     * @return integer
     */
    public function getRefTypeId()
    {
        return $this->refTypeId;
    }

    /**
     * Get refTypeName
     *
     * @return string
     */
    public function getRefTypeName()
    {
        return $this->refTypeName;
    }
}
