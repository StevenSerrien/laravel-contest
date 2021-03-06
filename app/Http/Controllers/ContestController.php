<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Contest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $contestsWithQuestions = Contest::with('questions')->ContestsStartingFromToday()->get();
        return view('pages/contest-home', compact(['contestsWithQuestions']));
    }

    public function show($id) {
      $contest_id = $id;
      $contest = Contest::with('questions')->find($id);

      //Check if authenticated user already filles in the forms
      $loggedUser = Auth::user();
      $alreadyDidContest = $loggedUser->contests->contains($contest_id);


      if (is_null($contest)) {
        return redirect('/404');
      }
      else
      {
        if (!$alreadyDidContest) {
          return view('pages/contest-detail', compact(['contest']));
        }
        else
        {
          return redirect('/contests/error');
        }

      }

    }

    public function alreadyCompeted() {
      return view('pages/contest-already-completed');
    }



    public function store(Request $request){

      //Get contest id from hidden field on form
      $contest_id = $request->input('contest_id');

      //Check if authenticated user already filles in the forms
      $loggedUser = Auth::user();
      $alreadyDidContest = $loggedUser->contests->contains($contest_id);

      if (!$alreadyDidContest) {
        //Method 2: validation on forms
        $this->validate($request, ['userAnswer1' => 'required', 'userAnswer2' => 'required']);

        //Logic to check if user has given correct answers

        $contest = Contest::with('questions')->find($contest_id);
        $questions = $contest->questions;

        //Get correct answers from database
        $correctFirstAnswer = strtolower($questions[0]->answer);
        $correctSecondAnswer = strtolower($questions[1]->answer);

        //Get answers from form filled in by user
        $userFirstAnswer = strtolower($request->input('userAnswer1'));
        $userSecondAnswer = strtolower($request->input('userAnswer2'));

        if (($correctFirstAnswer == $userFirstAnswer) &&  ($correctSecondAnswer == $userSecondAnswer)) {
          Auth::user()->contests()->attach($contest_id);
          return redirect('/contests/completion');
        }
        else {
          return redirect('/contests/completion');
        }
      }
      else{
        return redirect('/contests/error');
      }
    }
}
