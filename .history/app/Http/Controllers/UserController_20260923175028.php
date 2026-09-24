<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Leave;
use App\Http\Controllers\AttendanceController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;


class UserController extends Controller
{
    //

    public function loginForm()
    {
        return view('login');
    }
    public function registerForm()
    {
        return view('register');
    }


    public function register(Request $request)
    {
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


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);



        $data = User::where('email', $request->email)->first();
        if ($data && Hash::check($request->password, $data->password)) {
            session([
                'id' => $data->id,
                'username' => $data->name,
                'email' => $data->email,
                'account_id' => $data->account_id,
                'department' => $data->department,
                'role' => $data->role,
            ]);
            return redirect()->route('dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->back()->with('error', 'Email or password incorrect');
        }
    }

    public function userData()
    {
        $email = session('email');
        return User::where('email', $email)->first();
    }
    public function dashboard()
    {
        $data = $this->userData();
        $attend = new AttendanceController();
        $attendance = $attend->isTimeinORnot();
        $leaveTotal = $this->totalLeave();
        $totalleaveTaken = $this->TotalTakenLeave();
        $remainingLeave = $this->remainingLeave();
        $upcominbirthday = $this->getAllBirthday();

        return view('dashboard', compact('data', 'attendance', 'upcominbirthday', 'leaveTotal', 'totalleaveTaken', 'remainingLeave'));
    }

    public function logout()
    {
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



    public function profileUpdate(Request $request)
    {


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
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $email = session('email');

        $data = User::where('email', session('email'))->
            update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                //  'department' =>$request->department,
                'role' => $request->department,
                //  'account_id' => $request->account_id,
                'photo' => $imageName,
                //  'doj' => $request->doj,
                'dob' => $request->dob,
                'father_name' => $request->father_name,
                //  'designation' => $request->designation,
                'address' => $request->address,
                'state' => $request->state,
                'city' => $request->city,
                'mobile' => $request->mobile,
                //  'office_location' => $request->office_location,
                'updated_at' => now(),
            ]);

        session([
            'username' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('profile')
            ->with('success', 'Profile updated successfully');

    }

    public function getAllBirthday()
    {
        $dob = User::select('id', 'name', 'dob')
            ->orderByRaw("
            CASE 
                WHEN dob IS NULL THEN 1
                ELSE 0
            END
        ")
            ->orderByRaw("
            CASE
                WHEN MONTH(dob) >= MONTH(CURDATE())
                    THEN MONTH(dob)
                ELSE MONTH(dob) + 12
            END
        ")
            ->orderByRaw("DAY(dob)")
            ->get();

        return $dob;
    }


    public function totalLeave()
    {
        $leavePerMonth = 2;
        $userData = User::where('id', session('id'))->first();
        $joinDate = Carbon::parse($userData['doj']);
        $today = Carbon::today();
        if ($today->month >= 4) {
            //is saal ka finance year 1 april 26(2026-04-01 00:00:00)
            $fyStart = Carbon::create($today->year, 4, 1);
        } else {
            //agar jan ,feb,march hai to pichle saal ka financial year 2025-04-01 00:00:00
            $fyStart = Carbon::create($today->year - 1, 4, 1);
        }
        //Employee join after FY year
        if ($joinDate->greaterThan($fyStart)) {
            //maan lo joining date hai  2026-05-15 startOfMonth change karke bana dega 2026-05-01
            $startDate = $joinDate->copy()->startOfMonth();
        } else {
            $startDate = $fyStart->copy();
        }


        if ($joinDate->greaterThan($today)) {
            return 0;
        }
        //month count $startDate = 2026-05-01 $today= 2026-07-01 = 2 (2 june or july) but also work in may so + 1
        $months = $startDate->diffInMonths($today->copy()->startOfMonth()) + 1;

        return $months * $leavePerMonth;
    }


    public function TotalTakenLeave()
    {
        $userData = User::where('id', session('id'))->first();
        $account_id = $userData['account_id'];
        $takenLeave = Leave::where('account_id', $account_id)->where('status', 'Approved')->sum('totaldays');

        return $takenLeave;
    }

    public function remainingLeave()
    {
        $leaveTotal = $this->totalLeave();
        $totalleaveTaken = $this->TotalTakenLeave();
        $leftLeave = ((int) $leaveTotal - $totalleaveTaken);
        return $leftLeave;
    }



    public function deviceType()
    {
        $agent = new Agent();
        if ($agent->isMobile()) {
            if ($agent->isAndroidOS()) {
                return "Android";
            } elseif ($agent->isIOS()) {
                return "Iphone";
            } else {
                return "any other type mobile";
            }

        } elseif ($agent->isTablet()) {
            if ($agent->isiPad()) {
                return "Ipad";
            } elseif ($agent->isSamsung()) {
                return "Samsung tablet";
            } else {
                return "any other brand tablet";
            }

        } else {
            if ($agent->is('Windows')) {
                return "User Windows computer use kar raha hai!";
            } elseif ($agent->is('OS X')) { // Mac ke liye 'OS X' use hota hai
                return "User Mac (Apple) computer use kar raha hai!";
            } elseif ($agent->is('Linux')) {
                return "User Linux computer use kar raha hai!";
            } else {
                return "Other computer/laptop";
            }
        }
    }

}
