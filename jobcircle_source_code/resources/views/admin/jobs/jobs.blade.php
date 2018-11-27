@extends('admin.layout.master')
@section('page_specific_css')
<!-- datepicker -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/bower_components/datedropper/css/datedropper.min.css')}}">

<!--Load the datatable css-->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<!-- Load the sweetalert css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/sweetalert/css/sweetalert.css') }}">
<!-- Load the formvalidation css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/formvalidation/formValidation.min.css') }}">

<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css') }}">

<!-- File Input css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/file-input/css/fileinput.css') }}">
@section('content')
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
   <div class="page-wrapper">
      <div class="page-body">
         <div class="row">
            <div class="col-sm-12">
               <!-- HTML5 Export Buttons table start -->
               <div class="card px-4 py-4 industry-jobs-tab">
                  <div class="card-header">
                     <div class="card-header-left">
                        <h5>Manage Job Type</h5>
                     </div>
                  </div>
                  <div class="card-block">
                    <!-- <div class="row">
                      <div class="col-sm-12 col-xl-12 m-b-30">
                        <button  class="btn btn-grd-primary addJob" id="addJob" style="float: right;">Add New Job Type</button>
                      </div>
                    </div> -->
                    <div class="dt-responsive table-responsive">
                      <table id="tbl-job" class="table table-striped table-bordered tbl-job">
                          <thead>
                          <tr>
                            <th>{{ __('S.N') }}</th>
                            <th>{{ __('Title') }}</th>
                            
                            <th>{{ __('Salary Type') }}</th>
                            <th>{{ __('Salary') }}</th>
                            <th>{{ __('No of Vacancies') }}</th>
                            
                            <th>{{ __('Total Working Days In a Week') }}</th>
                            <th>{{ __('Week Days') }}</th>
                            <th>{{ __('Start Time') }}</th>
                            <th>{{ __('End Time') }}</th>
                            <th>{{ __('Job Display Type') }}</th>
                            <th>{{ __('Work start Date') }}</th>
                            <th>{{ __('Job Publish Date') }}</th>
                            <th>{{ __('Job Expiry Date') }}</th>
                            <th>{{ __('No of Year of Experience') }}</th>
                            <th>{{ __('Language Preferences') }}</th>
                            <th>{{ __('Interview Date') }}</th>
                            <th>{{ __('Interview Time') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Shortlisted Status') }}</th>
                            <th>{{ __('Action') }}</th>
                          </tr>
                          </thead>
                          <tbody>
                          
                          </tbody>
                      </table>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Page-body end -->
   </div>
</div>
</div>
</div>
@endsection

@section('form_modal')
<div class="modal fade job" id="job" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" name="job-form" id="job-form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="job_id" class="job_id" value=""/>
          <div class="modal-header">
              <h4 class="modal-title"><span>{{ __('Add') }}</span> {{ __('Job')  }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12 col-xl-12 m-b-30">
                   <h4 class="sub-title">{{ __('Title *') }}</h4>
                   <input type="text" class="form-control job_title" name="job_title" placeholder="Title">
              </div>   
            </div>
            <div class="row">
               <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Description *') }}</h4>
                   <textarea  class="form-control job_description" style="height: 100px;" name="job_description" placeholder="Description"></textarea>
               </div>
               <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Excerpt *') }}</h4>
                   <textarea  class="form-control job_excerpt" style="height: 100px;" name="job_excerpt" placeholder="Excerpt"></textarea>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Job Type ID *') }}</h4>
                   <select name="job_type_id" class="form-control job_type_id">
                        
                    </select>
               </div>
               <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Job Category ID *') }}</h4>
                   <select name="job_category_id" class="form-control job_category_id">
                        
                    </select>
               </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('Salary Type *') }}</h4>
                   <select name="salary_type" class="form-control salary_type">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
              </div>  
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('Salary *') }}</h4>
                   <input type="number" class="form-control salary" name="salary" placeholder="Salary">
              </div>  
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('No of Vacancies *') }}</h4>
                   <input type="number" class="form-control no_of_vacancies" name="no_of_vacancies" placeholder="No of Vacancies">
              </div>   
            </div>
            <div class="row">
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('Total Children *') }}</h4>
                   <input type="number" class="form-control total_children" name="total_children" placeholder="Total Children">
              </div>  
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('Total Male Children *') }}</h4>
                   <input type="number" class="form-control total_male_children" name="total_male_children" placeholder="Total Male Children">
              </div>  
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('Total Female Children *') }}</h4>
                   <input type="number" class="form-control total_female_children" name="total_female_children" placeholder="Total Female Children">
              </div>   
            </div>
            <div class="row">
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('Total Adults *') }}</h4>
                   <input type="number" class="form-control total_adults" name="total_adults" placeholder="Total Adults">
              </div>  
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('Total Working Days In Week *') }}</h4>
                   <input type="number" class="form-control total_working_days_in_week" name="total_working_days_in_week" placeholder="Total Working Days In Week">
              </div>  
              <div class="col-sm-4 col-xl-4 m-b-30">
                   <h4 class="sub-title">{{ __('WeekDays *') }}</h4>
                   <input type="number" class="form-control week_days" name="week_days" placeholder="WeekDays">
              </div>   
            </div>
            <div class="row">
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Start Time *') }}</h4>
                   <input type="text" id="timepicker" width="276" class="form-control start_time" name="start_time" placeholder="Start Time">
              </div>  
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('End Time *') }}</h4>
                   <input type="text" class="form-control end_time" name="end_time" placeholder="End Time">
              </div>  
            </div>
            <div class="row">
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Job Display Type *') }}</h4>
                   <select name="job_display_type" class="form-control job_display_type">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        
                    </select>
              </div>  
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Work Start Date *') }}</h4>
                   <input type="text" id="dropper-dangercolor" class="form-control work_start_date" name="work_start_date" placeholder="Work Start Date">
              </div>  
            </div>
            <div class="row">
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Job Publish Date *') }}</h4>
                   <input type="text" id="#dropper-default" class="form-control job_publish_date" name="job_publish_date" placeholder="Job Publish Date">
              </div>  
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Job Expiry Date *') }}</h4>
                   <input type="text" class="form-control job_expiry_date" name="job_expiry_date" placeholder="Job Expiry Date">
              </div>  
            </div>
            <div class="row">
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('No of Year of Experience *') }}</h4>
                   <input type="number" class="form-control no_of_year_of_experience" name="no_of_year_of_experience" placeholder="No of Year of Experience">
              </div>  
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Language Preferences *') }}</h4>
                   <input type="text" class="form-control language_preferences" name="language_preferences" placeholder="Language Preferences">
              </div>  
            </div>
            <div class="row">
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Interview Date *') }}</h4>
                   <input type="text" class="form-control interview_date" name="interview_date" placeholder="Interview Date">
              </div>  
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Interview Time *') }}</h4>
                   <input type="text" class="form-control interview_time" name="interview_time" placeholder="Interview Time">
              </div>  
            </div>
            <div class="row">
               <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Status *') }}</h4>
                   <select name="status" class="form-control status">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
               </div>
               <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Shortlisted Status *') }}</h4>
                   <select name="shortlisted_status" class="form-control shortlisted_status">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
               </div>
            </div>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
           <button type="submit"  class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('page_specific_js')
