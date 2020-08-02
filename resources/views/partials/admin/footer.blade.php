<hr>

<p class="text-center">
	&copy; {{ config('app.name', 'Laravel') }} {{ \Carbon\Carbon::now()->year }} - All Rights Reserved
	@if(Route::has('privacy') && Route::has('terms'))
		<br>
		<a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a>
	@endif
</p>