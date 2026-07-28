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
        $UserAllLeave = $this->AllLeaveData();
        return view('leave', compact('data','UserAllLeave'));
    }

    public function leaveInsert(Request $request){
        $request->validate([
        'account_id' => 'required',
        'name' => 'required',
        'department' => 'required',
        'leaveType' => 'required',
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
        'leavetype' => $request->leaveType,
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

       $data =  User::where('email' , $email)->orderBy('id','DESC')->get();
    $account_id = $data[0]->account_id;
       $data = Leave::where('account_id',$account_id)->orderBy('id','DESC')->get();
       return $data;
    }


    public function getidData(Request $request){
        $id = $request->id;
       $dataLeave::where('id', $id)->first();
    }
}
