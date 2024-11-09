<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Officer\EventRecordCreateDataTable;
use App\DataTables\Officer\EventRecordDataTable;
use App\Exports\AttendanceExport;
use App\Http\Controllers\Controller;
use App\Models\Attendace;
use App\Models\EventDay;
use App\Models\EventRecord;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    public function index(EventRecordDataTable $datatable){
        return $datatable->render('admin.bits_officer.event');
    }

    public function createEvent(EventRecordCreateDataTable $datatable){
        return $datatable->render('admin.bits_officer.create-event');
    }

    public function export(){
        $event_record = 1;
        $year = "2021-2022";


        return Excel::download(new AttendanceExport($event_record, $year), 'attendance.xlsx');
    }

    public function storeEvent(Request $request){

        $request->validate([
            'title' => ['required','max:255'],
            'academic_year' => ['required'],
            'year' => ['required'],
            'status' => ['required'],
            'span' => ['required', 'integer'],
        ]);


        $event = EventRecord::create([
            'title' => $request->title,
            'academic_year' => $request->academic_year,
            'year' => $request->year,
            'status' => $request->status,
            'span' => $request->span
        ]);


        $span = (int) $request->span;

        $sessions = ['morning', 'afternoon'];

        for ($day = 1; $day <= $span; $day++) {
            foreach ($sessions as $session) {
                EventDay::create([
                    'event_record_id' => $event->id,
                    'event_days' => $day,
                    'session' => $session,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Event created successfully!');

    }
}
