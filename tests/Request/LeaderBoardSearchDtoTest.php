<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 6/8/15
 */

namespace NHLNumbers\Dto\Request;

use PHPUnit_Framework_TestCase;
use Weasel\JsonMarshaller\JsonMapper;
use Weasel\WeaselDoctrineAnnotationDrivenFactory;

class LeaderBoardSearchDtoTest extends PHPUnit_Framework_TestCase
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
            '{"data":"full_name","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"player.personalAttr.fullName"},' .
            '{"data":"primary_position","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"player.primaryPosition"},' .
            '{"data":"team_name","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"team.name"},' .
            '{"data":"games_played","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"player_profile.skaterStats.gamesPlayed"},' .
            '{"data":"toi_total","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"player_profile.timeOnIce.total"},' .
            '{"data":"goals","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"player_profile.skaterStats.baseSkaterAttr.shootingAttr.goals"},' .
            '{"data":"assists","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"player_profile.skaterStats.baseSkaterAttr.shootingAttr.assists"},' .
            '{"data":"first_assist","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false}},' .
            '{"data":"second_assist","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false}},' .
            '{"data":"points","name":"","searchable":false,"orderable":false,"search":{"value":"","regex":false},"dql_column":"player_profile.skaterStats.baseSkaterAttr.points"}],' .
            '"order":[{"column":0,"dir":"asc"}],"start":0,"length":10,"search":{"value":"","regex":false},' .
            '"seasonYear":"2014-2015","seasonType":"REG","position":"ALL","teamId":"All Teams","situation":"ALL","country":"All Countries",' .
            '"model_alias":"player_profile",' .
            '"joins":[{"join_string":"player_profile.player","alias":"player"},{"join_string":"player_profile.team","alias":"team"}]}';
        $dto = $this->mapper->readString($json_string, LeaderBoardSearchDto::class);
    }
}