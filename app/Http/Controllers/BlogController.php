<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
	// Blog Index
	public function index() {
		return view('blog.index');
	}
	
    // Single Blog Post
    public function show() {
    	return view('blog.show');
    }
}
