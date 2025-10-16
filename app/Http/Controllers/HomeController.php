<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $req)
    {
        // if (Auth::user()->EmpID) {

        //     $employee = Auth::user()->employee;
        //     \View::share('lastStartedAttendance', $employee->laststartedattendance());
        //     \View::share('todayAttendance', $employee->todayattendance());

        //     \View::share('lastnightshift', $employee->lastnightshift());
        //     \View::share('todaynightshift', $employee->todaynightshift());

        //     \View::share('employee', $employee);

        //     \View::share('nextShift', (Carbon\Carbon::now()->format('H:i:s') >= NIGHTSHIFT_START_TIME));

        //     // dd(Auth::user()->displayName());  
        //     // dd($employee->todayattendance());
        //     // $att = Attendance::
        //     // Session::flash('error', 'You are not permitted to mark attendance');
        //     // return redirect()->back();
        // }

        

        return view('pages.dashboard.index');
    }
}
