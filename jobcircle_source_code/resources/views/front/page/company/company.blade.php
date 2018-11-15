@extends('front.layout.master')

@section('content')
@if(!empty($company) && !empty($company_detail))
<div class="about-page section-full-width">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-page-content">
                    <p>{{ $company->description }}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image">
                   <img src="{{asset('/front')}}/images/pages/company/{{ $company_detail['about_image'] }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(!empty($company_detail))
<div class="about-tab-list">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#background" role="tab" aria-controls="background" aria-selected="true">background</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="false">mission</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="background" role="tabpanel" aria-labelledby="home-tab">
                <div class="inner-tab-wrapper">
                    <p>{{ $company_detail['background'] }}</p>
                    <blockquote>
                        {{ str_limit($company_detail['background'], 150) }}
                    </blockquote>
                </div>
            </div>
            <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="profile-tab">
                <div class="inner-tab-wrapper">
                    <p>{{ $company_detail['mission'] }}</p>
                    <blockquote>
                        {{ str_limit($company_detail['mission'], 150) }}
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-overview -->
<div class="about-overview">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="about-profile">
                    <img src="{{asset('/front')}}/images/pages/company/{{ $company_detail['founder_image'] }}">
                </div>
            </div>
            <div class="col-md-8">
                <div class="overview-detail">
                    <h3>{{ $company_detail['founder_name'] }} <span>-{{ $company_detail['founder_position'] }}</span></h3>

                    <p>{{ $company_detail['founder_description'] }} </p>
                </div>
            </div>
            
        </div>
    </div>
</div>
@else
<div class="about-overview" style="height: 301px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="overview-detail">
                    <h3 style="line-height: 613%">No Data Found</span></h3>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endif
<!-- end about-overview -->
<div class="connect-with-us">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Want to Connect with us</h3>
            </div>
            <div class="col-md-6">
                <a href="{{url('/contact')}}" class="btn btn-white">Write Us</a>
            </div>
        </div>
    </div>
</div>
@endsection