<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="corpCorporationSheet")
 */
class CorpCorporationSheet
{
    /**
     * @ORM\Id @ORM\Column(name="corporationID", type="bigint", options={"unsigned"=true})
     */
    private $corporationId;

    /**
     * @ORM\Column(name="corporationName", type="string")
     */
    private $corporationName;

    /**
     * @ORM\Column(name="ticker", type="string")
     */
    private $ticker;

    /**
     * @ORM\Column(name="ceoID", type="bigint", options={"unsigned"=true})
     */
    private $ceoId;

    /**
     * @ORM\Column(name="ceoName", type="string")
     */
    private $ceoName;

    /**
     * @ORM\Column(name="stationID", type="bigint", options={"unsigned"=true})
     */
    private $stationId;

    /**
     * @ORM\Column(name="stationName", type="string")
     */
    private $stationName;

    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\Column(name="url", type="text", nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(name="allianceID", type="bigint", options={"unsigned"=true}, nullable=true)
     */
    private $allianceId;

    /**
     * @ORM\Column(name="allianceName", type="string", nullable=true)
     */
    private $allianceName;

    /**
     * @ORM\Column(name="taxRate", type="decimal", precision=5, scale=2)
     */
    private $taxRate;

    /**
     * @ORM\Column(name="memberCount", type="bigint", options={"unsigned"=true})
     */
    private $memberCount;

    /**
     * @ORM\Column(name="memberLimit", type="bigint", options={"unsigned"=true})
     */
    private $memberLimit;

    /**
     * @ORM\Column(name="shares", type="bigint", options={"unsigned"=true})
     */
    private $shares;

    /**
     * @ORM\OneToMany(targetEntity="CorpDivision", mappedBy="corporation")
     */
    private $divisions;

    /**
     * @ORM\OneToMany(targetEntity="CorpWalletDivision", mappedBy="corporation")
     */
    private $walletDivisions;

    /**
     * @ORM\OneToOne(targetEntity="CorpLogo", cascade="all")
     * @JoinColumn(name="logoId", referencedColumnName="id", onDelete="cascade")
     */
    private $logo;

    public function __construct($corporationId)
    {
        $this->corporationId = $corporationId;
        $this->divisions = new ArrayCollection();
        $this->walletDivisions = new ArrayCollection();
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
     * Set corporationName
     *
     * @param string $corporationName
     * @return CorpCorporationSheet
     */
    public function setCorporationName($corporationName)
    {
        $this->corporationName = $corporationName;

        return $this;
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

    /**
     * Set ticker
     *
     * @param string $ticker
     * @return CorpCorporationSheet
     */
    public function setTicker($ticker)
    {
        $this->ticker = $ticker;

        return $this;
    }

    /**
     * Get ticker
     *
     * @return string
     */
    public function getTicker()
    {
        return $this->ticker;
    }

    /**
     * Set ceoId
     *
     * @param integer $ceoId
     * @return CorpCorporationSheet
     */
    public function setCeoId($ceoId)
    {
        $this->ceoId = $ceoId;

        return $this;
    }

    /**
     * Get ceoId
     *
     * @return integer
     */
    public function getCeoId()
    {
        return $this->ceoId;
    }

    /**
     * Set ceoName
     *
     * @param string $ceoName
     * @return CorpCorporationSheet
     */
    public function setCeoName($ceoName)
    {
        $this->ceoName = $ceoName;

        return $this;
    }

    /**
     * Get ceoName
     *
     * @return string
     */
    public function getCeoName()
    {
        return $this->ceoName;
    }

    /**
     * Set stationId
     *
     * @param integer $stationId
     * @return CorpCorporationSheet
     */
    public function setStationId($stationId)
    {
        $this->stationId = $stationId;

        return $this;
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
     * Set stationName
     *
     * @param string $stationName
     * @return CorpCorporationSheet
     */
    public function setStationName($stationName)
    {
        $this->stationName = $stationName;

        return $this;
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
     * Set description
     *
     * @param string $description
     * @return CorpCorporationSheet
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
     * Set url
     *
     * @param string $url
     * @return CorpCorporationSheet
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set allianceId
     *
     * @param integer $allianceId
     * @return CorpCorporationSheet
     */
    public function setAllianceId($allianceId)
    {
        $this->allianceId = $allianceId;

        return $this;
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
     * Set allianceName
     *
     * @param string $allianceName
     * @return CorpCorporationSheet
     */
    public function setAllianceName($allianceName)
    {
        $this->allianceName = $allianceName;

        return $this;
    }

    /**
     * Get allianceName
     *
     * @return string
     */
    public function getAllianceName()
    {
        return $this->allianceName;
    }

    /**
     * Set taxRate
     *
     * @param float $taxRate
     * @return CorpCorporationSheet
     */
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * Get taxRate
     *
     * @return float
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * Set memberCount
     *
     * @param integer $memberCount
     * @return CorpCorporationSheet
     */
    public function setMemberCount($memberCount)
    {
        $this->memberCount = $memberCount;

        return $this;
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
     * Set memberLimit
     *
     * @param integer $memberLimit
     * @return CorpCorporationSheet
     */
    public function setMemberLimit($memberLimit)
    {
        $this->memberLimit = $memberLimit;

        return $this;
    }

    /**
     * Get memberLimit
     *
     * @return integer
     */
    public function getMemberLimit()
    {
        return $this->memberLimit;
    }

    /**
     * Set shares
     *
     * @param integer $shares
     * @return CorpCorporationSheet
     */
    public function setShares($shares)
    {
        $this->shares = $shares;

        return $this;
    }

    /**
     * Get shares
     *
     * @return integer
     */
    public function getShares()
    {
        return $this->shares;
    }

    /**
     * Add divisions
     *
     * @param CorpDivision $division
     * @return CorpCorporationSheet
     */
    public function addDivision(CorpDivision $division)
    {
        $this->divisions[] = $division;

        return $this;
    }

    /**
     * Remove divisions
     *
     * @param CorpDivision $division
     */
    public function removeDivision(CorpDivision $division)
    {
        $this->divisions->removeElement($division);
    }

    /**
     * Get divisions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDivisions()
    {
        return $this->divisions;
    }

    /**
     * Add walletDivisions
     *
     * @param CorpWalletDivision $walletDivision
     * @return CorpCorporationSheet
     */
    public function addWalletDivision(CorpWalletDivision $walletDivision)
    {
        $this->walletDivisions[] = $walletDivision;

        return $this;
    }

    /**
     * Remove walletDivisions
     *
     * @param \Tarioch\EveapiFetcherBundle\Entity\CorpWalletDivision $walletDivision
     */
    public function removeWalletDivision(CorpWalletDivision $walletDivision)
    {
        $this->walletDivisions->removeElement($walletDivision);
    }

    /**
     * Get walletDivisions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWalletDivisions()
    {
        return $this->walletDivisions;
    }

    /**
     * Set logo
     *
     * @param CorpLogo $logo
     * @return CorpCorporationSheet
     */
    public function setLogo(CorpLogo $logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return CorpLogo
     */
    public function getLogo()
    {
        return $this->logo;
    }
}
