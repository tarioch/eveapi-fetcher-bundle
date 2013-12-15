<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Entity;

use Tarioch\EveapiFetcherBundle\Entity\ApiCallRepository;
use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;

class ApiCallRepositoryTest extends AbstractFunctionalTestCase
{
    private $repository;

    public function testLoadReadyCalls()
    {
        $this->repository->loadReadyCalls();
    }

    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->entityManager->getRepository('TariochEveapiFetcherBundle:ApiCall');
    }
}
