<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\EveApi\Account\ApiKeyInfo;

use Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo\NewApiOwnersFactory;

class NewApiOwnersFactoryTest extends \PHPUnit_Framework_TestCase
{
    const KEY_ID = 'KEY_ID';
    const CHAR = 'CHAR';

    private $factory;

    public function testCreateAccount()
    {
        $actual = $this->factory->createOwners('account', self::KEY_ID, array(self::CHAR));

        $this->assertEquals(array(self::KEY_ID), $actual);
    }

    public function testCreateOther()
    {
        $actual = $this->factory->createOwners('char', self::KEY_ID, array(self::CHAR));

        $this->assertEquals(array(self::CHAR), $actual);
    }

    protected function setUp()
    {
        $this->factory = new NewApiOwnersFactory();
    }
}
