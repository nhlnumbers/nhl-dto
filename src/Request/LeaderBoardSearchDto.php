<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 6/7/15
 */

namespace NHLNumbers\Dto\Request;

use NHLNumbers\Dto\Request\DataTables\DTRequest;
use NHLNumbers\Dto\Request\DataTables\Search;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class LeaderBoardSearchDto extends DTRequest
{
    /** @var string $seasonYear */
    private $seasonYear;
    /** @var string $seasonType */
    private $seasonType;
    /** @var string $position */
    private $position;
    /** @var string $teamId */
    private $teamId;
    /** @var string $situation */
    private $situation;
    /** @var string $country */
    private $country;
    /** @var int $games_played */
    private $games_played;
    /** @var string $skaterID */
    private $skaterID;
    /** @var string $teamPlayerID*/
    private $teamPlayerID;

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
     *  @JsonProperty(name="seasonYear", type="string"),
     *  @JsonProperty(name="seasonType", type="string"),
     *  @JsonProperty(name="position", type="string"),
     *  @JsonProperty(name="teamId", type="string"),
     *  @JsonProperty(name="situation", type="string"),
     *  @JsonProperty(name="country", type="string"),
     * @JsonProperty(name="games_played", type="int"),
     * @JsonProperty(name="skaterID", type="string"),
     * @JsonProperty(name="teamPlayerID", type="string")
     * })
     * @param $draw int
     * @param $columns array of NHLNumbers\Dto\Request\DataTables\Column
     * @param $orders array of NHLNumbers\Dto\Request\DataTables\Order
     * @param $start int
     * @param $length int
     * @param Search $search
     * @param string $model_alias
     * @param array <\NHLNumbers\Dto\Request\DataTables\Join> $joins
     * @param string $seasonYear
     * @param string $seasonType
     * @param string $position
     * @param string $teamId
     * @param string $situation
     * @param string $country
     * @param int $games_played
     * @param string $skaterID
     * @param string $teamPlayerID
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
        $seasonYear = null,
        $seasonType = null,
        $position = null,
        $teamId = null,
        $situation = null,
        $country = null,
        $games_played = null,
        $skaterID = null,
        $teamPlayerID = null
    ) {
        parent::__construct($draw, $columns, $orders, $start, $length, $search, $model_alias, $joins);
        $this->seasonYear = $seasonYear;
        $this->seasonType = $seasonType;
        $this->position = $position;
        $this->teamId = $teamId;
        $this->situation = $situation;
        $this->country = $country;
        $this->games_played = $games_played;
        $this->skaterID = $skaterID;
        $this->teamPlayerID = $teamPlayerID;
    }

    /**
     * @JsonProperty(name="country", type="string")
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @JsonProperty(name="position", type="string")
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @JsonProperty(name="seasonType", type="string")
     * @return string
     */
    public function getSeasonType()
    {
        return $this->seasonType;
    }

    /**
     * @JsonProperty(name="seasonYear", type="string")
     * @return string
     */
    public function getSeasonYear()
    {
        return $this->seasonYear;
    }

    /**
     * @JsonProperty(name="situation", type="string")
     * @return string
     */
    public function getSituation()
    {
        return $this->situation;
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
     * @JsonProperty(name="games_played", type="int")
     * @return int
     */
    public function getGamesPlayed()
    {
        return $this->games_played;
    }

    /**
     * @JsonProperty(name="skaterID", type="string")
     * @return string
     */
    public function getSkaterID()
    {
        return $this->skaterID;
    }

    /**
     * @JsonProperty(name="teamPlayerID", type="string")
     * @return string
     */
    public function getTeamPlayerID()
    {
        return $this->teamPlayerID;
    }

}