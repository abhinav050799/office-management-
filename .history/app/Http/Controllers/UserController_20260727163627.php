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
        'email' => 'required|email',
        'password' => 'required|min:6',
        ]);

        

       $data = User::where('email', $request->email)->first();
       if($data && Hash::check($request->password , $data->password)){
        session([
            'username' => $data->name,
            'email' => $data->email,
        ]);
        return redirect()->route('dashboard')->with('success', 'Login successfully');
       }else{
       return redirect()->back()->with('error','Email or password incorrect');
       }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        // Session::flush();
        session()->invalidate(); // ye session destroy karega and session id change kardega
        session()->regenerateToken(); //csrf token refresh karega
        return redirect()->route('login')->with('success', 'Logout successfully');
    }

   public function profile(Request $request)
{
    $email = session('email');
      $data = User::where('email', $email)->first();
    return view('profile', compact('data'));

}



public function profileUpdate(Request $request){
  
    
$request->validate([
    'name' => 'required',
     'email' => 'required|email',
'password' => 'nullable|min:6|confirmed',

     'department' => 'required',

     'account_id' => 'required',
     'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
     'doj' => 'required',
     'dob' => 'required',
     'father_name' => 'required',
     'designation' => 'required',
     'address' => 'required',
     'state' => 'required',
     'city' => 'required',
     'mobile' => 'required',
     'office_location' => 'required',
]);

$imageName = null;
if($request->hasFile('photo')){
    $image = $request->file('photo');
    $imageName = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
}

$email = session('email');

$data = User::where('email', session('email'))->
update([
        'name' => $request->name,
     'email' => $request->email,
     'password' => Hash::make($request->password),
     'department' =>$request->department,
     'role' => $request->department,
     'account_id' => $request->account_id,
     'photo' => $imageName,
     'doj' => $request->doj,
     'dob' => $request->dob,
     'father_name' => $request->father_name,
     'designation' => $request->designation,
     'address' => $request->address,
     'state' => $request->state,
     'city' => $request->city,
     'mobile' => $request->mobile,
     'office_location' => $request->office_location,
     'updated_at' => now(),
        ]);

        session([
            'username' => $request->name,
            'email' => $request->email
        ]);

         return view('profile')->with('success', 'Profile Update successfully');
}
}
