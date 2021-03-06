<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
	// Home Page
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();

    	return view('index')
                        ->withPosts($posts);
    }

    // Merch Page
    public function merch() {
        return redirect()->to('https://www.redbubble.com/people/Karas-Worlds/shop?asc=u');
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

    public function xplay() {
        $fileName = "xplay.ini";
        $fileContents = Storage::disk('public')->get('server-config/xplay.ini');
        $headers = [
            'Content-type'=>'text/plain',
            'Content-Disposition' => sprintf('inline; filename="%s"', $fileName),
        ];
        return Response::make($fileContents, 200, $headers);
    }
}
