@extends('layouts.app')

@section('banner')
	<div class="panel panel--banner">
		<div class="page-title page-title--rent dark">
			<div class="banner-container">
				
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="panel--content">
		<main id="main">
			<section class="section section--properties-listing">
				<div class="wrap">
				    <h2 class="title text-center">Anunturi</h2>
					@foreach($products as $product)
  					@if($product->p_status==1)
					<div class="property">
						<div class="property_wrap">
							<div class="property_left">
								<div class="property_image" style="background-image: url({{url('products',$product->image)}})"></div>
								<div class="property_type">{{($product->p_type=='rent')?'De inchiriat':'De vanzare'}}</div>
								<div class="property_price">{{$product->p_price}} {{$product->p_currency}}</div>
							</div>
							<div class="property_right">
								<div class="property_category">{{$product->category->name}}</div>
								<div class="property_title">{{$product->p_name}}</div>
								<div class="property_surface">Suprafata totala: {{$product->p_totalsurface}}mp<sup>2</sup></div>
								<div class="property_location"><i class="fa fa-map-marker"></i> {{$product->p_address}}</div>
								<div class="property_more">
									<a href="{{ url('detalii', [$product->id]) }}" class="button">Detalii</a>
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</section>
		</main>
	</div>
@endsection