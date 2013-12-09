<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tarioch\EveapiFetcherBundle\Command\ScheduleApiJobsCommand;
use Mockery as m;

class ScheduleApiJobsCommandTest extends \PHPUnit_Framework_TestCase
{
    private $container;
    private $gearman;
    private $entityManager;
    private $apiCallRepository;
    private $apiCall1;
    private $api1;

    private $command;

    public function testExecute()
    {
        $worker = 'worker';
        $apiCallId1 = 'apiCallId1';
        $section1 = 'section1';
        $name1 = 'name1';

        $this->container->shouldReceive('get')
            ->with('gearman')
            ->andReturn($this->gearman);
        $this->container->shouldReceive('get')
            ->with('doctrine.orm.eveapi_entity_manager')
            ->andReturn($this->entityManager);
        $this->entityManager->shouldReceive('getRepository')
            ->with('TariochEveapiFetcherBundle:ApiCall')
            ->andReturn($this->apiCallRepository);
        $this->apiCallRepository->shouldReceive('loadReadyCalls')
            ->andReturn(array($this->apiCall1));
        $this->apiCall1->shouldReceive('getApi')->andReturn($this->api1);
        $this->api1->shouldReceive('getWorker')->andReturn($worker);
        $this->apiCall1->shouldReceive('getApiCallId')->andReturn($apiCallId1);
        $this->gearman->shouldReceive('doBackgroundJob')->with($worker . '~apiUpdate', $apiCallId1, $apiCallId1);
        $this->api1->shouldReceive('getSection')->andReturn($section1);
        $this->api1->shouldReceive('getName')->andReturn($name1);

        $commandTester = new CommandTester($this->command);
        $commandTester->execute(array('command' => $this->command->getName()));

        $expectedOutput = 'Scheduled ' . $apiCallId1 . ': worker ' . $section1 . $name1 . "\n";
        $this->assertEquals($expectedOutput, $commandTester->getDisplay());
    }

    public function setUp()
    {
        $this->container = m::mock('Symfony\Component\DependencyInjection\Container');
        $this->gearman = m::mock('Mmoreram\GearmanBundle\Service\GearmanClient');
        $this->entityManager = m::mock('Doctrine\ORM\EntityManager');
        $this->apiCallRepository = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCallRepository');
        $this->apiCall1 = m::mock('Tarioch\EveapiFetcherBundle\Entity\ApiCall');
        $this->api1 = m::mock('Tarioch\EveapiFetcherBundle\Entity\Api');

        $application = new Application();
        $application->add(new ScheduleApiJobsCommand());

        $this->command = $application->find('eve:api:schedule');
        $this->command->setContainer($this->container);
    }
}
