<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Officer\PendingStudentDataTable;
use App\Http\Controllers\Controller;
use App\Mail\QrcodeMail;
use App\Models\Attendace;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

use Str;

class StudentController extends Controller
{
    public function index(){
        $valid = User::where('status', 1)->first();
        $id = Auth::user()->id;
        $attendanceRecords = Attendace::where('user_id', $id)
        ->get();


    $absentDetails = [];

    foreach ($attendanceRecords as $record) {
        $status = '';
        $session = $record->session;
        $fines = 0;

        if ($record->login_log == 0 && $record->logout_log == 0) {
            $status = 'Absent (Both Login & Logout)';
            $fines = 50;
        } elseif ($record->login_log == 0) {
            $status = 'Absent (Login)';
            $fines = 25;
        } elseif ($record->logout_log == 0) {
            $status = 'Absent (Logout)';
            $fines = 25;
        }

        if ($status != '') {
            $absentDetails[] = [
                'date' => $record->created_at,
                'status' => $status,
                'session' => $session,
                'event' => $record->event->title,
                'day' => $record->event_day,
                'fines' => $fines
            ];
        }
    }


        return view('admin.student.index',compact(['absentDetails', 'valid']));
    }
    public function pending(PendingStudentDataTable $datatable):View | JsonResponse{
        return $datatable->render('admin.bits_officer.pending');
    }

    public function sendQrCodeEmail(Request $request)
    {

        $qrCodeBase64 = $request->input('qrCode');
        $studentId = $request->input('student_id');
        $qrCodeData = explode(',', $qrCodeBase64)[1];
        $user = User::where('student_id', $studentId)->first();
        $qrCodeBinary = base64_decode($qrCodeData);

        $fileName = Str::random(10) . '.png';
        try {
            Mail::to($user->email)->send(new QrCodeMail($qrCodeBinary, $fileName,$studentId));
            $user->status = 1;
            $user->save();
            return response()->json(['message' => 'QR code sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send email.'], 500);
        }
    }
}
