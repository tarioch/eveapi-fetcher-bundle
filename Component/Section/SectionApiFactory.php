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
    private static $keySections = array('account', 'char', 'corp');

    private $keySectionApi;
    private $noKeySectionApi;

    /**
     * @DI\InjectParams({
     * "keySectionApi" = @DI\Inject("tarioch.eveapi_fetcher_bundle.component.section.key_section_api"),
     * "noKeySectionApi" = @DI\Inject("tarioch.eveapi_fetcher_bundle.component.section.no_key_section_api")
     * })
     */
    public function __construct(KeySectionApi $keySectionApi, NoKeySectionApi $noKeySectionApi)
    {
        $this->keySectionApi = $keySectionApi;
        $this->noKeySectionApi = $noKeySectionApi;
    }

    /**
     *
     * @param ApiCall $call
     * @return SectionApi
     */
    public function create(ApiCall $call)
    {
        $section = $call->getApi()->getSection();
        if (in_array($section, self::$keySections)) {
            return $this->keySectionApi;
        } else {
            return $this->noKeySectionApi;
        }
    }
}
