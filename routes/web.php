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

Route::get('/contest', 'PagesController@contestHome');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', 'AdminController@index');

Route::get('/sql', function(){
  // $user = User::create(['firstName' => 'Edward', 'lastName' => 'Vereertbrugghen',
  // 'streetName' => 'Kammenstraat', 'houseNumber' => '18',
  // 'city' => 'Antwerpen', 'country' => 'Belgium', 'email' => 'e.vereertbrugghen@gmail.com', 'password' => 'hallo123']);


  return User::with('roles')->find(9);
});
