<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharPlanetaryColony;
use Tarioch\EveapiFetcherBundle\Entity\CharPlanetaryPin;
use Tarioch\EveapiFetcherBundle\Entity\CharPlanetaryLink;
use Tarioch\EveapiFetcherBundle\Entity\CharPlanetaryRoute;

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

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CharPlanetaryColony c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $charId)
            ->execute();
        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CharPlanetaryPin c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $charId)
            ->execute();
        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CharPlanetaryLink c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $charId)
            ->execute();
        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CharPlanetaryRoute c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $charId)
            ->execute();

        $api = $pheal->charScope->PlanetaryColonies(array(
            'characterID' => $charId
        ));

        foreach ($api->colonies as $colony) {
            $planetId = $colony->planetID;

            $this->addColony($colony, $charId);

            $api = $pheal->charScope->PlanetaryPins(array(
                'characterID' => $charId,
                'planetID' => $planetId
            ));
            $this->addPins($api->pins, $planetId, $charId);

            $api = $pheal->charScope->PlanetaryLinks(array(
                'characterID' => $charId,
                'planetID' => $planetId
            ));
            $this->addLinks($api->links, $planetId, $charId);

            $api = $pheal->charScope->PlanetaryRoutes(array(
                'characterID' => $charId,
                'planetID' => $planetId
            ));
            $this->addRoutes($api->routes, $planetId, $charId);
        }

        return $api->cached_until;
    }

    private function addColony($colony, $charId)
    {
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
    
    private function addPins($pins, $planetId, $charId)
    {
        foreach ($pins as $pin) {
            $entity = new CharPlanetaryPin();
            $entity->setOwnerId($charId);
            $entity->setPlanetId($planetId);
            $entity->setPinId($pin->pinID);
            $entity->setTypeId($pin->typeID);
            $entity->setTypeName($pin->typeName);
            $entity->setSchematicId($pin->schematicID);
            $entity->setLastLaunchTime(new \DateTime($pin->lastLaunchTime));
            $entity->setCycleTime($pin->cycleTime);
            $entity->setQuantityPerCycle($pin->quantityPerCycle);
            $entity->setInstallTime(new \DateTime($pin->installTime));
            $entity->setExpiryTime(new \DateTime($pin->expiryTime));
            $entity->setContentTypeId($pin->contentTypeID);
            $entity->setContentTypeName($pin->contentTypeName);
            $entity->setContentQuantity($pin->contentQuantity);
            $entity->setLongitude($pin->longitude);
            $entity->setLatitude($pin->latitude);

            $this->entityManager->persist($entity);
        }
    }
    
    private function addLinks($links, $planetId, $charId)
    {
        foreach ($links as $link) {
            $entity = new CharPlanetaryLink();
            $entity->setOwnerId($charId);
            $entity->setPlanetId($planetId);
            $entity->setSourcePinId($link->sourcePinID);
            $entity->setDestinationPinId($link->destinationPinID);
            $entity->setLinkLevel($link->linkLevel);

            $this->entityManager->persist($entity);
        }
    }
    
    private function addRoutes($routes, $planetId, $charId)
    {
        foreach ($routes as $route) {
            $entity = new CharPlanetaryRoute();
            $entity->setOwnerId($charId);
            $entity->setPlanetId($planetId);
            $entity->setRouteId($route->routeID);
            $entity->setSourcePinId($route->sourcePinID);
            $entity->setDestinationPinId($route->destinationPinID);
            $entity->setContentTypeId($route->contentTypeID);
            $entity->setContentTypeName($route->contentTypeName);
            $entity->setQuantity($route->quantity);
            $entity->setWaypoint1($route->waypoint1);
            $entity->setWaypoint2($route->waypoint2);
            $entity->setWaypoint3($route->waypoint3);
            $entity->setWaypoint4($route->waypoint4);
            $entity->setWaypoint5($route->waypoint5);

            $this->entityManager->persist($entity);
        }
    }
}
