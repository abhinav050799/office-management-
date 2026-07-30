<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Leave;
use App\Models\User;
class leaveController extends Controller
{
    //

    public function leaveView()
    {
        $userController = new UserController();

        $data = $userController->userData();

        $UserAllLeave = $this->AllLeaveData();
        return view('leave', compact('data', 'UserAllLeave'));
    }

    public function leaveInsert(Request $request)
    {
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

                    $leavefrom = Carbon::parse($request->leavefrom);
            $leaveto = Carbon::parse($request->leaveto);
            
            $TotalDay = $leavefrom->diffInDays($leaveto)+1;


        
        $data = Leave::create([
            'account_id' => $request->account_id,
            'name' => $request->name,
            'department' => $request->department,
            'leavetype' => $request->leaveType,
            'leavefrom' => $request->leavefrom,
            'leaveto' => $request->leaveto,
            'totaldays' => $TotalDay
            'leavereason' => $request->leavereason,
            'leavepurpose' => $request->leavepurpose,
            'address' => $request->address,
            'phone' => $request->phone,

        ]);

        return back()->with('success', 'Leave apply successfuuly');

    }

    public function AllLeaveData()
    {
        $email = session('email');

        $data = User::where('email', $email)->orderBy('id', 'DESC')->get();
        $account_id = $data[0]->account_id;
        $data = Leave::where('account_id', $account_id)->orderBy('id', 'DESC')->get();
        return $data;
    }


    public function getidData(Request $request)
    {
        $id = $request->id;
        $idData = Leave::where('id', $id)->first();
        return response()->json([
            'status' => true,
            'data' => $idData
        ]);
    }

    public function updateLeave(Request $request)
    {
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
        $editid = $request->edit_id;
        Leave::where('id', $editid)->update([
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
    return back()->with('success', 'Data Updated Successfully');
    }

    public function deleteLeave(Request $request){
        $id = $request->dlt_id;
        Leave::where('id',$id)->delete();

        return back()->with('success', 'Data Deleted successfully');
    }
}
