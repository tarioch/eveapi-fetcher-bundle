<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveApiFetcherBundle\Component\EveApi\KeyApi;

abstract class AbstractCorpUpdater implements KeyApi
{
    protected $entityManager;

    /**
     * @DI\InjectParams({
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager")
     * })
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function getCorpId($charId)
    {
        $charRepo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:AccountCharacter');
        $char = $charRepo->findOneByCharacterId($charId);
        return $char->getCorporationId();
    }
}
