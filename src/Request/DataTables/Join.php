<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 6/7/15
 */

namespace NHLNumbers\Dto\Request\DataTables;


use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class Join
{
    private $join_string;
    private $alias;
    private $inner = true;
    private $condition_type;
    private $condition;

    /**
     * @JsonCreator({
     *  @JsonProperty(name="join_string", type="string"),
     *  @JsonProperty(name="alias", type="string"),
     *  @JsonProperty(name="inner", type="boolean"),
     *  @JsonProperty(name="condition_type", type="string"),
     *  @JsonProperty(name="condition", type="string")
     * })
     * @param string $join_string - eg, player.team
     * @param string $alias - join alias - eg, team
     * @param bool $inner - if true inner join. Otherwise, left join
     * @param null|string $condition_type - null or ON or WITH
     * @param null|string $condition
     */
    function __construct($join_string, $alias, $inner = true, $condition_type = null, $condition = null)
    {
        $this->join_string = $join_string;
        $this->alias = $alias;
        $this->inner = $inner;
        $this->condition_type = $condition_type;
        $this->condition = $condition;
    }

    /**
     * @JsonProperty(name="join_string", type="string")
     * @return string column number
     */
    function getJoinString()
    {
        return $this->join_string;
    }

    /**
     * @JsonProperty(name="alias", type="string")
     * @return string asc or desc
     */
    function getAlias()
    {
        return $this->alias;
    }

    /**
     * @JsonProperty(name="inner", type="boolean")
     * @return boolean
     */
    function isInner()
    {
        return $this->inner;
    }

    /**
     * @JsonProperty(name="condition_type", type="string")
     * @return null|string
     */
    function getConditionType()
    {
        return $this->condition_type;
    }

    /**
     * @JsonProperty(name="condition", type="string")
     * @return null|string
     */
    function getCondition()
    {
        return $this->condition;
    }
}