@extends('layouts.admin')

@section('title', 'Create New Blog Post')

@section('content')

	<div class="row justify-content-center">
		<div class="col-sm-10">
			{{ Form::open(['route' => 'admin.blog.store', 'method' => 'POST']) }}
				<label for="title">Post Title</label>
				<input type="text" class="form-control form-control-lg" name="title" id="title" placeholder="I'm thinking about...">

				<label for="subtitle" class="mt-3">Subtitle</label>
				<input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="You can entice more people to read by adding a subtitle!">
				
				<div class="row mt-3">
					<div class="col-sm-12">
						<textarea name="body">
							Start writing the next great story...
						</textarea>
					</div>
				</div>
				
				<button class="btn btn-success btn-block btn-sm mt-3">Submit Post</button>
			{{ Form::close() }}
		</div>
	</div>

@endsection

@section('scripts')
	
	<x-tiny-m-c-e/>

@endsection