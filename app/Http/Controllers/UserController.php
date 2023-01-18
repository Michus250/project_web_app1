<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Enum\UsersRole;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }
    public function createEmployee(){
        $users = User::all();
        return view('createEmployee',['users'=>$users,'status'=>UsersRole::TYPES]);
    }
    public function changeData(){
        $user = Auth::user();
        return view('changeData',['user'=>$user]);
    }
    public function changeUserData(Request $req){
        
        $this->validate(request(), [
            "name" => ['required', 'string', 'max:25','regex:/^[A-ZŻŹŁĆŚ]{1}[a-zżćńłąśęó]/'],
            "surname"  => ['required', 'string', 'max:25','regex:/^[A-ZŻŹŁĆŚ]{1}[a-zżćńłąśęó]/'],
            
            
            'address' => ['required', 'string','min:2'],
            
            "phone_number" => ['required','regex:/^[0-9]/','string','size:9'],
          ]);

          $user = User::find(Auth::user()->id);
          $user->update($req->all());
          return redirect(asset('/changeData'));

        }
    public function createEmployeeRecord(Request $req){
        $name = $req->get('name');
        // $number = $request->get('number');
        return redirect(asset('/'));
    }
    
}
