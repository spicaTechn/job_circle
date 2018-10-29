<div class="col-md-3">
    <div class="customer-dashboard-sidebar">
        <h5>Dashboard </h5>
        <div class="dashboard-menu">
            <ul>
                <!-- <li><a href="#">Dashboard</a></li> -->
                <li class="{{Request::is('admin/jobs') ? 'active ' : '' }}"><a href="{{route('admin.jobs')}}">Jobs</a></li>
                <li><a href="#">Shortlisted</a></li>
                <li class="{{Request::is('admin/edit-profile') ? 'active ' : '' }}"><a href="{{route('admin.edit-profile')}}">Edit Profile</a></li>
                <li><a href="#">Write a Review</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </div>
</div>