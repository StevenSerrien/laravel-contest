<?php

use App\User;
use App\Role;
use App\Contest;
Use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/', 'PagesController@index');

Route::get('/contests', 'ContestController@index');
Route::get('/contests/completion', function(){
  return view('pages/contest-completion');
});
Route::get('/contests/error', 'ContestController@alreadyCompeted');
Route::get('/contests/{id}', 'ContestController@show');
Route::post('/contests', 'ContestController@store');




Auth::routes();

Route::group(['middleware' => 'admin'], function()
{
  Route::get('/dashboard', 'AdminController@index');
  Route::get('/dashboard/create', 'AdminController@create');
  Route::post('/dashboard', 'AdminController@store');
  Route::get('/dashboard/contests/{id}', 'AdminController@checkCompetitors');
  Route::get('/user/delete/{id}', 'AdminController@destroy');


});

Route::get('/home', 'HomeController@index');


Route::get('/denied', 'ErrorController@denied');

Route::get('/404', 'ErrorController@notFound');







Route::get('/sql', function(){

$contestsWithoutWinner = Contest::all()->where('winner_id', NULL);

foreach ($contestsWithoutWinner as $contest) {
  $now = Carbon::now();
  $end_date = Carbon::parse($contest->end_date);

  if ($now->gte($end_date)) {
  $winner = Contest::find($contest->id)->users()->inRandomOrder()->first();
  $winner_id = Contest::find($contest->id)->users()->inRandomOrder()->first()->id;

 $contest->winner_id = $winner_id;
 $contest->save();

 return $contest;


  }

}

// return $users->inRandomOrder()->first();



  // return $users = Contest::find(17)->users()->get();

    // return Contest::with('questions')->find(13);

  // Get all contests with their questions in JSON
  // return Contest::with('questions')->findOrFail(8);

// return Contest::where('id', 8)->with('questions')->get();
  //  return Auth::user()->roles()->first()->name;
    //Auth::user()->roles()->attach(2);
  // $user = User::where('firstName', 'Scarlett')->first();
  // $user->roles()->attach(2);



  // User::withTrashed()->find(10)->restore();

  // $user = User::where('id', 10)->first();
  // $user->roles()->attach(1);

  // $user = User::where('firstName', 'Steven')->with('roles')->first();
  // return $user->roles[0]->name;
  //  $user = User::create(['firstName' => 'Edward', 'lastName' => 'Vereertbrugghen',
  //  'streetName' => 'Kammenstraat', 'houseNumber' => '18',
  //  'city' => 'Antwerpen', 'country' => 'Belgium', 'email' => 'e.vereertbrugghen@gmail.com', 'password' => 'hallo123']);


  //return User::with('roles')->find(9);
});
