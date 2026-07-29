<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\

class AttendanceController extends Controller
{
    public function timein(Request $requests){
        
    $email = session('email');
    $name = session('username');
    $id = session('id');
    $userData = User::where('id',$id)->first();
    Attendance::insert([
        'emp_name' => $userData->name,
        'emp_id' => $userData->account_id,
        'timein' => Carbon::now()->format('h:i A');
    ]);
    }
}
