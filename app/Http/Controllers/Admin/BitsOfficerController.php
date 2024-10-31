<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\BitsOfficerDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class BitsOfficerController extends Controller
{
    public function index(BitsOfficerDataTable $datatable):View | JsonResponse{
        return $datatable->render('admin.add_bits_officer.index');
    }

    public function create():View{
        return view('admin.add_bits_officer.create');
    }


    public function store(Request $request){
        $usertype = 'officer';
       User::create([
        'first_name' => $request->first_name,
        'middle_initial' => $request->middle_initial,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'student_id' => $request->student_id,
        'user_type' => $usertype,
        'password' => Hash::make($request->input('password'))
       ]);

       return to_route('admin.index')->with('success', 'Successfully created!');
    }

    public function toggle(Request $request){
        $officer = User::find($request->id);

        if ($officer) {
            $officer->officer_status = $request->status;
            $officer->save();

            return response()->json(['success' => true, 'message' => 'Officer status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Officer not found']);
    }

}
