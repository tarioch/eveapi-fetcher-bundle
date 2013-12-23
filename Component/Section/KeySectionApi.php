<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;
use Pheal\Exceptions\PhealException;

/**
 * @DI\Service(public=false)
 */
class KeySectionApi implements SectionApi
{
    const ERROR_MAX = 5;

    private $phealFactory;
    private $specificApiFactory;

    /**
     * @DI\InjectParams({
     * "phealFactory" = @DI\Inject("tarioch.pheal.factory"),
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
        $key = $call->getKey();
        if ($key->isActive()) {
            $pheal = $this->phealFactory->createEveOnline($key->getKeyId(), $key->getVcode());

            try {
                $updateService = $this->specificApiFactory->create($call->getApi());
                $cachedUntil = $updateService->update($call, $key, $pheal);
                $key->clearErrorCount();
                return new \DateTime($cachedUntil);
            } catch (PhealException $e) {
                $key->increaseErrorCount();
                if ($key->getErrorCount() > self::ERROR_MAX) {
                    $key->setActive(false);
                }
                throw $e;
            }
        } else {
            $call->setActive(false);
            return $call->getCachedUntil();
        }
    }
}
