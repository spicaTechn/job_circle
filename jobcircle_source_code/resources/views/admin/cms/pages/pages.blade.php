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
                        <h5>Manage Pages</h5>
                     </div>
                     <!-- <div class="card-header-right">
                        <button class="btn btn-grd-primary add-btn">Add new Industry / Job</button>
                     </div> -->
                  </div>
                  <div class="card-block">
                     <ul class="nav nav-tabs md-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                           <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About US</a>
                           <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Contact US</a>
                           <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="true">FAQ </a>
                           <div class="slide"></div>
                        </li>

                     </ul>


                     <div class="tab-content" >
                        <!-- Home Tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="card-block">


                           </div>
                        </div>
                        <!-- End Home  Tap -->





                        <!-- Contact US Tap -->
                        <div class="tab-pane fade pt-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                          <div class="card-block">
                            <form name="contact-social-form" id="contact-social-form">
                              @csrf
                              <input type="hidden" name="contact_social_id" class="contact_social_id" value=""/>
                              <input type="hidden" name="contact_page_id" class="contact_page_id" value=""/>
                              <div class="row">
                                <div class="col-sm-12 col-xl-12 m-b-30">
                                  <h3>Contact Section</h3>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6 col-xl-6 m-b-30">
                                     <h4 class="sub-title">Address *</h4>
                                     <input type="text" class="form-control address" name="address" placeholder="Address" value="">
                                 </div>
                                 <div class="col-sm-6 col-xl-6 m-b-30">
                                     <h4 class="sub-title">Phone *</h4>
                                     <input type="text" class="form-control phone_number" name="phone_number" placeholder="Phone" value="">
                                 </div>
                                 <div class="col-sm-6 col-xl-6 m-b-30">
                                     <h4 class="sub-title">Email *</h4>
                                     <input type="text" class="form-control email" name="email" placeholder="Email" value="">
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
                                     <input type="text" class="form-control facebook" name="facebook" placeholder="Facebook Link" value="">
                                 </div>
                                 <div class="col-sm-6 col-xl-6 m-b-30">
                                     <h4 class="sub-title">Twitter *</h4>
                                     <input type="text" class="form-control twitter" name="twitter" placeholder="Twitter Link" value="">
                                 </div>
                              </div>
                              <button  class="btn btn-grd-primary contactSocialUpdate" id="contactSocialUpdate">Update</button>
                              </form>
                          </div>
                        </div>
                         <!-- End Contact US Tap -->
                     </div>
                     <!-- tab-content -->
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
<!-- edit home content model -->
<div class="modal fade" id="edit-home" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form role="form" name="home-form" id="home-form" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="home_id" class="home_id" value=""/>
            <input type="hidden" name="page_id" class="page_id" value=""/>
              <div class="modal-header">
                  <h4 class="modal-title"><span>Update This Content</span></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body" name="our-team-add-field" id="our-team-add-field">
                  <div class="row">
                     <div class="col-sm-6 col-xl-6 m-b-30">
                        <div class="row">
                           <div class="col-sm-12 col-xl-12 m-b-30">
                               <h4 class="sub-title">Title *</h4>
                               <input type="text" class="form-control home_title" name="home_title" placeholder="Title">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 col-xl-12 m-b-30">
                               <h4 class="sub-title">Description *</h4>
                               <textarea  class="form-control home_description" style="height: 144px;" name="home_description" placeholder="Description"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-xl-6 m-b-30">
                        <div class="row">
                           <div class="col-sm-12 col-xl-12 m-b-30">
                               <h4 class="sub-title">Icon *</h4>
                               <div class="fileinput fileinput-new" data-provides="fileinput">
                                   <div class="fileinput-new thumbnail" style="max-width: 250px; max-height: 217px;" data-trigger="fileinput">
                                   <img src="{{asset('/front')}}/images/blog1.jpg" id="home_icon">
                                   </div>
                                   <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height:177px;">
                                   </div>
                                   <div>
                                     <span class="btn btn-file btn-block btn-primary btn-sm">
                                       <span class="fileinput-new">Select Profile Image</span>
                                       <span class="fileinput-exists">Change</span>
                                       <input name="home_icon" id="home_icon" class="form-control home_icon" accept="image/*" type="file" />
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
                   <button type="submit"  class="btn btn-primary waves-effect waves-light updateHome">Save changes</button>
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




   });
</script>
@endsection