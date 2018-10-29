@extends('front.layout.master')
@section('content')
<div class="search-banner" style="background: url(front/images/banner.jpg) no-repeat center;">
    <div class="container">
        <div class="search-bar">
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
    </div>
</div>
<!-- end search banner -->


<!-- End search-bar  -->
<div class="latest-jobs">
    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar">
                <h4>Filter By :-</h4>
                <div class="sidebar-filter-box">
                    <h5>Job Category</h5>
                    <ul>
                        <li>
                            <!-- <i class="icon-check"></i> -->
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Category1">
                                <label class="form-check-label" for="Category1">Chefs (210)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Category2">
                                <label class="form-check-label" for="Category2">Housekeeper (20)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Category3">
                                <label class="form-check-label" for="Category3">Nanny (120)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Category4">
                                <label class="form-check-label" for="Category4">Childcare (45)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Category5">
                                <label class="form-check-label" for="Category5">Constructor (32)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Category6">
                                <label class="form-check-label" for="Category6">Lorem Ipsum (20)</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-filter-box">
                    <h5>Job Types</h5>
                    <ul>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Types1">
                                <label class="form-check-label" for="Types1">Part Time (210)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Types2">
                                <label class="form-check-label" for="Types2">Full Time (20)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Types3">
                                <label class="form-check-label" for="Types3">Permanent (120)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Types4">
                                <label class="form-check-label" for="Types4">Live Out (45)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Types5">
                                <label class="form-check-label" for="Types5">Live In (32)</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="Types6">
                                <label class="form-check-label" for="Types6">Lorem Ipsum (20)</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-ad">
                    <img src="{{ asset('front/images/sidebar-add.jpg') }}" alt="ad">
                </div>
            </div>
            <div class="col-md-9">
                <div class="job-filter-section">
                    <div class="inner-filter-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="job-filter-title">
                                    <h4>Total Search Results for - Nanny Jobs (42) </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="category-section search-filter-category">
                        <h4><a>Nanny / HouseKeeper lives in</a></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-location-pin"></i><b>Location:</b>  Manchester, London</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-location-pin"></i><b>Salary:</b>  $20 / Hour</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-clock"></i><b>Job Type:</b>  Part Time Job</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-tag"></i><b>Job Category:</b>  HouseKeeper / Nanny</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-content-details">
                            <p>Phasellus interdum, mauris eget consectetur consequat, erat nulla rutrum neque,
                            at condimentum felis dui eget turpis. Proin blandit felis erat..</p>
                        </div>
                        <div class="view-job">
                            <a href="#" class="btn btn-default">View Job</a>
                        </div>
                    </div>
                    <!-- category-section -->
                    <div class="category-section search-filter-category">
                        <h4><a>Nanny / HouseKeeper lives in</a></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-location-pin"></i><b>Location:</b>  Manchester, London</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-location-pin"></i><b>Salary:</b>  $20 / Hour</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-clock"></i><b>Job Type:</b>  Part Time Job</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-tag"></i><b>Job Category:</b>  HouseKeeper / Nanny</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-content-details">
                            <p>Phasellus interdum, mauris eget consectetur consequat, erat nulla rutrum neque,
                            at condimentum felis dui eget turpis. Proin blandit felis erat..</p>
                        </div>
                        <div class="view-job">
                            <a href="#" class="btn btn-default">View Job</a>
                        </div>
                    </div>
                    <!-- category-section -->
                    <div class="category-section search-filter-category">
                        <h4><a>Nanny / HouseKeeper lives in</a></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-location-pin"></i><b>Location:</b>  Manchester, London</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-location-pin"></i><b>Salary:</b>  $20 / Hour</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-clock"></i><b>Job Type:</b>  Part Time Job</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-tag"></i><b>Job Category:</b>  HouseKeeper / Nanny</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-content-details">
                            <p>Phasellus interdum, mauris eget consectetur consequat, erat nulla rutrum neque,
                            at condimentum felis dui eget turpis. Proin blandit felis erat..</p>
                        </div>
                        <div class="view-job">
                            <a href="#" class="btn btn-default">View Job</a>
                        </div>
                    </div>
                    <!-- category-section -->
                    <div class="category-section search-filter-category">
                        <h4><a>Nanny / HouseKeeper lives in</a></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-location-pin"></i><b>Location:</b>  Manchester, London</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-location-pin"></i><b>Salary:</b>  $20 / Hour</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-clock"></i><b>Job Type:</b>  Part Time Job</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-list">
                                            <p><i class="icon-tag"></i><b>Job Category:</b>  HouseKeeper / Nanny</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-content-details">
                            <p>Phasellus interdum, mauris eget consectetur consequat, erat nulla rutrum neque,
                            at condimentum felis dui eget turpis. Proin blandit felis erat..</p>
                        </div>
                        <div class="view-job">
                            <a href="#" class="btn btn-default">View Job</a>
                        </div>
                    </div>
                    <!-- category-section -->
                </div>
                <nav class="page-labels">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="icon-arrow-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="icon-arrow-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- end filter section -->
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