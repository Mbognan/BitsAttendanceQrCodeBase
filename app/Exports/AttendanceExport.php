<?php

namespace App\Exports;

use App\Models\Attendace;
use App\Models\ResultByCategory;
use App\Models\User;
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
        $students = User::where('user_type', 'student')->get();


        // $attendance = User::where('user_type', 'student')
        //     ->leftJoin('attendaces', 'users.id', '=', 'attendaces.user_id') // Left join to get all students
        //     ->leftJoin('event_records', 'attendaces.event_record_id', '=', 'event_records.id') // Join events table for event details
        //     ->select('users.*', 'attendaces.*', 'event_records.title as event_title', 'attendaces.event_day', 'attendaces.session', 'attendaces.login_log', 'attendaces.logout_log') // Select the necessary columns
        //     ->orderBy('attendaces.event_record_id')
        //     ->orderBy('attendaces.event_day')
        //     ->get();



        $attendance = Attendace::with('user', 'event')
        ->orderBy('event_record_id')
        ->orderBy('event_day')->get();





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
