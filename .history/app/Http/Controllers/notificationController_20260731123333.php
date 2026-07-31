<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class notificationController extends Controller
{
    //
    public function notificationPage(){
        $dataNoti = $this->getAllNotification();
        return view('notification', compact('dataNoti'));
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
            'title' => $request->title,
            'text' => $request->notificationMessage
            'created_at' => 
        ]);

        return back()->with('success', 'Notification add successfully');
    }


    public function getAllNotification(){
        $notidata = Notification::all();
        return $notidata[0];
    }
    
}
