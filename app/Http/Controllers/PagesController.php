<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	// Home Page
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();

    	return view('index')
                        ->withPosts($posts);
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

    // Resources Page
    public function resources() {
        return view('pages.resources');
    }

    public function whoops() {
        return view('pages.404');
    }
}
