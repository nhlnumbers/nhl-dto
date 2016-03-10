<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 5/22/15
 */

namespace NHLNumbers\Dto\Request;


use NHLNumbers\Dto\Request\DataTables\DTRequest;
use NHLNumbers\Dto\Request\DataTables\Search;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class SalarySearchDto extends DTRequest
{
    /**
     * ROOKIE or VETERAN
     * @var string
     */
    private $playertype;
    /** @var string */
    private $position;
    /** @var string */
    private $teamid;
    /** @var string */
    private $situation;
    /** @var string */
    private $skaterID;
    /** @var string */
    private $seasonYear;

    /**
     * @JsonCreator({
     *  @JsonProperty(name="draw", type="int"),
     *  @JsonProperty(name="columns", type="NHLNumbers\Dto\Request\DataTables\Column[]"),
     *  @JsonProperty(name="order", type="NHLNumbers\Dto\Request\DataTables\Order[]"),
     *  @JsonProperty(name="start", type="int"),
     *  @JsonProperty(name="length", type="int"),
     *  @JsonProperty(name="search", type="NHLNumbers\Dto\Request\DataTables\Search"),
     *  @JsonProperty(name="playertype", type="string"),
     *  @JsonProperty(name="position", type="string"),
     *  @JsonProperty(name="teamid", type="string"),
     *  @JsonProperty(name="situation", type="string"),
     *  @JsonProperty(name="model_alias", type="string"),
     *  @JsonProperty(name="joins", type="NHLNumbers\Dto\Request\DataTables\Join[]"),
     *  @JsonProperty(name="skaterID", type="string"),
     *  @JsonProperty(name="seasonYear", type="string")
     * })
     * @param $draw int
     * @param $columns array of NHLNumbers\Dto\Request\DataTables\Column
     * @param $orders array of NHLNumbers\Dto\Request\DataTables\Order
     * @param $start int
     * @param $length int
     * @param Search $search
     * @param string $playertype
     * @param string $position
     * @param string $teamid
     * @param string $situation
     * @param string $model_alias
     * @param array <\NHLNumbers\Dto\Request\DataTables\Join> $joins
     * @param string $skaterID
     * @param string $seasonYear
     */
    function __construct(
        $draw = 0,
        $columns = [],
        $orders = [],
        $start = 0,
        $length = 0,
        Search $search = null,
        $playertype = null,
        $position = null,
        $teamid = null,
        $situation = null,
        $model_alias = 'model',
        $joins = [],
        $skaterID = null,
        $seasonYear = null
    ) {
        parent::__construct($draw, $columns, $orders, $start, $length, $search, $model_alias, $joins);
        $this->playertype = $playertype;
        $this->position = $position;
        $this->teamid = $teamid;
        $this->situation = $situation;
        $this->skaterID = $skaterID;
        $this->seasonYear = $seasonYear;
    }

    /**
     * ROOKIE or VETERAN
     * @JsonProperty(name="playertype", type="string")
     * @return string
     */
    public function getPlayertype()
    {
        return $this->playertype;
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
     * @JsonProperty(name="teamid", type="string")
     * @return string
     */
    public function getTeamid()
    {
        return $this->teamid;
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
     * @JsonProperty(name="skaterID", type="string")
     * @return string
     */
    public function getSkaterID()
    {
        return $this->skaterID;
    }

    /**
     * @JsonProperty(name="seasonYear", type="string")
     * @return string
     */
    public function getSeasonYear()
    {
        return $this->seasonYear;
    }


}