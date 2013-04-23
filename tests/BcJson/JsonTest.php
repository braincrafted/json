<?php
/**
 * This file is part of BcJson.
 *
 * (c) 2013 Florian Eckerstorfer
 */

namespace BcJson;

/**
 * JsonTest
 *
 * @category  Tests
 * @package   BcJson
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
     * @covers BcJson\Json::encode()
     */
    public function testEncode()
    {
        $value = array('var1' => 'foo', 'var2' => 42);
        $this->assertEquals(json_encode($value), Json::encode($value));
    }

    /**
     * Tests the <code>decode()</code> method.
     *
     * @covers BcJson\Json::decode()
     * @covers BcJson\Json::getError()
     */
    public function testDecode()
    {
        $json = '{"var1":"foo","var2":42}';
        $this->assertEquals(json_decode($json), Json::decode($json));
    }

    /**
     * Tests the <code>decode()</code> method with an excpetion.
     *
     * @covers BcJson\Json::decode()
     * @covers BcJson\Json::getError()
     *
     * @expectedException BcJson\JsonDecodeException
     */
    public function testDecode_WithError()
    {
        Json::decode('{"var1":"foo","var2":42');
    }
}
