<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    @include('front.include.head')
    @yield('page_specific_css')
</head>
    <body>
        <header class="header">
            <div class="login-menu">
                <ul>
                    <li class="nav-item dropdown">
                        <a class="btn btn-default dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, Manoj Rana<img class="profile-image" src="{{ asset('front/images/testimonial-user.png')}}" alt="user name">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <ul>
                                <li><a class="dropdown-item" href="#">MANOJ RANA<span>manojinvisible@gmail.com</span></a></li>
                                <li><a class="dropdown-item" href="#">Change Password</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <!-- end header -->
        @include('front.include.header')
        <!-- end header -->
        <div class="custumer-dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="customer-dashboard-sidebar">
                            <h5>Dashboard </h5>
                            <div class="dashboard-menu">
                                <ul>
                                    <!-- <li><a href="#">Dashboard</a></li> -->
                                    <li class="active"><a href="#">Jobs</a></li>
                                    <li><a href="#">Shortlisted</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Write a Review</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- customer-dashboard-sidebar -->
                    <div class="col-md-9">
                        <div class="customer-dashboard-body">
                            <div class="job-list-search">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <h4>Job List</h4>
                                        <div class="breadcum-nav">
                                            <ul>
                                                <li><a href="#">Jobs</a></li>
                                                <li><a href="#">Job List</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pull-right">
                                                    <form>
                                                        <div class="form-group">
                                                            <input type="text" name="" class="form-control" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S. N</th>
                                            <th>Job Title</th>
                                            <th>Position</th>
                                            <th>No of <br>Employee</th>
                                            <th>Status </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Nanny Helper</td>
                                            <td>Nanny </td>
                                            <td>2</td>
                                            <td>Pending</td>
                                            <td>
                                                <div class="flex-elements">
                                                    <a class="delete" href="#" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="icon-close"></i></a>
                                                    <a class="add-link" href="#" data-toggle="tooltip" data-placement="top" title="View More">
                                                    <i class="icon-plus"></i></a>
                                                    <a class="edit-link approved-modal-btn" data-toggle="tooltip" data-placement="top" title="Approved">
                                                        <i class="icon-check"></i>
                                                        
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Nanny Helper</td>
                                            <td>Nanny </td>
                                            <td>2</td>
                                            <td>Hold</td>
                                            <td>
                                                <div class="flex-elements">
                                                    <a class="delete" href="#" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="icon-close"></i></a>
                                                    <a class="add-link" href="#" data-toggle="tooltip" data-placement="top" title="View More">
                                                    <i class="icon-plus"></i></a>
                                                    <a class="edit-link approved-modal-btn" data-toggle="tooltip" data-placement="top" title="Approved">
                                                        <i class="icon-check"></i>
                                                        
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Nanny Helper</td>
                                            <td>Nanny </td>
                                            <td>2</td>
                                            <td>Approved</td>
                                            <td>
                                                <div class="flex-elements">
                                                    <a class="delete" href="#" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="icon-close"></i></a>
                                                    <a class="add-link" href="#" data-toggle="tooltip" data-placement="top" title="View More">
                                                    <i class="icon-plus"></i></a>
                                                    <a class="edit-link approved-modal-btn" data-toggle="tooltip" data-placement="top" title="Approved">
                                                        <i class="icon-check"></i>
                                                        
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Modal -->
                                <div class="modal approved-modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Approved For</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body Dashboard-edit-wrap">
                                                <form>
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="Baby Care at Night">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" placeholder="Baby Sitter">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Set Job as</label>
                                                        <select class="form-control">
                                                            <option>Featured Job</option>
                                                            <option>Hot Job</option>
                                                            <option>None</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- customer-dashboard-body -->
            </div>
        </div>
    </div>
    
  
    @include('front.include.footer')
</body>
</html>