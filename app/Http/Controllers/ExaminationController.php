<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medical_examination;


class ExaminationController extends Controller
{
    public function createExamination(){
        $examination = Medical_examination::get();
        
        return view("employee.createExamination",['examination'=>$examination]);
    }
    public function createExaminationPost(Request $req){
        $this->validate(request(), [
            "examinationName" => ['required', 'string','regex:/^[A-ZŻŹŁĆŚ]{1}[a-zżćńłąśęó]/','unique:App\Models\Medical_examination,name'],
            "price" => ['required','decimal:2']
         
          ]);
        
        $examination = new Medical_examination();
        $examination->name = $req['examinationName'];
        $examination->price = $req['price'];
        // dd($examination);
        $examination->save();
        return redirect('/createExamination');
        
    }
}
