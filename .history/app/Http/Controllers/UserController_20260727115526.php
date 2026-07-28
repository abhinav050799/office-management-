<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function loginForm(){
        return view('login');
    }
    public function registerForm(){
        return view('register');
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
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }


    public function login(Request $request){
        $request->validate([
        'email' => 'required',
        ]);

       $data =  User::find('email', $request->email)->first();
       if($data && Hash::check($request->password , $data->password)){
        session([
            'user'
        ])
       }
    }
}
