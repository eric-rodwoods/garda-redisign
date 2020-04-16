var swiper = new Swiper('.front-page-slider', {
		spaceBetween: 30,
		effect: 'fade',
		parallax: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		autoplay: {
			delay: 6000,
			disableOnInteraction: false,
		},
});

var swiper = new Swiper('.main-slider', {
	loop: true,
	autoplay: {
		delay: 4000,
		disableOnInteraction: false,
	},
	effect: 'flip',
	grabCursor: true,
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
});

var swiper = new Swiper('.product-slider', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

$(window).on('scroll', function () {
	if ($(this).scrollTop() > 100) {
		$('#scroll-close').addClass('scroll-hide');
		$('.header__background').addClass('shrink');
	} else {
		$('#scroll-close').removeClass('scroll-hide');
		$('.header__background').removeClass('shrink')
	}
});

$('#menu-opening').on('click', function(){
	if($('.hidden-menu').hasClass('show-menu')){
		$('.hidden-menu').removeClass('show-menu');
	} else {
		$('.hidden-menu').addClass('show-menu');
	}
});
$('.hidden-menu__close').on('click', function(){
	$('.hidden-menu').removeClass('show-menu');
});

$('.mobile-burger').on('click', function(){
	$('.hidden-menu').addClass('show-menu');	
});

$('.hidden-menu__mobile__close').on('click', function(){
	$('.hidden-menu').removeClass('show-menu');
});

$('.cat__title').on('click', function () {		
	let next = $(this).next();
	if (next.hasClass('show')){
		next.removeClass('show');
	} else {
		next.addClass("show");
	}

	let prev = $(this).prev();
	if (prev.hasClass('rotate')) {
		prev.removeClass('rotate');
	} else {
		prev.addClass('rotate');
	}	
});

$('.hidden-menu__left-block__item').on('click', function(){
	$('.hidden-menu__right-block__content').hide();
	$(this).children().slideDown('slow');
});