<?php
namespace Tarioch\EveapiFetcherBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class ScheduleApiJobsCommand extends ContainerAwareCommand 
{
    protected function configure()
    {
        $this->setName('eve:api:schedule')->setDescription('Schedule needed api fetches');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $gearman = $this->getContainer()->get('gearman');
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');

        $calls = $entityManager->getRepository('TariochEveapiFetcherBundle:ApiCall')->loadReadyCalls();
        foreach ($calls as $call) {
            $api = $call->getApi();

            $job = $api->getWorker() . '~apiUpdate';
            $callId = $call->getApiCallId();

            $gearman->doBackgroundJob($job, $callId, $callId);
            $output->writeln('Scheduled ' . $callId . ': ' . $api->getWorker() . ' ' . $api->getSection() . $api->getName());
        }
    }
}
