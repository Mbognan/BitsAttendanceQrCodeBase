<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Models\User;
use Illuminate\Http\Request;

class ScanQrController extends Controller
{
    public function indexScan(){
        return view('admin.bits_officer.qr-scan');
    }

    // public function findScan(Request $request){


    //     $student = User::where('student_id', $request->id)->first();
    //     $session = 'afternoon';


    //     if ($student) {
    //         Attendace::create([
    //             'user_id' => $student->id,
    //             'event_record_id' => 1,
    //             'status' => 'login',
    //             'session' => 'morning',
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'student' => [
    //                 'first_name' => $student->first_name,
    //                 'middle_initial' => $student->middle_initial,
    //                 'last_name' => $student->last_name,
    //                 'year_level' => $student->year_level
    //             ]
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Student not found'
    //         ], 404);
    //     }
    // }
    public function findScan(Request $request)
{

    $studentId = $request->id;
    $currentEventId = $request->event;
    $day = $request->day;
    $status = $request->status;
    $sessionDay = $request->sessionDay;

    $student = User::where('student_id', $studentId)->first();
    $attendanceLog = Attendace::where('user_id', $student->id)
    ->where('event_record_id', $currentEventId)
    ->where('event_day', $day)
    ->where('session', $sessionDay)
    ->first();


    if ($attendanceLog) {

        if ($attendanceLog->status === 'login') {

            $attendanceLog->status = 'log-out';
            $attendanceLog->save();

            return response()->json([
                'success' => true,
                'student' => [
                    'first_name' => $student->first_name,
                    'middle_initial' => $student->middle_initial,
                    'last_name' => $student->last_name,
                    'year_level' => $student->year_level,
                    'status' => $attendanceLog->status,
                    'logout_log' => 1,
                ],
                'message' => 'Logged out successfully',
            ]);
        } else {

            $attendanceLog->status = 'login';
            $attendanceLog->save();

            return response()->json([
                'success' => true,
                'student' => [
                    'first_name' => $student->first_name,
                    'middle_initial' => $student->middle_initial,
                    'last_name' => $student->last_name,
                    'year_level' => $student->year_level,
                    'status' => $attendanceLog->status
                ],
                'message' => 'Logged in successfully',
            ]);
        }
    } else {

        Attendace::create([
            'user_id' => $student->id,
            'event_record_id' => $currentEventId,
            'status' => 'login',
            'login_log' => 1,
            'session' => $sessionDay,
            'event_day' => $day,


        ]);

        return response()->json([
            'success' => true,
            'student' => [
                'first_name' => $student->first_name,
                'middle_initial' => $student->middle_initial,
                'last_name' => $student->last_name,
                'year_level' => $student->year_level,
            ],
            'message' => 'Logged in successfully',
        ]);
    }
}

}

