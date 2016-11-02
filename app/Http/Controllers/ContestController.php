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

      if (is_null($contest)) {
        return redirect('/404');
      }
      else
      {
        return view('pages/contest-detail', compact(['contest']));
      }

    }



    public function store(Request $request){
      //Method 2: validation on forms
      $this->validate($request, ['userAnswer1' => 'required', 'userAnswer2' => 'required']);

      //Logic to check if user has given correct answers
      //Get contest id from hidden field on form
      $contest_id = $request->input('contest_id');
      $contest = Contest::with('questions')->find($contest_id);
      $questions = $contest->questions;

      //Get correct answers from database
      $correctFirstAnswer = strtolower($questions[0]->answer);
      $correctSecondAnswer = strtolower($questions[1]->answer);

      //Get answers from form filled in by user
      $userFirstAnswer = strtolower($request->input('userAnswer1'));
      $userSecondAnswer = strtolower($request->input('userAnswer2'));

      if (($correctFirstAnswer == $userFirstAnswer) &&  ($correctSecondAnswer == $userSecondAnswer)) {
        return redirect('/404');
      }


      return redirect('/contests');


    }



}
