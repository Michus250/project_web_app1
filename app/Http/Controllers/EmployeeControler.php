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
                'Monday' => ['open' => '9:00 AM', 'close' => '5:00 PM','isWorking'=>'true'],
                'Tuesday' => ['open' => '9:00 AM', 'close' => '5:00 PM','isWorking'=>'true'],
                'Wednesday' => ['open' => '9:00 AM', 'close' => '5:00 PM','isWorking'=>'true'],
                'Thursday' => ['open' => '9:00 AM', 'close' => '5:00 PM','isWorking'=>'true'],
                'Friday' => ['open' => '9:00 AM', 'close' => '5:00 PM','isWorking'=>'true'],
                'Saturday' => ['open' => '9:00 AM', 'close' => '2:00 PM','isWorking'=>'true'],
                'Sunday' => ['open' => 'Closed', 'close' => 'Closed','isWorking'=>'false'],
            ];
            
        }

        return view('doctor.changeHours',['employee'=>$employee,'user'=>$user,'work_hours'=>$work_hours]);
    }
    public function changeHoursDoctorJson(){
        
    }
    
}
