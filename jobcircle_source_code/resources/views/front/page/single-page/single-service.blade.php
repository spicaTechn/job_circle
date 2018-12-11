@extends('front.layout.master')

@section('content')
@if(!empty($service_background_image))
<div class="inner-banner" style="background: url({{asset('/front')}}/images/pages/services/{{ $service_background_image }});">
    <div class="container">
        <div class="banner-content">
            <h1>House keeper </h1>
        </div>
    </div>
</div>
@endif
<div class="service-singlewrpper" style="min-height: 467px;">
    <div class="container">
        <div class="sirvice-single-content">
            <h2>{{ $service['title'] }}</h2>
            <p>{!! $service['description'] !!}</p>
            <a class="btn btn-default" href="#">Search Housekeeper Jobs</a>
        </div>
    </div>
</div>
@endsection