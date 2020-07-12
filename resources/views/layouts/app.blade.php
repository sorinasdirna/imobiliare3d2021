<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{config('app.name', 'Imobiliare 3D')}}</title>
	<!-- favicon -->
	<link rel="icon" type="image/png" sizes="18x18" href="/favicon.png"> 
	<link rel="icon" type="image/svg" sizes="18x18" href="/favicon.svg"> 
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- slick slider -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<!-- fonts -->
	<!--<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body>
	
	@include('partials.header')

	@yield('banner')	

	@yield('content')	

	@include('partials.footer')

	<!-- jquery -->
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<!-- slick slider -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// toggle menu 
			$('.nav-toggle button').on('click', function(e) {
				e.preventDefault();
				$('.panel--header').toggleClass('js--mobile');
			});
			// add class on scroll
			$(window).scroll(function() {    
				var scroll = $(window).scrollTop();

				if (scroll >= 50) {
					$(".panel--header").addClass("js--sticky");
				} else {
					$(".panel--header").removeClass("js--sticky");
				}
			});
			// banner slider
			$('.slider--hero').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				dots: false,
				fade: true,
				speed: 800
			});
			// home skip to main
			$('#skip').on('click', function(e) {
				e.preventDefault();
				$('html, body').animate({
					scrollTop: $("#main").offset().top
				}, 1000);
			});
			$('.slider-container').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: true,
				dots: false,
				infinite: false,
				responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2
					}
                }, {
					breakpoint: 768,
                    settings: {
                        slidesToShow: 1
					}
				}]
			});
		});
	</script>
</body>
</html>