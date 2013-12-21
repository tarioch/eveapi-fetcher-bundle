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
}
