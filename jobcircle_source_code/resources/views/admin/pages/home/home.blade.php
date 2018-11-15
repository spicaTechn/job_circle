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
#mceu_34 {

    display: none;
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
                        <h5>Manage Home Page</h5>
                     </div>
                  </div>
                  <div class="card-block">
                    <div class="row">
                      <div class="col-sm-12 col-xl-12 m-b-30">
                        <button  class="btn btn-grd-primary addSlider" id="addSlider">
                         Add New Slider
                        </button>
                      </div>
                    </div>
                    <div class="dt-responsive table-responsive">
                      <table id="tbl-slider" class="table table-striped table-bordered tbl-slider">
                          <thead>
                          <tr>
                            <th>{{ __('S.N') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Action') }}</th>
                          </tr>
                          </thead>
                          <tbody>
                          @if($sliders)
                          <?php $page_details = $sliders->page_details; 
                            $i=1;
                          ?>
                          
                            @foreach($page_details as $page_detail)
                            <?php $unserialize_value = unserialize($page_detail->meta_value); ?>

                            <tr>
                              <td>{{ $i }}</td>
                              <td>
                                <img src="{{asset('/front')}}/images/pages/home/{{ $unserialize_value['image'] }}" style="height: 60px; width: 100px;">
                              </td>
                              <td>{{ $unserialize_value['title'] }}</td>
                              <td>{{ $unserialize_value['description'] }}</td>
                              <td>
                                <a href="javascript:void(0);" class="m-r-15 text-muted edit-slider" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" data-slider-id="{{ $page_detail->id }}"><i class="icofont icofont-ui-edit"></i></a>

                                <a href="javascript:void(0);" class="text-muted delete-slider" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" data-slider-id="{{ $page_detail->id }}"><i class="icofont icofont-delete-alt"></i></a>
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
<div class="modal fade slider" id="slider" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form" name="slider-form" id="slider-form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="slider_id" class="slider_id" value=""/>
        <input type="hidden" name="page_id" class="page_id" value=""/>
          <div class="modal-header">
              <h4 class="modal-title"><span>{{ __('Add') }}</span> {{ __('slider')  }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body" name="slider-add-field" id="slider-add-field">
            <div class="row">
               <div class="col-sm-6 col-xl-6 m-b-30">
                  <div class="row">
                     <div class="col-sm-12 col-xl-12 m-b-30">
                         <h4 class="sub-title">{{ __('Title *') }}</h4>
                         <input type="text" class="form-control slider_title" name="slider_title" placeholder="Title">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 col-xl-12 m-b-30">
                         <h4 class="sub-title">{{ __('Description *') }}</h4>
                         <textarea  class="form-control slider_description" style="height: 144px;" name="slider_description" placeholder="Description"></textarea>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-xl-6 m-b-30">
                  <div class="row">
                     <div class="col-sm-12 col-xl-12 m-b-30">
                         <h4 class="sub-title">{{ __('Icon *') }}</h4>
                         <div class="fileinput fileinput-new" data-provides="fileinput">
                             <div class="fileinput-new thumbnail" data-trigger="fileinput">
                             <img src="{{asset('/front')}}/images/pages/home/slider.jpg" id="slider_image">
                             </div>
                             <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height:177px;">
                             </div>
                             <div>
                               <span class="btn btn-file btn-block btn-primary btn-sm">
                                 <span class="fileinput-new">Select Profile Image</span>
                                 <span class="fileinput-exists">Change</span>
                                 <input name="slider_image" id="slider_image" class="form-control slider_image" accept="image/*" type="file" />
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

  // slider section
  var save_method, uri;  
  // datatable for slider
  var service_table = $('#tbl-slider').DataTable({
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
  $('#tbl-slider').addClass('nowrap');

  // add slider model popup
  $( "#addSlider" ).on( "click", function() {
    save_method = 'add';
    
    $('#slider').modal('show');
  });

  //reset the form validaton and from when the modal was closing
  $('.modal').on('hidden.bs.modal', function(){
     $(this).find('form').data('formValidation').resetForm(true);
     $(this).find('form')[0].reset();

  });


  // formvalidation slider
  $('#slider-form').on('init.field.fv', function(e, data) {
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
        'slider_title': {
            validators: {
                notEmpty: {
                    message: 'The title  is required'
                }
            }
        },
        'slider_description': {
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
      URI = "{{ route('admin.pages.home.sliderStore') }}";
    }
    else
    {
      slider_id = $(".slider_id").val();
      URI = "{{URL::to('admin/pages/home/sliderUpdate')}}" + "/" + slider_id;
    }

    //get form data
    result = new FormData($('#slider-form')[0]);
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
          $('#slider').modal('hide');
          if(save_method == "add")
          {
            setTimeout(function() {
                          swal({
                            title:"Slider  has been added to Job Circle!",
                            text:"A slider  has been added to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.home')}}";
                          });
                }, 1000);
          }
          else
          {
            setTimeout(function() {
                          swal({
                            title:"Slider  has been updated to Job Circle!",
                            text:"A slider  has been updated to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.home')}}";
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
  $("body").on('click','.edit-slider', function(e){
        e.preventDefault();
        save_method = 'edit';
        slider_id = $(this).attr('data-slider-id');
        
        $.ajax({
          url:"{{URL::to('admin/pages/home/sliderEdit')}}" + "/" + slider_id,
          dataType:"json",
          contentType: false,
          processData: false,
          type:"GET",
          success:function(data)
          {
            if(data.status == "success")
            {
              //show  model
              $(".slider_id").val(data.slider_id);
              $(".page_id").val(data.page_id);
              $(".slider_title").val(data.result.title);
              $(".slider_description").val(data.result.description);
              var image="{{asset('/front')}}/images/pages/home" + "/" +data.result.image;
              $("#slider_image").attr('src',image);
              $('.modal-title').text('Update Slider');
              $('.slider').modal('show');
            }
          }
        });

  });

  //delete the service on click of the delete button
  $("body").on('click','.delete-slider', function(e){
        e.preventDefault();
        slider_id=$(this).attr('data-slider-id');
        //show the alert notification
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover slider!",
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
                    url:"{{URL::to('admin/pages/home/sliderDelete')}}" + "/" + slider_id,
                    type:"GET",
                    dataType:"Json",
                    data:{_token:"{{csrf_token()}}"},
                    success:function(data){
                        if(data.status == "success")
                        {
                          setTimeout(function() {
                            swal({
                              title:"Slider  has been deleted!",
                              text:"A slider  has been deleted from Job Circle",
                              type:"success",
                              closeOnConfirm: true,
                            }, function() {
                                window.location = "{{route('admin.pages.home')}}";
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
                            swal('Not found in server','The slider does not exists','error');
                        }else if(jqXHR.status == '201')
                        {
                            swal('Not allowed!!','The slider cannot be deleted.','error');
                        }
                    }
                });
            }
            else {
                swal.close();
            }
        });

    }); // end delete service click
  /*end of slider section */



});//end of document.ready
</script>
@endsection