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
<style type="text/css">
th, td {
    white-space: normal;
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
                    <div class="row">
                      <div class="col-sm-12 col-xl-12 m-b-30">
                        <button  class="btn btn-grd-primary addJobType" id="addJobType" style="float: right;">Add New Job Type</button>
                      </div>
                    </div>
                    <div class="dt-responsive table-responsive">
                      <table id="tbl-job-type" class="table table-striped table-bordered tbl-job-type">
                          <thead>
                          <tr>
                            <th>{{ __('S.N') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Status') }}</th>
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
<div class="modal fade job-type" id="job-type" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" name="job-type-form" id="job-type-form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="job_type_id" class="job_type_id" value=""/>
          <div class="modal-header">
              <h4 class="modal-title"><span>{{ __('Add') }}</span> {{ __('Job Type')  }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body" name="job-type-add-field" id="job-type-add-field">
            <div class="row">
	            <div class="col-sm-12 col-xl-12 m-b-30">
	                 <h4 class="sub-title">{{ __('Title *') }}</h4>
	                 <input type="text" class="form-control job_type_title" name="job_type_title" placeholder="Title">
	            </div>   
            </div>
            <div class="row">
	             <div class="col-sm-12 col-xl-12 m-b-30">
	                 <h4 class="sub-title">{{ __('Description *') }}</h4>
	                 <textarea  class="form-control job_type_description" style="height: 144px;" name="job_type_description" placeholder="Description"></textarea>
	             </div>
            </div>
            <div class="row">
	             <div class="col-sm-12 col-xl-12 m-b-30">
	                 <h4 class="sub-title">{{ __('Status *') }}</h4>
	                 <select name="job_type_status" class="form-control job_type_status">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
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
<!-- wysiwyg editor -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<!-- Page wise Javascript code -->
<script type="text/javascript">
$(document).ready(function () {
	var save_method, uri;
	var job_type_table = $('#tbl-job-type').DataTable({
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
                  columns: [ 0,1,2,3,4,5]
                },

            }
      	],
        destroy : true,
        order : [[ 0, "asc" ]], //or asc 
        //columnDefs: [{"targets":0, "type":"date-eu"}],
        serverSide : true,
        processing : true,
        ajax       : {
                        url  : "{{route('admin.getJobType')}}",
                        type : 'GET',
        },
        columns   : [
                     
              {
               "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
              },
              {"data" :"title","name":"title"},
              {"data" :'slug', "name":"slug"},
              {"data" :"description",'name':"description"},
              {"data" :"status" , "name" :"status"},
              {"data" :"action" , "name" :"action"},
          
        ]
      
  });//end of datatable  
  // add service model popup
  $( "#addJobType" ).on( "click", function() {
    save_method = 'add';
    
    $('#job-type').modal('show');
  });

  // formvalidation
  $('#job-type-form').on('init.field.fv', function(e, data) {
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
        'job_type_title': {
            validators: {
                notEmpty: {
                    message: 'The title  is required'
                }
            }
        },
        'job_type_description': {
            validators: {
                notEmpty: {
                    message: 'The description  is required'
                }
            }
        }
    }
  })
  .on('success.form.fv', function(e) {
    e.preventDefault();
    
    
    if(save_method == 'add')
    {
        URI = "{{ route('admin.job-type') }}";
    }
    else
    {
        var job_type_id  = $(".job_type_id").val();
        URI = "{{ route('admin.job-type') }}" + "/" + job_type_id;
    }
   
    //get form data
    var result = new FormData($('#job-type-form')[0]);
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
            	$('#job-type').modal('hide');
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
               job_type_table.ajax.reload();
            }
      }
    });
  });//end of servoce top section  formvalidation
  //reset the form validaton and from when the modal was closing
  $('.modal').on('hidden.bs.modal', function(){
     $(this).find('form').data('formValidation').resetForm(true);
     $(this).find('form')[0].reset();

  });



  // edit job type model pop up 
  $("body").on('click','.edit-job-type', function(e){
    save_method  = 'edit';
    var job_type_id = $(this).attr('data-job-type-id');
    $.ajax({
          url:"{{ route('admin.job-type') }}" + "/" + job_type_id,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"GET",
          success:function(data)
          {
            if(data.status == "success")
            {
              //show  model
              $(".job_type_id").val(data.result.id);
              $(".job_type_title").val(data.result.title);
              $(".job_type_description").val(data.result.description);
              var el = $(".job_type_status");
              //console.log(el);

              $.each($('.job_type_status > option'), function(key,value) {
                if(data.result.status == value.value){
                  $(this).prop('selected',true);
                }
              });
              $('.modal-title').text('Update Job Type');
              $('#job-type').modal('show');
            }
          }
        });
  });

  // deleting job type
  $("body").on('click','.delete-job-type', function(e){
        e.preventDefault();
        job_type_id=$(this).attr('data-job-type-id');
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
                    url:"{{URL::to('admin/job-type')}}" + "/" + job_type_id,
                    type:"DELETE",
                    dataType:"Json",
                    data:{_token:"{{csrf_token()}}"},
                    success:function(data){
                        if(data.status == "success")
                        {
                            swal("Deleted!", data.message, "success");
                             job_type_table.ajax.reload();
                        }else{
                            swal('Not allowed!!',data.message,'error');
                        }
                    },
                    error:function(jqXHR,textStatus,errorThrown)
                    {
                        if(jqXHR.status == '404')
                        {
                            swal('Not found in server','The job type does not exists','error');
                        }else if(jqXHR.status == '201')
                        {
                            swal('Not allowed!!','The job type cannot be deleted.','error');
                        }
                    }
                });
            }
            else {
                swal.close();
            }
        });

    }); // end delete job type click


});//end of document.ready
</script>
@endsection