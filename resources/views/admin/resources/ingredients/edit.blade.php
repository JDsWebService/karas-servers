@extends('layouts.admin')

@section('title', 'Edit Ingredient')

@section('content')

	<div class="row">

		<div class="col-sm-12">
			{{ Form::model($ingredient, ['route' => ['admin.resources.ingredients.update', $ingredient->id], 'files' => true]) }}
				<label for="name">Ingredident Name</label>
				{{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Azulberry']) }}
				
				@include('components.fileupload')
				<p class="text-sm text-info"><strong>Note:</strong> You do not have to upload an image file unless you are changing the ingredients image.</p>

				<button type="submit" class="btn btn-success mt-4 btn-block"><i class="far fa-save"></i> Save Changes</button>
			{{ Form::close() }}
		</div>

	</div>

@endsection