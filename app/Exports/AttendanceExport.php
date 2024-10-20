<?php

namespace App\Exports;

use App\Models\Attendace;
use App\Models\ResultByCategory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendanceExport implements FromView,ShouldAutoSize
{
    protected $eventRecordId;
    protected $year;

    public function __construct($eventRecordId, $year)
    {
        $this->eventRecordId = $eventRecordId;
        $this->year = $year;
    }

    public function view(): \Illuminate\Contracts\View\View
    {
        $attendance = Attendace::with('user', 'event') // Include event relationship for titles
        ->orderBy('event_record_id') // Order by event record first
        ->orderBy('event_day') // Then order by event day
        ->get();


    return view('admin.bits_officer.attendance-export', [
        'attendance' => $attendance,
        'year' => $this->year,
    ]);
    }

    // public function title(): string
    // {
    //     return 'Attendance'; // You can change the title as needed
    // }


}
