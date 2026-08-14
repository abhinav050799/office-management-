<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Carbon;;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'department' => 'required',
            'role' => 'required',
        ]);

         $user = User::create([
        // $user = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'department' => $request->department,
            'role' => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Registration successful.');
    }

    public function Update(Request $request,$id){
       dd($request->department,
    $request->validate([
 'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'department' => 'required',
            'role' => 'required',
    ]);
 
     $user = User::where('id',$id)->update([
        // $user = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'department' => $request->department,
            'role' => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return back()->with('success', 'Registration updated successful.');
    }
}
