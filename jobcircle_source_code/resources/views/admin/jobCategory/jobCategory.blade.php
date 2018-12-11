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
                        <h5>Manage Job Category</h5>
                     </div>
                  </div>
                  <div class="card-block">
                    <div class="row">
                      <div class="col-sm-12 col-xl-12 m-b-30">
                        <button  class="btn btn-grd-primary addJobCategory" id="addJobCategory" style="float: right;">Add New Job Category</button>
                      </div>
                    </div>
                    <div class="dt-responsive table-responsive">
                      <table id="tbl-job-category" class="table table-striped table-bordered tbl-job-category">
                          <thead>
                          <tr>
                            <th>{{ __('S.N') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Name') }}</th>
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
<div class="modal fade job-category" id="job-category" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" name="job-category-form" id="job-category-form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="job_category_id" class="job_category_id" value=""/>
          <div class="modal-header">
              <h4 class="modal-title"><span>{{ __('Add') }}</span> {{ __('Job Category')  }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
	            <div class="col-sm-6 col-xl-6 m-b-30">
	                <div class="row">
	                 	<div class="col-sm-12 col-xl-12 m-b-30">
			                 <h4 class="sub-title">{{ __('Name *') }}</h4>
			                 <input type="text" class="form-control job_category_name" name="job_category_name" placeholder="Name">
			            </div>
			        </div>
			        <div class="row">
			             <div class="col-sm-12 col-xl-12 m-b-30">
			                 <h4 class="sub-title">{{ __('Description *') }}</h4>
			                 <textarea  class="form-control job_category_description" style="height: 144px;" name="job_category_description" placeholder="Description"></textarea>
			             </div>
			        </div>	
			        <div class="row">
			            <div class="col-sm-12 col-xl-12 m-b-30">
			                 <h4 class="sub-title">{{ __('Status *') }}</h4>
			                 <select name="job_category_status" class="form-control job_category_status">
		                        <option value="0">Inactive</option>
		                        <option value="1">Active</option>
		                    </select>
			             </div>   
			        </div>
	             </div>
                <div class="col-sm-6 col-xl-6">
                  <div class="row">
                  	<div class="col-sm-12 col-xl-12 m-b-30">
                  		<h4 class="sub-title">Image *</h4>
		                  <div class="fileinput fileinput-new" data-provides="fileinput">
		                    <div class="fileinput-new thumbnail"  data-trigger="fileinput">
		                      <img src="{{asset('/front')}}/images/job-category/job-category.png" id="job_category_image">
		                    </div>
		                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
		                    <div>
		                      <span class="btn btn-file btn-block btn-primary btn-sm">
		                        <span class="fileinput-new">Select Profile Image</span>
		                        <span class="fileinput-exists">Change</span>
		                        <input name="job_category_image" accept="image/*" type="file">
		                      </span>
		                      <a href="#" class="btn btn-orange fileinput-exists btn-sm btn-block" data-dismiss="fileinput">Remove</a>
		                    </div>
		                  </div>
                  	</div>				
                  </div>
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
<script type="text/javascript">
$(document).ready(function () {
	var save_method, uri;
	var job_category_table = $('#tbl-job-category').DataTable({
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
                        url  : "{{route('admin.getJobCategory')}}",
                        type : 'GET',
        },
        columns   : [
                     
              {
               "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
              },
              {'render'  :function(data, type, JsonResultRow, meta)
                {
                    return "<img src='"+ JsonResultRow.image + "' height='50px' width='50px'>";
                }
              },
              {"data" :"name","name":"name"},
              {"data" :'slug', "name":"slug"},
              {"data" :"description",'name':"description"},
              {"data" :"status" , "name" :"status"},
              {"data" :"action" , "name" :"action"},
          
        ]
      
  });//end of datatable  

  // add service model popup
  $( "#addJobCategory" ).on( "click", function() {
    save_method = 'add';
    
    $('#job-category').modal('show');
  });

  // formvalidation
  $('#job-category-form').on('init.field.fv', function(e, data) {
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
        'job_category_name': {
            validators: {
                notEmpty: {
                    message: 'The name  is required'
                }
            }
        },
        'job_category_description': {
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
        URI = "{{ route('admin.job-category') }}";
    }
    else
    {
        var job_category_id  = $(".job_category_id").val();
        URI = "{{ route('admin.job-category') }}" + "/" + job_category_id;
    }
   
    //get form data
    var result = new FormData($('#job-category-form')[0]);
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
            	$('#job-category').modal('hide');
                if(save_method == "add"){
                  swal({
                    title: "New Job Category has been added!",
                    text: "A new  job category   has been added to Job Circle",
                    type: "success",
                    closeOnConfirm: true,
                  });
               }
               else
               {
                  swal({
                    title: "Job Type  has been Updated!",
                    text: "A job category  has been updated to Job Circle",
                    type: "success",
                    closeOnConfirm: true,
                  });
               } // check for the form submission type
              //table.ajax.reload();
               job_category_table.ajax.reload();
            }
      }
    });
  });//end of servoce top section  formvalidation


  // edit job type model pop up 
  $("body").on('click','.edit-job-category', function(e){
    save_method  = 'edit';
    var job_category_id = $(this).attr('data-job-category-id');
    $.ajax({
          url:"{{ route('admin.job-category') }}" + "/" + job_category_id,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"GET",
          success:function(data)
          {
            if(data.status == "success")
            {
              //show  model
              $(".job_category_id").val(data.result.id);
              $(".job_category_name").val(data.result.name);
              $(".job_category_description").val(data.result.description);
              var el = $(".job_category_status");
              //console.log(el);

              $.each($('.job_category_status > option'), function(key,value) {
                if(data.result.status == value.value){
                  $(this).prop('selected',true);
                }
              });
              var image="{{asset('/front')}}/images/job-category" + "/" +data.result.image_path;
              $("#job_category_image").attr('src',image);
              $('.modal-title').text('Update Job Category');
              $('#job-category').modal('show');
            }
          }
        });
  });


  // deleting job type
  $("body").on('click','.delete-job-category', function(e){
        e.preventDefault();
        job_category_id=$(this).attr('data-job-category-id');
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
                    url:"{{URL::to('admin/job-category')}}" + "/" + job_category_id,
                    type:"DELETE",
                    dataType:"Json",
                    data:{_token:"{{csrf_token()}}"},
                    success:function(data){
                        if(data.status == "success")
                        {
                            swal("Deleted!", data.message, "success");
                             job_category_table.ajax.reload();
                        }else{
                            swal('Not allowed!!',data.message,'error');
                        }
                    },
                    error:function(jqXHR,textStatus,errorThrown)
                    {
                        if(jqXHR.status == '404')
                        {
                            swal('Not found in server','The job category does not exists','error');
                        }else if(jqXHR.status == '201')
                        {
                            swal('Not allowed!!','The job category cannot be deleted.','error');
                        }
                    }
                });
            }
            else {
                swal.close();
            }
        });

    }); // end delete industry click

  //reset the form validaton and from when the modal was closing
 $('body').on('hidden.bs.modal', '.modal', function () {
     $(this).find('form').data('formValidation').resetForm(true);
     $(this).find('form')[0].reset();

  });
});//end of document.ready
</script>
@endsection