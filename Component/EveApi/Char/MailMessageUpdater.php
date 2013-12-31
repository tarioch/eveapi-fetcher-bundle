<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharMailMessage;

/**
 * @DI\Service("tarioch.eveapi.char.MailMessages")
 */
class MailMessageUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();

        $api = $pheal->charScope->MailMessages(array('characterID' => $charId));

        foreach ($api->messages as $message) {
            $messageId = $message->messageID;

            $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharMailMessage');
            $entity = $repo->findBy(array('messageId' => $messageId, 'ownerId' => $charId));
            if ($entity == null) {
                $entity = new CharMailMessage($messageId, $charId);
                $this->entityManager->persist($entity);

                $entity->setSenderId($message->senderID);
                $entity->setSentDate(new \DateTime($message->sentDate));
                $entity->setTitle($message->title);
                $entity->setToCharacterIds($message->toCharacterIDs);
                $entity->setToCorpOrAllianceId($message->toCorpOrAllianceID);
                $entity->setToListId($message->toListID);
            }
        }

        return $api->cached_until;
    }
}
