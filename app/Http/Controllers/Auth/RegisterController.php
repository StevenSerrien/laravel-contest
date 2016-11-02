<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth\IpAddress;
use App\Log;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'streetName' => 'required|max:255',
            'houseNumber' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'streetName' => $data['streetName'],
            'houseNumber' => $data['houseNumber'],
            'city' => $data['city'],
            'country' => $data['city'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        //Add default member role to new users
        $user->roles()->attach(2);

        //Store IP on initial register
        $ip = Log::firstOrCreate(['user_id' => $user->id, 'ipaddress' => request()->ip()]);
        return $user;



}
}
