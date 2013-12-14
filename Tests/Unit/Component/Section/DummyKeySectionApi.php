<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\Section;

use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Component\Section\AbstractKeySectionApi;
use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;

class DummyKeySectionApi extends AbstractKeySectionApi
{
    private $keyId;

    public function __construct(
        PhealFactory $phealFactory,
        EntityManager $entityManager,
        SpecificApiFactory $specificApiFactory,
        $keyId
    ) {
        parent::__construct($phealFactory, $entityManager, $specificApiFactory);
        $this->keyId = $keyId;
    }

    /**
     * @inheritdoc
     */
    protected function getKeyId(ApiCall $call)
    {
        return $this->keyId;
    }
}
