<?php
namespace Tarioch\EveapiFetcherBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ScheduleSpecificJobCommand extends ContainerAwareCommand
{
    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName('eve:api:debug:scheduleSpecificJob')
            ->setDescription('Schedule a specific api command for fetching')
            ->addArgument('callId', InputArgument::REQUIRED, 'ApiCallId');
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $gearman = $this->getContainer()->get('gearman');
        $entityManager = $this->getContainer()->get('doctrine.orm.eveapi_entity_manager');

        $callId = $input->getArgument('callId');
        $call = $entityManager->find('TariochEveapiFetcherBundle:ApiCall', $callId);
        $api = $call->getApi();

        $worker = $api->getWorker();
        $job = $worker . '~apiUpdate';
        $callId = $call->getApiCallId();

        $gearman->doBackgroundJob($job, $callId, $callId);
        $output->writeln('Scheduled ' . $callId . ': ' . $worker . ' ' . $api->getSection() . $api->getName());
    }
}
