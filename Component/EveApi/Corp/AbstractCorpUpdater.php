<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Corp;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Component\EveApi\KeyApi;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CorpAccountBalance;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;

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
