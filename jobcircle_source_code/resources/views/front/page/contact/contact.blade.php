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
	                    <form name="send-mail" id="send_mail" method="post" action="{{url('/sendbasicemail')}}">
	                    	@csrf
	                        <div class="form-group">
	                            <input type="text" name="name" class="form-control" placeholder="Name">
	                        </div>
	                        <div class="form-group">
	                            <input type="email" name="email" class="form-control" placeholder="Email">
	                        </div>
	                        <div class="form-group">
	                            <input type="number" name="phone" class="form-control" placeholder="Phone">
	                        </div>
	                        <div class="form-group">
	                            <textarea class="form-control" name="user_message" placeholder="Your Message"></textarea>
	                        </div>
	                        @if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
							@endif
	                        <button  type="submit" class="btn btn-default">Submit</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection