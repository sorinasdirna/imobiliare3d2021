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
			<section class="section section--details">
				<div class="wrap">
					<div class="project-details_back project-details_back--top">
			    		<a href="javascript:history.back();"><i class="fa fa-angle-double-left"></i>Inapoi</a>
					</div>
				    <h2 class="title text-center">Detalii anunt {{$product->p_code}}</h2>
                    <div class="product-details_category">{{$product->category->name}}</div>
                    <div class="product-details_type">{{($product->p_type=='sale')?'De vanzare':'De inchiriat'}}</div>
				    <div class="product-details_name">{{$product->p_name}}</div>
                    <div class="product-details_price">
                    	{{$product->p_price}}  
                    	{{$product->p_currency}}
                    	{{($product->p_negotiable=='0')?'':'negociabil'}}
                    </div>
                    @if ($product->p_pricemp != '')
                    <div class="product-details_pricemp">
                    	{{$product->p_pricemp}} 
                    	{{$product->p_currency}}
                    	{{($product->p_negotiable=='0')?'':'negociabil'}}
                    </div>
                    @endif
                    <div class="product-details_address">{{$product->p_address}} {{$product->p_neighborhood}}</div>
				    <div class="product-details_images">
                        @foreach($images as $image)
                        	<a href="{{url('products',$image->image)}}" class="fancybox-thumbs" data-fancybox-group="thumb">
                        		<img src="{{url('products',$image->image)}}" alt="image gallery">
                        	</a>
                        @endforeach
				    </div>
                    <div class="product-details_description">{!! $product->p_description !!}</div>
                    <div class="product-details_table-wrap">
						<table class="product-details_table">
							<tbody>
								<tr>
									<td>Cod intern</td>
									<td>{{$product->p_code}}</td>
								</tr>
								@if ($product->p_rooms != '')
								<tr>
									<td>Numar camere</td>
									<td>{{$product->p_rooms}}</td>
								</tr>
								@endif
								@if ($product->p_baths != '')
								<tr>
									<td>Numar bai</td>
									<td>{{$product->p_baths}}</td>
								</tr>
								@endif
								@if ($product->p_balconies != '')
								<tr>
									<td>Numar balcoane</td>
									<td>{{$product->p_balconies}}</td>
								</tr>
								@endif
								@if ($product->p_hallways != '')
								<tr>
									<td>Numar holuri</td>
									<td>{{$product->p_hallways}}</td>
								</tr>
								@endif
								@if ($product->p_typeof != '')
								<tr>
									<td>Tip locuinta</td>
									<td>{{$product->p_typeof}}</td>
								</tr>
								@endif
								@if ($product->p_furniture != '')
								<tr>
									<td>Mobilier</td>
									<td>{{$product->p_furniture}}</td>
								</tr>
								@endif
								@if ($product->p_material != '')
								<tr>
									<td>Material de constructie</td>
									<td>{{$product->p_material}}</td>
								</tr>
								@endif
								@if ($product->p_floor != '')
								<tr>
									<td>Etaj</td>
									<td>{{$product->p_floor}} {{($product->p_totalfloors=='')?'':'din'}} {{$product->p_totalfloors}}</td>
								</tr>
								@endif
								@if ($product->p_totalsurface != '')
								<tr>
									<td>Suprafata totala</td>
									<td>{{$product->p_totalsurface}} mp<sup>2</sup></td>
								</tr>
								@endif
								@if ($product->p_usablesurface != '')
								<tr>
									<td>Suprafata utila</td>
									<td>{{$product->p_usablesurface}} mp<sup>2</sup></td>
								</tr>
								@endif
								@if ($product->p_year != '')
								<tr>
									<td>An constructie</td>
									<td>{{$product->p_year}}</td>
								</tr>
								@endif
								@if ($product->p_condition != '')
								<tr>
									<td>Stare imobil</td>
									<td>{{$product->p_condition}}</td>
								</tr>
								@endif
								@if ($product->p_cadastre != '')
								<tr>
									<td>Cadastru</td>
									<td>da</td>
								</tr>
								@endif
								@if ($product->p_tabulate != '')
								<tr>
									<td>Intabulare</td>
									<td>da</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
			   		<div class="project-details-location">
			   			<div class="map" id="map" style="width: 100%; height: 300px;"></div>
				 	</div>
				 	<div class="project-details_back project-details_back--bottom">
			    		<a href="javascript:history.back();"><i class="fa fa-angle-double-left"></i>Inapoi</a>
					</div>
				 </div>
			</section>
		</main>
	</div>
@endsection

@section('scripts')
	<!--load google api-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNsGMkm0logdWbHDjTSDHS2kSEx9GBPNM&libraries=places"></script>
	<script>
	/************GOOGLE MAP*******/
	function initialize() {
	   var latlng = new google.maps.LatLng({{ $product->p_addresslat }}, {{ $product->p_addresslon }});
		var map = new google.maps.Map(document.getElementById('map'), {
		  center: latlng,
		  zoom: 13
		});
		var marker = new google.maps.Marker({
		  map: map,
		  position: latlng,
		  draggable: false,
		  anchorPoint: new google.maps.Point(0, -29)
	   });
		var input = document.getElementById('searchInput');
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		var geocoder = new google.maps.Geocoder();
		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);
		var infowindow = new google.maps.InfoWindow();   
		autocomplete.addListener('place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				window.alert("Autocomplete's returned place contains no geometry");
				return;
			}
	  
			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
			}
		   
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);          
		
			bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
			infowindow.setContent(place.formatted_address);
			infowindow.open(map, marker);
		   
		});
		// this function will work on marker move event into map 
		google.maps.event.addListener(marker, 'dragend', function() {
			geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			  if (results[0]) {        
				  bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
				  infowindow.setContent(results[0].formatted_address);
				  infowindow.open(map, marker);
			  }
			}
			});
		});
	}
	function bindDataToForm(address,lat,lng){
	   document.getElementById('location').value = address;
	   document.getElementById('lat').value = lat;
	   document.getElementById('lng').value = lng;
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	/*****END MAP****/

	// GMap
	$('#map').click(function () {
		$('#map iframe').css("pointer-events", "auto");
	});
	
	$( "#map" ).mouseleave(function() {
	  $('#map iframe').css("pointer-events", "none"); 
	});
	
	// fancybox galery
	$('.fancybox-thumbs').fancybox({
		prevEffect : 'none',
		nextEffect : 'none',
		closeBtn  : false,
		arrows    : true,
		nextClick : true,
		helpers : {
			thumbs : {
				width  : 50,
				height : 50
			}
		}
	});	
		
	</script>
@endsection