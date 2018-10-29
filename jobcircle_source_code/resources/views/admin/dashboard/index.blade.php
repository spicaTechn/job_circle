@extends('front.layout.master')

@section('content')
<div class="custumer-dashboard">
    <div class="container">
        <div class="row">
            @include('admin.dashboard-menu.menuitems')
            <!-- customer-dashboard-sidebar -->
            <div class="col-md-9">
                <div class="customer-dashboard-body">
                    <div class="posted-jobs">
                        <div class="posted-job-section">
                            <h6> <i class="icon-check"></i> Active Jobs The list of jobs that you have posted and currently active.</h6>
                            <p><span>!</span> You have not posted any jobs, yet! <a href="#">Post a Job Now.</a></p>
                        </div>
                        <!-- posted-job-section 1-->
                        <div class="posted-job-section">
                            <h6> <i class="icon-check"></i> Expired Jobs. The list of past jobs that are already expired on deadline
                            and are inactive.</h6>
                            <p><span>!</span> You do not have any expired jobs, yet! <a href="#">Post a Job Now.</a></p>
                        </div>
                        <!-- posted-job-section 1-->
                    </div>
                </div>
            </div>
            <!-- customer-dashboard-body -->
        </div>
    </div>
</div>
@endsection