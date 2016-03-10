<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 4/5/15
 */

namespace NHLNumbers\Dto\Request\DataTables;


use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class Order
{
    /** @var int */
    private $column;
    /** @var string asc or desc */
    private $dir;

    /**
     * @JsonCreator({
     *  @JsonProperty(name="column", type="int"),
     *  @JsonProperty(name="dir", type="string")
     * })
     * @param int $column column number
     * @param string $dir
     */
    function __construct($column, $dir)
    {
        $this->column = $column;
        $this->dir = $dir;
    }

    /**
     * @JsonProperty(name="column", type="int")
     * @return int column number
     */
    function getColumn()
    {
        return $this->column;
    }

    /**
     * @JsonProperty(name="dir", type="string")
     * @return string asc or desc
     */
    function getDir()
    {
        return $this->dir;
    }
}