<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Entity;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCallRepository;

class ApiCallRepositoryTest extends WebTestCase
{
    private $repository;

    public function testLoadReadyCalls()
    {
        $this->repository->loadReadyCalls();
    }

    public function setUp()
    {
        $this->runCommand('doctrine:database:create', array('--connection' => 'eveapi'));
	$this->runCommand('doctrine:migrations:migrate', array('--em' => 'eveapi', '--no-interaction' => true));
        $entityManager = $this->getContainer()->get('doctrine.orm.eveapi_entity_manager');
        $this->repository = $entityManager->getRepository('TariochEveapiFetcherBundle:ApiCall');
    }

    public function tearDown()
    {
	$this->runCommand('doctrine:database:drop', array('--connection' => 'eveapi', '--no-interaction' => true, '--force' => true));
    }
}
