<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CharMailMessageRepository extends EntityRepository
{
    public function loadMessagesWithoutBody($ownerId)
    {
        $qb = $this->createQueryBuilder('m');
        $q = $qb->select('m')
            ->where(
                'm.body is null
                and m.ownerId=:ownerId'
            )
            ->setParameter('ownerId', $ownerId)
            ->getQuery();

        return $q->getResult();
    }
}
