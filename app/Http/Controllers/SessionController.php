<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function signin(){
        return view('pages.signin');
    }
}
