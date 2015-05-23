<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharPlanetaryColony;

/**
 * @DI\Service("tarioch.eveapi.char.PlanetaryColonies")
 */
class PlanetaryColonyUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();
        $api = $pheal->charScope->PlanetaryColonies(array(
            'characterID' => $charId
        ));

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CharPlanetaryColony c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $charId)
            ->execute();

        $this->addColonies($api->colonies, $charId);

        return $api->cached_until;
    }

    private function addColonies($colonies, $charId)
    {
        foreach ($colonies as $colony) {
            $entity = new CharPlanetaryColony();
            $entity->setOwnerId($charId);
            $entity->setOwnerName($colony->ownerName);
            $entity->setSolarSystemId($colony->solarSystemID);
            $entity->setSolarSystemName($colony->solarSystemName);
            $entity->setPlanetId($colony->planetID);
            $entity->setPlanetName($colony->planetName);
            $entity->setPlanetTypeId($colony->planetTypeID);
            $entity->setPlanetTypeName($colony->planetTypeName);
            $entity->setLastUpdate(new \DateTime($colony->lastUpdate));
            $entity->setUpgradeLevel($colony->upgradeLevel);
            $entity->setNumberOfPins($colony->numberOfPins);

            $this->entityManager->persist($entity);
        }
    }
}
