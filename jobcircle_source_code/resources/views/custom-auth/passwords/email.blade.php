<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    @include('front.include.head')
    @yield('page_specific_css')
</head>
<body>
	@include('front.include.topnav')
    @include('front.include.header')
    <!-- end header -->

    <div class="register-page" style="min-height: 469px;">
        <div class="container">
            <div class="register-wrapper" style="margin-top: 50px;">
                <form>
                    <div class="form-register">
                        <h4>{{ __('Reset Password') }}</h4>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your email">
                        </div>
                       <button type="submit" class="btn btn-default flex-buttons">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
	</div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('front.include.footer')



</body>
</html>