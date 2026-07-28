<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Leave;
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
        
        ]);
    }
}
