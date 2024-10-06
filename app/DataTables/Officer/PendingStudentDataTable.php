<?php

namespace App\DataTables\Officer;

use App\Models\PendingStudent;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendingStudentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pendingstudent.action')
            ->addColumn('full_name', function ($row) {
                return $row->first_name . ' ' . $row->middle_initial . ' ' . $row->last_name;
            })
            ->addColumn('status', function($query){
                if($query->status == '0'){
                    return '<span class="badge btn-warning">pending</span>';
                }
            })
            ->addColumn('action', function($query) {
                $accept = '<a class="verify-student" href="#"  data-student-id="'.$query->student_id.'"><i class="fa fa-qrcode text-success fa-2x"></i></a>';

                return  $accept;
            })

            ->rawColumns(['action','status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->where('user_type','student')->where('status', 0);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pendingstudent-table')
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
            Column::make('student_id')->title('Student ID'),
            Column::make('year_level')->title('Year Level'),
            Column::make('status'),
            Column::computed('action')->title('Generate Qr Code')
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
        return 'PendingStudent_' . date('YmdHis');
    }
}
