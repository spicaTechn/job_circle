@extends('front.layout.master')

@section('content')
<div class="default-page">
	<div class="container">
	    <div class="inner-page-wrapper">
	        <div class="row">
	        	@if(!empty($contact))
	            <div class="col-md-6">
	                <div class="contact-info-section">
	                    <h2>contact information</h2>
	                    <ul>
	                        <li><a href="#"><i class="icon-phone"></i> {{ $contact['phone'] }}</a></li>
	                        <li><a href="#"><i class="icon-envelope"></i> {{ $contact['email'] }}</a></li>
	                        <li> <i class="icon-location-pin"></i> {{ $contact['address'] }}</li>
	                    </ul>
	                </div>
	            </div>
	            @endif
	            <div class="col-md-6">
	                <div class="contact-info-section">
	                    <h2>write to us</h2>
	                    <form>
	                        <div class="form-group">
	                            <input type="text" name="" class="form-control" placeholder="Name">
	                        </div>
	                        <div class="form-group">
	                            <input type="email" name="" class="form-control" placeholder="Email">
	                        </div>
	                        <div class="form-group">
	                            <input type="number" name="" class="form-control" placeholder="Phone">
	                        </div>
	                        <div class="form-group">
	                            <textarea class="form-control" placeholder="Your Message"></textarea>
	                        </div>
	                        <button type="submit" class="btn btn-default">Submit</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection