<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="charCorporationRoleAtBase")
 */
class CharCorporationRoleAtBase
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
     * @ORM\ManyToOne(targetEntity="CharCharacterSheet", inversedBy="corporationRolesAtBase")
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
     * @return CharCorporationRoleAtBase
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
     * @return CharCorporationRoleAtBase
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
