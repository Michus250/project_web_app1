<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Schedule_visit;
use App\Models\Medical_examination;
use App\Models\Users_examination;
use Illuminate\Support\Facades\Auth;
use DateTime;


class ScheludeVisitsController extends Controller
{
    public function createVisit(Request $req){
        $this->validate(request(), [
            "dateJs" => ['unique:App\Models\Schedule_visit,date,employee_id']
          ]);
        // dd($req->all());
        foreach($req as $item){
            $item = $item = filter_var($item, FILTER_SANITIZE_STRING);
        }
        
        $visit = new Schedule_visit;
        $visit->user_id = Auth::user()->id;
        $visit->employee_id = $req['id'];
        // $date = $req['date']." ".$req['hour'].":00";
        // dd($req['date']);
        $dateSave = DateTime::createFromFormat('d-m-Y H:i:s', $req['dateJs']);
        $visit->date = $dateSave;
        // dd($dateSave);
        $visit->save();
        // dd($date);
        // dd($req->all());
        return redirect(asset("/"));


    }
    public function endExamination(Request $req){
        // dd($req->all());
        foreach($req as $item){
            $item = $item = filter_var($item, FILTER_SANITIZE_STRING);
        }
        $price =0;
        foreach($req['examinations'] as $item){
            $medical = Medical_examination::find($item);
            $price+= $medical->price;
        }

        $examination = new Users_examination;
        $examination->user_id = $req['user_id'];
        $examination->employee_id = $req['employee_id'];
        $examination->name = $req['nameExamination'];
        $examination->description = $req['description'];
        $examination->price = $price;
        $examination->save();
        
        $visit = Schedule_visit::find($req['visit_id']);
        $visit->delete();
        

        return redirect(asset("/endExamination"));

    }


    
    
}
