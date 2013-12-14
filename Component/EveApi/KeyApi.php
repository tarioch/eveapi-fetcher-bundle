<?php
namespace Tarioch\EveApiFetcherBundle\Component\EveApi;

use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\ApiKey;

interface KeyApi
{
    public function update(ApiCall $call, ApiKey $key, Pheal $pheal);
}
