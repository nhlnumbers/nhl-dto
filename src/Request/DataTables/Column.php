<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 4/5/15
 */

namespace NHLNumbers\Dto\Request\DataTables;


use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonCreator;
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class Column
{
    /** @var string */
    private $data;
    /** @var string */
    private $name;
    /** @var bool */
    private $searchable;
    /** @var bool */
    private $orderable;
    /** @var Search */
    private $search;
    /** @var string */
    private $dql_column;

    /**
     * @JsonCreator({
     *  @JsonProperty(name="data", type="string"),
     *  @JsonProperty(name="name", type="string"),
     *  @JsonProperty(name="searchable", type="boolean"),
     *  @JsonProperty(name="orderable", type="boolean"),
     *  @JsonProperty(name="search", type="NHLNumbers\Dto\Request\DataTables\Search"),
     *  @JsonProperty(name="dql_column", type="string")
     * })
     * @param int $data column number index
     * @param string $name
     * @param bool $searchable
     * @param bool $orderable
     * @param Search $search
     * @param string $dql_column
     */
    function __construct($data, $name, $searchable, $orderable, $search, $dql_column = null)
    {
        $this->data = $data;
        $this->name = $name;
        $this->searchable = $searchable;
        $this->orderable = $orderable;
        $this->search = $search;
        $this->dql_column = $dql_column;
    }

    /**
     * @JsonProperty(name="data", type="string")
     * @return string Column's data source
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @JsonProperty(name="name", type="string")
     * @return string Column's name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @JsonProperty(name="orderable", type="boolean")
     * @return boolean true of orderable. Otherwise, false
     */
    public function isOrderable()
    {
        return $this->orderable;
    }

    /**
     * @JsonProperty(name="search", type="NHLNumbers\Dto\Request\DataTables\Search")
     * @return Search search parameters
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @JsonProperty(name="searchable", type="boolean")
     * @return boolean true if searchable. Otherwise, false
     */
    public function isSearchable()
    {
        return $this->searchable;
    }

    /**
     * @JsonProperty(name="dql_column", type="string")
     * @return string
     */
    public function getDqlColumn()
    {
        return $this->dql_column;
    }
}