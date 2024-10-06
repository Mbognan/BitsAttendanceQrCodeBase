<?php

namespace App\DataTables\Admin;

use App\Models\BitsOfficer;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BitsOfficerDataTable extends DataTable
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
                $delete = '<a href="#" class="item denied"><i class="fa fa-trash text-danger fa-lg"></i></a>';
                $edit = '<a href="#" class="item " ><i class="fa fa-pencil-square-o text-primary  fa-lg"></i></a>';
                return $edit." ".$delete;
            })
            ->addColumn('full_name', function ($row) {
                return $row->first_name . ' ' . $row->middle_initial . ' ' . $row->last_name;
            })
            ->addColumn('status', function($query){
             $switch = '<label class="switch switch-3d switch-success mr-3">
                      <input type="checkbox" class="switch-input" checked="true">
                      <span class="switch-label"></span>
                      <span class="switch-handle"></span>
                    </label>';

                    return $switch;
            })

            ->rawColumns(['action','status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->where('user_type', 'officer');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bitsofficer-table')
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

            Column::make('full_name')
            ->title('Full Name')
            ->width(200),

            Column::make('student_id')->width(200),
            Column::make('email')->width(200),
            Column::make('status')->title('Authorized'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BitsOfficer_' . date('YmdHis');
    }
}
