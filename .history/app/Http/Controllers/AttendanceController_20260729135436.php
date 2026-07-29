<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    public function userAccid(){
        $id = session('id');
    $userData = User::where('id',$id)->first();
    return $userData;
    }
    public function timein(){
    $userData = $this->userAccid();
    Attendance::insert([
        'emp_name' => $userData->name,
        'emp_id' => $userData->account_id,
        'timein' => Carbon::now('Asia/Kolkata')->format('h:i A'),
        'date' => Carbon::today()->format('d/m/Y'),
        "created_at" => now(),
        "updated_at" => now(),
    ]);
    return back()->with('success', 'Time-in successfully');
    }

    public function timeout(){
       $userData = $this->userAccid();
       $latestData = Attendance::where('emp_id', $userData->account_id)->orderBy('id', 'DESC')->get();
       $latest_id = $latestData[0]['id'];
       $time_in = $latestData[0]['timein'];
        Attendance::where('id', $latestData)->update([
            'timeout' => Carbon::now('Asia/Kolkata')->format('h:is ')
        'date' => Carbon::today()->format('d/m/Y'),
        "updated_at" => now(),
        ]);
    }
}
