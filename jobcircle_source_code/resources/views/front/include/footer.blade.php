<!-- footer section -->
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footter-section">
                        <h4>Quick Links</h4>
                        <div class="footer-nav">
                            <ul>
                                <li><a href="{{ asset('/find-a-job') }}">Find a Job</a></li>
                                <li><a href="{{ asset('/services') }}">Services</a></li>
                                <li><a href="#">Post a Job</a></li>
                                <li><a href="#">Sign In</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footter-section">
                        <h4>Our Company</h4>
                        <div class="footer-nav">
                            <ul>
                                <li><a href="{{ asset('/company') }}">Company Profile</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footter-section">
                        <h4>Support</h4>
                        <div class="footer-nav">
                            <ul>
                                <li><a href="{{ asset('/faq') }}">FAQ’s</a></li>
                                <li><a href="{{ asset('/contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if(!empty($contact))
                <div class="col-lg-3 col-md-6">
                    <div class="footter-section">
                        <h4>Agency Information</h4>
                        <div class="footer-contact">
                            <p><i class="icon-location-pin"></i>{{ $contact['address'] }}</p>
                            <p><a href="callto://{{ $contact['phone'] }}"><i class="icon-call-in"></i> {{ $contact['phone'] }}</a></p>
                            <p><a href="#"><i class="icon-cursor"></i> {{ $contact['email'] }}</a></p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copy-right">
                        &copy; 2018 JobsCircle Ltd. All rights reserved.
                    </div>
                </div>
                @if(!empty($contact))
                <div class="col-md-4">
                    <div class="footer-social-media">
                        <ul>
                            <li><a href="{{ $contact['facebook_link'] }}" target="_blank"><i class="icon-social-facebook"></i></a></li>
                            <li><a href="{{ $contact['twitter_link'] }}" target="_blank"><i class="icon-social-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/slick.min.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>