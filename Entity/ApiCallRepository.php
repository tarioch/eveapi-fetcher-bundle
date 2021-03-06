<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ApiCallRepository extends EntityRepository
{

    public function loadReadyCalls()
    {
        $qb = $this->createQueryBuilder('ac');
        $q = $qb->select('ac', 'a')
            ->join('ac.api', 'a')
            ->where(
                'ac.active = true
                and (ac.cachedUntil is null or ac.cachedUntil <= :date)
                and (ac.earliestNextCall is null or ac.earliestNextCall <= :date)'
            )
            ->setParameter('date', new \DateTime('now', new \DateTimeZone('UTC')))
            ->getQuery();

        return $q->getResult();
    }

    public function findNormalCallsByKey(ApiKey $key)
    {
        $qb = $this->createQueryBuilder('ac');
        $q = $qb->select('ac', 'a')
            ->join('ac.api', 'a')
            ->where(
                'ac.key = :key
                and a.mask is not null'
            )
            ->setParameter('key', $key)
            ->getQuery();

        return $q->getResult();
    }
}
