<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\User;
use App\Contest;
use App\Question;
// use Request;


class AdminController extends Controller
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
        $users = User::all();
        $contests = Contest::all();
        $contestsWithQuestions = Contest::with('questions')->get();
        return view('admin.dashboard', compact(['users', 'contests', 'contestsWithQuestions']));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function createContest()
    {
        return redirect('/dashboard');
    }

    public function store(Request $request){
      $contest = Contest::create([
          'name' => $request->get('name'),
          'description' => $request->get('description'),
          'start_date' => $request->get('start_date'),
          'end_date' => $request->get('end_date')
      ]);
       Question::create([
          'question' => $request->get('question1'),
          'answer' => $request->get('answer1'),
          'contest_id' => $contest->id
      ]);

      Question::create([
          'question' => $request->get('question2'),
          'answer' => $request->get('answer2'),
          'contest_id' => $contest->id
      ]);

      return redirect('/dashboard');


    }


    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();

      return redirect('/dashboard');
    }

}
