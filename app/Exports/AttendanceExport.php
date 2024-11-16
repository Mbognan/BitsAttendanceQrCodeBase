<?php

namespace App\Exports;

use App\Models\Attendace;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AttendanceExport implements WithMultipleSheets
{
    use Exportable;

    protected $eventRecordId;
    protected $year;

    public function __construct($eventRecordId, $year)
    {
        $this->eventRecordId = $eventRecordId;
        $this->year = $year;
    }

    public function sheets(): array
    {
        $sheets = [];

        // Fetch and group attendance data by year level
        $attendanceByYearLevel = Attendace::with(['user', 'event'])
            ->orderBy('event_record_id')
            ->orderBy('event_day')
            ->get()
            ->groupBy('user.year_level');

        foreach ($attendanceByYearLevel as $yearLevel => $attendance) {

            $sheets[] = new YearLevelAttendanceSheet($attendance, $yearLevel);
        }

        return $sheets;
    }
}
