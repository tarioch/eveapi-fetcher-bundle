<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharContract;

/**
 * @DI\Service("tarioch.eveapi.char.Contracts")
 */
class ContractUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();

        $api = $pheal->charScope->Contracts(array('characterID' => $charId));
        foreach ($api->contractList as $entry) {
            $contract = $this->loadOrCreate($entry->contractID);
            $contract->setIssuerId($entry->issuerID);
            $contract->setIssuerCorpId($entry->issuerCorpID);
            $contract->setAssigneeId($entry->assigneeID);
            $contract->setAcceptorId($entry->acceptorID);
            $contract->setStartStationId($entry->startStationID);
            $contract->setEndStationId($entry->endStationID);
            $contract->setType($entry->type);
            $contract->setStatus($entry->status);
            $contract->setTitle($entry->title);
            $contract->setForCorp(filter_var($entry->forCorp, FILTER_VALIDATE_BOOLEAN));
            $contract->setDateIssued(new \DateTime($entry->dateIssued));
            $contract->setDateExpired(new \DateTime($entry->dateExpired));
            $contract->setDateAccepted(new \DateTime($entry->dateAccepted));
            $contract->setNumDays($entry->numDays);
            $contract->setDateCompleted(new \DateTime($entry->dateCompleted));
            $contract->setPrice($entry->price);
            $contract->setReward($entry->reward);
            $contract->setCollateral($entry->collateral);
            $contract->setVolume($entry->volume);
        }

        return $api->cached_until;
    }

    private function loadOrCreate($contractId)
    {
        $entity = $this->entityManager->find('TariochEveapiFetcherBundle:CharContract', $contractId);
        if ($entity == null) {
            $entity = new CharContract($contractId);
            $this->entityManager->persist($entity);
        }

        return $entity;
    }
}
