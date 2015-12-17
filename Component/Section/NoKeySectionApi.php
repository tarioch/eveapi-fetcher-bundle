<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use JMS\DiExtraBundle\Annotation as DI;
use Evelabs\PhealNGBundle\Pheal\PhealFactory;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;

/**
 * @DI\Service(public=false)
 */
class NoKeySectionApi implements SectionApi
{
    private $phealFactory;
    private $specificApiFactory;

    /**
     * @DI\InjectParams({
     * "phealFactory" = @DI\Inject("evelabs.pheal_factory"),
     * "specificApiFactory" = @DI\Inject("tarioch.eveapi_fetcher_bundle.component.eve_api.specific_api_factory")
     * })
     */
    public function __construct(
        PhealFactory $phealFactory,
        SpecificApiFactory $specificApiFactory
    ) {
        $this->phealFactory = $phealFactory;
        $this->specificApiFactory = $specificApiFactory;
    }

    /**
     * @inheritdoc
     */
    public function update(ApiCall $call)
    {
        $pheal = $this->phealFactory->getPheal();
        $specificApi = $this->specificApiFactory->create($call->getApi());

        return new \DateTime($specificApi->update($call, $pheal));
    }
}
