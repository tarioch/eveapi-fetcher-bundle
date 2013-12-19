<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\Api;

/**
 * @DI\Service(id = "tarioch.eveapi.account.api_key_info.new_api_owners_factory", public = false)
 */
class NewApiOwnersFactory
{
    public function createOwners($section, $keyId, array $chars, array $corps)
    {
        if ($section === 'account') {
            return array($keyId);
        } elseif ($section === 'char') {
            return $chars;
        } elseif ($section === 'corp') {
            return $corps;
        } else {
            throw new \InvalidArgumentException('Invalid section ' . $section);
        }
    }
}
