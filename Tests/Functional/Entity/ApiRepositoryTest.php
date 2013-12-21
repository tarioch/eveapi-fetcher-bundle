<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Entity;

use Tarioch\EveapiFetcherBundle\Entity\ApiCallRepository;
use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;

class ApiRepositoryTest extends AbstractFunctionalTestCase
{
    private $repository;

    public function testLoadValidApisFullAccessMask()
    {
        $this->assertNotEmpty($this->repository->loadValidApis(268435455));
    }

    public function testLoadValidApisEmptyAccessMaskMask()
    {
        $this->assertEmpty($this->repository->loadValidApis(0));
    }

    public function testLoadApiKeyInfoApi()
    {
        $this->assertNotNull($this->repository->loadApiKeyInfoApi());
    }

    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:Api');
    }
}
