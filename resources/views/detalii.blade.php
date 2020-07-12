@extends('layouts.app')

@section('banner')
	<div class="panel panel--banner">
		<div class="page-title page-title--sale dark">
			<div class="banner-container">
	
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="panel--content">
		<main id="main">
			<section class="section section--overview">
				<div class="wrap">
				    <h2 class="title text-center">Detalii anunt</h2>
				    <div class="product-details">
						<h3>{{$product->p_name}}</h3>
                    </div>
	                <ul class="thumbnails" style="margin-left: -10px;">
		                <li>
			                @foreach($images as $image)
				            <a href="{{url('products',$image->image)}}" data-standard="{{url('products',$image->image)}}">
					        <img src="{{url('products',$image->image)}}" alt="" width="75" style="padding: 8px;">
				            </a>
			                @endforeach
		                </li>
	                </ul>
				</div>
			</section>
		</main>
	</div>
@endsection