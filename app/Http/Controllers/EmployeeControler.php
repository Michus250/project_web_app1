<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;

class EmployeeControler extends Controller
{
    public function createEmployee(Request $req){
        $employee = new Employee;
        $employee->user_id = $req['id'];
        $employee->save();
        User::where('id',$req['id'])->update(['status'=>$req['status']]);
        // return redirect(asset('/'));
    }
}
