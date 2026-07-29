<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
    public function timein(Request $requests){
    $email = session('email');
    $name = session('username');
    $id = session('id');
    $userData = User::where('email',$email)->where('name',$name)->first();
    }
}
