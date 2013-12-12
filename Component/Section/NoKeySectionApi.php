<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Exceptions\PhealException;
use Symfony\Component\DependencyInjection\Container;
use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;
use Doctrine\ORM\Mapping\InheritanceType;

/**
 * @DI\Service("tarioch.eveapi.section.nokey")
 */
class NoKeySectionApi implements SectionApi
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
        $pheal = $this->phealFactory->createEveOnline();
        $specificApi = $this->specificApiFactory->create($call->getApi());

        return $specificApi->update($call, $pheal);
    }
}
