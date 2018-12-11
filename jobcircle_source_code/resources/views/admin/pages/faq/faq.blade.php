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
  /*wysisyg editor initial notification hiding*/
#mceu_34 {

    display: none;
}
td {
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
                        <h5>Manage FAQ's Page</h5>
                     </div>
                  </div>

                  <div class="card-block">
                    <div class="row">
                      <div class="col-sm-3 col-xl-3 m-b-30">
                        <button  class="btn btn-grd-primary addFaq" id="addFaq">Add New Faq </button>
                      </div>
                    </div>
                    <div class="dt-responsive table-responsive">
                      <table id="tbl_faq" class="table table-striped table-bordered tbl_faq">
                          <thead>
                          <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          @if($faqs)
                          <?php $page_details = $faqs->page_details; 
                            $i=1;
                          ?>
                            @foreach($page_details as $page_detail)
                            <?php $unserialize_value = unserialize($page_detail->meta_value); ?>

                            <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $unserialize_value['title'] }}</td>
                              <td>{{ $unserialize_value['description'] }}</td>
                              <td>
                                <a href="javascript:void(0);" class="m-r-15 text-muted edit-faq" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" data-faq-id="{{ $page_detail->id }}"><i class="icofont icofont-ui-edit"></i></a>

                                <a href="javascript:void(0);" class="text-muted delete-faq" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" data-faq-id="{{ $page_detail->id }}"><i class="icofont icofont-delete-alt"></i></a>
                              </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                            @endif
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


<!-- Home Page Content Model is here -->
<!-- add model -->
<div class="modal fade faq" id="faq" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form role="form" name="faq-form" id="faq-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="faq_id" class="faq_id" value=""/>
            <input type="hidden" name="page_id" class="page_id" value=""/>
              <div class="modal-header">
                  <h4 class="modal-title"><span>Update This Content</span></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="row">
                   <div class="col-sm-12 col-xl-12 m-b-30">
                       <h4 class="sub-title">Title *</h4>
                       <input type="text" class="form-control faq_title" name="faq_title" placeholder="Title">
                   </div>
                </div>
                <div class="row">
                   <div class="col-sm-12 col-xl-12 m-b-30">
                       <h4 class="sub-title">Description *</h4>
                       <textarea  class="form-control faq_description" style="height: 144px;" name="faq_description" placeholder="Description"></textarea>
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
<!-- end add modal -->
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
  // slider section
  var save_method, uri;  
  // datatable for slider
  var faq_table = $('#tbl_faq').DataTable({
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
                  columns: [ 0,1,2,3,4]
                },

            }
      ],
      
  });//end of datatable

  // add faq model popup
  $( "#addFaq" ).on( "click", function() {
    save_method = 'add';
    $('#faq').modal('show');
  });

  // formvalidation slider
  $('#faq-form').on('init.field.fv', function(e, data) {
    var $parent = data.element.parents('.form-group'),
        $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

    $icon.on('click.clearing', function() {
        // Check if the field is valid or not via the icon class
        if ($icon.hasClass('fa fa-remove')) {
            // Clear the field
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
        'faq_title': {
            validators: {
                notEmpty: {
                    message: 'The title  is required'
                }
            }
        },
        'faq_description': {
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
      URI = "{{ route('admin.pages.faq.store') }}";
    }
    else
    {
      faq_id = $(".faq_id").val();
      URI    = "{{URL::to('admin/pages/faq')}}" + "/" + faq_id;
    }

    //get form data
    result = new FormData($('#faq-form')[0]);
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
          //hide add model
          $('#faq').modal('hide');
          if(save_method == "add")
          {
            setTimeout(function() {
                          swal({
                            title:"Faq  has been added to Job Circle!",
                            text:"A faq  has been added to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.faq')}}";
                          });
                }, 1000);
          }
          else
          {
            setTimeout(function() {
                          swal({
                            title:"Faq  has been updated to Job Circle!",
                            text:"A faq  has been updated to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.faq')}}";
                          });
                }, 1000);
          }
          //table.ajax.reload();
          //service_table.ajax.reload();
        }
      }
    });
  });//end of  formvalidation

  // edit service model popup
  $("body").on('click','.edit-faq', function(e){
        e.preventDefault();
        save_method = 'edit';
        faq_id = $(this).attr('data-faq-id');
        
        $.ajax({
          url:"{{URL::to('admin/pages/faq')}}" + "/" + faq_id,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"GET",
          success:function(data)
          {
            if(data.status == "success")
            {
              //show  model
              $(".faq_id").val(data.faq_id);
              $(".page_id").val(data.page_id);
              $(".faq_title").val(data.result.title);
              $(".faq_description").val(data.result.description);
              $('.modal-title').text('Update Faq');
              $('.faq').modal('show');
            }
          }
        });

  });

  $("body").on('click','.delete-faq', function(e){
        e.preventDefault();
        faq_id=$(this).attr('data-faq-id');
        //show the alert notification
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover faq!",
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
                    url:"{{URL::to('admin/pages/faq/destroy')}}" + "/" + faq_id,
                    type:"GET",
                    dataType:"Json",
                    data:{_token:"{{csrf_token()}}"},
                    success:function(data){
                        if(data.status == "success")
                        {
                          setTimeout(function() {
                            swal({
                              title:"Faq  has been deleted!",
                              text:"A faq  has been deleted from Job Circle",
                              type:"success",
                              closeOnConfirm: true,
                            }, function() {
                                window.location = "{{route('admin.pages.faq')}}";
                            });
                          }, 1000);
 
                        }
                        else
                        {
                            swal('Not allowed!!',data.message,'error');
                        }
                    },
                    error:function(jqXHR,textStatus,errorThrown)
                    {
                        if(jqXHR.status == '404')
                        {
                            swal('Not found in server','The faq does not exists','error');
                        }else if(jqXHR.status == '201')
                        {
                            swal('Not allowed!!','The faq cannot be deleted.','error');
                        }
                    }
                });
            }
            else {
                swal.close();
            }
        });

    });

});//end of document.ready
</script>
@endsection