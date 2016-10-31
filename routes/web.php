<?php

use App\User;
use App\Role;

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

Route::get('/contests', 'PagesController@contestsHome');

Auth::routes();

Route::group(['middleware' => 'admin'], function()
{
  Route::get('/dashboard', 'AdminController@index');
});

Route::get('/home', 'HomeController@index');


Route::get('/denied', 'ErrorController@denied');




Route::get('/user/delete/{id}', 'AdminController@destroy');


Route::get('/sql', function(){

   return Auth::user()->roles()->first()->name;
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
