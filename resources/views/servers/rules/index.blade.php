@extends('layouts.app')

@section('title', 'Server Rules')

@section('content')

	<section class="section-default section-xs pb-0" id="serverRules">
	    <div class="container">
	        <div class="row">

				<div class="col-sm-12">
					<h1>Global Server Rules</h1>
					<div class="row justify-content-center mt-5">
						<div class="col-sm-4 text-center m-0">
							<a href="{{ route('servers.rules.english')}}"><img src="imgs/languages/english.png" alt="English" class="img-fluid h-50"></a>
							<p>English</p>
						</div>
						<div class="col-sm-4 text-center m-0">
							<a href="{{ route('servers.rules.portuguese') }}"><img src="imgs/languages/portuguese.png" alt="Portuguese" class="img-fluid h-50"></a>
							<p>Portuguese</p>
						</div>
						<div class="col-sm-4 text-center m-0">
							<a href="{{ route('servers.rules.spanish') }}"><img src="imgs/languages/spanish.png" alt="Spanish" class="img-fluid h-50"></a>
							<p>Spanish</p>
						</div>
					</div>
					<div class="row justify-content-center mt-0">
						<div class="col-sm-4 text-center m-0">
							<a href="{{ route('servers.rules.german') }}"><img src="imgs/languages/german.png" alt="German" class="img-fluid h-50"></a>
							<p>German</p>
						</div>
						<div class="col-sm-4 text-center m-0">
							<a href="{{ route('servers.rules.korean') }}"><img src="imgs/languages/korean.png" alt="Korean" class="img-fluid h-50"></a>
							<p>Korean</p>
						</div>
						<div class="col-sm-4 text-center m-0">
							<a href="{{ route('servers.rules.japanese') }}"><img src="imgs/languages/japanese.png" alt="Japanese" class="img-fluid h-50"></a>
							<p>Japanese</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

@endsection
