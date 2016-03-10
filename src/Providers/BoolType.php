<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 5/23/15
 */

namespace NHLNumbers\Dto\Providers;


use Weasel\JsonMarshaller\Exception\InvalidTypeException;
use Weasel\JsonMarshaller\JsonMapper;
use Weasel\JsonMarshaller\Types\BoolType as WeaselBoolType;

class BoolType extends WeaselBoolType
{
    public function encodeValue($value, JsonMapper $mapper)
    {
        if (is_bool($value)) {
            return ((bool)$value) ? "true" : "false";
        } elseif (is_string($value)) {
            $string = strtolower($value);
            if ($string === "true" || $string === "1" || $string === "yes") {
                return "true";
            } else {
                return "false";
            }
        } else {
            throw new InvalidTypeException("boolean", $value);
        }
    }
}