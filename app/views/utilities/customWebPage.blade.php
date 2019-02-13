@extends('layouts.master')

@section('content')
    <section class="content-header">
   
      <h1>
        Customize Website
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Utilities</li>
        <li class="active">Customize Website</li>
      </ol>
    </section>


     <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-6">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
          
           
            		 <form role="form" method="POST" action = "{{URL::to('updateDetail')}}" enctype="multipart/form-data">
                 <br>
                       <div class="col-md-6">
                          <label style="padding-top: 15%;">Header color:</label>
                          <input type="color" name="favcolor" value="" style="width: 100px; height: 25px; margin-left: 5%;">
                        </div>

                         <div class="col-md-6">
                            <label> Webpage Title</label>
                              <input type="text" 
                                     class="form-control" 
                                     id="txtBrgyName" 
                                     
                                     required="required">
                        </div>
                        </form>
					

                      <div class="tab-pane" id="tab_2">
                        <div class="form-inline">
                        <br>
                          <label> Link Name 1</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBrgyName" 
                                 
                                 required="required">

                          <label> Link URL 1</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBrgyName" 
                                 
                                 required="required">
                         </div>

                         <div class="col-md-12">
                        <br>
                          <label> Link Name 2</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBrgyAdd" 
                                 
                                 required="required">
                         </div>

                         <div class="col-md-12">
                        <br>
                          <label> Link Name 3</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBrgyContact" 
                                 
                                 required="required">
                         </div>
                    
                   
                    </div><!-- tab pane -->

            </div>
            <!-- /.box-body -->

                <center style="padding-bottom: 10px;">
            <button type="submit" id= "btnSave" name= "btnSave" class="btn btn-primary btn-flat">Save Changes</button>
            <button type="submit" id= "btnCancel" name= "btnCancel" class="btn btn-default btn-flat">Cancel</button>
            </center>

          </div>
          <!-- /.box -->

       
            </div>


          <div class="col-md-6">
                  <div class="box box-primary">
           			 <div class="box-body box-profile">
          
				</div>
            </div><!--col-6-->

	  </div> <!-- /.row -->

  <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

        <script type="text/javascript">

                function readURL(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {

                          $('#prelog1').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#prelog1').removeAttr('src');
                  }
                }

                 function readURL1(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {
                          $('#prelog2').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#prelog2').removeAttr('src');
                  }
                }

          // $(document).ready(function() {

          //        $('#btnSave').click(function(e){

          //         var bName = $('txtBrgyName').val();
          //         var bAdd = $('txtBrgyAdd').val();
          //         var bContact = $('txtBrgyContact').val();

          //          $.ajax({
          //             type: 'POST',
          //             url: 'updateDetail',
          //             data: {
          //                     bName: bName, 
          //                     bAdd: bAdd,
          //                     bContact: bContact
          //             },
          //             success: function(data){
          //               alert('Success');
          //             },
          //             error: function(request, error){
          //               console.log(arguments);
          //               alert("cant do this because: " + error);
          //             }

          //           }).error(function(ts){
          //             alert(ts.responseText);
          //           });
          //       });//btnsubmit
          //    });//document
        </script>

	</section>

@endsection