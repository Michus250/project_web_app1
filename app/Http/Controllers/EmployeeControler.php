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
        $employee = $user->employees;
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
        else{
            $work_hours = $employee->work_hours;
            $work_hours = json_decode($work_hours, true); 
        }

        return view('doctor.changeHours',['employee'=>$employee,'user'=>$user,'work_hours'=>$work_hours]);
    }
    public function changeHoursDoctorJson(Request $req){
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        $i=0;
        $data = [];
        // $data = $req->all();
        // dd($data);
        // dd($req);
        foreach($days as $item){
            
            $data = array_merge($data,[$item=>['open'=>$req["open.$i"], 'close'=>$req["close.$i"], 'isWorking'=>$req["isWorking.$i"]]]);

            
            $i+=1;
        }
        // dd($data);
        $data = json_encode($data);
       
        $employee = Employee::where('user_id',Auth::user()->id)->first();
        
        $employee->update(['work_hours'=>$data]);
        return redirect(asset('/changeHours'));
        
    }
    
    
}
