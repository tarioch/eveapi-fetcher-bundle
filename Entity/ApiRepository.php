<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ApiRepository extends EntityRepository
{
    public function loadValidApis($accessMask)
    {
        $qb = $this->createQueryBuilder('a');
        $q = $qb->select('a')
            ->where(
                'BIT_AND(a.mask, :accessMask) = a.mask'
            )
            ->getQuery()
            ->setParameter('accessMask', $accessMask);

        return $q->getResult();
    }
}
