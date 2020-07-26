<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{config('app.name', 'Imobiliare 3D')}}</title>
	<!-- favicon -->
	<link rel="icon" type="image/svg" sizes="18x18" href="/favicon.ico"> 
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- slick slider -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

	<!-- for gallery on details  -->
	<!-- Add mousewheel plugin (this is optional) -->
	<!-- Add fancyBox main JS and CSS files -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fancybox/source/jquery.fancybox.css?v=2.1.5') }}" media="screen" />
	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}" />
	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}" />
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
	<!-- for gallery on details -->
	<script type="text/javascript" src="{{ asset('fancybox/lib/jquery.mousewheel.pack.js?v=3.1.3') }}"></script>
	<script type="text/javascript" src="{{ asset('fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
	<script type="text/javascript" src="{{ asset('fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}"></script>
	<script type="text/javascript" src="{{ asset('fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}"></script>

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

			$('.accordion_item .toggle').on('click', function(e) {
	            e.preventDefault();
	            $(this).closest('.accordion_item').toggleClass('js--active');
	   	    });

	   	    
		});

		// cookies gdpr
		function setCookie(name,value,days) {
		    var expires = "";
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime() + (days*24*60*60*1000));
		        expires = "; expires=" + date.toUTCString();
		    }
		    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
		}
		function getCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}
		
		document.getElementById("closeCookie").addEventListener("click", function(){
			setCookie('imobiliare3d','GDPRaccepted',7);
		});
		var cookie = getCookie('imobiliare3d');
		if (cookie) {
		    document.getElementById('cookies').classList.add('js--hidden');
		}

	</script>

	@yield('scripts')
</body>
</html>