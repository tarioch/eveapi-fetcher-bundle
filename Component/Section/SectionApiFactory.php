<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\Api;

/**
 * @DI\Service(public=false)
 */
class SectionApiFactory
{
    private $accountSectionUpdater;
    private $noKeySectionUpdater;

    /**
     * @DI\InjectParams({
     * "accountSectionUpdater" = @DI\Inject("tarioch.eveapi_fetcher_bundle.component.section.account_section_api"),
     * "noKeySectionUpdater" = @DI\Inject("tarioch.eveapi_fetcher_bundle.component.section.no_key_section_api")
     * })
     */
    public function __construct(AccountSectionApi $accountSectionUpdater, NoKeySectionApi $noKeySectionUpdater)
    {
        $this->accountSectionUpdater = $accountSectionUpdater;
        $this->noKeySectionUpdater = $noKeySectionUpdater;
    }

    /**
     *
     * @param ApiCall $call
     * @return SectionUpdater
     */
    public function create(ApiCall $call)
    {
        $section = $call->getApi()->getSection();
        switch ($section) {
            case 'account':
                return $this->accountSectionUpdater;
            case 'server':
            case 'eve':
            case 'map':
                return $this->noKeySectionUpdater;
            case 'char':
            case 'corp':
            default:
                throw new \InvalidArgumentException('Unsupported section ' . $section);
        }
    }
}
