<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 5/18/15
 */

namespace NHLNumbers\Dto\Request\DataTables;

use Illuminate\Http\Request;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class DTRequest implements DTParams
{
    /**
     * @var int draw counter
     */
    private $draw;
    /**
     * @var array of NHLNumbers\Dto\Request\DataTables\Column defining all columns in the table.
     */
    private $columns = [];
    /**
     * @var array of NHLNumbers\Dto\Request\DataTables\Order defining how many columns are being ordered upon - i.e. if the array length is 1,
     * then a single column sort is being performed, otherwise a multi-column sort is being performed.
     */
    private $orders = [];
    /**
     * @var int Paging first record indicator.
     * This is the start point in the current data set (0 index based - i.e. 0 is the first record).
     */
    private $start;
    /**
     * @var int Number of records that the table can display in the current draw. It is expected that the number of
     * records returned will be equal to this number, unless the server has fewer records to return. Note that this
     * can be -1 to indicate that all records should be returned (although that negates any benefits of
     * server-side processing!)
     */
    private $length;
    /**
     * @var Search global search filter
     */
    private $search;
    /**
     * @var string
     */
    private $model_alias = 'model';
    /**
     * @var array<\NHLNumbers\Dto\Request\DataTables\Join> defining model joins used.
     * Eg,
     *   [ 0 => ['join_string' => 'player.team', 'alias' => 'team']]
     *   or
     *   // In example below, p is alias of NHLNumbers\Models\Player
     *   [ 0 => ['join_string' => 'NHLNumbers\Models\PlayerProfile', 'alias' => 'pp', 'condition_type' => 'WITH', 'condition' => 'p = pp.player']]
     */
    private $joins = [];

    /**
     * @JsonCreator({
     *  @JsonProperty(name="draw", type="int"),
     *  @JsonProperty(name="columns", type="NHLNumbers\Dto\Request\DataTables\Column[]"),
     *  @JsonProperty(name="order", type="NHLNumbers\Dto\Request\DataTables\Order[]"),
     *  @JsonProperty(name="start", type="int"),
     *  @JsonProperty(name="length", type="int"),
     *  @JsonProperty(name="search", type="NHLNumbers\Dto\Request\DataTables\Search"),
     *  @JsonProperty(name="model_alias", type="string"),
     *  @JsonProperty(name="joins", type="NHLNumbers\Dto\Request\DataTables\Join[]")
     * })
     * @param int $draw
     * @param array <\NHLNumbers\Dto\Request\DataTables\Column> $columns
     * @param array <\NHLNumbers\Dto\Request\DataTables\Order> $orders
     * @param int $start int
     * @param int $length int
     * @param Search $search
     * @param string $model_alias
     * @param array <\NHLNumbers\Dto\Request\DataTables\Join> $joins
     */
    function __construct(
        $draw = 0,
        $columns = [],
        $orders = [],
        $start = 0,
        $length = 0,
        Search $search = null,
        $model_alias = 'model',
        $joins = []
    ) {
        $this->draw = $draw;
        $this->columns = $columns;
        $this->orders = $orders;
        $this->start = $start;
        $this->length = $length;
        $this->search = $search;
        $this->model_alias = $model_alias;
        $this->joins = $joins;
    }

    function fillFromRequest(Request $request)
    {
        $this->draw = $request->input('draw');
        $columns = $request->input('columns');
        foreach ($columns as $column) {
            $data = $column['data'];
            $name = $column['name'];
            $searchable = $column['searchable'];
            $orderable = $column['orderable'];
            $searchVal = $column['search']['value'];
            $searchReg = $column['search']['regex'];
            $dql_column = isset($column['dql_column']) ? $column['dql_column'] : null;
            $this->columns[] = new Column($data, $name, $searchable, $orderable, new Search($searchReg, $searchVal),
                $dql_column);
        }
        $orders = $request->input('order');
        if ($orders !== null) {
            foreach ($orders as $order) {
                $column = $order['column'];
                $dir = $order['dir'];
                $this->orders[] = new Order($column, $dir);
            }
        }
        $this->start = $request->input('start');
        $this->length = $request->input('length');
        $search = $request->input('search');
        if ($search !== null) {
            $this->search = new Search($search['regex'], $search['value']);
        }
        $model_alias = $request->input('model_alias');
        if (!empty($model_alias)) {
            $this->model_alias = $model_alias;
        }
        $joins = $request->input('joins');
        if ($joins !== null) {
            foreach ($joins as $join) {
                $join_string = $join['join_string'];
                $alias = $join['alias'];
                $inner = !isset($join['inner']) || strtolower($join['inner']) === 'true' || $join['inner'] === true;
                $condition_type = isset($join['condition_type']) ? $join['condition_type'] : null;
                $condition = isset($join['condition']) ? $join['condition'] : null;
                $this->joins[] = new Join($join_string, $alias, $inner, $condition_type, $condition);
            }
        }
    }

    /**
     * @JsonProperty(name="draw", type="int")
     * @return int draw counter. This is used by DataTables to ensure that the Ajax returns from server-side processing
     * requests are drawn in sequence by DataTables (Ajax requests are asynchronous and thus can return out of sequence)
     */
    function getDraw()
    {
        return $this->draw;
    }

    /**
     * @JsonProperty(name="columns", type="NHLNumbers\Dto\Request\DataTables\Column[]")
     * @return array of NHLNumbers\Dto\Request\DataTables\Column defining all columns in the table.
     */
    function getColumns()
    {
        return $this->columns;
    }

    /**
     * @JsonProperty(name="order", type="NHLNumbers\Dto\Request\DataTables\Order[]")
     * @return array of NHLNumbers\Dto\Request\DataTables\Order defining how many columns are being ordered upon - i.e. if the array length is 1,
     * then a single column sort is being performed, otherwise a multi-column sort is being performed.
     */
    function getOrders()
    {
        return $this->orders;
    }

    /**
     * @JsonProperty(name="start", type="int")
     * @return int Paging first record indicator.
     * This is the start point in the current data set (0 index based - i.e. 0 is the first record).
     */
    function getStart()
    {
        return $this->start;
    }

    /**
     * @JsonProperty(name="length", type="int")
     * @return int Number of records that the table can display in the current draw. It is expected that the number of
     * records returned will be equal to this number, unless the server has fewer records to return. Note that this
     * can be -1 to indicate that all records should be returned (although that negates any benefits of
     * server-side processing!)
     */
    function getLength()
    {
        return $this->length;
    }

    /**
     * @JsonProperty(name="search", type="NHLNumbers\Dto\Request\DataTables\Search")
     * @return Search global search filter
     */
    function getSearch()
    {
        return $this->search;
    }

    /**
     * @JsonProperty(name="model_alias", type="string"),
     * @return null|string
     */
    public function getModelAlias()
    {
        return $this->model_alias;
    }

    /**
     * @JsonProperty(name="joins", type="NHLNumbers\Dto\Request\DataTables\Join[]")
     * @return array<\NHLNumbers\Dto\Request\DataTables\Join> defining model join used.
     */
    public function getJoins()
    {
        return $this->joins;
    }

    public function addJoin(Join $join)
    {
        $this->joins[] = $join;
    }
}