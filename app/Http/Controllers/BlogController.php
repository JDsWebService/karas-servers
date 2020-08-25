<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
	// Blog Index
	public function index() {
		$posts = Post::orderBy('created_at', 'desc')->paginate(6);

		return view('blog.index')
								->withPosts($posts);
	}
	
    // Single Blog Post
    public function show($slug) {
    	$post = Post::where('slug', $slug)->first();

    	if($post == null) {
    		Session::flash('warning', 'Post not found! Contact an administrator if this problem persists.');
    		return redirect()->back();
    	}

    	return view('blog.show')
    							->withPost($post);
    }
}
