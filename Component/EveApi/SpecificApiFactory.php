<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @DI\Service("tarioch.eveapi.specificapifactory")
 */
class SpecificApiFactory
{
    private $container;

    /**
     * @DI\InjectParams({
     * "container" = @DI\Inject("service_container")
     * })
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function create(Api $api)
    {
        return $this->container->get('tarioch.eveapi.' . $api->getSection() . '.' . $api->getName());
    }
}
