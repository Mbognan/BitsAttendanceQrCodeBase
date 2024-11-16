<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PaymentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Attendace;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function indexPayment(PaymentDataTable $datatable){
        return $datatable->render('admin.bits_officer.payment_index');
    }

    public function edit(string $id){
        $fines =25;
        $userId = User::with('attendanceLogs')->find($id);

        $absent = 0;

        foreach ($userId->attendanceLogs as $log) {

            if ($log->login_log == 0) {
                $absent++;
            }
            if ($log->logout_log == 0) {
                $absent++;
            }
        }



        $status =  '';

        if($absent){

            $status = 'Not Paid';
        }else{
            $status = 'Paid';
        }
        $totalFines = $fines * $absent;
        if($userId){
            return response()->json([
        'first_name' => $userId->first_name,
        'middle_name' => $userId->middle_name,
        'last_name' => $userId->last_name,
        'student_id' => $userId->student_id,
        'email' => $userId->email,
        'absent_count' => $absent,
        'total_fine' => $totalFines,
        'status' => $status,
        'userId' => $id,
            ]);
         }else{
            return response()->json([
                'status' => '404',
                'message' => 'Not Found'
            ]);
         }
    }
    public function paid(Request $request)
{
    try {

        $user = User::findOrFail($request->user_id);


        $officer = Auth::user()->full_name;


        $payment = new Payment();


        $attendance = Attendace::where('user_id', $user->id)->get();



        $attendance = Attendace::where('user_id', $user->id)->get();

        foreach ($attendance as $record) {
            if ($record->login_log == 0) {
                $record->login_log = 1;
                $record->save();
            }

            if ($record->logout_log == 0) {
                $record->logout_log = 1;
                $record->save();
            }
        }



        $payment->user_id = $user->id;
        $payment->treasurer_name = $officer;
        $payment->status = 'paid';


        $payment->save();


        return redirect()->back()->with('success','Paid Successfully');

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'There was an issue processing the payment: ' . $e->getMessage(),
        ], 500);
    }
}


}
