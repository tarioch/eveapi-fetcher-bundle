<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo;

use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service(id = "tarioch.eveapi.account.api_key_info.new_api_owners_factory", public = false)
 */
class NewApiOwnersFactory
{
    public function createOwners($section, $keyId, array $chars)
    {
        if ($section === 'account') {
            return array($keyId);
        } else {
            return $chars;
        }
    }
}
