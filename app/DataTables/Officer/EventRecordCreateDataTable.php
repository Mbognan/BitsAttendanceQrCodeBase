<?php

namespace App\DataTables\Officer;

use App\Models\EventRecord;
use App\Models\EventRecordCreate;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EventRecordCreateDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $delete = '<a href="#" class="item denied delete-item"><i class="fa fa-trash text-danger fa-lg"></i></a>';
            $edit = '<a href="#" class="item " ><i class="fa fa-pencil-square-o text-primary  fa-lg"></i></a>';
            return $edit." ".$delete;
        })
        ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(EventRecord $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('eventrecordcreate-table')
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

            Column::make('id'),
            Column::make('title')->searchable(true),
            Column::make( 'academic_year')->title('Academic Year')->searchable(true),
            Column::make('year')->searchable(true),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'EventRecordCreate_' . date('YmdHis');
    }
}
