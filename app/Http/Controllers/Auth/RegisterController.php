<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;
use App\Enum\UsersRole;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $date =strtotime("1 January 1910");
        return Validator::make($data, [
            "name" => ['required', 'string', 'max:25','regex:/^[A-ZŻŹŁĆŚ]{1}[a-zżćńłąśęó]/'],
            "surname"  => ['required', 'string', 'max:25','regex:/^[A-ZŻŹŁĆŚ]{1}[a-zżćńłąśęó]/'],
            "personal_id_number" => ['required', 'string','unique:App\Models\User,personal_id_number','regex:/^[0-9]/','size:11'],
            "date_of_birth" => ['required',"after:$date","before:now"],
            'address' => ['required', 'string','min:2'],
            "email" => ['required', 'string', 'email', 'max:255', 'unique:App\Models\User,email'],
            "phone_number" => ['required','regex:/^[0-9]/','string','size:9'],
            
            "password" => ['required', 'string', 'min:4', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       
        
       
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'personal_id_number' => $data["personal_id_number"],
            'phone_number' => $data["phone_number"],
            'address' => $data["address"],
            'email' => $data["email"],
            'password' => Hash::make($data["password"]),
            
            'date_of_birth' => $data["date_of_birth"],
            'status' => UsersRole::USER,
        ]);
    }
}
