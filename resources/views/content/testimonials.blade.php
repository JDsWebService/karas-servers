<section class="testimonial section" id="testimonial">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- testimonial wrapper -->
				<div class="testimonial-slider">
					

					@foreach (glob(base_path() . '/resources/views/content/testimonials/*.blade.php') as $file)
					    <!-- testimonial single -->
					    <div class="item text-center">
					    	<i class="fas fa-quote-left"></i>
					    	@include('content.testimonials.' . basename(str_replace('.blade.php', '', $file)))
					    </div>
					    <!-- /testimonial single -->
					@endforeach

				</div>
			</div>
			<!-- end col lg 12 -->
		</div>
		<!-- End row -->
	</div>
	<!-- End container -->
</section>