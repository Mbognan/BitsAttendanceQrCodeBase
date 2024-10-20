<?php

namespace App\Http\Controllers;

use App\DataTables\Officer\AttendanceDataTable;
use App\Models\Attendace;
use App\Models\EventRecord;
use App\Models\User;
use Illuminate\Http\Request;

class ScanQrController extends Controller
{
    public function indexScan(AttendanceDataTable $datatable){
        $events = EventRecord::all();
        return $datatable->render('admin.bits_officer.qr-scan', compact('events'));
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

    if ($status == 'login') {
        if( $attendanceLog && $attendanceLog->status == 'login') {
            return response()->json([
                'success' => true,
                'validation' => true,
                'login' => true,
                'student' => [
                    'first_name' => $student->first_name,
                    'middle_initial' => $student->middle_initial,
                    'last_name' => $student->last_name,
                    'year_level' => $student->year_level,
                    'status' => $attendanceLog->status,
                ],
                'message' => 'Student Already Login',
            ]);
        }else {

            $attendance_log =  Attendace::create([
                 'user_id' => $student->id,
                 'event_record_id' => $currentEventId,
                 'status' => 'login',
                 'login_log' => 1,
                 'session' => $sessionDay,
                 'event_day' => $day,


             ]);

             return response()->json([
                 'success' => true,
                 'validation' => false,
                 'login' => true,

                 'student' => [
                     'first_name' => $student->first_name,
                     'middle_initial' => $student->middle_initial,
                     'last_name' => $student->last_name,
                     'year_level' => $student->year_level,
                     'status' => 'login'
                 ],
                 'message' => 'Logged in successfully',
             ]);
         }


    }else if($status == 'log-out'){
        if ($attendanceLog && $attendanceLog->status == 'log-out') {

            return response()->json([
                'success' => true,
                'validation' => true,
                'login' => false,

                'student' => [
                    'first_name' => $student->first_name,
                    'middle_initial' => $student->middle_initial,
                    'last_name' => $student->last_name,
                    'year_level' => $student->year_level,
                    'status' => $attendanceLog->status,
                ],
                'message' => 'Student Already Logout',
            ]);

    } else if($attendanceLog && $attendanceLog->status == 'login') {

        $attendanceLog->status = 'log-out';
        $attendanceLog->logout_log = 1;
        $attendanceLog->save();

        return response()->json([
            'success' => true,
            'validation' => false,
            'login' => false,
            'student' => [
                'first_name' => $student->first_name,
                'middle_initial' => $student->middle_initial,
                'last_name' => $student->last_name,
                'year_level' => $student->year_level,
                'status' => 'log-out'
            ],
            'message' => 'Logged out successfully',
        ]);
    }else{
        $attendance_log =  Attendace::create([
                    'user_id' => $student->id,
                    'event_record_id' => $currentEventId,
                    'status' => 'log-out',
                    'logout_log' => 1,
                    'session' => $sessionDay,
                    'event_day' => $day,


                ]);

                return response()->json([
                    'success' => true,
                    'validation' => false,
                    'login' => false,
                    'student' => [
                        'first_name' => $student->first_name,
                        'middle_initial' => $student->middle_initial,
                        'last_name' => $student->last_name,
                        'year_level' => $student->year_level,
                        'status' => 'log-out'
                    ],
                    'message' => 'Logged out successfully',
                ]);
    }
    }






    // if ($attendanceLog) {

    //     if ($attendanceLog->status === 'login') {

    //         $attendanceLog->status = 'log-out';
    //         $attendanceLog->save();

    //         return response()->json([
    //             'success' => true,
    //             'student' => [
    //                 'first_name' => $student->first_name,
    //                 'middle_initial' => $student->middle_initial,
    //                 'last_name' => $student->last_name,
    //                 'year_level' => $student->year_level,
    //                 'status' => $attendanceLog->status,
    //                 'logout_log' => 1,
    //             ],
    //             'message' => 'Logged out successfully',
    //         ]);
    //     } else {

    //         $attendanceLog->status = 'login';
    //         $attendanceLog->save();

    //         return response()->json([
    //             'success' => true,
    //             'student' => [
    //                 'first_name' => $student->first_name,
    //                 'middle_initial' => $student->middle_initial,
    //                 'last_name' => $student->last_name,
    //                 'year_level' => $student->year_level,
    //                 'status' => $attendanceLog->status
    //             ],
    //             'message' => 'Logged in successfully',
    //         ]);
    //     }
    // } else {

    //    $attendance_log =  Attendace::create([
    //         'user_id' => $student->id,
    //         'event_record_id' => $currentEventId,
    //         'status' => 'login',
    //         'login_log' => 1,
    //         'session' => $sessionDay,
    //         'event_day' => $day,


    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'student' => [
    //             'first_name' => $student->first_name,
    //             'middle_initial' => $student->middle_initial,
    //             'last_name' => $student->last_name,
    //             'year_level' => $student->year_level,
    //             'status' => 'login'
    //         ],
    //         'message' => 'Logged in successfully',
    //     ]);
    // }
}

}

