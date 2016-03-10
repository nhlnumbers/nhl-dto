<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 4/5/15
 */

namespace NHLNumbers\Dto\Request\DataTables;


use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class Search
{
    /** @var bool */
    private $regex;
    /** @var string */
    private $value;

    /**
     * @JsonCreator({
     *  @JsonProperty(name="regex", type="boolean"),
     *  @JsonProperty(name="value", type="string")
     * })
     * @param $regex mixed boolean or string. If string it'll be converted to boolean by calling boolval function.
     * @param $value string value input
     */
    function __construct($regex, $value)
    {
        $this->regex = is_bool($regex) ? $regex : boolval($regex);
        $this->value = $value;
    }

    /**
     * @JsonProperty(name="regex", type="boolean")
     * @return boolean true if regex search. Otherwise, false
     */
    public function isRegex()
    {
        return $this->regex;
    }

    /**
     * @JsonProperty(name="value", type="string")
     * @return string search value input
     */
    public function getValue()
    {
        return $this->value;
    }

}