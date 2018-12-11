@extends('admin.layout.master')
@section('page_specific_css')


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
<!-- bootstrap timepicker -->
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.13.0/themes/prism.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/icon.min.css">
<link rel="stylesheet" href="{{asset('/front/css/datepicker/pignose.calendar.css')}}">
<link rel="stylesheet" href="{{asset('/front/css/datepicker/pignose.calendar.min.css')}}">
<style type="text/css">
  div#job {
    z-index: 9999;
}
</style>

@endsection
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
                            <th>{{ __('No of Application') }}</th>                          
                            <th>{{ __('Job Display Type') }}</th>    
                            <th>{{ __('Work start Date') }}</th>
                            <th>{{ __('Job Publish Date') }}</th>
                            <th>{{ __('Job Expired Date') }}</th>  
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
              <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Job Display Type *') }}</h4>
                   <select name="job_display_type" class="form-control job_display_type">
                        <option value="0">Hot Job</option>
                        <option value="1">Featurd Job</option>
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
                   <h4 class="sub-title">{{ __('Status *') }}</h4>
                   <select name="status" class="form-control status">
                        <option value="0">Pending</option>
                        <option value="1">Approved</option>
                        <option value="2">Hold</option>
                        <option value="3">Expired</option>
                        <option value="4">Delete</option>
                    </select>
               </div>
               <div class="col-sm-6 col-xl-6 m-b-30">
                   <h4 class="sub-title">{{ __('Shortlisted Status *') }}</h4>
                   <select name="shortlisted_status" class="form-control shortlisted_status">
                        <option value="0">Closed</option>
                        <option value="1">Open</option>
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


<!-- date and  time picker -->



<script type="text/javascript" src="{{asset('/front/css/datepicker/pignose.calendar.full.min.js')}}"></script>

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
              {"data" :"no_of_application",            "name":"no_of_application"},
              {"data" :"job_display_type" ,            "name" :"job_display_type"},            
              {"data" :"work_start_date" ,            "name" :"work_start_date"},   
              {"data" :"job_publish_date" ,           "name" :"job_publish_date"},
              {"data" :"job_expiry_date" ,            "name" :"job_expiry_date"},
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
    var job_id  = $('.job_id').val();
    URI = "{{URL::to('admin/jobs')}}" + "/" + job_id;
    //alert(job_id)
   
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
                
                swal({
                  title: "Job has been Updated!",
                  text: "A job has been updated to Job Circle",
                  type: "success",
                  closeOnConfirm: true,
                });
                // check for the form submission type
              //table.ajax.reload();
               job_table.ajax.reload();
            }
      }
    });
  });//end of servoce top section  formvalidation

  
  
  /*Edit model pop up when edit button is clicked*/
  $("body").on('click','.job-edit', function(e){
    e.preventDefault();
    job_id=$(this).attr('data-job-id');
    //alert(job_id);
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
              $('.job_id').val(data.job.id);
              $(".no_of_vacancies").val(data.job.no_of_vacancies);
              $(".work_start_date").val(data.job.work_start_date);
              $(".job_publish_date").val(data.job.job_publish_date);
              $(".job_expiry_date").val(data.job.job_expiry_date);
              

              /*status : 0=pending, 1=approved, 2=hold, 3=expired*/
              $.each($('.status > option'), function(key,value) {
                if(data.job.status == value.value){
                  $(this).prop('selected',true);
                }
              });
              $.each($('.job_display_type > option'), function(key,value) {
                if(data.job.job_display_type == value.value){
                  $(this).prop('selected',true);
                }
              });

              /*shortlisted status : 0=close, 1=open*/
             
              $.each($('.shortlisted_status > option'), function(key,value) {
                if(data.job.shortlisted_status == value.value){
                  $(this).prop('selected',true);
                }
              });
              $('.modal-footer').css('display', '');/*hiding model footer section*/
              $('.modal-title').text('Edit Job');
              $('#job').modal('show');
            }
          }
        });
  });//end of edit model pop up

  /*Deleting job from job circle*/
  $("body").on('click','.job-delete', function(e){
    e.preventDefault();
        job_id=$(this).attr('data-job-id');
        //alert(job_type_id);

        //show the alert notification
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },function(isConfirm){
            if(isConfirm){
                //make ajax request 
                $.ajax({
                    url:"{{URL::to('admin/jobs/delete')}}" + "/" + job_id,
                    type:"POST",
                    dataType:"Json",
                    data:{_token:"{{csrf_token()}}"},
                    success:function(data){
                        if(data.status == "success")
                        {
                            swal("Deleted!", data.message, "success");
                             job_table.ajax.reload();
                        }else{
                            swal('Not allowed!!',data.message,'error');
                        }
                    },
                    error:function(jqXHR,textStatus,errorThrown)
                    {
                        if(jqXHR.status == '404')
                        {
                            swal('Not found in server','The job  does not exists','error');
                        }else if(jqXHR.status == '201')
                        {
                            swal('Not allowed!!','The job  cannot be deleted.','error');
                        }
                    }
                });
            }
            else {
                swal.close();
            }
        });
  });//end of delete job



  /*form reset when model closed*/

  
  /*date and time picker */
 
  $('.job_publish_date,.work_start_date,.job_expiry_date').pignoseCalendar({
      format: 'YYYY-MM-DD' // date format string. (2017-02-02)
      
  });
  

    
    
  
});//end of document.ready
</script>
@endsection