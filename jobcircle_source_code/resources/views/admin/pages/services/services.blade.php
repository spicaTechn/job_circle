@extends('admin.layout.master')
@section('page_specific_css')
<!--Load the datatable css-->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css') }}">
<!-- Load the sweetalert css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/sweetalert/css/sweetalert.css') }}">
<!-- Load the formvalidation css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/formvalidation/formValidation.min.css') }}">

<!-- File Input css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/file-input/css/fileinput.css') }}">
<style type="text/css">
  /*wysisyg editor initial notification hiding*/
#mceu_46 {

    display: none;
}
table.dataTable.nowrap th, table.dataTable.nowrap td 
{
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
                        <h5>Manage Services Page</h5>
                     </div>
                  </div>
                  <div class="card-block">
                    <form role="form" name="service-topsection-form" id="service-topsection-form" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="service_topsection_id" class="service_topsection_id" value="{{ $service_top_section->id }}"/>
                      <input type="hidden" name="service_topsection_page_id" class="service_topsection_page_id" value="{{ $service_top_section->page_id }}"/>
                      <div class="row">
                        <div class="col-sm-6 col-xl-6 m-b-30">
                           <h4 class="sub-title">Services Description *</h4>
                           <textarea   class="form-control service_description" id="service_description" name="service_description" placeholder="Description" style="height: 350px;">{!! $services->description !!}</textarea>
                        </div>
                        <div class="col-sm-6 col-xl-6 m-b-30">
                           <h4 class="sub-title">{{ __('Service Background Image  *') }}</h4>
                           <div class="fileinput fileinput-new" data-provides="fileinput">
                               <div class="fileinput-new thumbnail" data-trigger="fileinput">
                               <img src="{{asset('/front')}}/images/pages/services/{{ $service_background_image }}" id="service_background_image">
                               </div>
                               <div class="fileinput-preview fileinput-exists thumbnail">
                               </div>
                               <div>
                                 <span class="btn btn-file btn-block btn-primary btn-sm">
                                   <span class="fileinput-new">Select Backgound Image</span>
                                   <span class="fileinput-exists">Change</span>
                                   <input name="service_background_image" id="service_background_image" class="form-control service_background_image" accept="image/*" type="file" />
                                 </span>
                                 <a href="#" class="btn btn-orange fileinput-exists btn-sm btn-block" data-dismiss="fileinput">Remove</a>
                               </div>
                           </div>
                        </div>
                      </div>
                      <button type="submit"  class="btn btn-primary waves-effect waves-light" >Update Changes</button>
                    </form>
                    <br><br><br>
                    <div class="row">
                      <div class="col-sm-12 col-xl-12 m-b-30">
                        <button  class="btn btn-grd-primary addService" id="addService" style="float: right;">
                         Add New Service
                        </button>
                      </div>
                    </div>
                    <div class="dt-responsive table-responsive">
                      <table id="tbl-services" class="table table-striped table-bordered tbl-services">
                          <thead>
                          <tr>
                            <th>{{ __('S.N') }}</th>
                            <th>{{ __('Icon') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Action') }}</th>
                          </tr>
                          </thead>
                          <tbody>
                          @if($services)
                          <?php $page_details = $services->page_details()->where('meta_key','service')->get(); 
                            $i=1;
                          ?>
                          
                            @foreach($page_details as $page_detail)
                            <?php $unserialize_value = unserialize($page_detail->meta_value); ?>

                            <tr>
                              <td>{{ $i }}</td>
                              <td>
                                <img src="{{asset('/front')}}/images/pages/services/{{ $unserialize_value['icon'] }}" style="height: 40px; width: 40px;">
                              </td>
                              <td>{{ $unserialize_value['title'] }}</td>
                              <td>{!! $unserialize_value['description'] !!}</td>
                              <td>
                                <a href="javascript:void(0);" class="m-r-15 text-muted edit-service" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" data-service-id="{{ $page_detail->id }}"><i class="icofont icofont-ui-edit"></i></a>

                                <a href="javascript:void(0);" class="text-muted delete-service" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" data-service-id="{{ $page_detail->id }}"><i class="icofont icofont-delete-alt"></i></a>
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
<!-- add service model -->
<div class="modal fade service" id="service" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" name="service-form" id="service-form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="services_id" class="services_id" value=""/>
        <input type="hidden" name="services_page_id" class="services_page_id" value=""/>
          <div class="modal-header">
              <h4 class="modal-title"><span>{{ __('Add') }}</span> {{ __('Service')  }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body" name="service-add-field" id="service-add-field">
          
            
                  <div class="row">
                     <div class="col-sm-12 col-xl-12 m-b-30">
                         <h4 class="sub-title">{{ __('Title *') }}</h4>
                         <input type="text" class="form-control services_title" name="services_title" placeholder="Title">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 col-xl-12 m-b-30">
                         <h4 class="sub-title">{{ __('Description *') }}</h4>
                         <textarea  class="form-control services_description" style="height: 144px;" name="services_description" placeholder="Description"></textarea>
                     </div>
                  </div>
              
               
                  <div class="row">
                     <div class="col-sm-12 col-xl-12 m-b-30">
                         <h4 class="sub-title">{{ __('Icon *') }}</h4>
                         <div class="fileinput fileinput-new" data-provides="fileinput">
                             <div class="fileinput-new thumbnail" data-trigger="fileinput">
                             <img src="{{asset('/front')}}/images/pages/services/founder.jpg" id="services_icon">
                             </div>
                             <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height:177px;">
                             </div>
                             <div>
                               <span class="btn btn-file btn-block btn-primary btn-sm">
                                 <span class="fileinput-new">Select Profile Image</span>
                                 <span class="fileinput-exists">Change</span>
                                 <input name="services_icon" id="service_icon" class="form-control services_icon" accept="image/*" type="file" />
                               </span>
                               <a href="#" class="btn btn-orange fileinput-exists btn-sm btn-block" data-dismiss="fileinput">Remove</a>
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
<!-- end add modal -->

@endsection
@section('page_specific_js')

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
<!-- file input js -->
<script src="{{ asset('/admin_assets/bower_components/file-input/js/fileinput.js') }}"></script>

<!-- Page wise Javascript code -->
<script type="text/javascript">
$(document).ready(function () {
   // installing wysiwyg editor
  tinymce.init({
    selector: ".services_description",
    theme: "modern",
    height : "200",
    preformatted : true,
    forced_root_block : false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
    toolbar2: "print preview media | forecolor backcolor emoticons",

  });//end of tinymce

  var save_method, uri;  
  // datatable for services
  var service_table = $('#tbl-services').DataTable({
      dom: 'Bfrtip',
      LengthChange: false,
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
  $('#tbl-services').addClass('nowrap');

  // add service model popup
  $( "#addService" ).on( "click", function() {
    save_method = 'add';
    
    $('#service').modal('show');
  });

  //reset the form validaton and from when the modal was closing
  $('.modal').on('hidden.bs.modal', function(){
     $(this).find('form').data('formValidation').resetForm(true);
     $(this).find('form')[0].reset();

  });

  
  // formvalidation
  $('#service-topsection-form').on('init.field.fv', function(e, data) {
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
        'service_description': {
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
    
    var id = $('.service_topsection_id').val();
    //alert(id);
    if(id)
    {
     var URI = "{{ route('admin.pages.services') }}" + "/" + id;
    }
    else
    {
      var URI = "{{ route('admin.pages.services') }}";
    }
    //get form data
    result = new FormData($('#service-topsection-form')[0]);
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
                            title:"Service Top Section Information has been updated!",
                            text:"service description and background image information has been updated to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.services')}}";
                          });
                }, 1000);

                //console.log(data);
            }
      }
    });
  });//end of servoce top section  formvalidation


  // formvalidation
  $('#service-form').on('init.field.fv', function(e, data) {
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
        'services_title': {
            validators: {
                notEmpty: {
                    message: 'The title  is required'
                }
            }
        },
        'services_description': {
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
    tinyMCE.triggerSave();
    if(save_method == 'add')
    {
      URI = "{{URL::to('admin/pages/services/serviceStore')}}";
    }
    else
    {
      service_id = $(".services_id").val();
      URI = "{{URL::to('admin/pages/services/serviceUpdate')}}" + "/" + service_id;
    }

    //get form data
    result = new FormData($('#service-form')[0]);
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
          $('#service').modal('hide');
          if(save_method == "add")
          {
            setTimeout(function() {
                          swal({
                            title:"Service  has been added to Job Circle!",
                            text:"A service  has been added to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.services')}}";
                          });
                }, 1000);
          }
          else
          {
            setTimeout(function() {
                          swal({
                            title:"Service  has been updated to Job Circle!",
                            text:"A service  has been updated to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.services')}}";
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
  $("body").on('click','.edit-service', function(e){
        e.preventDefault();
        save_method = 'edit';
        service_id = $(this).attr('data-service-id');
        
        $.ajax({
          url:"{{URL::to('admin/pages/services/serviceEdit')}}" + "/" + service_id,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"GET",
          success:function(data)
          {
            if(data.status == "success")
            {
              //show  model
              $(".services_id").val(data.service_id);
              $(".services_page_id").val(data.page_id);
              $(".services_title").val(data.result.title);
              //$(".services_description").val(data.result.description);
              var content = tinymce.activeEditor.setContent(data.result.description);
              $("textarea.services_description").val(content);
              var image="{{asset('/front')}}/images/pages/services" + "/" +data.result.icon;
              $("#services_icon").attr('src',image);
              $('.modal-title').text('Update Service');
              $('.service').modal('show');
            }
          }
        });

  });

  //delete the service on click of the delete button
  $("body").on('click','.delete-service', function(e){
        e.preventDefault();
        service_id=$(this).attr('data-service-id');
        //show the alert notification
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover industry!",
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
                    url:"{{URL::to('admin/pages/services/serviceDelete')}}" + "/" + service_id,
                    type:"GET",
                    dataType:"Json",
                    data:{_token:"{{csrf_token()}}"},
                    success:function(data){
                        if(data.status == "success")
                        {
                          setTimeout(function() {
                            swal({
                              title:"Service  has been deleted!",
                              text:"A service  has been deleted from Job Circle",
                              type:"success",
                              closeOnConfirm: true,
                            }, function() {
                                window.location = "{{route('admin.pages.services')}}";
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
                            swal('Not found in server','The service does not exists','error');
                        }else if(jqXHR.status == '201')
                        {
                            swal('Not allowed!!','The service cannot.','error');
                        }
                    }
                });
            }
            else {
                swal.close();
            }
        });

    }); // end delete service click

});//end of document.ready
</script>
@endsection