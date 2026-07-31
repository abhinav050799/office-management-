<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

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
            'text' => $request->notificationMessage,
            'created_at' => Carbon::now('Asia/Kolkata'),
            'updated_at' => Carbon::parse('Asia/kolkata')
        ]);

        return back()->with('success', 'Notification add successfully');
    }


    public function getAllNotification(){
        $notidata = Notification::OrderBy('id','DESC')->get();
        return $notidata;
    }
    


    public function notificationRead(Request $request){

    }
}
