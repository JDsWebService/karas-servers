
{{-- Primary Alert --}}
@if(Session::has('primary'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
					<strong>Note to User:</strong> {{ Session::get('primary') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- Secondary Alert --}}
@if(Session::has('secondary'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-secondary alert-dismissible fade show" role="alert">
					<strong>Note to User:</strong> {{ Session::get('secondary') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- Success Alert --}}
@if(Session::has('success'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success:</strong> {{ Session::get('success') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- Danger Alert --}}
@if(Session::has('danger'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Error:</strong> {{ Session::get('danger') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- Warning Alert --}}
@if(Session::has('warning'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Something Went Wrong!</strong>
					<br>
					{{ Session::get('warning') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- Informational Alert --}}
@if(Session::has('info'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-info alert-dismissible fade show" role="alert">
					<strong>Heads Up!</strong> {{ Session::get('info') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- Light Alert --}}
@if(Session::has('light'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-light alert-dismissible fade show" role="alert">
					<strong>Note to User:</strong> {{ Session::get('light') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- Dark Alert --}}
@if(Session::has('dark'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-dark alert-dismissible fade show" role="alert">
					<strong>Note to User:</strong> {{ Session::get('dark') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- Authentication Alerts --}}
@if(Session::has('status'))
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Note to User:</strong> {{ session('status') }}

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

{{-- If the page has any errors passed to it --}}
@if(count($errors) > 0)
<section class="section-alert section-xs" id="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

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

			</div>
		</div>
	</div>
</section>
@endif
