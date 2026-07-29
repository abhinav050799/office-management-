<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function timein(Request $requests){
    $email = session('email');
    $name = session('username');
    dd($email);
    }
}
