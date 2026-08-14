<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Carbon;

class adminController extends Controller
{
    //
    public function index(){
        $users= $this->getAllusers();
        return view('admin.Allusers',compact('users'));
    }

    private function getAllusers(){
        $users = User::orderBy('id','DESC')->get();
        return $users;
    }
}
