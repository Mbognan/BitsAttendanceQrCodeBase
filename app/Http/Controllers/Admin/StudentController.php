<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Officer\PendingStudentDataTable;
use App\Http\Controllers\Controller;
use App\Mail\QrcodeMail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

use Str;

class StudentController extends Controller
{
    public function index(){
        return view('admin.student.index');
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
