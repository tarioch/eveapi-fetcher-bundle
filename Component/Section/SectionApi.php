<?php
namespace Tarioch\EveapiFetcherBundle\Component\Section;

use Tarioch\EveapiFetcherBundle\Entity\ApiCall;

interface SectionApi
{
    /**
     * @param ApiCall $call
     * @return cached until
     */
    public function update(ApiCall $call);
}
