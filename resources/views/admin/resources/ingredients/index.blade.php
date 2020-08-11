@extends('layouts.admin')

@section('title', 'Ingredients Index')

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-sm-4">
			<a href="{{ route('admin.resources.ingredients.create') }}" class="btn btn-sm btn-success btn-block">
				<i class="far fa-plus-square"></i> Create New Ingredient
			</a>
		</div>
	</div>
	@if($ingredients->count() == 0)
		<div class="row justify-content-center mt-4">
			<div class="col-sm-6 text-center">
				<h1>Uh-Oh! No Ingredients To Show Here Yet!</h1>
				<p class="lead">Click on the add new ingredient button above to get started!</p>
			</div>
		</div>
	@else
		<table class="table table-dark table-hover table-sm table-borderless mt-3 text-center">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Preview Image</th>
					<th scope="col">Created At</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($ingredients as $ingredient)
					<tr>
						<th scope="row">{{ $ingredient->id }}</th>
						<td>{{ $ingredient->name }}</td>
						<td>
							<img src="{{ $ingredient->publicPath }}" alt="{{ $ingredient->name }} Preview" style="width: 16px; height: 16px;">
						</td>
						<td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($ingredient->created_at))->diffForHumans() }}</td>
						<td>
							<a href="{{ route('admin.resources.ingredients.edit', $ingredient->id) }}" class="btn btn-secondary btn-sm">
								<i class="far fa-edit"></i> Edit
							</a>
							<button class="btn btn-danger btn-sm" form="deleteIngredientForm{{ $ingredient->id }}">
								<i class="far fa-trash-alt"></i> Delete
							</button>
							{{ Form::open(['route' => ['admin.resources.ingredients.delete', $ingredient->id], 'id' => 'deleteIngredientForm' . $ingredient->id ])}}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>

		<div class="pagination">
			{{ $ingredients->links() }}
		</div>
	@endif

@endsection