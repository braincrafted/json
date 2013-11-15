<?php
/**
 * This file is part of Braincrafted\Json.
 *
 * (c) 2013 Florian Eckerstorfer
 */

namespace Braincrafted\Json;

/**
 * JsonTest
 *
 * @category  Tests
 * @package   BraincraftedJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2013 Florian Eckerstorfer
 * @license   http://opensource.org/licenses/MIT The MIT License
 * @group     unit
 */
class JsonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests the <code>encode()</code> method.
     *
     * @covers Braincrafted\Json\Json::encode()
     */
    public function testEncode()
    {
        $value = array('var1' => 'foo', 'var2' => 42);
        $this->assertEquals(json_encode($value), Json::encode($value));
    }

    /**
     * Tests the <code>decode()</code> method.
     *
     * @covers Braincrafted\Json\Json::decode()
     * @covers Braincrafted\Json\Json::getError()
     */
    public function testDecode()
    {
        $json = '{"var1":"foo","var2":42}';
        $this->assertEquals(json_decode($json), Json::decode($json));
    }

    /**
     * Tests the <code>decode()</code> method with an excpetion.
     *
     * @covers Braincrafted\Json\Json::decode()
     * @covers Braincrafted\Json\Json::getError()
     *
     * @expectedException Braincrafted\Json\JsonDecodeException
     */
    public function testDecode_WithError()
    {
        Json::decode('{"var1":"foo","var2":42');
    }
}
