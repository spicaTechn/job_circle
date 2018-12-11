@extends('front.layout.master')

@section('content')
@if(!empty($service_background_image))
<div class="inner-banner" style="background: url({{asset('/front')}}/images/pages/services/{{ $service_background_image }});">
    <div class="container">
        <div class="banner-content">
            <h1>Our Services Sector </h1>
        </div>
    </div>
</div>
@endif
<div class="main-service-categories">
    <div class="container">
        @if(!empty($services))
        <p class="text-center">{{ $services->description }}</p>
        @endif
        @if(!empty($services))
        <div class="services row" style="min-height: 297px;">
          <?php $page_details = $services->page_details()->where('meta_key','service')->get(); ?>
            @foreach($page_details as $page_detail)
            <?php $unserialize_value = unserialize($page_detail->meta_value); ?>
            <div class="item col-lg-3 col-md-4">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{asset('/front')}}/images/pages/services/{{ $unserialize_value['icon'] }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>{{ $unserialize_value['title'] }}</h4>
                    </div>
                    <a href="{{url('/services').'/'.$page_detail->id}}" class="category-overlay"></a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="about-overview" style="min-height: 347px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="overview-detail">
                            <h3 style="margin-top: 100px;">No Services Found</span></h3>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection