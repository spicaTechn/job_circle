@extends('front.layout.master')

@section('content')
<div class="about-page section-full-width">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-page-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, eveniet sit ab modi, cum harum exercitationem</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="{{ asset('front/images/login-banner.jpg') }}" alt="banner">
                </div>
            </div>
        </div>
    </div>
</div>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque possimus eum fugit molestias alias nostrum cumque aperiam, cum. Reiciendis assumenda est, provident in ab iste accusantium fugiat doloremque officiis maxime.</p>
                    <blockquote>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint voluptatum consequatur doloremque animi quasi, alias quos non quas assumenda veniam recusandae natus nostrum laudantium ullam tempora aliquam ut explicabo est!
                    </blockquote>
                </div>
            </div>
            <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="profile-tab">
                <div class="inner-tab-wrapper">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque possimus eum fugit molestias alias nostrum cumque aperiam, cum. Reiciendis assumenda est, provident in ab iste accusantium fugiat doloremque officiis maxime.</p>
                    <blockquote>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint voluptatum consequatur doloremque animi quasi, alias quos non quas assumenda veniam recusandae natus nostrum laudantium ullam tempora aliquam ut explicabo est!
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
                    <img src="{{ asset('front/images/login-banner.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="overview-detail">
                    <h3>Kulbir Tamang <span>-Founder</span></h3>

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, </p>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="overview-section-wrapper">
                    <div class="top-overview">
                        <div class="icon">
                            <i class="icon-location-pin"></i>
                        </div>
                        <div class="icon-title">
                            <h3><span>founded in</span>2014</h3>
                        </div>
                    </div>
                    <div class="overview-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum ut reiciendis aliquam animi modi laudantium sed.
                    </div>
                </div>
            </div> -->
            <!-- end col -->
            <!-- <div class="col-md-4">
                <div class="overview-section-wrapper">
                    <div class="top-overview">
                        <div class="icon">
                            <i class="icon-location-pin"></i>
                        </div>
                        <div class="icon-title">
                            <h3><span>founded in</span>2014</h3>
                        </div>
                    </div>
                    <div class="overview-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum ut reiciendis aliquam animi modi laudantium sed.
                    </div>
                </div>
            </div> -->
            <!-- end col -->
            <!-- <div class="col-md-4">
                <div class="overview-section-wrapper">
                    <div class="top-overview">
                        <div class="icon">
                            <i class="icon-location-pin"></i>
                        </div>
                        <div class="icon-title">
                            <h3><span>founded in</span>2014</h3>
                        </div>
                    </div>
                    <div class="overview-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum ut reiciendis aliquam animi modi laudantium sed.
                    </div>
                </div>
            </div> -->
            <!-- end col -->
        </div>
    </div>
</div>
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