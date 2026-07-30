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
    
}