<!-- datepickeer -->

<script type="text/javascript" src="{{ asset('/admin_assets/assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/admin_assets/assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/bower_components/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/bower_components/datedropper/js/datedropper.min.js')}}"></script>

<!-- file input js -->
<script src="{{ asset('/admin_assets/bower_components/file-input/js/fileinput.js') }}"></script>
<!-- Datatable -->
<script src="{{ asset('/admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin_assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/admin_assets/assets/pages/data-table/js/jszip.min.js') }}"></script>
<script src="{{ asset('/admin_assets/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('/admin_assets/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/admin_assets/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('/admin_assets/assets/pages/data-table/extensions/buttons/js/jszip.min.js') }}"></script>
<script src="{{ asset('/admin_assets/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('/admin_assets/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/admin_assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/admin_assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin_assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/admin_assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Sweetalert -->
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<!-- Formvalidation -->
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/formvalidation/formValidation.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/formvalidation/framework/bootstrap.js') }}"></script>

<!-- Page wise Javascript code -->
<script type="text/javascript">
$(document).ready(function () {
  var save_method, uri;
  var job_table = $('#tbl-job').DataTable({
       dom: 'Bfrtip',
       LengthChange: true,
       buttons:[
          'excel',
          {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                exportOptions: {
                  columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]
                },

            }
        ],
        destroy : true,
        order : [[ 0, "asc" ]], //or asc 
        //columnDefs: [{"targets":0, "type":"date-eu"}],
        serverSide : true,
        processing : true,
        ajax       : {
                        url  : "{{route('admin.jobs.getJobs')}}",
                        type : 'GET',
        },
        columns   : [
                     
              {
               "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
              },
              {"data" :"title",                        "name":"title"},
              
              {"data" :"salary_type",                  "name":"salary_type"},
              {"data" :"salary",                       "name":"salary"},
              {"data" :"no_of_vacancies",              "name":"no_of_vacancies"},
              
              {"data" :"total_working_days_in_week" , "name" :"total_working_days_in_week"},
              {"data" :"weekdays" ,                   "name" :"weekdays"},
              {"data" :"start_time" ,                 "name" :"start_time"},
              {"data" :"end_time" ,                   "name" :"end_time"},
              {"data" :"job_display_type" ,           "name" :"job_display_type"},
              {"data" :"work_start_date" ,            "name" :"work_start_date"},
              {"data" :"job_publish_date" ,           "name" :"job_publish_date"},
              {"data" :"job_expiry_date" ,            "name" :"job_expiry_date"},
              {"data" :"no_of_year_of_experience" ,   "name" :"no_of_year_of_experience"},
              {"data" :"language_preferences" ,       "name" :"language_preferences"},
              {"data" :"interview_date" ,             "name" :"interview_date"},
              {"data" :"interview_time" ,             "name" :"interview_time"},
              {"data" :"status" ,                     "name" :"status"},
              {"data" :"shortlisted_status" ,         "name" :"shortlisted_status"},
              {"data" :"action" ,                     "name" :"action"},
          
        ]
      
  });//end of datatable
  // add service model popup
  $( "#addJob" ).on( "click", function() {
    save_method = 'add';
    $.get("{{route('admin.jobs.getJobType')}}",function(data){
      // console.log(data);
       $('.job_type_id').html(data.result);
    });
    $.get("{{route('admin.jobs.getJobCategory')}}",function(data){
      // console.log(data);
       $('.job_category_id').html(data.result);
    });
    $('#job').modal('show');
  });


  // formvalidation
  $('#job-form').on('init.field.fv', function(e, data) {
    var $parent = data.element.parents('.form-group'),
        $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

    $icon.on('click.clearing', function() {
        // Check if the field is valid or not via the icon class
        if ($icon.hasClass('fa fa-remove')) {
            // Clear the fieldf
            data.fv.resetField(data.element);
        }
    });
  })
  .formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-times',
        validating: 'fa fa-refresh'
    },
    fields: {
        'job_title': {
            validators: {
                notEmpty: {
                    message: 'The title  is required'
                }
            }
        },
        'job_description': {
            validators: {
                notEmpty: {
                    message: 'The description  is required'
                }
            }
        },
        'job_excerpt': {
            validators: {
                notEmpty: {
                    message: 'The excerpt  is required'
                }
            }
        },
        'salary_type': {
            validators: {
                notEmpty: {
                    message: 'The salary type  is required'
                }
            }
        },
        'week_days': {
            validators: {
                notEmpty: {
                    message: 'The week days  is required'
                }
            }
        },
        'start_time': {
            validators: {
                notEmpty: {
                    message: 'The start time  is required'
                }
            }
        },
        'end_time': {
            validators: {
                notEmpty: {
                    message: 'The end time  is required'
                }
            }
        },
        'job_display_type': {
            validators: {
                notEmpty: {
                    message: 'The job display type  is required'
                }
            }
        },
        'job_publish_date': {
            validators: {
                notEmpty: {
                    message: 'The job pusblish date  is required'
                }
            }
        },
        'job_expiry_date': {
            validators: {
                notEmpty: {
                    message: 'The job expiry date  is required'
                }
            }
        },
        'status': {
            validators: {
                notEmpty: {
                    message: 'The status  is required'
                }
            }
        },
        'shortlisted_status': {
            validators: {
                notEmpty: {
                    message: 'The shortlisted status  is required'
                }
            }
        },

    }
  })
  .on('success.form.fv', function(e) {
    e.preventDefault();
    if(save_method == 'add')
    {
        URI = "{{ route('admin.jobs') }}";
    }
    // else
    // {
    //     var job_type_id  = $(".job_type_id").val();
    //     URI = "{{ route('admin.job-type') }}" + "/" + job_type_id;
    // }
   
    //get form data
    var result = new FormData($('#job-form')[0]);
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
              $('#job').modal('hide');
                if(save_method == "add"){
                  swal({
                    title: "New Job Type has been added!",
                    text: "A new  job type   has been added to Job Circle",
                    type: "success",
                    closeOnConfirm: true,
                  });
               }
               else
               {
                  swal({
                    title: "Job Type  has been Updated!",
                    text: "A job type  has been updated to Job Circle",
                    type: "success",
                    closeOnConfirm: true,
                  });
               } // check for the form submission type
              //table.ajax.reload();
               job_table.ajax.reload();
            }
      }
    });
  });//end of servoce top section  formvalidation

  
  $("body").on('click','.edit-job', function(e){
    save_method = 'edit';
    var job_id  = $(this).attr('data-job-id');
    $.ajax({
          url:"{{URL::to('admin/jobs')}}" + "/" + job_id,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"GET",
          success:function(data)
          {
            if(data.status == "success")
            {
              //show  model
              $(".job_id").val(data.result.id);
              $(".job_title").val(data.result.title);
              $(".job_description").val(data.result.description);
              $(".job_excerpt").val(data.result.excerpt);
              $(".job_type_id").val(data.result.job_type_id);
              $(".job_category_id").val(data.result.job_category_id);
              $(".salary_type").val(data.result.salary_type);
              $(".salary").val(data.result.salary);
              $(".no_of_vacancies").val(data.result.no_of_vacancies);
              $(".total_children").val(data.result.total_children);
              $(".total_male_children").val(data.result.total_male_children);
              $(".total_female_children").val(data.result.total_female_children);
              $(".total_adults").val(data.result.total_adults);
              $(".total_working_days_in_week").val(data.result.total_working_days_in_week);
              $(".week_days").val(data.result.weekdays);
              $(".start_time").val(data.result.start_time);
              $(".end_time").val(data.result.end_time);
              $(".job_display_type").val(data.result.job_display_type);
              $(".work_start_date").val(data.result.work_start_date);
              $(".job_publish_date").val(data.result.job_publish_date);
              $(".job_expiry_date").val(data.result.job_expiry_date);
              $(".no_of_year_of_experience").val(data.result.no_of_year_of_experience);
              $(".language_preferences").val(data.result.language_preferences);
              $(".interview_date").val(data.result.interview_date);
              $(".interview_time").val(data.result.interview_time);
              $(".status").val(data.result.status);
              $(".shortlisted_status").val(data.result.shortlisted_status);


              $('.modal-title').text('Update Job');
              $('#job').modal('show');
            }
          }
        })
  });

  /*date and time picker */
  $( "#dropper-dangercolor" ).datepicker();
  
});//end of document.ready
</script>
@endsection