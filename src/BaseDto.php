<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 5/17/15
 */

namespace NHLNumbers\Dto;


use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class BaseDto
{
    /**
     * @JsonProperty(name="isError", type="bool")
     * @var bool $isError
     */
    public $isError = false;
    /**
     * @JsonProperty(name="message", type="string")
     * @var string $message
     */
    public $message;
}