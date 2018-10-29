@extends('front.layout.master')
@section('content');
<div class="custumer-dashboard">
    <div class="container">
        <div class="row">
            @include('admin.dashboard-menu.menuitems')
            <!-- customer-dashboard-sidebar -->
            <div class="col-md-9">
                <div class="customer-dashboard-body">
                    <div class="job-list-search">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <h4>Edit Profile</h4>
                                <div class="breadcum-nav">
                                    <ul>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Edit Profile</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">

                            </div>
                        </div>
                    </div>
                    <div class="Dashboard-edit-wrap">
                        <h4>Basic Information</h4>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- customer-dashboard-body -->
    </div>
</div>
@endsection
