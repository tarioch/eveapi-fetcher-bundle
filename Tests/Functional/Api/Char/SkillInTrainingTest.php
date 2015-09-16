<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Functional\Api\Corp;

use Tarioch\EveapiFetcherBundle\Tests\Functional\AbstractFunctionalTestCase;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\AccountCharacter;
use Tarioch\EveapiFetcherBundle\Component\EveApi\Char\SkillInTrainingUpdater;
use Pheal\Pheal;

class SkillInTrainingTest extends AbstractFunctionalTestCase
{
    private $api;
    private $pheal;

    public function testUpdate()
    {
        $key = new ApiKey(123, 'dummyvcode');
        $owner = new AccountCharacter($key, 11);
        $call = new ApiCall('dummyapi', $owner, $key);
        $this->api->update($call, $key, $this->pheal);
        $this->entityManager->flush();

        $repo = $this->entityManager->getRepository('TariochEveapiFetcherBundle:CharSkillInTraining');
        $entity = $repo->findOneByCharacterId(11);

        $this->assertEquals(true, $entity->isSkillInTraining());
        $this->assertEquals(new \DateTime('2015-05-05 05:05:05'), $entity->getTrainingStartTime());
        $this->assertEquals(new \DateTime('2015-01-01 01:01:01'), $entity->getTrainingEndTime());
        $this->assertEquals(22, $entity->getTrainingTypeId());
        $this->assertEquals(33, $entity->getTrainingStartSp());
        $this->assertEquals(44, $entity->getTrainingDestinationSp());
        $this->assertEquals(5, $entity->getTrainingToLevel());
    }

    public function setUp()
    {
        parent::setUp();
        $this->api = new SkillInTrainingUpdater($this->entityManager);
        $this->pheal = new Pheal(123, 'dummyvcode');
    }
}
