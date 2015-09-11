<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ApiKeyRepository extends EntityRepository
{

    public function loadKeysWithoutApiCall()
    {
        $qb = $this->createQueryBuilder('ak');
        $q = $qb->select('ak')
            ->where('ak.apiCalls IS EMPTY')
            ->getQuery();

        return $q->getResult();
    }
    
    public function readKeyForCorp($corpId)
    {
        $qb = $this->createQueryBuilder('ak');
        $q = $qb->select('ak')
            ->join('Tarioch\EveapiFetcherBundle\Entity\AccountAPIKeyInfo', 'aki', 'WITH', '1=1')
            ->join('Tarioch\EveapiFetcherBundle\Entity\AccountCharacter', 'ac', 'WITH', '1=1')
            ->where('aki.key = ak AND aki.type = :keyType AND ac.key = ak AND ac.corporationId = :corpId')
            ->getQuery()
            ->setMaxResults(1)
            ->setParameter('keyType', 'Corporation')
            ->setParameter('corpId', $corpId);
            
        return $q->getOneOrNullResult();
    }

    public function readKeyForChar($charId)
    {
        $qb = $this->createQueryBuilder('ak');
        $q = $qb->select('ak')
            ->join('Tarioch\EveapiFetcherBundle\Entity\AccountAPIKeyInfo', 'aki', 'WITH', '1=1')
            ->join('Tarioch\EveapiFetcherBundle\Entity\AccountCharacter', 'ac', 'WITH', '1=1')
            ->where('aki.key = ak AND aki.type IN(:keyTypes) AND ac.key = ak AND ac.characterId = :charId')
            ->getQuery()
            ->setMaxResults(1)
            ->setParameter('keyTypes', array('Account', 'Character'))
            ->setParameter('charId', $charId);

        return $q->getOneOrNullResult();
    }
}
