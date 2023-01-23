<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
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
}
