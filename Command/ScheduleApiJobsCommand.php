<?php
namespace Tarioch\EveapiFetcherBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;

class ScheduleApiJobsCommand extends ContainerAwareCommand
{
    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName('eve:api:schedule')->setDescription('Schedule needed api fetches');
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $gearman = $this->getContainer()->get('gearman');
        $entityManager = $this->getContainer()->get('doctrine.orm.eveapi_entity_manager');

        $newKeys = $entityManager->getRepository('TariochEveapiFetcherBundle:ApiKey')->loadKeysWithoutApiCall();
        if (!empty($newKeys)) {
            $api = $entityManager->getRepository('TariochEveapiFetcherBundle:Api')->loadApiKeyInfoApi();
            foreach ($newKeys as $key) {
                $entityManager->persist(new ApiCall($api, null, $key));
            }
            $entityManager->flush();
        }

        $calls = $entityManager->getRepository('TariochEveapiFetcherBundle:ApiCall')->loadReadyCalls();
        foreach ($calls as $call) {
            $api = $call->getApi();

            $worker = $api->getWorker();
            $job = $worker . '~apiUpdate';
            $callId = $call->getApiCallId();

            $gearman->doBackgroundJob($job, $callId, $callId);
        }
    }
}
