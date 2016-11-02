<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Auth\IpAddress;
use App\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Store IP on initial register
        $loggedUser = Auth::user();
        $ip = Log::firstOrCreate(['user_id' => $loggedUser->id, 'ipaddress' => request()->ip()]);

        return view('home');
    }
}
