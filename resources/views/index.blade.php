@extends('layouts.app')

@section('banner')
	<div class="panel panel--banner">
		<div class="slider slider--hero">
			<div class="slider_image" style="background-image: url({{ asset('img/slider/slider3.jpg') }})"></div>
			<div class="slider_image" style="background-image: url({{ asset('img/slider/slider2.jpg') }})"></div>
			<div class="slider_image" style="background-image: url({{ asset('img/slider/slider1.jpg') }})"></div>
		</div>
		<div class="banner-container">
			<div class="banner-text text-center dark">
				<h1>Gaseste Casa Visurilor Tale</h1>
				<p>La cele mai mici preturi</p>
			</div>
			<div class="search search--home">
				<div class="search-form">
					<form action="" method="" class="">  
						<div class="form-group">
							<div class="form-input form-input--location">           
								<label class="form-label sr-only">Locatie</label>
								<input placeholder="Adresa sau zona"  type="text" name="" class="input">
							</div>
							<div class="form-input form-input--category"> 
								<label class="form-label sr-only">Categorie</label>                              
								<select name="" class="dropdown">
									<option value="" selected="selected">Apartamente</option>
									<option value="">Case / Vile</option>
									<option value="">Ter. construcţii</option>
									<option value="">Ter. agricole</option>
									<option value="">Birouri</option>
									<option value="">Spaţii comerciale</option>
									<option value="">Spaţii industriale</option>
									<option value="">Ter. investiţii</option>
									<option value="">Hoteluri/pensiuni</option>
									<option value="">Prop. speciale</option>
								</select>
							</div>
							<div class="form-input form-input--type">    
								<label class="form-label sr-only">Tip</label>                              
								<select name="" class="dropdown">
									<option value="" selected="selected">De vânzare</option>
									<option value="">De închiriat</option>
								</select>                                    
							</div>
							<div class="form-input form-input--submit">  
								<input type="submit" class="button button--search" value="Caută">
							</div>    
						</div>    
					</div>
				</form>
			</div>
		</div>
		<div id="skip" class="banner-skip">
			<i class="fa fa-angle-double-down"></i>
		</div>
	</div>
@endsection

@section('content')
	<div class="panel--content">
		<main id="main">
			<section class="section section--overview">
				<div class="wrap">
					<h2 class="section-title text-center">Valorile noastre</h2>
					<div class="text-center slider-container">
						<div class="slider-item">
							<div class="item">
								<img src="{{ asset('img/svg/value1.svg') }}" alt="icon 1">
								<h4>Lorem Ipsum</h4>
								<p>Lorem ipsum dolor sit amet</p>
							</div>
						</div>
						<div class="slider-item">
							<div class="item">
								<img src="{{ asset('img/svg/value1.svg') }}" alt="icon 1">
								<h4>Lorem Ipsum</h4>
								<p>Lorem ipsum dolor sit amet</p>
							</div>
						</div>
						<div class="slider-item">
							<div class="item">
								<img src="{{ asset('img/svg/value1.svg') }}" alt="icon 1">
								<h4>Lorem Ipsum</h4>
								<p>Lorem ipsum dolor sit amet</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section section--properties">
				<div class="wrap">
					<h2 class="section-title text-center">Cele mai recente</h2>
					<div class="slider-container">
						@foreach($products as $product)
						@if($product->p_status==1)
						<div class="slider-item">
							<div class="property">
								<div class="property_wrap">
									<div class="property_top">
										<div class="property_image" style="background-image: url({{url('products',$product->image)}})"></div>
										<div class="property_type">{{($product->p_type=='rent')?'De inchiriat':'De vanzare'}}</div>
										<div class="property_price">{{$product->p_price}} {{$product->p_currency}}</div>
									</div>
									<div class="property_bottom">
										<div class="property_category">{{$product->category->name}}</div>
										<div class="property_title">{{$product->p_name}}</div>
										<div class="property_location"><i class="fa fa-map-marker"></i> {{$product->p_address}}</div>
										<div class="property_more">
											<a href="{{ url('detalii', [$product->id]) }}" class="button">Detalii Anunt</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
					    @endforeach
					</div>
					<div class="text-center">
						<a href="{{ url('anunturi') }}" class="button button--dark">Vezi toate anunturile</a>
					</div>
				</div>
			</section>
			<section class="section section--categories">
				<div class="wrap">
					<h2 class="section-title text-center">Categorii</h2>
					<div class="slider-container">
					@foreach($categories as $category)
						<div class="slider-item">
							<div class="category">
								<div class="category_wrap">
									<div class="category_top">
										<div class="category_image" style="background-image: url({{url('categories',$category->image)}})"></div>
									</div>
									<div class="category_bottom">
										<div class="category_title">{{$category->name}}</div>
										<div class="category_more">
											<a href="{{ url('categorii', [$category->id]) }}" class="button">Vezi toate</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>
			<section class="section section--video">
				<div class="video">
					<video autoplay muted loop>
					    <source src="{{ asset('video/home-video.mp4') }}" type="video/mp4">
					</video>
				</div>
				<div class="video-text dark text-center">
					<div class="wrap">
						<h2 class="title">Despre noi</h2>
						<p>Anim et cupidatat in velit occaecat aute quis quis in pariatur laborum quis ut consectetur.</p>
						<a class="button button--video" href="{{ url('contact') }}">Contacteaza-ne!</a>
					</div>
				</div>
			</section>
		</main>
	</div>
@endsection