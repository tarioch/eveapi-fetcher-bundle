<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class AbstractFunctionalTestCase extends WebTestCase
{
    protected $entityManager;

    public function setUp()
    {
        $this->runCommand('doctrine:database:create', array('--connection' => 'eveapi'));
        $this->runCommand('doctrine:migrations:migrate', array('--em' => 'eveapi', '--no-interaction' => true));
        $this->entityManager = $this->getContainer()->get('doctrine.orm.eveapi_entity_manager');
    }

    public function tearDown()
    {
        $this->runCommand('doctrine:database:drop', array('--connection' => 'eveapi', '--force' => true));
    }
}
