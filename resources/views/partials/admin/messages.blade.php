{{-- Primary Alert --}}
@if(Session::has('primary'))
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<strong>Note to User:</strong> {{ Session::get('primary') }}

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

{{-- Secondary Alert --}}
@if(Session::has('secondary'))
	<div class="alert alert-secondary alert-dismissible fade show" role="alert">
		<strong>Note to User:</strong> {{ Session::get('secondary') }}

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

{{-- Success Alert --}}
@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

{{-- Danger Alert --}}
@if(Session::has('danger'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Error:</strong> {{ Session::get('danger') }}

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

{{-- Warning Alert --}}
@if(Session::has('warning'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Something Went Wrong!</strong>
		<br>
		{{ Session::get('warning') }}

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

{{-- Informational Alert --}}
@if(Session::has('info'))
	<div class="alert alert-info alert-dismissible fade show" role="alert">
		<strong>Heads Up!</strong> {{ Session::get('info') }}

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

{{-- Light Alert --}}
@if(Session::has('light'))
	<div class="alert alert-light alert-dismissible fade show" role="alert">
		<strong>Note to User:</strong> {{ Session::get('light') }}

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

{{-- Dark Alert --}}
@if(Session::has('dark'))
	<div class="alert alert-dark alert-dismissible fade show" role="alert">
		<strong>Note to User:</strong> {{ Session::get('dark') }}

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

{{-- Authentication Alerts --}}
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Note to User:</strong> {{ session('status') }}

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

{{-- If the page has any errors passed to it --}}
@if(count($errors) > 0)

	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Errors:</strong>

		<ul>
			@foreach($errors->all() as $error)
				
				<li>{{ $error }}</li>

			@endforeach
		</ul>

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

@endif