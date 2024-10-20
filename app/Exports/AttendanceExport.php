<?php

namespace App\Exports;

use App\Models\ResultByCategory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendanceExport implements FromView,ShouldAutoSize
{
    use Exportable;
    private $results;



    public function view():View{
        return view('admin.bits_officer.attendance-export');
    }
}
