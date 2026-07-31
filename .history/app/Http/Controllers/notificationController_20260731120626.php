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
        dd($request);
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
        ]);

        return back()->with('success', 'Notification add successfully');
    }
    
}
