<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 5/19/15
 */

namespace NHLNumbers\Dto\Request\DataTables;

use PHPUnit_Framework_TestCase;
use Weasel\JsonMarshaller\JsonMapper;
use Weasel\WeaselDoctrineAnnotationDrivenFactory;

class DTRequestTest extends PHPUnit_Framework_TestCase
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
        $draw = 1;
        $columns = [];
        $orders = [];
        $start = 0;
        $length = 10;
        $search = new Search(true, "value");
        for ($i = 1; $i <= 3; $i++) {
            $columns[] = $this->createColumn($i);
            $orders[] = $this->createOrder($i);
        }
        $dto = new DTRequest($draw, $columns, $orders, $start, $length, $search);
        $expected_json = '{"draw": 1, "columns": [' .
            '{"data": "1", "name": "name1", "orderable": false, "search": {"regex": true, "value": "searchReg1"}, "searchable": true, "dql_column": null}, ' .
            '{"data": "2", "name": "name2", "orderable": false, "search": {"regex": false, "value": "searchReg2"}, "searchable": true, "dql_column": null}, ' .
            '{"data": "3", "name": "name3", "orderable": false, "search": {"regex": true, "value": "searchReg3"}, "searchable": true, "dql_column": null}], ' .
            '"order": [{"column": 1, "dir": "asc"}, {"column": 2, "dir": "desc"}, {"column": 3, "dir": "asc"}], ' .
            '"start": 0, "length": 10, "search": {"regex": true, "value": "value"}, "model_alias": null, "joins": []}';
        $actual_json = $this->mapper->writeString($dto, DTRequest::class);
        $this->assertEquals($expected_json, $actual_json);

        $actual_dto = $this->mapper->readString($actual_json, DTRequest::class);
        $this->assertEquals($dto, $actual_dto);
    }

    function testDeserializeOptionalModelAliasAndJoins()
    {
        $draw = 1;
        $columns = [];
        $orders = [];
        $start = 0;
        $length = 10;
        $search = new Search(true, "value");
        for ($i = 1; $i <= 3; $i++) {
            $columns[] = $this->createColumn($i);
            $orders[] = $this->createOrder($i);
        }
        $actual_dto = new DTRequest($draw, $columns, $orders, $start, $length, $search);
        $json = '{"draw": 1, "columns": [' .
            '{"data": "1", "name": "name1", "orderable": false, "search": {"regex": true, "value": "searchReg1"}, "searchable": true, "dql_column": null}, ' .
            '{"data": "2", "name": "name2", "orderable": false, "search": {"regex": false, "value": "searchReg2"}, "searchable": true, "dql_column": null}, ' .
            '{"data": "3", "name": "name3", "orderable": false, "search": {"regex": true, "value": "searchReg3"}, "searchable": true, "dql_column": null}], ' .
            '"order": [{"column": 1, "dir": "asc"}, {"column": 2, "dir": "desc"}, {"column": 3, "dir": "asc"}], ' .
            '"start": 0, "length": 10, "search": {"regex": true, "value": "value"}}';
        $dto = $this->mapper->readString($json, DTRequest::class);
        $this->assertEquals($dto, $actual_dto);
    }

    function createColumn($i)
    {
        return new Column($i, "name$i", true, false, new Search(($i % 2 ? true : false), "searchReg$i"));
    }

    function createOrder($i)
    {
        return new Order($i, ($i % 2 ? "asc" : "desc"));
    }
}