<?php
/**
 * This file is part of BraincraftedJson.
 *
 * (c) 2013 Florian Eckerstorfer
 */

namespace Braincrafted\Json;

/**
 * Json
 *
 * Object-orientated wrapper for json_encode() and json_decode() that also handles errors.
 *
 * @package   BraincraftedJson
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2013 Florian Eckerstorfer
 * @license   http://opensource.org/licenses/MIT The MIT License
 */
class Json
{
    const DECODE_ASSOC  = true;
    const DECODE_OBJECT = false;

    /**
     * Mapping of PHPs error constants to error messages.
     *
     * @var array
     */
    private static $errors = array(
        JSON_ERROR_DEPTH            => 'Maximum stack depth exceeded',
        JSON_ERROR_STATE_MISMATCH   => 'Underflow or the modes mismatch',
        JSON_ERROR_CTRL_CHAR        => 'Unexpected control character found',
        JSON_ERROR_SYNTAX           => 'Syntax error, malformed JSON',
        JSON_ERROR_UTF8             => 'Malformed UTF-8 characters, possibly incorrectly encoded'
    );

    /**
     * Returns the JSON representation of a value.
     *
     * Returns a string containing the JSON representation of value.
     *
     * @param mixed   $value   The value being encoded. Can be any type except a resource. This function
     *                         only works with UTF-8 encoded data.
     * @param integer $options Bitmask consisting of JSON_HEX_QUOT, JSON_HEX_TAG, JSON_HEX_AMP,
     *                         JSON_HEX_APOS, JSON_NUMERIC_CHECK, JSON_PRETTY_PRINT,
     *                         JSON_UNESCAPED_SLASHES, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE.
     *
     * @return mixed Returns a JSON encoded string on success or FALSE on failure.
     */
    public static function encode($value, $options = 0)
    {
        return json_encode($value, $options);
    }

    /**
     * Decodes a JSON string.
     *
     * Takes a JSON encoded string and converts it into a PHP variable.
     *
     * @param string  $json    The json string being decoded. This function only works with UTF-8 encoded
     *                         data.
     * @param boolean $assoc   When TRUE, returned objects will be converted into associative arrays.
     * @param integer $depth   User specified recursion depth.
     * @param integer $options Bitmask of JSON decode options. Currently only JSON_BIGINT_AS_STRING is
     *                         supported (default is to cast large integers as floats)
     *
     * @return mixed Returns the value encoded in json in appropriate PHP type. Values true, false and null
     *                       (case-insensitive) are returned as TRUE, FALSE and NULL respectively. NULL is
     *                       returned if the json cannot be decoded or if the encoded data is deeper than
     *                       the recursion limit.
     *
     * @throws JsonDecodeException
     */
    public static function decode($json, $assoc = self::DECODE_OBJECT, $depth = 512, $options = 0)
    {
        $result = json_decode($json, $assoc, $depth, $options);
        if ($error = self::getError()) {
            throw new JsonDecodeException($error);
        }

        return $result;
    }

    /**
     * Returns the error of the last decode() call or FALSE if there was no error.
     *
     * @return mixed Either a string containing an error message or FALSE
     *
     * @throws JsonDecodeException
     */
    private static function getError()
    {
        $error = json_last_error();
        if (JSON_ERROR_NONE === $error) {
            return false;
        }

        if (isset(self::$errors[$error])) {
            return self::$errors[$error];
        }

        // @codeCoverageIgnoreStart
        return 'Unknown error';
        // @codeCoverageIgnoreEnd
    }
}
