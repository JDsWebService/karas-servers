@extends('layouts.app')

@section('title', 'Resources')

@section('content')

	<section class="section-default section-xs" id="resources">
	    <div class="container">
	        <div class="row">
	            
				<div class="col-sm-12">
					<h1>Helpful Resources</h1>
					<hr>
					<p class="lead">We all know how frustrating things can get and managing a tribe is no easy task! We've put together some awesome resources for you to manage your tribe quickly and efficiently. Some of these tools are developed by our own coding team, and others are external links. All external links will have the <i class="fas fa-external-link-alt"></i> icon next to the link.</p>
				</div>

			</div>

			<div class="row justify-content-center">
				<!-- Single Resource Item -->
	            <div class="col-md-4 col-sm-6" >
	                <div class="service-block color-bg text-center">
	                    <div class="service-icon text-center">
	                        <i class="fas fa-cookie-bite"></i>
	                    </div>
	                    <h3>Recipes</h3>
	                    <p>Forget what ingredients it takes to make your favorite stew? Look no further! We have all the top recipes & their ingredients right here in this easy to use interface!</p>
	                    <a class="btn btn-main" href="#">Find A Recipe</a>
	                </div>
	            </div>
			</div>
		</div>
	</section>

@endsection