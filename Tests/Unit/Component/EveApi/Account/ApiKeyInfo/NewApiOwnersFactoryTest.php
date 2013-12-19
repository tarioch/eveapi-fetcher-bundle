<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\EveApi\Account\ApiKeyInfo;

use Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo\NewApiOwnersFactory;

class NewApiOwnersFactoryTest extends \PHPUnit_Framework_TestCase
{
    const KEY_ID = 'KEY_ID';
    const CHAR = 'CHAR';
    const CORP = 'CORP';

    private $factory;

    public function testCreateAccount()
    {
        $actual = $this->factory->createOwners('account', self::KEY_ID, array(self::CHAR), array(self::CORP));

        $this->assertEquals(array(self::KEY_ID), $actual);
    }

    public function testCreateChar()
    {
        $actual = $this->factory->createOwners('char', self::KEY_ID, array(self::CHAR), array(self::CORP));

        $this->assertEquals(array(self::CHAR), $actual);
    }

    public function testCreateCorp()
    {
        $actual = $this->factory->createOwners('corp', self::KEY_ID, array(self::CHAR), array(self::CORP));

        $this->assertEquals(array(self::CORP), $actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateOther()
    {
        $this->factory->createOwners('foo', self::KEY_ID, array(self::CHAR), array(self::CORP));
    }

    protected function setUp()
    {
        $this->factory = new NewApiOwnersFactory();
    }
}
