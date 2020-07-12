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
			<section class="section">
				<div class="wrap">
                @foreach($products as $product)
                        @if($product->category->status==1)
                            @if($product->p_status==1)
                                <h3>{{$product->p_name}}</h3>
                                <a href="{{url('/detalii',$product->id)}}">Vezi detalii</a>
                            @endif
                        @endif
                    @endforeach
				</div>
			</section>
		</main>
	</div>
@endsection