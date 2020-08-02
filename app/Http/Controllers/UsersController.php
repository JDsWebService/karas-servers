<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // User Dashboard
    public function dashboard() {
        return view('pages.404');
    	// return view('user.dashboard');
    }
}
