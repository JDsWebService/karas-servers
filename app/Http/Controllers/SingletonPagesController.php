<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SingletonPagesController extends Controller
{
    // Index Page
    public function index() {
        return view('app.pages.index');
    }
}
