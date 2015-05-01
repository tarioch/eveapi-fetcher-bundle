<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Pheal\Core\Config;
use Pheal\Cache\ForcedFileStorage;

class AbstractFunctionalTestCase extends WebTestCase
{
    protected $entityManager;

    protected function get($dependency)
    {
        return $this->getContainer()->get($dependency);
    }

    public function setUp()
    {
        $this->runCommand('doctrine:database:drop', array('--connection' => 'eveapi', '--force' => true));
        $this->runCommand('doctrine:database:create', array('--connection' => 'eveapi', '--no-interaction' => true));
        $out = $this->runCommand('doctrine:migrations:migrate', array('--em' => 'eveapi', '--no-interaction' => true));
        $this->assertContains('++ migrated', $out, 'Doctrine Migrations Failed');
        $this->entityManager = $this->get('doctrine.orm.eveapi_entity_manager');
        
        $phealConfig = Config::getInstance();
        $phealConfig->cache = new ForcedFileStorage(__DIR__ . '/../Fixtures/Api/');
    }

    public function tearDown()
    {
        $this->runCommand('doctrine:database:drop', array('--connection' => 'eveapi', '--force' => true));
    }
}
