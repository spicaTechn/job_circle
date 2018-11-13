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
#mceu_46 {

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
                        <h5>Manage Company Page</h5>
                     </div>
                  </div>
                  <div class="card-block">
                    <form name="about-form" id="about-form" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="about_id" class="about_id" value="{{ $company->id }}"/>
                      <input type="hidden" name="page_detail_id" class="page_detail_id" value="{{ $page_details_id }}"/>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12 m-b-30">
                          <h3>Top Section</h3>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12 m-b-30">
                           <h4 class="sub-title">Description *</h4>
                           <textarea   class="form-control about_description" id="about_description" name="about_description" placeholder="Description">{{ $company->description }}</textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12">
                          <h4 class="sub-title">Image *</h4>
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail"  data-trigger="fileinput">
                              <img src="{{asset('/front')}}/images/pages/company/{{ $meta_value_unserialize['about_image'] }}" id="about_image">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                              <span class="btn btn-file btn-block btn-primary btn-sm">
                                <span class="fileinput-new">Select Profile Image</span>
                                <span class="fileinput-exists">Change</span>
                                <input name="about_image" accept="image/*" type="file">
                              </span>
                              <a href="#" class="btn btn-orange fileinput-exists btn-sm btn-block" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12 m-b-30">
                          <h3>Background/Mission Section</h3>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Background *</h4>
                             <textarea   class="form-control background" style="height: 200px;" name="background" placeholder="Backgroung">{{ $meta_value_unserialize['background'] }}</textarea>
                         </div>
                         <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Mission *</h4>
                             <textarea   class="form-control mission" style="height: 200px;" name="mission" placeholder="Mission">{{ $meta_value_unserialize['mission'] }}</textarea>
                         </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12 m-b-30">
                          <h3>Founder Section</h3>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Name *</h4>
                             <input type="text" class="form-control name" name="founder_name" placeholder="Name" value="{{ $meta_value_unserialize['founder_name'] }}">
                         </div>
                         <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Position *</h4>
                             <input type="text" class="form-control position" name="founder_position" placeholder="Position" value="{{ $meta_value_unserialize['founder_position'] }}">
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12 m-b-30">
                           <h4 class="sub-title">Description *</h4>
                           <textarea   class="form-control founder_description" style="height: 200px;" name="founder_description" placeholder="Description">{{ $meta_value_unserialize['founder_description'] }}</textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12">
                          <h4 class="sub-title">Image *</h4>
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail"  data-trigger="fileinput">
                              <img src="{{asset('/front')}}/images/pages/company/{{ $meta_value_unserialize['founder_image'] }}" id="founder_image">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                              <span class="btn btn-file btn-block btn-primary btn-sm">
                                <span class="fileinput-new">Select Profile Image</span>
                                <span class="fileinput-exists">Change</span>
                                <input name="founder_image" accept="image/*" type="file">
                              </span>
                              <a href="#" class="btn btn-orange fileinput-exists btn-sm btn-block" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button  class="btn btn-grd-primary companyUpdate" id="companyUpdate">Update</button>
                      </form>

                         <!-- End Contact US Tap -->
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
  // installing wysiwyg editor
  tinymce.init({
    selector: "#about_description",
    theme: "modern",
    height : "400",
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

  $('#about-form').on('init.field.fv', function(e, data) {
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
        'about_description': {
            validators: {
                notEmpty: {
                    message: 'The description field is required'
                }
            }
        },
        'background': {
            validators: {
                notEmpty: {
                    message: 'The background field is required'
                }
            }
        },
        'mission': {
            validators: {
                notEmpty: {
                    message: 'The mission field is required'
                }
            }
        },
        'founder_name': {
            validators: {
                notEmpty: {
                    message: 'The name field is required'
                }
            }
        },
        'founder_description': {
            validators: {
                notEmpty: {
                    message: 'The description field is required'
                }
            }
        },
        'founder_position': {
            validators: {
                notEmpty: {
                    message: 'The position field is required'
                }
            }
        }
    }
  }).on('success.form.fv', function(e) {
      e.preventDefault();
      // saving tinymce value
      tinyMCE.triggerSave();

      var id = $('.about_id').val();
      //alert(id);
      if(id)
      {
       var URI = "{{url('/admin/pages/company')}}" + "/" + id;
      }
      else
      {
        var URI = "{{url('/admin/pages/company')}}";
      }

      // get the input values
      var result = new FormData($("#about-form")[0]);
      //console.log(result);
      $.ajax({
      //make the ajax request to either add or update the
        url:URI,
        data:result,
        dataType:"Json",
        contentType: false,
        processData: false,
        type:"POST",
        success:function(data)
        {
            if(data.status == "success")
            {
                setTimeout(function() {
                          swal({
                            title:"About Information has been updated!",
                            text:"A about information has been updated to Job Circle",
                            type:"success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.company')}}";
                          });
                }, 1000);

                //console.log(data);
            }
        },
        error:function(event)
        {
            console.log('Cannot update contact information  in jobcircle. Please try again later on..');
        }

      });
  });



});//end of document.ready
</script>
@endsection