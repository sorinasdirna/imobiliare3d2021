@extends('layouts.app')

@section('banner')
	<div class="panel panel--banner">
		<div class="page-title page-title--contact dark">
			<div class="banner-container">
				<h1>Contact</h1>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="panel--content">
		<main id="main">
			<section class="section section--contact">
				<div class="wrap">
					<div class="grid">
						<div class="grid_col grid_col--1-of-2 grid_col--md-1-of-1">
							<div class="form-info">
								<p>Pentru informatii suplimentare va rugam sa ne contactati completand campurile din formularul de mai jos. 
									<br>Campurile marcate cu <span class="required">*</span> sunt obligatorii.</p>
							</div>
							
							@if(session()->has('message_success'))
						    	<div class="success">{{ session()->get('message_success') }}</div>
							@else
								@if( ! session()->has('message'))
							        <form action="/contact" method="POST">
							        	<div class="form-group">
								            <div class="form-input form-input--name">
								                <label for="name">Nume <span class="required">*</span></label>
								                <input type="text" name="nume" value="{{ old('nume') }}" class="input" required="">
								                <div class="error">{{ $errors->first('nume') }}</div>
								            </div>
								          </div>
							            <div class="form-input form-input--email">
							                <label for="email">Email <span class="required">*</span></label>
							                <input type="text" name="email" value="{{ old('email') }}" class="input" required="">
							                <div class="error">{{ $errors->first('email') }}</div>
							            </div>

							            <div class="form-input form-input--message">
							                <label for="message">Mesaj <span class="required">*</span></label>
							                <textarea name="mesaj" id="message" cols="30" rows="10"
							                          class="input" required="">{{ old('mesaj') }}</textarea>
							                <div class="error">{{ $errors->first('mesaj') }}</div>
							            </div>

							            @csrf

										 <div class="form-input form-input--submit">
								            <button type="submit" class="button button--contact">Trimite Mesaj</button>
										</div>
							        </form>
							    @endif
							@endif
						</div>
						<div class="grid_col grid_col--1-of-2 grid_col--md-1-of-1">
							<ul>
			                    <li><i class="fa fa-map-marker"></i> Adresa</li>
			                    <li><a href="tel:0000-0000-000"><i class="fa fa-phone"></i> 0000 0000 000</a></li>
			                    <li><a href="mailto:test@test.com"><i class="fa fa-envelope"></i> test@test.com</a></li>
			                </ul>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
@endsection