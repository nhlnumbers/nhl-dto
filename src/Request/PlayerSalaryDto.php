<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 5/17/15
 */

namespace NHLNumbers\Dto\Request;

use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class PlayerSalaryDto
{
    /** @var string */
    private $id;
    /** @var float */
    private $salary;

    /**
     * @JsonCreator({
     *  @JsonProperty(name="id", type="string"),
     *  @JsonProperty(name="salary", type="float"),
     * })
     *
     * @param string $id
     * @param float $salary
     */
    function __construct($id, $salary)
    {
        $this->id = $id;
        $this->salary = $salary;
    }

    /**
     * @JsonProperty(name="id", type="string")
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @JsonProperty(name="salary", type="float")
     * @return float
     */
    public function getSalary()
    {
        return $this->salary;
    }
}
