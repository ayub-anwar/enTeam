<?php

namespace App\Http\Controllers;

use App\Models\Available_doctor;
use App\Models\Healthappointment;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
class HealthController extends Controller
{
    public function index()
    {
        $actionableHealthEmployees = DB::table('healthmatrixemployee')->get();
        $getavailabledoctors = DB::table('available_doctors')->get();
        return view('Health.Setappointments', compact('actionableHealthEmployees', 'getavailabledoctors'));
    }
    public function deleteActionableEmployee($id)
    {
        DB::table('healthmatrixemployee')->where('user_id', $id)->delete();
        return redirect()->back();
    }
    public function adddoctor(Request $request)
    {
        Available_doctor::create([
            'doctor_name' => $request->doctor_name,
        ]);
        return redirect()->back();
    }
    public function setdoctorAppointment(Request $request)
    {
        $getuserdetails = User::where('name', $request->appointed_employee)->first();
        $appointedTime12hr = date("h:i A", strtotime($request->appointed_time));
        Healthappointment::create([
            'appointed_employee' => $request->appointed_employee,
            'user_id' => $getuserdetails->user_id,
            'appointed_doctor' => $request->appointed_doctor,
            'appointed_date' => $request->appointed_date,
            'appointed_time' => $appointedTime12hr,
            'appointed_reason' => $request->appointed_reason,
        ]);
        $appointedTime12hr = date("h:i A", strtotime($request->appointed_time));

        Notification::create([
            'user_id'      => $getuserdetails->user_id,
            'notification_message'    => "Due to low Performance Progress,your appoinment is set with Doctor " . $request->appointed_doctor . ' On : ' . $request->appointed_date . ' at: ' . $appointedTime12hr
        ]);
        return redirect()->back();
    }
    public function index2()
    {
        $user = DB::table('healthappointments')->get();
        return view('Health.health2', compact('user'));
    }
    public function deleteHealthView($id, $date)
    {
        //dd($id,$date);
        DB::table('healthappointments')->where('user_id', $id)->where('appointed_date', $date)->delete();
        return redirect()->back();
    }
    public function HealthEmployee()
    {
        $loggedInUserID = Auth::user()->user_id;
        $user = DB::table('healthappointments')->where('healthappointments.user_id', $loggedInUserID)->get();
        return view('Health.HealthEmployee', compact('user'));
    }
}
