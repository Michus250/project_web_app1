<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Enum\UsersRole;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }
    public function createEmployee(){
        $users = User::all();
        return view('createEmployee',['users'=>$users,'status'=>UsersRole::TYPES]);
    }
}
