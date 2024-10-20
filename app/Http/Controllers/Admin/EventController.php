<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Officer\EventRecordCreateDataTable;
use App\DataTables\Officer\EventRecordDataTable;
use App\Exports\AttendanceExport;
use App\Http\Controllers\Controller;
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
        return Excel::download(new AttendanceExport, 'users.xlsx');
    }

    public function storeEvent(Request $request){

        $request->validate([
            'title' => ['required','max:255'],
            'academic_year' => ['required'],
            'year' => ['required'],
            'status' => ['required'],
        ]);

        EventRecord::create([
            'title' => $request->title,
            'academic_year' => $request->academic_year,
            'year' => $request->year,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Event created successfully!');

    }
}
