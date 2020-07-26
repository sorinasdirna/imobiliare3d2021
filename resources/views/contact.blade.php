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
					<div class="form-info">
						<p>Pentru informatii suplimentare va rugam sa ne contactati completand campurile din formularul de mai jos. 
							<br>Campurile marcate cu <span class="required">*</span> sunt obligatorii.</p>
					</div>
					@if( ! session()->has('message'))
				        <form action="" method="POST">
				        	<div class="form-group">
					            <div class="form-input form-input--name">
					                <label for="name">Nume <span class="required">*</span></label>
					                <input type="text" name="name" value="{{ old('name') }}" class="input">
					                <div>{{ $errors->first('name') }}</div>
					            </div>

				            <div class="form-input form-input--email">
				                <label for="email">Email <span class="required">*</span></label>
				                <input type="text" name="email" value="{{ old('email') }}" class="input">
				                <div>{{ $errors->first('email') }}</div>
				            </div>

				            <div class="form-input form-input--message">
				                <label for="message">Mesaj <span class="required">*</span></label>
				                <textarea name="message" id="message" cols="30" rows="10"
				                          class="input">{{ old('message') }}</textarea>
				                <div>{{ $errors->first('message') }}</div>
				            </div>

				            @csrf
							 <div class="form-input form-input--submit">
					            <button type="submit" class="button button--contact">Trimite Mesaj</button>
							</div>
				        </form>
				    @endif
				</div>
			</section>
		</main>
	</div>
@endsection