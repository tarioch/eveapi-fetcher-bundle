<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharAsset;

/**
 * @DI\Service("tarioch.eveapi.char.AssetList")
 */
class AssetUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $charId = $owner->getCharacterId();
        $api = $pheal->charScope->AssetList(array('characterID' => $charId));

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CharAsset c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $charId)
            ->execute();

        $this->addAssets($api->assets, 0, 0, $charId);

        return $api->cached_until;
    }

    private function addAssets($assets, $lvl, $count, $charId, $parentLocationId = null)
    {
        foreach ($assets as $asset) {
            if (isset($asset->locationID)) {
                $locationId = $asset->locationID;
            } else {
                $locationId = $parentLocationId;
            }

            $entity = new CharAsset();
            $entity->setOwnerId($charId);
            $entity->setLocationId($locationId);
            $entity->setItemId($asset->itemID);
            $entity->setTypeId($asset->typeID);
            $entity->setQuantity($asset->quantity);
            if (isset($asset->rawQuantity)) {
                $entity->setRawQuantity($asset->rawQuantity);
            }
            $entity->setFlag($asset->flag);
            $entity->setSingleton(filter_var($asset->singleton, FILTER_VALIDATE_BOOLEAN));

            // Nested Set Algorithm: http://en.wikipedia.org/wiki/Nested_set_model
            $entity->setLevel($lvl);
            $entity->setLeft($count++);
            if (!empty($asset->contents)) {
                $count = $this->addAssets($asset->contents, $lvl + 1, $count, $charId, $locationId);
            }
            $entity->setRight($count++);

            $this->entityManager->persist($entity);
        }

        return $count;
    }
}
