<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Contest;
use Carbon\Carbon;

class ContestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contestsWithQuestions = Contest::with('questions')->ContestsUntilToday()->get();
        return view('pages/contest-home', compact(['contestsWithQuestions']));
    }

    public function show($id) {
      $contest = Contest::with('questions')->find($id);

      dd($contest->end_date);

      if (is_null($contest)) {
        return redirect('/404');
      }
      return view('pages/contest-detail', compact(['contest']));
    }



    public function store(Request $request){


      return redirect('/contests');


    }



}
