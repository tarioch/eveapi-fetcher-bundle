<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpBlueprint;

/**
 * @DI\Service("tarioch.eveapi.corp.Blueprint")
 */
class BlueprintUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $corpId = $owner->getCorporationId();
        $api = $pheal->corpScope->Blueprints();

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CorpBlueprint c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $corpId)
            ->execute();

        $this->addBlueprints($api->blueprints, $corpId);

        return $api->cached_until;
    }

    private function addBlueprints($blueprints, $corpId)
    {
        foreach ($blueprints as $blueprint) {
            $entity = new CorpBlueprint();
            $entity->setOwnerId($corpId);
            $entity->setLocationId($blueprint->locationID);
            $entity->setItemId($blueprint->itemID);
            $entity->setTypeId($blueprint->typeID);
            $entity->setTypeName($blueprint->typeName);
            $entity->setQuantity($blueprint->quantity);
            $entity->setFlag($blueprint->flagID);
            $entity->setRuns($blueprint->runs);
            $entity->setTimeEfficiency($blueprint->timeEfficiency);
            $entity->setMaterialEfficiency($blueprint->materialEfficiency);

            $this->entityManager->persist($entity);
        }
    }
}
