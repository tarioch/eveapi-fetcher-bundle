<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Exceptions\PhealException;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Stopwatch\Stopwatch;
use Tarioch\EveapiFetcherBundle\Entity\Api;

/**
 * @DI\Service("tarioch.eveapi.section.sectionapifactory")
 */
class SectionApiFactory
{
    private $accountSectionUpdater;
    private $noKeySectionUpdater;

    /**
     * @DI\InjectParams({
     * "accountSectionUpdater" = @DI\Inject("tarioch.eveapi.section.account"),
     * "noKeySectionUpdater" = @DI\Inject("tarioch.eveapi.section.nokey")
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
