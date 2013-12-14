<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use Tarioch\PhealBundle\DependencyInjection\PhealFactory;
use Doctrine\ORM\EntityManager;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\Api;
use Tarioch\EveapiFetcherBundle\Component\EveApi\SpecificApiFactory;
use Pheal\Exceptions\PhealException;

abstract class AbstractKeySectionApi implements SectionApi
{
    const ERROR_MAX = 5;

    protected $entityManager;
    private $phealFactory;
    private $specificApiFactory;

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
        $keyId = $this->getKeyId($call);
        $key = $this->entityManager->find('TariochEveapiFetcherBundle:ApiKey', $keyId);
        if ($key->isActive()) {
            $pheal = $this->phealFactory->createEveOnline($key->getKeyId(), $key->getVcode());

            try {
                $updateService = $this->specificApiFactory->create($call->getApi());
                $cachedUntil = $updateService->update($call, $key, $pheal);
                $key->clearErrorCount();
                return $cachedUntil;
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

    abstract protected function getKeyId(ApiCall $call);
}
