<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;

/**
 * @DI\Service("tarioch.eveapi.char.MailBodies")
 */
class MailMessageBodyUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();

        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharMailMessage');
        $messages = $repo->loadMessagesWithoutBody($charId);

        $messageIds = array();
        foreach ($messages as $message) {
            $messageIds[$message->getMessageId()] = $message;
        }

        if (!empty($messageIds)) {
            $ids = join(',', array_keys($messageIds));
            $api = $pheal->charScope->MailBodies(array('characterID' => $charId, 'ids' => $ids));

            foreach ($api->messages as $message) {
                $messageId = $message->messageID;
                $entity = $messageIds[$messageId];
                $entity->setBody((string)$message);
            }

            return $api->cached_until;
        } else {
            return $call->getCachedUntil()->format('Y-m-d H:i:s');
        }

    }
}
