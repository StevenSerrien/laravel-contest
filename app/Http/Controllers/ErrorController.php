<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function denied() {
      return view('errors/denied');
    }

    public function notFound() {
      return view('errors/404');
    }


    
}
