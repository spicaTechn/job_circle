<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('front.include.head')
    <!-- Load the sweetalert css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/sweetalert/css/sweetalert.css') }}">
    <!-- Load the formvalidation css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/formvalidation/formValidation.min.css') }}">
    <!-- country drop down css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/bootstrap-select-country.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/nice-select.css') }}">
    <!-- datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/bower_components/datedropper/css/datedropper.min.css')}}">

    <!-- bootstrap timepicker -->
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.13.0/themes/prism.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/icon.min.css">
    <link rel="stylesheet" href="{{asset('/front/css/datepicker/pignose.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/datepicker/pignose.calendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/timepicker/mdtimepicker.css')}}">

</head>
<body>
    <!-- This section contain employer top nav -->
    @include('front.employer.include.header')
    <!-- This section contain menu of job circle -->
    @include('front.include.header')
    
<div class="custumer-dashboard">
    <div class="container">
        <div class="row">
            <!-- employer dashboad left side bar -->
            @include('front.employer.include.leftsidebar')
            <!-- customer-dashboard-sidebar -->
            <div class="col-md-9">
                <div class="customer-dashboard-body">
                    <div class="job-list-search">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <h4>Post a Job</h4>
                                <div class="breadcum-nav">
                                    <ul>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Post a Job</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="show-active-jobs text-right">
                                    <a href="#" class="btn btn-default">show active jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="Dashboard-edit-wrap register-wrapper">
                       
                            <div class="form-register" id="step-1">
                            <h4>Get Started </h4>
                            <form role="form" name="job-form1" id="job-form1">
                                @csrf
                                <div class="form-group">
                                    <label>Job Category</label>
                                    <select name="job_category" class="form-control job_category">

                                        @foreach($job_categories as $job_category)
                                        <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" name="job_title" class="form-control job_title" placeholder="e.g Nanny">
                                </div>
                                <div class="form-group">
                                    <label>Location: City or Post Code</label>
                                    <input type="text" name="location" class="form-control location" placeholder="e.g Birmaingham">
                                </div>
                                <div class="form-group">
                                    <label>Country Selection</label>
                                    <!-- <input type="text" class="form-control" placeholder="United Kingdom"> -->
                                    <select class="selectpicker countrypicker" name="country" data-live-search="true" ></select>
                                   <!--  <select class="form-control bfh-countries country" name="country" data-country="US"></select> -->
                                </div>
                                <div class="form-group">
                                    <label>Job Type</label>
                                    <div class="inline-form">
                                        @foreach($job_types as $job_type)
                                        <div class="form-group form-check">
                                            <input type="checkbox" value="{{ $job_type->id }}" name="job_type" class="form-check-input job_type" id="job-type1">
                                            <label class="form-check-label" for="job-type1">{{ $job_type->title }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Salary Expectation</label>
                                            <input type="text" name="salary" class="form-control salary" placeholder="$10">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="hidden" >Salary Expectation</label>
                                            <select class="form-control salary_type" name="salary_type">
                                                <option value="0">per hour</option>
                                                <option value="1">per week</option>
                                                <option value="2">per month</option>
                                                <option value="3">per year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>How many staffs want to hire?</label>
                                    <input type="number" name="no_of_staff" class="form-control no_of_staff" placeholder="2,   5">
                                </div>
                            
                           <!--  <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="next-1">Next</span>
                            </div> -->
                            <button type="submit" class="btn btn-default flex-buttons" name="next-1" id="next-1">Next</button>
                            </form>
                        </div>
                        <!-- register section step 1-->
                        <div class="form-register" id="step-2">
                            <h4>Children Information</h4>
                            <form role="form" name="job-form2" id="job-form2">
                            @csrf
                            <div class="form-group">
                                <label>1) Total number of children</label>
                                <input type="number" name="total_no_of_children" class="form-control total_no_of_children" placeholder="">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total male children  </label>
                                        <input type="number" name="total_male_children" class="form-control total_male_children" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total female children  </label>
                                        <input type="number" name="total_female_children" class="form-control total_female_children" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>2) Total number of adults</label>
                                <input type="number" class="form-control total_no_of_adults" name="total_no_of_adults" placeholder="">
                            </div>
                            
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-1">Back</span>
                                <button type="submit" class="btn btn-default" name="next-3" id="next-3">Next</button>
                            </div>
                            </form>
                        </div>
                        <!-- end step 2 -->
                        <div class="form-register" id="step-3">
                            <h4>Work Information</h4>
                            <form role="form" name="job-form3" id="job-form3">
                                @csrf
                            
                             <!-- /*Sunday=1, Monday=2, Tuesday=3, Wednesday=4, Thursday=5, Friday=6, Saturday=7*/ -->
                            <div class="inline-form">
                                <div class="form-group form-check">
                                    <input type="checkbox" name="1" class="form-check-input" id="day1">
                                    <label class="form-check-label" for="day1">SUN</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" name="2" class="form-check-input" id="day2">
                                    <label class="form-check-label" for="day2">MON</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" name="3" class="form-check-input" id="day3">
                                    <label class="form-check-label" for="day3">TUE</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" name="4" class="form-check-input" id="day4">
                                    <label class="form-check-label" for="day4">WED</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" name="5" class="form-check-input" id="day5">
                                    <label class="form-check-label" for="day5">THU</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" name="6" class="form-check-input" id="day6">
                                    <label class="form-check-label" for="day6">FRI</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" name="7" class="form-check-input" id="day7">
                                    <label class="form-check-label" for="day7">SAT</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <input type="text" name="start_time" class="form-control start_time" placeholder="12:00 PM">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        
                                        <input type="text" name="end_time" class="form-control end_time" placeholder="4:00 PM">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>2) Work Start Day</label>
                                <!-- <input type="text" class="form-control" placeholder="01-11-2018"> -->
                                <input type="text" name="work_start_day" class="form-control work_start_day" placeholder="e. g.  09/02/2019">
                            </div>
                            
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-2">Back</span>
                                <button type="submit" class="btn btn-default" name="next-4" id="next-4">Next</button>
                            </div>
                            </form>
                        </div>
                        <!-- end step 3 -->
                        
                        <div class="form-register" id="step-4">
                            <h4>Job Description</h4>
                            <form role="form" name="job-form4" id="job-form4">
                                @csrf
                            <div class="form-group">
                                <label>Describe  about job (Roles and Responsibility)</label>
                                <textarea class="form-control job_description" name="job_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Job Experience</label>
                                <input type="number" name="job_experience" class="form-control job_experience" placeholder="Job Experience">
                                
                            </div>
                            <div class="form-group">
                                <label>Language Preferences</label>
                                <input type="text" name="language_preferences" class="form-control language_preferences" placeholder="e. g English">
                            </div>
                            <div class="form-group">
                                <label>Best date and time to interview (morning, evening, etc.):</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>Start Time</label> -->
                                            <input type="text" id="text-calendar" name="interview_date" class="form-control interview_date" placeholder="Interview Date" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>End Time</label> -->
                                            <input type="text" name="interview_start_time" class="form-control interview_start_time" placeholder="12:00 PM">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-group form-check">
                                    <input type="checkbox" name="terms_condition" class="form-check-input" id="terms">
                                    <label class="form-check-label" for="terms">
                                        <span class="small">
                                            Check this box if you accept these terms. I here by confirm that i have read and
                                            understood the <a href="">Terms and condition</a> of Jobcircle Limited and agree to be bound
                                            by these terms and condition.
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-3">Back</span>
                                <button class="btn btn-default" id="submit">Submit</button>
                            </div>
                            </form>
                        </div>
                        <!-- end step 5 -->
                   
                </div>
            </div>
        </div>
        <!-- customer-dashboard-body -->
    </div>
 </div>
