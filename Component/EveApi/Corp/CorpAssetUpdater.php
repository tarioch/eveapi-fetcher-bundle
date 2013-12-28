<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpAsset;

/**
 * @DI\Service("tarioch.eveapi.corp.AssetList")
 */
class CorpAssetUpdater extends AbstractCorpUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $owner = $call->getOwner();
        $corpId = $owner->getCorporationId();
        $api = $pheal->corpScope->AssetList();

        $this->entityManager
            ->createQuery('delete from TariochEveapiFetcherBundle:CorpAsset c where c.ownerId=:ownerId')
            ->setParameter('ownerId', $corpId)
            ->execute();

        $this->addAssets($api->assets, 0, 0, $corpId);

        return $api->cached_until;
    }

    private function addAssets($assets, $lvl, $count, $corpId)
    {
        foreach ($assets as $asset) {
            $entity = new CorpAsset();
            $entity->setOwnerId($corpId);
            $entity->setItemId($asset->itemID);
            if (isset($asset->locationID)) {
                $entity->setLocationId($asset->locationID);
            }
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
                $count = $this->addAssets($asset->contents, $lvl + 1, $count, $corpId);
            }
            $entity->setRight($count++);

            $this->entityManager->persist($entity);
        }

        return $count;
    }
}
