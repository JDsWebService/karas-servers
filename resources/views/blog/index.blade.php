@extends('layouts.app')

@section('title', 'Blog Index')

@section('content')

	<section class="blog section" id="blog">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <div class="title text-center">
	                    <h4>Our untold story</h4>
	                    <h2>Blog & Events</h2>
	                    <span class="border"></span>
	                    <p>Read more about what's going on in Kara's World's!</p>
	                </div>
	            </div>
	        </div>
	        <div class="row justify-content-center">
	        	@if($posts->count() == 0)
					<div class="col-sm-6 text-center">
						<h1>Uh-Oh! Looks like we haven't added anything here yet!</h1>
						<p class="lead">Let an admin know that they need to post something!</p>
					</div>
	        	@endif
	        	@foreach($posts as $post)
		            <!-- single blog post -->
		            <article class="col-md-4 col-sm-6" >
		                <div class="post-item">
		                    {{-- <div class="post-thumb">
		                        <img class="img-fluid shadow rounded" src="images/blog/post-1.jpg" alt="Generic placeholder image">
		                    </div> --}}
		                    <div class="post-title">
		                        <h3 class="mt-0"><a href="">{{ $post->title }}</a></h3>
		                    </div>
		                    <div class="post-meta">
		                        <span>By</span> <a href="#">{{ $post->user->username }}</a>
		                    </div>
		                    <div class="post-content">
		                        <p>
		                        	{!! $post->smallBody !!}
		                        </p>
		                    </div>
		                    <a class="btn btn-main" href="{{ route('blog.show', $post->slug) }}">Read more</a>
		                </div>
		            </article>
		            <!-- /single blog post -->
	            @endforeach

	            <div class="pagination">
	            	{{ $posts->links() }}
	            </div>
	            
	            
	            
	        </div> <!-- end row -->
	    </div> <!-- end container -->
	</section> <!-- end section -->

@endsection