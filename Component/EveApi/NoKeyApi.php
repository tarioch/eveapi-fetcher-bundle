<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi;

use Tarioch\EveapiFetcherBundle\Entity\ApiCall;
use Pheal\Pheal;

interface NoKeyApi
{
    public function update(ApiCall $call, Pheal $pheal);
}
