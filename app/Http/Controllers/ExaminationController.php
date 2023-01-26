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
            "examinationName" => ['required', 'string','regex:/^[A-ZŻŹŁĆŚ]{1}[a-zżćńłąśęó]/'],
            "price" => ['required','decimal:2'],
            "id" => ['required']
          ]);
          
        if ($req['id'] === "-1"){
            $examination = new Medical_examination();
            
        }
        else{
            $examination = Medical_examination::find($req['id']);

        }
        $examination->name = $req['examinationName'];
        $examination->price = $req['price'];
        
        $examination->save();
       
        return redirect('/createExamination');
        
    }
    public function deleteExamination(Request $req){
        $examination = Medical_examination::find($req['id']);
        $examination->delete();
        // redirect()->route('createExamination', 301, [], true);
        // $this->createExamination();
    }
}
