@extends('admin.layout.master')
@section('page_specific_css')
@endsection
@section('content')
<div class="pcoded-content">
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">

            <div class="page-body">
                <div class="row">
                    <!-- card1 start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                <span class="text-c-blue f-w-600">Use space</span>
                                <h4>49/50GB</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Get more space
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card1 end -->
                    <!-- card1 start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                <span class="text-c-pink f-w-600">Revenue</span>
                                <h4>$23,589</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last 24 hours
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card1 end -->
                    <!-- card1 start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                                <span class="text-c-green f-w-600">Fixed issue</span>
                                <h4>45</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Tracked from microsoft
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card1 end -->
                    <!-- card1 start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                                <span class="text-c-yellow f-w-600">Followers</span>
                                <h4>+562</h4>
                                <div>
                                    <span class="f-left m-t-10 text-muted">
                                        <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Just update
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card1 end -->
                    <!-- Statistics Start -->
                    <div class="col-md-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>Statistics</h5>
                                <div class="card-header-left ">
                                </div>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div id="statestics-chart" style="height:330px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-4">

                        <div class="card card-blue total-card">
                            <div class="card-block">
                                <div class="text-left">
                                    <h4>4000</h4>
                                    <p class="m-0">Total Sales</p>
                                </div>
                                <span class="label bg-c-blue value-badges">12%</span>
                            </div>
                            <canvas id="total-value-graph-1" class="total-value-graph" height="100"></canvas>
                        </div>

                        <div class="card card-pink total-card">
                            <div class="card-block">
                                <div class="text-left">
                                    <h4>489</h4>
                                    <p class="m-0">Total Comment</p>
                                </div>
                                <span class="label bg-c-pink value-badges">15%</span>
                            </div>
                            <canvas id="total-value-graph-2" class="total-value-graph" height="100"></canvas>
                        </div>

                    </div>
                    <!-- Statistics End -->
                    <!-- statstic card start -->
                    <div class="col-md-12 col-xl-4">
                        <div class="card widget-statstic-card">
                            <div class="card-header">
                                <div class="card-header-left">
                                    <h5>Statistics</h5>
                                    <p class="p-t-10 m-b-0 text-c-blue">Compared to last week</p>
                                </div>
                            </div>
                            <div class="card-block">
                                <i class="icofont icofont-presentation-alt st-icon bg-c-blue"></i>

                                <div class="text-left">
                                    <h3 class="d-inline-block">5,456</h3>
                                    <i class="icofont icofont-long-arrow-up f-30 text-c-green"></i>
                                    <span class="f-right">23%</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- statstic card end -->
                    <!-- statstic card start -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card widget-statstic-card">
                            <div class="card-header">
                                <div class="card-header-left">
                                    <h5>Unique visitor</h5>
                                    <p class="p-t-10 m-b-0 text-c-pink">55% from last 28 hours</p>
                                </div>
                            </div>
                            <div class="card-block">
                                <i class="icofont icofont-users-social st-icon bg-c-pink txt-lite-color"></i>

                                <div class="text-left">
                                    <h3 class="d-inline-block">3,874</h3>
                                    <i class="icofont icofont-long-arrow-down text-c-pink f-30 "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- statstic card end -->
                    <!-- statstic card start -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card widget-statstic-card">
                            <div class="card-header">
                                <div class="card-header-left">
                                    <h5>New orders</h5>
                                    <p class="p-t-10 m-b-0 text-c-yellow">54% From last month</p>
                                </div>
                            </div>
                            <div class="card-block">
                                <i class="icofont icofont-chart-line st-icon bg-c-yellow"></i>

                                <div class="text-left">
                                    <h3 class="d-inline-block">5,456</h3>
                                    <i class="icofont icofont-long-arrow-up text-c-green f-30 "></i>
                                </div>
                            </div>
                        </div>
                    </div>

    </div>
</div>
</div>
@endsection
@section('page_specific_js')



@endsection