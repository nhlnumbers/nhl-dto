<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 5/17/15
 */

namespace NHLNumbers\Dto\Request;

use PHPUnit_Framework_TestCase;
use Weasel\JsonMarshaller\JsonMapper;
use Weasel\WeaselDoctrineAnnotationDrivenFactory;

class PlayerSalaryDtoTest extends PHPUnit_Framework_TestCase
{
    /** @var JsonMapper */
    private $mapper;

    function __construct()
    {
        $factory = new WeaselDoctrineAnnotationDrivenFactory();
        $this->mapper = $factory->getJsonMapperInstance();
    }

    function testSerializeDeserialize()
    {
        $expected_dto = new PlayerSalaryDto('36037b3e-5e9a-11e2-9b38-f4ce4684ea4c', 1.2);
        $expected_json = '{"id": "36037b3e-5e9a-11e2-9b38-f4ce4684ea4c", "salary": 1.2}';
        $actual_json = $this->mapper->writeString($expected_dto, PlayerSalaryDto::class);
        $this->assertEquals($expected_json, $actual_json);
        $actual_dto = $this->mapper->readString($actual_json, PlayerSalaryDto::class);
        $this->assertEquals($expected_dto, $actual_dto);
    }

    function testSerializeDeserializeArray()
    {
        $dto1 = new PlayerSalaryDto('36037b3e-5e9a-11e2-9b38-f4ce4684ea4c', 1.1);
        $dto2 = new PlayerSalaryDto('36037b3e-5e9a-11e2-9b38-f4ce4684ea4d', 2.2);
        $expected_arr = [$dto1, $dto2];
        $expected_json = '[{"id": "36037b3e-5e9a-11e2-9b38-f4ce4684ea4c", "salary": 1.1}, {"id": "36037b3e-5e9a-11e2-9b38-f4ce4684ea4d", "salary": 2.2}]';
        $actual_json = $this->mapper->writeString($expected_arr, PlayerSalaryDto::class . "[]");
        $this->assertEquals($expected_json, $actual_json);
        $actual_arr = $this->mapper->readString($expected_json, PlayerSalaryDto::class . "[]");
        $this->assertEquals($expected_arr, $actual_arr);
    }
}