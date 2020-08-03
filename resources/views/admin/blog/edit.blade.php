@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')

	<div class="row justify-content-center">
		<div class="col-sm-9">
			{{ Form::model($post, ['route' => ['admin.blog.update', $post->slug], 'id' => 'editPostForm']) }}
				<label for="title">Post Title</label>
				{{ Form::text('title', null, ['class' => 'form-control form-control-lg', 'id' => 'title', 'placeholder' => "I'm thinking about ..."]) }}
				{{-- <input type="text" class="form-control form-control-lg" name="title" id="title" placeholder="I'm thinking about..."> --}}

				<label for="subtitle" class="mt-3">Subtitle</label>
				{{ Form::text('subtitle', null, ['class' => 'form-control', 'id' => 'subtitle', 'placeholder' => 'You can entice more people to read by adding a subtitle!']) }}
				{{-- <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="You can entice more people to read by adding a subtitle!"> --}}
				
				<div class="row mt-3">
					<div class="col-sm-12">
						{{ Form::textarea('body') }}
					</div>
				</div>
			{{ Form::close() }}
			{{ Form::open(['route' => ['admin.blog.delete', $post->slug], 'id' => 'deletePostForm'])}}
			{{ Form::close() }}
		</div>
		<div class="col-sm-3">
			<button class="btn btn-success btn-block mt-3" form="editPostForm">Submit Post</button>
			<button class="btn btn-danger btn-block mt-3" form="deletePostForm">Delete Post</button>
		</div>
	</div>

@endsection

@section('scripts')
	
	<x-tinymce/>

@endsection