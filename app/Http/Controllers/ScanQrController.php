<?php

namespace App\Http\Controllers;

use App\DataTables\Officer\AttendanceDataTable;
use App\Models\Attendace;
use App\Models\EventDay;
use App\Models\EventRecord;
use App\Models\Session;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class ScanQrController extends Controller
{
    public function indexScan(AttendanceDataTable $datatable){
        $events = EventRecord::all();
        $event_days = EventDay::where('status', 0)->get(); // Get all EventDays that are active

        return $datatable->render('admin.bits_officer.qr-scan', compact('events','event_days'));
    }


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


public function sendCutOff(Request $request){
    $users = User::where('user_type', 'student')->get();
    $session_data = Session::where('event_record_id', $request->event)
    ->where('day_id', $request->day)
    ->where('session', $request->sessionDay)
    ->first();

if ($session_data) {
    if ($session_data->login_status == 0 || $session_data->logout_status == 0) {
        if ($request->status == 'login' ) {
            $session_data->update(['login_status' => 1]);
        } elseif ($request->status == 'log-out') {
            $session_data->update(['logout_status' => 1]);
        }
        // Optional: Retrieve the updated record to confirm the changes
        $session_data->refresh();

    } else {
        dd("Login or logout status already set.");
    }
} else {
    dd("No session data found with the given criteria.");
}


    $attendedUsers = Attendace::where('event_record_id', $request->event)
        ->where('event_day', $request->day)
        ->where('session', $request->sessionDay)
        ->where('status', $request->status)
        ->pluck('user_id');


    $studentsWithoutAttendance = User::where('user_type', 'student')
        ->where('status', 1) // Only active students
        ->whereNotIn('id', $attendedUsers)
        ->get();


    foreach ($studentsWithoutAttendance as $student) {

        $existingAttendance = Attendace::where('user_id', $student->id)
            ->where('event_record_id', $request->event)
            ->where('event_day', $request->day)
            ->where('session', $request->sessionDay)
            ->first();


        if (!$existingAttendance) {
            Attendace::create([
                'user_id' => $student->id,
                'event_record_id' => $request->event,
                'login_log' => 0,
                'logout_log' => 0,
                'event_day' => $request->day,
                'session' => $request->sessionDay,
                'status' => $request->status,
                'created_at' => now(),
            ]);
        }
    }



    Flasher::addSuccess('Absent students marked successfully.');

    return response()->json(['status' => 'success', 'message' => 'Absent students marked successfully.']);
}
}

