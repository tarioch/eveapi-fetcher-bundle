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
            $contract = $this->loadOrCreate($entry->contractID, $charId);
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
            $contract->setAvailability($entry->availability);
            $contract->setBuyout($entry->buyout);
        }

        return $api->cached_until;
    }

    private function loadOrCreate($contractId, $ownerId)
    {
        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharContract');
        $entity = $repo->findOneBy(array('contractId' => $contractId, 'ownerId' => $ownerId));
        if ($entity === null) {
            $entity = new CharContract($contractId, $ownerId);
            $this->entityManager->persist($entity);
            $this->entityManager->flush($entity);
        }

        return $entity;
    }
}
