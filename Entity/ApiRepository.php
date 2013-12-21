<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ApiRepository extends EntityRepository
{
    public function loadValidApis($accessMask, $keyType)
    {
        if ($keyType == 'Corporation') {
            $corpRestriction = 'a.section = :corpSection';
        } else {
            $corpRestriction = 'a.section <> :corpSection';
        }

        $qb = $this->createQueryBuilder('a');
        $q = $qb->select('a')
            ->where(
                'BIT_AND(a.mask, :accessMask) = a.mask
                and ' . $corpRestriction
            )
            ->getQuery()
            ->setParameter('accessMask', $accessMask)
            ->setParameter('corpSection', 'corp');

        return $q->getResult();
    }

    public function loadApiKeyInfoApi()
    {
        $qb = $this->createQueryBuilder('a');
        $q = $qb->select('a')
            ->where(
                'a.section = :section and a.name = :name'
            )
            ->setParameter('section', 'account')
            ->setParameter('name', 'APIKeyInfo')
            ->getQuery();

        return $q->getSingleResult();
    }
}
