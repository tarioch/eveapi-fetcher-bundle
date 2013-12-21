<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Entity;

use Tarioch\EveapiFetcherBundle\Entity\ApiCallRepository;
use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;

class ApiCallRepositoryTest extends AbstractFunctionalTestCase
{
    private $repository;

    public function testLoadReadyCalls()
    {
        $this->repository->loadReadyCalls();
    }

    public function testFindNormalCallsByKey()
    {
        $key = new ApiKey('123', 'abc');
        $this->repository->findNormalCallsByKey($key);
    }

    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:ApiCall');
    }
}
