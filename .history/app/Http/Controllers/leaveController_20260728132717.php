<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Leave;
use App\Models\User;
class leaveController extends Controller
{
    //

    public function leaveView(){
     $userController = new UserController();

        $data = $userController->userData();
       
        return view('leave', compact('data'));
    }

    public function leaveInsert(Request $request){
        $request->validate([
        'account_id' => 'required',
        'name' => 'required',
        'department' => 'required',
        'leavetype' => 'required',
        'leavefrom' => 'required',
        'leaveto' => 'required',
        'leavereason' => 'required',
        'leavepurpose' => 'nullable|string|max:500',
        'address' => 'required',
        'phone' => 'required'
        ]);
        $data = Leave::create([
        'account_id' => $request->account_id,
        'name' => $request->name,
        'department' => $request->department,
        'leavetype' => $request->leavetype,
        'leavefrom' => $request->leavefrom,
        'leaveto' => $request->leaveto,
        'leavereason' => $request->leavereason,
        'leavepurpose' => $request->leavepurpose,
        'address' => $request->address,
        'phone' => $request->phone,

        ]);

        return back()->with('success', 'Leave apply successfuuly');

    }

    public function AllLeaveData(){
        $email  = session('email');

       $data =  User::where('email' , $email)->orderBy('id','DESC')->getAll();
       $account_id = $data->account_id;
       dd($account_id);
    }
}
