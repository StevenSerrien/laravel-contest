<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\User;
use App\Contest;

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
        return view('admin.dashboard', compact(['users', 'contests']));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function createContest()
    {
        return redirect('/dashboard');
    }


    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();

      return redirect('/dashboard');
    }

}
