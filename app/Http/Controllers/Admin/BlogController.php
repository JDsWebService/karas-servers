<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Grab All Posts
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.blog.index')
                                ->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|string',
            'subtitle' => 'nullable|max:255|string',
            'body' => 'required'
        ]);

        $post = new Post;

        $post->title = Purifier::clean($request->title);
        $post->subtitle = Purifier::clean($request->subtitle);
        $post->body = Purifier::clean($request->body);
        $post->slug = Str::slug($post->title, "-") . "-" . strtotime(Carbon::now());
        $post->user_id = Auth::user()->id;
        // Add Image Support Later On

        if($post->save()) {
            Session::flash('success', 'Post added!');
        } else {
            Session::flash('danger', 'Something went wrong when adding the post!');
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  str  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('admin.blog.edit')
                            ->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();

        if($post == null) {
            Session::flash('danger', 'Post not found in database, something went wrong');
            return redirect()->back()->withInput();
        }

        $post->title = Purifier::clean($request->title);
        $post->subtitle = Purifier::clean($request->subtitle);
        $post->body = Purifier::clean($request->body);
        
        if($post->save()) {
            Session::flash('success', 'Post has been updated');
        } else {
            Session::flash('danger', 'Something went wrong when saving the post. Please try again.');
            return redirect()->back()->withInput();
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  str  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // Find the Post in the database
        $post = Post::where('slug', $slug)->first();

        if($post == null) {
            Session::flash('danger', 'Can not find the post in the database. Can not delete');
            return redirect()->back()->withInput();
        }

        if($post->delete()) {
            Session::flash('success', 'Deleted the post from the database');
            return redirect()->route('admin.blog.index');
        }

        return dd('Something MAJOR happened in App\Http\Controllers\Admin\BlogController@destroy');
    }
}
