@extends('front.layout.master')

@section('content')
<div class="service-singlewrpper" style="min-height: 467px;">
    <div class="container">
        <div class="sirvice-single-content">
            <p>{!! $termsconditions->description !!}</p>
        </div>
    </div>
</div>
@endsection