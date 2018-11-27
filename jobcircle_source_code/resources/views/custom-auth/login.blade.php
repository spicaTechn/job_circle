<!doctype html>
<html lang="en">
    <head>
        @include('front.include.head')
    </head>
    <body>
        @include('front.include.topnav')
        <!-- end header -->
        @include('front.include.header')
        <!-- end header -->
        
        <div class="login-page">
            <div class="container">
                <div class="login-wrapper">
                    <div class="row">
                        <div class="col-md-6 gradient-image" style="background: url({{asset('front/images/login-banner.jpg')}}) no-repeat center;">
                            <div class="login-left">
                                <h4>If you are not yet register</h4>
                                <p class="small">Register with us today</p>
                                <ul>
                                    <li>Apply Jobs</li>
                                    <li>Shortlist jobs</li>
                                    <li>Get jobs in your Inbox</li>
                                </ul>
                                <div class="form-group">
                                    @guest
                                        @if (Route::has('register'))
                                        <a class="btn btn-default" id="register" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                    @endguest
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="login-form">
                                <h4>Job Circle Login Area</h4>
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Your Email" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-default">Login</button>
                                    </div>
                                    <p>Forgot your password? <a href="{{ route('password.request') }}">Click here</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('front.include.footer')
    </body>
</html>
<!-- https://www.esquedu.com/ -->