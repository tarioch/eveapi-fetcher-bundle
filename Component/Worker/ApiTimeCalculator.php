<?php
namespace Tarioch\EveapiFetcherBundle\Component\Worker;

use JMS\DiExtraBundle\Annotation as DI;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;

/**
 * @DI\Service(public=false)
 */
class ApiTimeCalculator
{
    /**
     * @param ApiCall|null $call
     * @return boolean
     */
    public function isCallStillValid(ApiCall $call = null)
    {
        $now = new \DateTime('now', new \DateTimeZone('UTC'));
        return $call != null && $call->getCachedUntil() < $now && $call->getEarliestNextCall() < $now;
    }

    public function calculateEarliestNextCall(ApiCall $call)
    {
        $minutesToEarliestNextCall = $call->getApi()->getCallInterval() * (1 + $call->getErrorCount());
        $earliestNextCall = new \DateTime('now', new \DateTimeZone('UTC'));
        $earliestNextCall->add(new \DateInterval('PT' . $minutesToEarliestNextCall . 'M'));

        return $earliestNextCall;
    }
}
