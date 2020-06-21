<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // This will block access to all the methods from unauthenticated users.
        $this->middleware('auth');

        // This will also block access to unverified authenticated users.
        $this->middleware(['auth','verified']);

        // Other use cases: multiple middlewares, multiple method exceptions
        //$this->middleware(['...', '...']])->except(['...', '...']);
    }    
    
    public function about(){
        return view('pages.about');
    }

    public function tocPage(){
        return view('pages.toc-page');
    }

    //Contact form
}
