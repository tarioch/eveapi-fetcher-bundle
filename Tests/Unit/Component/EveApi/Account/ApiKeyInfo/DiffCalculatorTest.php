<?php
namespace Tarioch\EveapiFetcherBundle\Tests\Unit\Component\EveApi\Account\ApiKeyInfo;

use Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo\DiffCalculator;

class DiffCalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    public function testBothEmpty()
    {
        $this->assertEquals(array(), $this->calculator->getOnlyInSource(array(), array()));
    }

    public function testFirstEmpty()
    {
        $source = array();
        $compare = array('key1' => array(1 => 'c1'));
        $expected = array();

        $actual = $this->calculator->getOnlyInSource($source, $compare);

        $this->assertEquals($expected, $actual);
    }

    public function testSecondEmpty()
    {
        $source = array('key1' => array(1 => 's1'));
        $compare = array();
        $expected = array('key1' => array(1 => 's1'));

        $actual = $this->calculator->getOnlyInSource($source, $compare);

        $this->assertEquals($expected, $actual);
    }

    public function testKeyDifference()
    {
        $source = array('key1' => array(1 => 's1'));
        $compare = array('key2' => array(2 => 'c2'));
        $expected = array('key1' => array(1 => 's1'));

        $actual = $this->calculator->getOnlyInSource($source, $compare);

        $this->assertEquals($expected, $actual);
    }

    public function testOwnerDifference()
    {
        $source = array('key1' => array(1 => 's1'));
        $compare = array('key1' => array(2 => 'c2'));
        $expected = array('key1' => array(1 => 's1'));

        $actual = $this->calculator->getOnlyInSource($source, $compare);

        $this->assertEquals($expected, $actual);
    }

    protected function setUp()
    {
        $this->calculator = new DiffCalculator();
    }
}
