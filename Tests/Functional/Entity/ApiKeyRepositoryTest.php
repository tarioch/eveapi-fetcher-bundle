<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Entity;

use Tarioch\EveapiFetcherBundle\Entity\ApiCallRepository;
use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;

class ApiKeyRepositoryTest extends AbstractFunctionalTestCase
{
    private $repository;

    public function testLoadReadyCalls()
    {
        $this->repository->loadKeysWithoutApiCall();
    }

    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:ApiKey');
    }
}
