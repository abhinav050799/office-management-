<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class leaveController extends Controller
{
    //

    public function leaveView(){
     $userController = new UserController();

        $data = $userController->userData();
        return view('leave', compact('data'));
    }
}
