<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 4/5/15
 */

namespace NHLNumbers\Dto\Request\DataTables;

/**
 * Interface DTParams representation of sent parameters from DataTables.
 * @see https://www.datatables.net/manual/server-side#Sent-parameters
 * @package NHLNumbers\Http\Requests\DataTables
 */
interface DTParams
{
    /**
     * @return int draw counter. This is used by DataTables to ensure that the Ajax returns from server-side processing
     * requests are drawn in sequence by DataTables (Ajax requests are asynchronous and thus can return out of sequence)
     */
    function getDraw();

    /**
     * @return array of NHLNumbers\Http\Requests\DataTables\Column defining all columns in the table.
     */
    function getColumns();

    /**
     * @return array of NHLNumbers\Http\Requests\DataTables\Order defining how many columns are being ordered upon - i.e. if the array length is 1,
     * then a single column sort is being performed, otherwise a multi-column sort is being performed.
     */
    function getOrders();

    /**
     * @return int Paging first record indicator.
     * This is the start point in the current data set (0 index based - i.e. 0 is the first record).
     */
    function getStart();

    /**
     * @return int Number of records that the table can display in the current draw. It is expected that the number of
     * records returned will be equal to this number, unless the server has fewer records to return. Note that this
     * can be -1 to indicate that all records should be returned (although that negates any benefits of
     * server-side processing!)
     */
    function getLength();

    /**
     * @return Search global search filter
     */
    function getSearch();
}