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

    @yield('content')


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('front.include.footer')



</body>
</html>