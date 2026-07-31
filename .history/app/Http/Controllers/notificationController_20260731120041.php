<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class notificationController extends Controller
{
    //
    public function notificationPage(){
        return view('notification');
    }

    public function notificationInsert(Request $request){
        $request->validate([
            'department' => 'required',
            'role' => 'required',
            'title' => 'required',
            'notificationMessage' => 'required'
        ]);

        Notification::create([
            'department' => $request->department,
            'role' => $request->role,
            'title' => $req
        ])
    }
    
}
