<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Carbon\Carbon;
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
        $currentDate = Carbon::now();
        $date= [];

        for($i=1; $i<7; $i++) {
            array_push($date,$currentDate->addDays($i));
        }
        // dd($date);
        return view("createVisit",['doctors'=>$doctors]);
    }
}
