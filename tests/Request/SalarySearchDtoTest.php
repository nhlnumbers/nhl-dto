<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 6/7/15
 */

namespace NHLNumbers\Dto\Request;

use PHPUnit_Framework_TestCase;
use Weasel\JsonMarshaller\JsonMapper;
use Weasel\WeaselDoctrineAnnotationDrivenFactory;

class SalarySearchDtoTest extends PHPUnit_Framework_TestCase
{
    /** @var JsonMapper */
    private $mapper;

    function __construct()
    {
        $factory = new WeaselDoctrineAnnotationDrivenFactory();
        $this->mapper = $factory->getJsonMapperInstance();
    }

    function testDeserialize()
    {
        $json_string = '{"draw":1,"columns":[' .
            '{"data":"personalAttr.fullName","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false}},' .
            '{"data":"age","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false}},' .
            '{"data":"team_name","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"team.name"},' .
            '{"data":"position","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false}},' .
            '{"data":"fa_status","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false}},' .
            '{"data":"cap_number","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false}},' .
            '{"data":"salary","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false}}],' .
            '"order":[{"column":0,"dir":"asc"}],' .
            '"start":0,"length":7,' .
            '"search":{"value":"","regex":false},' .
            '"playertype":"ALL","position":"ALL","teamid":null,"situation":"ALL",' .
            '"model_alias":"player",' .
            '"joins":[{"join_string":"playerteam","alias":"team"}]}';
        $dto = $this->mapper->readString($json_string, SalarySearchDto::class);
    }
}