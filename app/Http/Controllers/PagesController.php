<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	return view('comingsoon.index');
    }

    public function comingsoon() {
    	return view('comingsoon.index');
    }
}
