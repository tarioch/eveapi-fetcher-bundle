<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Char;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;
use Tarioch\EveapiFetcherBundle\Entity\CharSkillInTraining;

/**
 * @DI\Service("tarioch.eveapi.char.SkillInTraining")
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SkillInTrainingUpdater extends AbstractCharUpdater
{
    /**
     * @inheritdoc
     */
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal)
    {
        $charId = $call->getOwner()->getCharacterId();

        $api = $pheal->charScope->SkillInTraining(array('characterID' => $charId));

        $entity = new CharSkillInTraining($charId);
        $skillInTraining = $api->skillInTraining;
        $entity->setSkillInTraining($skillInTraining);
        if ($skillInTraining) {
            $entity->setTrainingStartTime(new \DateTime($api->trainingStartTime));
            $entity->setTrainingEndTime(new \DateTime($api->trainingEndTime));
            $entity->setTrainingTypeId($api->trainingTypeID);
            $entity->setTrainingStartSp($api->trainingStartSP);
            $entity->setTrainingDestinationSp($api->trainingDestinationSP);
            $entity->setTrainingToLevel($api->trainingToLevel);
        }

        $query = 'delete from TariochEveapiFetcherBundle:CharSkillInTraining c where c.characterId=:characterId';
        $this->entityManager
            ->createQuery($query)
            ->setParameter('characterId', $charId)
            ->execute();

        $this->entityManager->persist($entity);
        return $api->cached_until;
    }
}
