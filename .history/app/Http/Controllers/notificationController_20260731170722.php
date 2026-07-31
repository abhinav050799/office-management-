<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class notificationController extends Controller
{
    //
    public function notificationPage()
    {
        $dataNoti = $this->getAllNotification();
        return view('notification', compact('dataNoti'));
    }

    public function notificationInsert(Request $request)
    {
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


    public function getAllNotification()
    {
        $notidata = Notification::OrderBy('id', 'DESC')->get();
        return $notidata;
    }



    public function notificationRead(Request $request)
    {
        Log::info("hiy hua 1");
        $id = $request->id;
        Log::info($id);
        $account_id =  session('account_id');
        Log::info($account_id);
        $alreadyRead = DB::table('last_notification_read')->where('account_id',$account_id)->where('last_notification_read_id',$id)->OrderBy('id','DESC') ->exists();
        if(!$alreadyRead){
        DB::table('last_notification_read')->insert([
            'account_id' =>$account_id ,
            'last_notification_read_id' => $id,
            'created_at' => Carbon::now('Asia/kolkata'),
            'updated_at' => Carbon::now('Asia/kolkata'),
        ]);
        return back();
        }else{
        return back()->with('error','Already read this notification');
        }
    }
    
    public function NotificationCount(){
        $account_id =  session('account_id');
        $alreadyRead = DB::table('last_notification_read')->where('account_id',$account_id)->orderBy('last_notification_read_id','DESC')->get();
        foreach($alreadyRead as $pre)
    }

    
}
