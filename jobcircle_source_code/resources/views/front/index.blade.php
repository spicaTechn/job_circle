@extends('front.layout.master')

@section('content')
@if(!empty($sliders))
<div class="banner owl-carousel owl-theme" id="banner">
   
    @foreach($sliders as $slider)
    <?php $unserialize_value = unserialize($slider->meta_value); ?>
    <div class="item">
        <img src="{{asset('/front')}}/images/pages/home/{{ $unserialize_value['image'] }}" alt="banner">
        <div class="banner-caption">
            <div class="caption-wrapper">
                <h2>{{ $unserialize_value['title'] }}</h2>
                <p>{{ $unserialize_value['description'] }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
<!-- end banner slider -->

<div class="search-bar home-search-bar">
    <div class="container">
        <form action="">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search Job Titles, Keywords">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="City, State or Zip Code">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default"><i class="icon-magnifier"></i> </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End search-bar  -->
<div class="latest-jobs">
    <div class="container">
        <div class="job-filter-section">
            <div class="inner-filter-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="job-filter-title">
                            <h4>latest jobs</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="filter-by-category">
                            <ul>
                                <li class="active"><a href="#">Hot</a></li>
                                <li><a href="#">Featured</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            @if(!empty($jobs))
             @foreach($jobs as $job)
                <div class="category-section">
                    <h4><a>{{ $job->title }}</a></h4>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="job-list">
                                        <?php $job_address = $job->job_address()->where('job_id',$job->id)->first(); ?>

                                        <p><i class="icon-location-pin"></i><b>Location:</b>  {{ $job_address->address }}, {{ $job_address->country }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="job-list">
                                        <?php 
                                            $salary_type = ''; 
                                            if($job->salary_type == 0)
                                            {
                                                $salary_type = 'Per Hour';
                                            }
                                            elseif($job->salary_type == 1)
                                            {
                                                $salary_type = 'Per Week';
                                            }
                                            elseif($job->salary_type == 2)
                                            {
                                                $salary_type = 'Per Month';
                                            }
                                            else
                                            {
                                                $salary_type = 'Per Year';
                                            }

                                        ?>
                                        <p><i class="icon-location-pin"></i><b>Salary:</b>  ${{ $job->salary }} / {{ $salary_type }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="job-list">
                                        <?php $job_type = DB::table('jobtypes')->where('id',$job->job_type_id)->first(); ?>
                                        <p><i class="icon-clock"></i><b>Job Type:</b>  {{ $job_type->title }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="job-list">
                                        <?php $job_category = DB::table('jobcategories')->where('id',$job->job_category_id)->first(); ?>
                                        <p><i class="icon-tag"></i><b>Job Category:</b>  {{ $job_category->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="view-job">
                                <a href="#" class="btn btn-default">View Job</a>
                            </div>
                        </div>
                    </div>
                </div>
             @endforeach
            @endif
           
        </div>
    </div>
</div>
<!-- end filter section -->
<?php 
$image = '';
if(!empty($background_image)) 
{
    $image = $background_image->meta_value;
}
else
{
    $image = '';
}
?>
<div class="job-search-by-category" style="background: url({{ asset('/front/images/pages/home'.'/'.$image) }}) no-repeat;">
    <div class="container">
        <h3>Search Jobs By Category</h3>
        <div class="owl-theme owl-carousel" id="job-category-carousel">
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>

            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
            <div class="item">
                <div class="category-section">
                    <div class="icon-category">
                        <img src="{{ asset('front/images/builder.png') }}" alt="builder">
                    </div>
                    <div class="category-title">
                        <h4>Builder</h4>
                    </div>
                    <a href="#" class="category-overlay"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@if(!empty($company))
<div class="about-us full-width">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="full-width-image same-height">
                   <img src="{{asset('/front')}}/images/pages/company/{{ $company_detail['about_image'] }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-content same-height">
                    <h3>About Us</h3>
                    
                    <p>{{ $company_detail['background'] }}</p>
                    <div class="more-about-us">
                        <a href="{{ asset('/company') }}" class="btn btn-default">More About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- end about section -->
<!-- what our client says -->
<div class="what-our-client-says">
    <div class="container">
        <h3>what our client says</h3>
        <div class="slider testimonial-slider">
            <div class="testimonial-slider-item">
                <div class="testimonial-quote">
                    <img src="{{ asset('front/images/quote.png') }}" alt="quote">
                </div>
                <div class="testimonial-text">
                    <p>Suspendisse eu interdum mi, sit amet placerat mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tortor ipsum, pretium sed scelerisque vel, scelerisque quis diam</p>
                </div>
                <div class="testimonial-user">
                    <div class="user-image">
                        <img src="{{ asset('front/images/testimonial-user.png') }}" alt="user">
                    </div>
                    <div class="user-destination">
                        <h4>Steve Jobs</h4>
                        <span> CEO, Apple Inc.</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-item">
                <div class="testimonial-quote">
                    <img src="{{ asset('front/images/quote.png') }}" alt="quote">
                </div>
                <div class="testimonial-text">
                    <p>Suspendisse eu interdum mi, sit amet placerat mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tortor ipsum, pretium sed scelerisque vel, scelerisque quis diam</p>
                </div>
                <div class="testimonial-user">
                    <div class="user-image">
                        <img src="{{ asset('front/images/testimonial-user.png') }}" alt="user">
                    </div>
                    <div class="user-destination">
                        <h4>Steve Jobs</h4>
                        <span> CEO, Apple Inc.</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-item">
                <div class="testimonial-quote">
                    <img src="{{ asset('front/images/quote.png') }}" alt="quote">
                </div>
                <div class="testimonial-text">
                    <p>Suspendisse eu interdum mi, sit amet placerat mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tortor ipsum, pretium sed scelerisque vel, scelerisque quis diam</p>
                </div>
                <div class="testimonial-user">
                    <div class="user-image">
                        <img src="{{ asset('front/images/testimonial-user.png') }}" alt="user">
                    </div>
                    <div class="user-destination">
                        <h4>Steve Jobs</h4>
                        <span> CEO, Apple Inc.</span>
                        <h4>Steve Jobs</h4>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-item">
                <div class="testimonial-quote">
                    <img src="{{ asset('front/images/quote.png') }}" alt="quote">
                </div>
                <div class="testimonial-text">
                    <p>Suspendisse eu interdum mi, sit amet placerat mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tortor ipsum, pretium sed scelerisque vel, scelerisque quis diam</p>
                </div>
                <div class="testimonial-user">
                    <div class="user-image">
                        <img src="{{ asset('front/images/testimonial-user.png') }}" alt="user">
                    </div>
                    <div class="user-destination">
                        <h4>Steve Jobs</h4>
                        <span> CEO, Apple Inc.</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-item">
                <div class="testimonial-quote">
                    <img src="{{ asset('front/images/quote.png') }}" alt="quote">
                </div>
                <div class="testimonial-text">
                    <p>Suspendisse eu interdum mi, sit amet placerat mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tortor ipsum, pretium sed scelerisque vel, scelerisque quis diam</p>
                </div>
                <div class="testimonial-user">
                    <div class="user-image">
                        <img src="{{ asset('front/images/testimonial-user.png') }}" alt="user">
                    </div>
                    <div class="user-destination">
                        <h4>Steve Jobs</h4>
                        <span> CEO, Apple Inc.</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End what our client says -->
<div class="newsletter-section" style="background: url(front/images/newsletter.jpg) no-repeat;">
    <div class="container">
        <h3>Get Jobs in your Email Inbox</h3>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icon-cursor"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- end newsletter section -->
@endsection