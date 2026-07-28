<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class leaveController extends Controller
{
    //

    

    public function leaveView(){
        // $data = $this->userData();
        return view('leave');
    }
}
