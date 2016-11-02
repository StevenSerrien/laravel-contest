<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// use App\Http\Controllers\Auth\IpAddress;
use App\Log;


class PagesController extends Controller
{
    public function index() {


      return view('pages/home');
    }

    public function contestsHome() {
      return view('pages/contest-home');
    }
}
