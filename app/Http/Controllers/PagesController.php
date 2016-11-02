<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Contest;

// use App\Http\Controllers\Auth\IpAddress;
use App\Log;


class PagesController extends Controller
{
    public function index() {

      $contestsWithWinners = Contest::where('winner_id', '!=', null)->join('users', 'users.id', '=','contests.winner_id')->orderBy('end_date', 'ASC')->get();
      return view('pages/home', compact(['contestsWithWinners']));
    }

    public function contestsHome() {

      return view('pages/contest-home');
    }
}
