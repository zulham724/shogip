<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Biodata;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


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
    protected $redirectTo = '/homeumkm?login=true';

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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'role_id'=>2,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        $biodata = new Biodata;
        $biodata->user_id = $user->id;
        $biodata->first_name = $data["first_name"];
        $biodata->last_name = $data["last_name"];
        $biodata->birth_of_date = $data["birth_of_date"];
        $biodata->province_id = $data["province_id"];
        $biodata->city_id = $data["city_id"];
        $biodata->district_id = $data["district_id"];
        $biodata->identify_number = $data["identify_number"];
        $biodata->save();
        // $biodata['biodata']->fill($biodata->except(['name','email','password','role_id']));
        // dd($biodata);
        return $user;
    }
}
