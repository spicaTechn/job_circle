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
                        <h5>Manage Contact Page</h5>
                     </div>
                  </div>
                  <div class="card-block">
                    <form name="contact-form" id="contact-form">
                      @csrf
                      <input type="hidden" name="contact_id" class="contact_id" value="{{ $contact_id }}"/>
                      <input type="hidden" name="contact_page_id" class="contact_page_id" value="{{ $contact_page_id }}"/>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12 m-b-30">
                          <h3>Contact Section</h3>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Address *</h4>
                             <input type="text" class="form-control address" name="address" placeholder="Address" value="{{ $contact_info['address'] }}">
                         </div>
                         <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Phone *</h4>
                             <input type="text" class="form-control phone" name="phone" placeholder="Phone" value="{{ $contact_info['phone'] }}">
                         </div>
                         <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Email *</h4>
                             <input type="text" class="form-control email" name="email" placeholder="Email" value="{{ $contact_info['email'] }}">
                         </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12 col-xl-12 m-b-30">
                          <h3>Social Section</h3>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Facebook *</h4>
                             <input type="text" class="form-control facebook_link" name="facebook_link" placeholder="Facebook Link" value="{{ $contact_info['facebook_link'] }}">
                         </div>
                         <div class="col-sm-6 col-xl-6 m-b-30">
                             <h4 class="sub-title">Twitter *</h4>
                             <input type="text" class="form-control twitter_link" name="twitter_link" placeholder="Twitter Link" value="{{ $contact_info['twitter_link'] }}">
                         </div>
                      </div>
                      <button  class="btn btn-grd-primary contactUpdate" id="contactUpdate" value="{{ $contact_id }}">Update</button>
                    </form>
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
  // formvalidation
  $('#contact-form').on('init.field.fv', function(e, data) {
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
        'address': {
            validators: {
                notEmpty: {
                    message: 'The addres field is required'
                }
            }
        },
        'phone': {
            validators: {
                notEmpty: {
                    message: 'The phone number is required'
                }
            }
        },
        'email': {
            validators: {
                notEmpty: {
                    message: 'The email address is required'
                }
            }
        },
        'facebook_link': {
            validators: {
                notEmpty: {
                    message: 'The facebook link  is required'
                }
            }
        },
        'twitter_link': {
            validators: {
                notEmpty: {
                    message: 'The twitter link  is required'
                }
            }
        }
    }
  });//end of contact information formvalidation

  // storing contact information
  $( ".contactUpdate" ).on( "click", function(e) {
      e.preventDefault();

      var id = $('.contact_id').val();
      //alert(id);
      if(id){
       var URI = "{{url('/admin/pages/contact')}}" + "/" + id;
      }
      else{
        var URI = "{{url('/admin/pages/contact')}}";
      }

      // get the input values
      var result = new FormData($("#contact-form")[0]);

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
            if(data.status == "success"){
                setTimeout(function() {
                          swal({
                            title: "Contact Information   has been updated!",
                            text: "A  contact information   has been updated to JobCircle",
                            type: "success",
                            closeOnConfirm: true,
                          }, function() {
                              window.location = "{{route('admin.pages.contact')}}";
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

}); //end of document.ready
</script>
@endsection