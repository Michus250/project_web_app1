<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\Schedule_visit;
use App\Models\Medical_examination;
use Illuminate\Support\Facades\Auth;

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
        
        $week = array();
        for ($i = 1; $i < 8; $i++) {
        $week[] = Carbon::now()->addDays($i);
        }
        
        
        return view("createVisit",['doctors'=>$doctors,'date'=>$week]);
    }
    public function userExamination(){
        $visits = Schedule_visit::where('user_id',Auth::user()->id)->with('employees')->get();
        $doctors = array();
        foreach($visits as $visit){
            $doctors[] = User::find($visit->employees->user_id);
        }
        // dd($doctors);

        return view("userExamination",['visits'=>$visits,'doctors'=>$doctors]);
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
