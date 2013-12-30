<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="charCorporationRoleAtOther")
 */
class CharCorporationRoleAtOther
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(name="ID", type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(name="roleID", type="bigint", options={"unsigned"=true})
     */
    private $roleId;

    /**
     * @ORM\Column(name="roleName", type="string")
     */
    private $roleName;

    /**
     * @ORM\ManyToOne(targetEntity="CharCharacterSheet", inversedBy="corporationRolesAtOther")
     * @ORM\JoinColumn(name="ownerID", referencedColumnName="characterID", nullable=false, onDelete="cascade")
     */
    private $character;

    public function __construct(CharCharacterSheet $character)
    {
        $this->character = $character;
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
     * Set roleId
     *
     * @param integer $roleId
     * @return CharCorporationRoleAtOther
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * Get roleId
     *
     * @return integer
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set roleName
     *
     * @param string $roleName
     * @return CharCorporationRoleAtOther
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }

    /**
     * Get roleName
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * Get character
     *
     * @return \Tarioch\EveapiFetcherBundle\Entity\CharCharacterSheet
     */
    public function getCharacter()
    {
        return $this->character;
    }
}
