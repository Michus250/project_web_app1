<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Schedule_visit;
use Illuminate\Support\Facades\Auth;
use DateTime;


class ScheludeVisitsController extends Controller
{
    public function createVisit(Request $req){
        $visit = new Schedule_visit;
        $visit->user_id = Auth::user()->id;
        $visit->employee_id = $req['id'];
        $date = $req['date']." ".$req['hour'].":00";
        // dd($req['date']);
        $dateSave = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        $visit->date = $dateSave;
        // dd($dateSave);
        $visit->save();
        // dd($date);
        // dd($req->all());
        return redirect(asset("/"));


    }
    
}
