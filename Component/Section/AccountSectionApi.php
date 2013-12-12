<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;

/**
 * @DI\Service("tarioch.eveapi.section.account")
 */
class AccountSectionApi implements SectionApi
{
    private $phealFactory;
    private $entityManager;
    private $specificApiFactory;

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
        $this->phealFactory = $phealFactory;
        $this->entityManager = $entityManager;
        $this->specificApiFactory = $specificApiFactory;
    }

    /**
     * @inheritdoc
     */
    public function update(ApiCall $call)
    {
        $keyId = $call->getOwnerId();
        $key = $this->entityManager->getRepository('TariochEveapiFetcherBundle:ApiKey')->find($keyId);
        if ($key->isActive()) {
            $pheal = $this->phealFactory->createEveOnline($key->getKeyId(), $key->getVcode());
            $updateService = $this->getUpdateService($call);

            return $updateService->update($call, $key, $pheal);
        } else {
            $call->setActive(false);

            return $call->getCachedUntil();
        }
    }
}
