<?php

namespace App\DataTables\Officer;

use App\Models\Attendace;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AttendanceDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))


            ->addColumn('user_id', function($row) {

                return $row->user ? $row->user->first_name. ' ' . $row->user->middle_initial .' '. $row->user->last_name : 'N/A';
            })
            ->addColumn('year_level', function($row) {
                return $row->user ? $row->user->year_level : 'N/A';
            })

            ->addColumn('event_record_id', function($row){
                return $row->event->title;
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('F j, Y');
            })
            ->rawColumns(['created_at', 'event_record_id', 'year_level', 'user_id'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Attendace $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('attendance-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('user_id')->title('Name')->width(150),
            Column::make('year_level')->title('Year Level'),
            Column::make('event_record_id')->title('Event'),
            Column::make('event_day')->title('Day'),
            Column::make('session')->title('Session'),
            Column::make('login_log'),
            Column::make('logout_log'),
            Column::make('created_at')->title('Date'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Attendance_' . date('YmdHis');
    }
}
