@extends('layouts.admin')

@section('title', 'Create Ingredient')

@section('content')

	<div class="row">

		<div class="col-sm-12">
			{{ Form::open(['route' => 'admin.resources.ingredients.store', 'files' => true]) }}
				<label for="name">Ingredident Name</label>
				{{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Azulberry']) }}
				
				@include('components.fileupload')

				<button type="submit" class="btn btn-success mt-4 btn-block"><i class="far fa-plus-square"></i> Add Ingredient</button>
			{{ Form::close() }}
		</div>

	</div>

@endsection