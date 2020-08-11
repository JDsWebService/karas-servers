@extends('layouts.admin')

@section('title', 'Blog Posts Index')

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-sm-2">
			<a href="{{ route('admin.blog.create') }}" class="btn btn-sm btn-success btn-block">
				<i class="far fa-plus-square"></i> Create New Post
			</a>
		</div>
	</div>
	@if($posts->count() == 0)
		<div class="row justify-content-center mt-4">
			<div class="col-sm-6 text-center">
				<h1>Uh-Oh! No Posts To Show Here Yet!</h1>
				<p class="lead">Click on the add new post button above to get started!</p>
			</div>
		</div>
	@else
		<table class="table table-dark table-hover table-sm table-borderless mt-3 text-center">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Title</th>
					<th scope="col">Created By</th>
					<th scope="col">Created At</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<th scope="row">{{ $post->id }}</th>
						<td>{!! $post->title !!}</td>
						<td>{{ $post->user->username }}</td>
						<td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</td>
						<td>
							<a href="{{ route('admin.blog.edit', $post->slug) }}" class="btn btn-secondary btn-sm">
								<i class="far fa-edit"></i> Edit
							</a>
							<a href="{{ route('blog.show', $post->slug) }}" class="btn btn-warning btn-sm" target="_blank">
								<i class="far fa-eye"></i> View
							</a>
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>

		<div class="pagination">
			{{ $posts->links() }}
		</div>
	@endif

@endsection