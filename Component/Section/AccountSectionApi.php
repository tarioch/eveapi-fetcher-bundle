<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;
use Tario\EveToolBundle\Component\User\Key;
use Pheal\Pheal;
use Pheal\Exceptions\PhealException;

/**
 * @DI\Service("tarioch.eveapi.section.account")
 */
class AccountSectionApi extends AbstractKeySectionApi
{
    /**
     * @DI\InjectParams({
     * "phealFactory" = @DI\Inject("tarioch.pheal.factory"),
     * "entityManager" = @DI\Inject("doctrine.orm.eveapi_entity_manager"),
     * "specificApiFactory" = @DI\Inject("tarioch.eveapi.specificapifactory")
     * })
     */
    public function __construct(
        PhealFactory $phealFactory,
        EntityManager $entityManager,
        SpecificApiFactory $specificApiFactory
    ) {
        parent::__construct($phealFactory, $entityManager, $specificApiFactory);
    }

    /**
     * @inheritdoc
     */
    protected function getKeyId(ApiCall $call)
    {
        return $call->getOwnerId();
    }
}
