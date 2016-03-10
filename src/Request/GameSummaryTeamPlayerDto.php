<?php


namespace NHLNumbers\Dto\Request;

use NHLNumbers\Dto\Request\DataTables\DTRequest;
use NHLNumbers\Dto\Request\DataTables\Search;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class GameSummaryTeamPlayerDto extends DTRequest
{
    /** @var string $gameId */
    private $gameId;
    /** @var string $teamId */
    private $teamId;
    /** @var string $seasonId */
    private $seasonId;

    /**
     * @JsonCreator({
     *  @JsonProperty(name="draw", type="int"),
     *  @JsonProperty(name="columns", type="NHLNumbers\Dto\Request\DataTables\Column[]"),
     *  @JsonProperty(name="order", type="NHLNumbers\Dto\Request\DataTables\Order[]"),
     *  @JsonProperty(name="start", type="int"),
     *  @JsonProperty(name="length", type="int"),
     *  @JsonProperty(name="search", type="NHLNumbers\Dto\Request\DataTables\Search"),
     *  @JsonProperty(name="model_alias", type="string"),
     *  @JsonProperty(name="joins", type="NHLNumbers\Dto\Request\DataTables\Join[]"),
     *  @JsonProperty(name="gameId", type="string"),
     *  @JsonProperty(name="teamId", type="string"),
     *  @JsonProperty(name="seasonId", type="string"),
     * })
     * @param $draw int
     * @param $columns array of NHLNumbers\Dto\Request\DataTables\Column
     * @param $orders array of NHLNumbers\Dto\Request\DataTables\Order
     * @param $start int
     * @param $length int
     * @param Search $search
     * @param string $model_alias
     * @param array <\NHLNumbers\Dto\Request\DataTables\Join> $joins
     * @param string $gameId
     * @param string $teamId
     * @param string $seasonId
     */
    function __construct(
        $draw = 0,
        $columns = [],
        $orders = [],
        $start = 0,
        $length = 0,
        Search $search = null,
        $model_alias = 'model',
        $joins = [],
        $gameId = null,
        $teamId = null,
        $seasonId = null
    ) {
        parent::__construct($draw, $columns, $orders, $start, $length, $search, $model_alias, $joins);
        $this->gameId = $gameId;
        $this->teamId = $teamId;
        $this->seasonId = $seasonId;

    }

    /**
     * @JsonProperty(name="gameId", type="string")
     * @return int
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * @JsonProperty(name="teamId", type="string")
     * @return string
     */
    public function getTeamId()
    {
        return $this->teamId;
    }



    /**
     * @JsonProperty(name="seasonId", type="string")
     * @return string
     */
    public function getSeasonId()
    {
        return $this->seasonId;
    }

}