</div>
   
@include('front.include.footer')


<!-- Sweetalert -->
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<!-- Formvalidation -->
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/formvalidation/formValidation.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/formvalidation/framework/bootstrap.js') }}"></script>
<!-- country drop down js -->
<script  type="text/javascript" src="{{ asset('/front/js/bootstrap-select-country.min.js') }}"></script>
<script  type="text/javascript" src="{{ asset('/front/js/jquery.nice-select.min.js') }}"></script>
<!-- datepickeer -->
<script type="text/javascript" src="{{ asset('/admin_assets/assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/admin_assets/assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/datedropper/js/datedropper.min.js')}}"></script>

<!-- date and  time picker -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

<script type="text/javascript" src="{{asset('/front/css/datepicker/pignose.calendar.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/css/timepicker/mdtimepicker.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function () {

    /*first next button click*/
    $("body").on('click','#next-1', function(e){
        e.preventDefault();
        //var job_title = $('.job_title').val();
        
        URI = "{{ route('employer.create-job.step1') }}";
        
        //get form data
        var result = new FormData($('#job-form1')[0]);
        $.ajax({
          url:URI,
          data:result,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"POST",
          success:function(data)
          {
            if(data.status == "success")
            {
               console.log(data);
            }
          }
        });
    });

    /*second next button click*/
    $("body").on('click','#next-3', function(e){
        e.preventDefault();
        
        URI = "{{ route('employer.create-job.step2') }}";
        
        //get form data
        var result = new FormData($('#job-form2')[0]);
        
        $.ajax({
          url:URI,
          data:result,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"POST",
          success:function(data)
          {
            if(data.status == "success")
            {

            }
          }
        });
    });
    /* third next button click */
    $("body").on('click','#next-4', function(e){
        e.preventDefault();
        
        URI = "{{ route('employer.create-job.step3') }}";
        
        //get form data
        var result = new FormData($('#job-form3')[0]);
        

        $.ajax({
          url:URI,
          data:result,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"POST",
          success:function(data)
          {
            if(data.status == "success")
            {
                
            }
          }
        });
    });
    
    $("body").on('click','#submit', function(e){
        e.preventDefault();
        
        URI = "{{ route('employer.create-job.store') }}";
        
        //get form data
        var result = new FormData($('#job-form4')[0]);
        
        $.ajax({
          url:URI,
          data:result,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"POST",
          success:function(data)
          {
            if(data.status == "success")
            {
                setTimeout(function() {
                          swal({
                            title:"Job  has been added!",
                            text:"A job  has been added to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('employer.dashboard')}}";
                          });
                }, 1000);
            }
          }
        });
    });



    $(function() {
        $('input.interview_date,.work_start_day').pignoseCalendar({
            format: 'YYYY-MM-DD' // date format string. (2017-02-02)
        });
    });
    $('.interview_start_time,.start_time,.end_time').mdtimepicker({
        format: 'h:mm',  
    });
    $('.job_type').click(function() {
        $('.job_type').not(this).prop('checked', false);
    });


    // Country DropDown
    $(".example").each(function(i,e){
        new NiceCountryInput(e).init();
    });
    function onChangeCallback(ctr){
        console.log("The country was changed: " + ctr);
    }


});//end of document.ready
</script>
</body>
</html>