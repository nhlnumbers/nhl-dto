<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 4/5/15
 */

namespace NHLNumbers\Dto\Response\DataTables;

use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

/**
 * Class DTResponse JSON data to be returned to DataTables
 * @see https://www.datatables.net/manual/server-side#Returned-data
 * @package NHLNumbers\Http\Requests\DataTables
 */
class BaseDTResponse
{
    /**
     * @JsonProperty(name="draw", type="int")
     * @var int draw counter that this object is a response to - from the draw parameter sent
     * as part of the data request.
     */
    public $draw;
    /**
     * @JsonProperty(name="recordsTotal", type="int")
     * @var int Total records, before filtering (i.e. the total number of records in the database)
     */
    public $recordsTotal;
    /**
     * @JsonProperty(name="recordsFiltered", type="int")
     * @var int Total records, after filtering (i.e. the total number of records after filtering has been applied - not
     * just the number of records being returned for this page of data).
     */
    public $recordsFiltered;
    /**
     * Subclasses should override this
     * @var array
     */
    public $data = [];
}