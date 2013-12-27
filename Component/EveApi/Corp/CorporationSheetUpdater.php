<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpCorporationSheet;
use Tarioch\EveapiFetcherBundle\Entity\CorpLogo;
use Tarioch\EveapiFetcherBundle\Entity\CorpDivision;
use Tarioch\EveapiFetcherBundle\Entity\CorpWalletDivision;

/**
 * @DI\Service("tarioch.eveapi.corp.CorporationSheet")
 */
class CorporationSheetUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $charId = $call->getOwnerId();
        $api = $pheal->corpScope->CorporationSheet(array('characterID' => $charId));

        $entity = $this->loadOrCreate($api->corporationID);
        $entity->setCorporationName($api->corporationName);
        $entity->setTicker($api->ticker);
        $entity->setCeoId($api->ceoID);
        $entity->setCeoName($api->ceoName);
        $entity->setStationId($api->stationID);
        $entity->setStationName($api->stationName);
        $entity->setDescription($api->description);
        $entity->setUrl($api->url);
        $entity->setAllianceId($api->allianceID);
        $entity->setAllianceName($api->allianceName);
        $entity->setTaxRate($api->taxRate);
        $entity->setMemberCount($api->memberCount);
        $entity->setMemberLimit($api->memberLimit);
        $entity->setShares($api->shares);

        $logoEntity = $entity->getLogo();
        $logoApi = $api->logo;
        $logoEntity->setGraphicId($logoApi->graphicID);
        $logoEntity->setShape1($logoApi->shape1);
        $logoEntity->setShape2($logoApi->shape2);
        $logoEntity->setShape3($logoApi->shape3);
        $logoEntity->setColor1($logoApi->color1);
        $logoEntity->setColor2($logoApi->color2);
        $logoEntity->setColor3($logoApi->color3);

        foreach ($api->divisions as $division) {
            $accountKey = $division->accountKey;

            $divisionEntity = $this->loadOrCreateDivision($entity, $accountKey);
            $divisionEntity->setDescription($division->description);
        }

        foreach ($api->walletDivisions as $division) {
            $accountKey = $division->accountKey;

            $divisionEntity = $this->loadOrCreateWalletDivision($entity, $accountKey);
            $divisionEntity->setDescription($division->description);
        }

        return $api->cached_until;
    }

    private function loadOrCreate($corporationId)
    {
        $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CorpCorporationSheet', $corporationId);
        if ($entity == null) {
            $entity = new CorpCorporationSheet($corporationId);
            $entity->setLogo(new CorpLogo());
            $this->entityManager->persist($entity);
        }

        return $entity;
    }

    private function loadOrCreateDivision(CorpCorporationSheet $corporation, $accountKey)
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpDivision');
        $entity = $repo->findOneBy(array('corporation' => $corporation, 'accountKey' => $accountKey));
        if ($entity == null) {
            $entity = new CorpDivision($accountKey, $corporation);
            $this->entityManager->persist($entity);
        }

        return $entity;
    }

    private function loadOrCreateWalletDivision(CorpCorporationSheet $corporation, $accountKey)
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CorpWalletDivision');
        $entity = $repo->findOneBy(array('corporation' => $corporation, 'accountKey' => $accountKey));
        if ($entity == null) {
            $entity = new CorpWalletDivision($accountKey, $corporation);
            $this->entityManager->persist($entity);
        }

        return $entity;
    }
}
