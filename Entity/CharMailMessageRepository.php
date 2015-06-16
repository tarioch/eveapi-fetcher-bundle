<?php
namespace Tarioch\EveapiFetcherBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MailMessageRepository extends EntityRepository
{
    public function loadMessagesWithoutBody($ownerId, $lastCacheTime)
    {
        $qb = $this->createQueryBuilder('m');
        if ($lastCacheTime === null) {
            $q = $qb->select('m')
                ->where(
                    'm.body is null
                    and m.ownerId=:ownerId'
                )
                ->setParameter('ownerId', $ownerId)
                ->getQuery();
        } else {
            $q = $qb->select('m')
                ->where(
                    'm.body is null
                    and m.ownerId=:ownerId
                    and m.sentDate >= :retrievalDate'
                )
                ->setParameter('ownerId', $ownerId)
                ->setParameter('retrievalDate', $lastCacheTime->sub(new \DateInterval('P1D')))
                ->getQuery();
        }

        return $q->getResult();
    }
}
