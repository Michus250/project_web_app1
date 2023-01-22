<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeControler extends Controller
{
    public function createEmployee(Request $req){
        $employee = new Employee;
        $employee->user_id = $req['id'];
        $employee->save();
        User::where('id',$req['id'])->update(['status'=>$req['status']]);
        // return redirect(asset('/'));
    }
    public function changeHoursDoctor(){
        $user = User::find(Auth::user()->id);
        $employee = $user->employee;
        if ($employee->work_hours === null){
            $work_hours = [
                'Monday' => ['open' => '09:00', 'close' => '17:00','isWorking'=>'true'],
                'Tuesday' => ['open' => '09:00', 'close' => '17:00','isWorking'=>'true'],
                'Wednesday' => ['open' => '09:00', 'close' => '17:00','isWorking'=>'true'],
                'Thursday' => ['open' => '09:00', 'close' => '17:00','isWorking'=>'true'],
                'Friday' => ['open' => '09:00', 'close' => '17:00','isWorking'=>'true'],
                'Saturday' => ['open' => '09:00', 'close' => '14:00','isWorking'=>'true'],
                'Sunday' => ['open' => '00:00', 'close' => '00:00','isWorking'=>'false'],
            ];
            
        }

        return view('doctor.changeHours',['employee'=>$employee,'user'=>$user,'work_hours'=>$work_hours]);
    }
    public function changeHoursDoctorJson(){
        
    }
    
}
