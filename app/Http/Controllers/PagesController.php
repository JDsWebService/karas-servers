<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	// Home Page
    public function index() {
    	return view('index');
    }

    // Coming Soon Page
    public function comingsoon() {
    	return view('comingsoon.index');
    }

    // FAQ Page
    public function faq() {
    	return view('pages.faq');
    }

    // About Us Page
    public function about() {
        return view('pages.about');
    }
}
