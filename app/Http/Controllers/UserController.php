<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $user = Auth::user();

        // return view('pages.404');
        return view('admin.dashboard')
            ->withUser($user);
    }
}
