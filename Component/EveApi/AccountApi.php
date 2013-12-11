<?php
namespace Tarioch\EveApiFetcherBundle\Component\EveApi;

use Pheal\Pheal;
use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Tarioch\EveapiFetcherBundle\Entity\Key;

interface AccountApi
{
    public function update(ApiCall $call, Key $key, Pheal $pheal);
}
