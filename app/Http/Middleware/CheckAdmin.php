<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if ( Auth::user()->roles()->first()->name == "administrator" ){
        return $next($request);
      }
      else {
        return redirect('/denied');
      }
      //
      // $user = User::where('firstName', 'Steven')->with('roles')->first();
      // return $user->roles[0]->name;
    }
}
