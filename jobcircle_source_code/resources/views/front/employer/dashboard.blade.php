<!doctype html>
<html lang="en">
<head>
    @include('front.include.head')
</head>
<body>
<!-- This section contain employer top nav -->
@include('front.employer.include.header')
<!-- This section contain menu of job circle -->
@include('front.include.header')
    <!-- end header -->
<div class="custumer-dashboard" style="min-height: 475px;">
    <div class="container">
        <div class="row">
            <!-- employer dashboad left side bar -->
    		@include('front.employer.include.leftsidebar')
            <!-- customer-dashboard-sidebar -->
            @if(empty($jobs))
            <div class="col-md-9">
                <div class="customer-dashboard-body" style="min-height: 355px;">
                    <div class="posted-jobs">
                        <div class="posted-job-section">
                            <h6> <i class="icon-check"></i> Active Jobs The list of jobs that you have posted and currently active.</h6>
                            <p><span>!</span> You have not posted any jobs, yet! <a href="{{url('/employer/create-job')}}">Post a Job Now.</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @else
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
                                    <div class="col-md-7">
                                        <form>
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="Search">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-5">
                                        <a href="{{url('/employer/create-job')}}" id="add-job" class="btn btn-default"> <i class="icon-plus"></i> Add Job</a>
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
                                    <th>Posted Date</th>
                                    <th>Expired Date</th>
                                    <th>Status</th>
                                    <th>Shortlisted </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=1; ?>
                            	@foreach($jobs as $job)
                              <?php //echo "<pre>"; print_r($job->job_user); echo "</pre>"; ?>
                              <input type="hidden" name="job_id" value="{{ $job->id }}">
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->job_publish_date }} </td>
                                    <td>{{ $job->job_expiry_date }}</td>
                                    <!-- /*status : 0=pending, 1=approved, 2=hold, 3=expired*/ -->
            						            @if($job->status==0)
            						               <td>Pending</td>
            						            @endif
            						            @if($job->status==1)
            						                <td>Approved</td>
            						            @endif
            						            @if($job->status==2)
            						                <td>Hold</td>
            						            @endif
            						            @if($job->status==3)
            						                <td>Expired</td>
            						            @endif
                                    @if($job->status==4)
                                        <td>Deleted</td>
                                    @endif
                                               
                                               	<!-- /*shortlisted status : 0=close, 1=open*/ -->
            						            @if($job->shortlisted_status==0)
            						                <td>Closed</td>
            						            @else
            						                <td>Open</td>
            						            @endif
                                
                                    <td>
                                        <a class="add-link job-details" href="javascript:void(0);" data-job-id="{{ $job->id }}" data-toggle="tooltip" data-placement="top" title="Job Details">
                                        <i class="icon-plus"></i><br>View More</a>
                                        <?php $job_user_job_id = ''; ?>
                                        <?php foreach($job->job_user as $job_user) : $job_user_job_id = $job_user->job_id;?><?php endforeach;?>
                                        @if(($job->id != $job_user_job_id) && ($job->status!=4))
                                          <a class="edit-link job-edit" href="{{url('/employer/job/edit/').'/'.$job->id}}" data-job-id="{{ $job->id }}" data-toggle="tooltip" data-placement="top" title="Edit Job">
                                              <i class="icon-pencil"></i>
                                              <br>Edit
                                          </a>
                                        @endif
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            <!-- customer-dashboard-body -->
        </div>
    </div>
</div>

<!-- footer section -->
@include('front.include.footer')
<!-- job details modal start -->
<div class="modal fade right job" id="job"  role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">
    
    </div>
  </div>
</div>
<!-- job details modal end -->

<script type="text/javascript">
$(document).ready(function () {
	$("body").on('click','.job-details', function(e){
	   e.preventDefault();
	    var job_show_id  = $(this).attr('data-job-id');
	    $.ajax({
          url:"{{URL::to('employer/job/show')}}" + "/" + job_show_id,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"GET",
          success:function(data)
          {
            if(data.status == "success")
            {
              $('.modal-content').html(data.html);
              $('.modal-title').text('Edit Job');
              $('#job').modal('show');
            }
          }
        });	
  });
  
	/*form reset when model closed*/
	// $('.modal').on('hidden.bs.modal', function() {
	    
	//     $('#job-form')[0].reset();
	// });
});
</script>
</body>
</html>
<!-- https://www.esquedu.com/ -->