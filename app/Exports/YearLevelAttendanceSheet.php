<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class YearLevelAttendanceSheet implements FromView, ShouldAutoSize
{
    protected $attendance;
    protected $yearLevel;

    // Constructor to initialize attendance data and year level
    public function __construct($attendance, $yearLevel)
    {
        $this->attendance = $attendance;
        $this->yearLevel = $yearLevel;
    }

    // Render the view for the sheet
    public function view(): View
    {
        return view('admin.bits_officer.attendance-export', [
            'attendance' => $this->attendance,
            'yearLevel' => $this->yearLevel,
        ]);
    }
}
