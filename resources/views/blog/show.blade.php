@extends('layouts.app')

@section('title', $post->title)

@section('content')

	<section class="section-default section-xs" id="blogShow">
	    <div class="container">
	        <div class="row">
	            
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-9">
							<h1>{!! $post->title !!}</h1>
						</div>
						<div class="col-sm-3 text-right">
							<a href="{{ route('blog.index') }}" class="btn btn-sm"><< Go Back</a>
						</div>
					</div>
					<hr>
					<p class="lead">
						{!! $post->subtitle !!}
					</p>
					<p class="text-muted">By {{ $post->user->username }}</p>
					{!! $post->formattedBody !!}
				</div>

			</div>
		</div>
	</section>

@endsection