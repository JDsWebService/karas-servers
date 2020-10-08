(function ($) {
	'use strict';

	/* ========================================================================= */
	/*	Page Preloader
	/* ========================================================================= */

    $(window).on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
            if( $("#messagesModal").length ) {
                $(document).ready(function(){
                    $("#messagesModal").modal('show');
                });
            }
        });
    });

	/* ========================================================================= */
	/*	Testimonial Carousel
	/* =========================================================================  */

	//Init the slider
	$('.testimonial-slider').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		infinite: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2500,
		responsive: [{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});


})(jQuery);
