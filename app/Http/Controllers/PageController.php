<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\Schedule_visit;
use App\Models\Medical_examination;
use App\Models\Users_examination;
use Illuminate\Support\Facades\Auth;
use DateTime;

class PageController extends Controller
{
    public function contact()
    {
        return view('contact');
    }
    public function receptionHours(){
        $doctors = User::where('status','doctor')->with('employees')->get();
        // $workingHours = $doctors->employee;

        return view("receptionHours",['user'=>$doctors]);
    }
    public function createVisit(){
        $doctors = User::where('status','doctor')->with('employees')->get();
        $visits = Schedule_visit::all();
        $count = User::where('status',"doctor")->count();
        // dd($count);
        $blockedHours = array();
        $blockedDays = array();
        
        for($i=0; $i<$count;$i++){
            $zm = array();
            $zm1 = array();
            foreach($visits as $visit){
                if($visit->employee_id === $doctors[$i]->employees->id){
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $visit->date);
                    $formatted_time = $date->format('H:i');
                    $zm[]= $formatted_time;
                    $formatted_time = $date->format('d-m-Y');
                    $zm1[]=$formatted_time;

                }
            }
            
        $blockedDays[]=$zm1;        
        $blockedHours[]=$zm;    
        }
        $blockedHours = json_encode($blockedHours);
        $blockedDays = json_encode($blockedDays);
        // dd($blockedDays);
        $week = array();
        for ($i = 1; $i < 8; $i++) {
        $week[] = Carbon::now()->addDays($i);
        }
        
        
        return view("createVisit",['doctors'=>$doctors,'date'=>$week,'blockedHours'=>$blockedHours,'blockedDays'=>$blockedDays]);
    }
    public function userExamination(){
        $visits = Schedule_visit::where('user_id',Auth::user()->id)->with('employees')->get();
        $history = Users_examination::where('user_id',Auth::user()->id)->with('users')->get();
        $doctors = array();
        $employee = array();
        $employeeUser= array();
        foreach($visits as $visit){
            $doctors[] = User::find($visit->employees->user_id);
        }
        // dd($history);
        foreach($history as $visit){
            $employee[] = Employee::find($visit->employee_id);
        }
        foreach($employee as $visit){
            $employeeUser[] = User::find($visit->user_id);
        }
        // dd($employee);

        // dd($history);
        // dd($doctors);

        return view("userExamination",['visits'=>$visits,'doctors'=>$doctors,'history'=>$history,'employees'=>$employeeUser]);
    }

    public function endExamination(){
        $doctor = User::find(Auth::user()->id);
        $visits = Schedule_visit::where('employee_id',$doctor->employees->id)->get();
        $users = array();
        foreach($visits as $visit){
            $users[] = User::find($visit->user_id);
        }
        // dd($users);
        $examinations = Medical_examination::all();

        return view("doctor.userExamination",['users'=>$users,'visits'=>$visits,'examinations'=>$examinations]);
    }
}
