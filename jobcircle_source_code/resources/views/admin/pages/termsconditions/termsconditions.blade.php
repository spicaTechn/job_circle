@extends('admin.layout.master')
@section('page_specific_css')
<!-- Load the sweetalert css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/sweetalert/css/sweetalert.css') }}">
<!-- Load the formvalidation css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/admin_assets/bower_components/formvalidation/formValidation.min.css') }}">

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
                        <h5>Manage Terms & Conditions </h5>
                     </div>
                  </div>
                  <div class="card-block">
                    <form name="terms-conditions-form" id="terms-conditions-form" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="terms_conditions_id" class="terms_conditions_id" value="{{ $id }}"/>
                
                      <div class="row">
                        <div class="col-sm-12 col-xl-12 m-b-30">
                           <h4 class="sub-title">Term & Conditions *</h4>
                           <textarea   class="form-control terms-conditions" id="terms-conditions" name="terms-conditions" placeholder="Description">
                           	{!! $termsconditions->description !!}
                           </textarea>
                        </div>
                      </div>
                      
                      <button  class="btn btn-grd-primary termsconditionsUpdate" id="termsconditionsUpdate">Update</button>
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

@section('page_specific_js')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<!-- Sweetalert -->
<script type="text/javascript" src="{{ asset('/admin_assets/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<!-- Page wise Javascript code -->
<script type="text/javascript">
$(document).ready(function () {
	// installing wysiwyg editor
    tinymce.init({
	    selector: "#terms-conditions",
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

    $("#termsconditionsUpdate").on('click', function(e){
        e.preventDefault();
        tinyMCE.triggerSave();

        var id = $('.terms_conditions_id').val();
       
        if(id)
	    {
	       var URI = "{{url('admin/pages/terms-conditions')}}" + "/" + id;
	    }
	    else
	    {
	        var URI = "{{url('admin/pages/terms-conditions')}}";
	    }
        // get the input values
        var result = new FormData($("#terms-conditions-form")[0]);
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
	                            title:"Term & Conditions information has been added!",
	                            text:"A terms & conditions information has been added to Job Circle",
	                            type:"success",
	                            closeOnConfirm: true,
	                          }, function() {
	                              window.location = "{{route('admin.pages.terms-conditions')}}";
	                          });
	                }, 1000);
	            }
	        },
	        error:function(event)
	        {
	            console.log('Can not added term  conditions information  in jobcircle. Please try again later on..');
	        }

        });
    });

});//end of document
</script>
@endsection