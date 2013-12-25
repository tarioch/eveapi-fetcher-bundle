<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\NoKey;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Component\EveApi\NoKeyApi;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\EveRefType;

/**
 * @DI\Service("tarioch.eveapi.eve.RefTypes")
 */
class EveRefTypesUpdater implements NoKeyApi
{
    private $entityManager;

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager")
     * })
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, Pheal $pheal)
    {
        $this->entityManager->createQuery('delete from TariochEveapiFetcherBundle:EveRefType')->execute();

        $api = $pheal->eveScope->RefTypes();
        foreach ($api->refTypes as $type) {
            $mapSov = new EveRefType($type->refTypeID, $type->refTypeName);
            $this->entityManager->persist($mapSov);
        }

        return $api->cached_until;
    }
}
