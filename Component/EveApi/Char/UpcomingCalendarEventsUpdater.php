<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharUpcomingEvent;

/**
 * @DI\Service("tarioch.eveapi.char.UpcomingCalendarEvents")
 */
class UpcomingCalendarEventsUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $charId = $call->getOwner()->getCharacterId();
        $api = $pheal->charScope->UpcomingCalendarEvents(array('characterID' => $charId));

        foreach ($api->upcomingEvents as $event) {
            $eventId = $event->eventID;
            $entity = $this->loadOrCreate($charId, $eventId);

            $entity->setEventOwnerId($event->ownerID);
            $entity->setEventOwnerName($event->ownerName);
            $entity->setEventDate(new \DateTime($event->eventDate));
            $entity->setEventTitle($event->eventTitle);
            $entity->setDuration($event->duration);
            $entity->setImportance(filter_var($event->importance, FILTER_VALIDATE_BOOLEAN));
            $entity->setEventText($event->eventText);
            $entity->setResponse($event->response);
            $this->entityManager->flush($entity);
        }

        return $api->cached_until;
    }

    private function loadOrCreate($charId, $eventId)
    {
        $repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharUpcomingEvent');
        $entity = $repository->findOneBy(array('ownerId' => $charId, 'eventId' => $eventId));
        if ($entity === null) {
            $entity = new CharUpcomingEvent($eventId, $charId);
            $this->entityManager->persist($entity);
        }

        return $entity;
    }
}
