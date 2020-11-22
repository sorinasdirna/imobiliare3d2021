@extends('layouts.app')

@section('banner')
	<div class="panel panel--banner">
		<div class="page-title page-title--rent dark">
			<div class="banner-container">
				<h1>Anunturi</h1>
			</div>
		</div>
	</div>
@endsection
@section('content')
	<div class="panel--content">
		<main id="main">
			<section class="section section--properties-listing">
				<div class="wrap">
					<div class="grid">
						<div class="grid_col grid_col--3-of-4 grid_col--md-1-of-1">
	
						    @if($products->isEmpty())
								<p>Nu sunt rezultate.</p>
							@else
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
							@endif
						</div>
						<div class="categories-accordion grid_col grid_col--1-of-4 grid_col--md-1-of-1">
							<div class="accordion">
								<h3>Filtre:</h3>
								<form action="{{ route('anunturi') }}" method="get" class=""> 
									{{ csrf_field() }}
									<!-- <input type="hidden" name="_token" value="{{csrf_token()}}">  -->
									<div class="form-group">
										<div class="form-input form-input--location">           
											<label class="form-label sr-only">Locatie</label>
											<input placeholder="Locatie"  type="text" name="address" class="input">
										</div>
										<div class="form-input form-input--category"> 
											<label class="form-label sr-only">Categorie</label>                              
											<select name="category" class="dropdown">
												@foreach($categories as $category)
												<option  @if( Request::get('category') == $category->id) selected @endif value="{{$category->id}}" >{{$category->name}}</option>
												@endforeach
											</select>
										</div>
										<!-- {{ app('request')->input('category') == '31' ? 'selected' : '' }}-->
										<div class="form-input form-input--type">    
											<label class="form-label sr-only">Tip</label>                              
											<select name="type" class="dropdown">
												<option value="sale" @if( Request::get('type') == 'sale') selected @endif>De vânzare</option>
												<option value="rent" @if( Request::get('type') == 'rent') selected @endif>De închiriat</option>
											</select>                                    
										</div>
										<div class="form-input form-input--price">           
											<label class="form-label sr-only">Pret minim</label>
											<input placeholder="Pret minim"  type="text" name="minprice" class="input">
										</div>
										<div class="form-input form-input--price">           
											<label class="form-label sr-only">Pret maxim</label>
											<input placeholder="Pret maxim"  type="text" name="maxprice" class="input">
										</div>
										<div class="form-input form-input--submit">  
											<input type="submit" class="button button--search" value="Caută">
											<a class="button button--grey" href="{{ route('anunturi') }}">Reseteaza</a>
										</div>    
									</div>    
								</form>

						    	<h3>Categorii:</h3>
							    <?php
							        $categories=DB::table('categories')->where([['status',1]])->get();
							    ?>
						        @foreach($categories as $category)
						            <?php
						                $sub_categories=DB::table('categories')->select('id','name')->where([['parent_id',$category->id],['status',1]])->get();
						            ?>
						            <div class="accordion_item">
					                    <div class="accordion_toggle">
					                        <a href="{{url('anunturi?category='.$category->id)}}">{{$category->name}}</a>
				                            @if(count($sub_categories)>0)
				                                <span class="toggle"><i class="fa fa-plus"></i></span>
				                            @endif
										</div>
						                @if(count($sub_categories)>0)
						                    <div class="accordion_collapse">
					                            <ul>
					                                @foreach($sub_categories as $sub_category)
					                                    <li><a href="{{url('anunturi?category='.$sub_category->id)}}">{{$sub_category->name}} </a></li>
					                                @endforeach
					                            </ul>
						                    </div>
						                @endif
						            </div>
						        @endforeach
						    </div><!--/category-->
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
@endsection