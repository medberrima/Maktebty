(function($) {
	"use strict"

	// Mobile Nav toggle
	$('.menu-toggle > a').on('click', function (e) {
		e.preventDefault();
		$('#responsive-nav').toggleClass('active');
	})

	// Fix cart dropdown from closing
	$('.cart-dropdown').on('click', function (e) {
		e.stopPropagation();
	});


	// Input number
	$('.input-number').each(function() {
		var $this = $(this),
		$input = $this.find('input[type="number"]'),
		up = $this.find('.qty-up'),
		down = $this.find('.qty-down');

		down.on('click', function () {
			var value = parseInt($input.val()) - 1;
			value = value < 1 ? 1 : value;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})

		up.on('click', function () {
			var value = parseInt($input.val()) + 1;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})
	});

	var priceInputMax = document.getElementById('price-max'),
			priceInputMin = document.getElementById('price-min');

	priceInputMax.addEventListener('change', function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	priceInputMin.addEventListener('change', function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	function updatePriceSlider(elem , value) {
		if ( elem.hasClass('price-min') ) {
			console.log('min')
			priceSlider.noUiSlider.set([value, null]);
		} else if ( elem.hasClass('price-max')) {
			console.log('max')
			priceSlider.noUiSlider.set([null, value]);
		}
	}

	// Price Slider
	var priceSlider = document.getElementById('price-slider');
	if (priceSlider) {
		noUiSlider.create(priceSlider, {
			start: [1, 999],
			connect: true,
			step: 1,
			range: {
				'min': 1,
				'max': 999
			}
		});

		priceSlider.noUiSlider.on('update', function( values, handle ) {
			var value = values[handle];
			handle ? priceInputMax.value = value : priceInputMin.value = value
		});
	}

})(jQuery);




$(document).ready(function(){
	$('.list-book ').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 3500,
			arrows: false,
			dots: false,
			pauseOnHover: false,
			responsive: [{
					breakpoint: 768,
					settings: {
							slidesToShow: 2
					}
			}, {
					breakpoint: 520,
					settings: {
							slidesToShow: 3
					}
			}]
	});

	$('.slider-offre').slick({
		autoplaySpeed: 2000,
		autoplay: true,
		arrows: true,
		pauseOnHover: true,
	});

	// menu hide/show
	if ((screen.width<1500)){
		$(".all-filtre").hide();
	}
	$(".menu").click(function() {
		$(".all-filtre").toggle();  
	});
});


// top-rated  slick
$('.new_books  .btn-prev').click(function(){
	$('.new_books  .list-book').slick('slickPrev');
})

$('.new_books .btn-next').click(function(){
	$('.new_books .list-book').slick('slickNext');
})

// top-rated  slick
$('.top-rated .btn-prev').click(function(){
	$('.top-rated .list-book').slick('slickPrev');
})

$('.top-rated .btn-next').click(function(){
	$('.top-rated .list-book').slick('slickNext');
})

//best-sellers slick
$('.best-sellers  .btn-prev').click(function(){
	$('.best-sellers  .list-book').slick('slickPrev');
})

$('.best-sellers .btn-next').click(function(){
	$('.best-sellers .list-book').slick('slickNext');
})


