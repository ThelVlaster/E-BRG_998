@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance <small>Facility Details</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Facility</a></li>
              <li class="active">Facility Details</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
            <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Facility Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div id="Messages"></div>
                    <form role="form" onsubmit="return false" action = "{{URL::to('addFacility')}}" enctype="multipart/form-data" id = "addForm">
                      <div class="box-body">

                        <div class="form-group">
                          <label>Facility Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtFacility" 
                                 name="txtFacility" 
                                 placeholder="Name"
                                 required="" 
                                >
                        </div>

                        <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" id="txtDesciption" name="txtDesciption" rows="3" placeholder=" Description"></textarea>
                        </div>

                        <div class="form-group">
                          <label>Location*</label>
                          <select type="text" 
                                 class="form-control select2" 
                                 id="txtLocation" 
                                 name="txtLocation" 
                                 placeholder="Name"
                                 required="" 
                                >
                                <option selected="" disabled="">Select Location</option>
                            @foreach( $loc as $loc)
                              <option value="{{$loc -> StreetID}}"> {{ $loc -> StreetName }} St.</option>
                            @endforeach

                          </select>
                        </div>

                        <div class="form-group">
                          <label>Capacity</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtCapacity"
                                 name="txtCapacity"
                                 min = "0"
                                 value = "0">
                        </div>

                        <div class="form-group">
                          <label>Rental Fee (for Residents)*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtResFee"
                                 name="txtResFee"
                                 value = "0"
                                  required="">
                        </div>

                        <div class="form-group">
                          <label>Rental Fee (for Non Residents)*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtNonResFee"
                                 name="txtNonResFee"
                                 value = "0"
                                 required="">
                        </div>

                        <div class="form-group">
                          <label>Image</label>
                          <input type="file" 
                                 class="form-control" 
                                 id="txtImage"
                                 name="txtImage"
                                 onchange="readURL(this)">
                        </div>

                        <div class="form-group">
                          <img width="100%" 
                                 id="preview"
                                 name="preview">
                        </div>

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="submit" 
                                        class="btn btn-info btn-flat"
                                        id="btnSubmit">Submit</button></center>
                      </div>
                    </form>
                  </div><!-- /.box -->
              </div>

              <div class="col-md-9">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">List of Facilities</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Facility Name</th>
                          <th>Description</th>
                          <th>Location</th>
                          <th>Capacity</th>
                          <th>Rental Fee (for Residents)</th>
                          <th>Rental Fee (for Non-Residents)</th>
                          <th>Condition</th>
                          <th>Availability</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($faci as $f)
                          <tr>
                            <td>{{ $f -> FacilityID}}</td>
                            <td>{{ $f -> FacilityName}}</td>
                            <td>{{ $f -> Description}}</td>
                            <td>{{ $f -> StreetName}} St.</td>
                            <td>{{ $f -> Capacity}}</td>
                            <td>{{ $f -> ResRental}}</td>
                            <td>{{ $f -> NResRental}}</td>
                            <td>{{ $f -> FCondition}}</td>
                            <td>{{ $f -> Availability}}</td>
                            <td><button type = "button" 
                                        class = "btn btn-block btn-info btn-xs"
                                        data-toggle = "modal"
                                        data-target = "#viewImage"
                                        onclick = "modalDetails({{$f->FacilityID}})"> View </button></td>
                            <td><button class="btn btn-xs btn-success btn-flat"
                                        data-toggle = "modal"
                                        data-target = "#edit"
                                        onclick = "modalDetails({{$f->FacilityID}})">
                                          <i class="fa fa-pencil"></i></button>
                              <button class="btn btn-xs btn-danger btn-flat"
                                        data-toggle = "modal"
                                        data-target = "#delete"
                                        onclick = "modalDetails({{$f->FacilityID}})">
                                          <i class="fa fa-remove"></i></button></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


 <div class="modal fade" id="viewImage">
            <div class="modal-dialog">
          
              
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Facility Image</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <img width="100%" id="vImage">
                          </div>
                        </div>
                        
                      </div>
                      <!-- /.box-body -->
                    
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div><!-- /.modal-content -->
       
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
<!--////////////////////// MODAL EDIT-->

        <div class="modal fade" id="edit" >
            <div class="modal-dialog modal-md">
          
              <form class="form-horizontal" role="form" onsubmit="return false" enctype="multipart/form-data" action = "{{URL::to('updateFacility')}}" id = "updateForm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Facility</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">

                      <input type="hidden" name="hiddenID" id="hiddenID">
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Name:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "etxtFacility" name = "etxtFacility">
                          </div>
                        </div>


                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Description:</label>

                          <div class="col-sm-8">
                            <textarea type="text" class="form-control" id = "etxtDesc" name = "etxtDesc"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Location:</label>

                          <div class="col-sm-8">
                            <select class="form-control" id = "etxtLoc" name = "etxtLoc">
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Capacity:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "etxtCap" name = "etxtCap" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Rental Fee (for Residents):</label>

                          <div class="col-sm-8">
                            <input type="number" min="1" class="form-control" id = "etxtRFee" name = "etxtRFee" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Rental Fee (for Non-residents):</label>

                          <div class="col-sm-8">
                            <input type="number" min="1" class="form-control" id = "eTxtNFee" name = "eTxtNFee">
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Image:</label>

                          <div class="col-sm-8">
                            <img id = "eImg" name = "eImg" width="100%">
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Change Image:</label>

                          <div class="col-sm-8">
                            <input type="file" class="form-control" id = "etxtFile" name = "etxtFile" onchange="readURLforEdit(this)">
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id = "btnUpdate">Save Changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </form>
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

<!--////////////////////// MODAL EDIT-->


<!--////////////////////// MODAL DELETE-->

        <div class="modal fade" id="delete" >
            <div class="modal-dialog modal-md">
          
              <form class="form-horizontal" role="form" onsubmit="return false"  enctype="multipart/form-data" action = "{{URL::to('deleteFacility')}}" id = "deleteForm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Are you sure you want to DELETE this record?</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">
                        <div class="form-group">
                          <label  class="col-sm-3 control-label"> Facility ID:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "dtxtID" name = "dtxtID" readonly>
                          </div>
                        </div>

                        
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Name:</label>

                          <div class="col-sm-8">
                            <textarea type="text" class="form-control" id = "dtxtFacility" readonly></textarea>
                          </div>
                        </div>

                        
                      </div>
                      <!-- /.box-body -->
                    
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id = "btnDelete">Delete</button>
                  </div>
                </div><!-- /.modal-content -->
              </form>
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

<!--////////////////////// MODAL DELETE-->

          <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>


          <script type="text/javascript">
            $(document).ready(function(){


              $(".select2").select2();
              var tbl = $('#example1').DataTable({
                  'scrollX':true
              });
              $('#addForm').submit(function(){

                $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  data: new FormData(this),
                  dataType: 'JSON',
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(data){ 
                    tbl.clear().draw();
                    $.each(data.faci, function(key, val){
                      tbl.row.add([
                          val.FacilityID,
                          val.FacilityName,
                          val.Description,
                          val.StreetName+" St.",
                          val.Capacity,
                          val.ResRental,
                          val.NResRental,
                          val.FCondition,
                          val.Availability,
                          '<button type = "button"  class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalDetails({{$f->FacilityID}})"> View </button>',
                          '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails({{$f->FacilityID}})"><i class="fa fa-pencil"></i></button>' +
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDetails({{$f->FacilityID}})"> <i class="fa fa-remove"></i></button>'

                        ]).draw(false);
                    });
                     

                  },
                  error: function(request, error){
                    console.log(arguments);
                    alert(" Can't do this because: " + error);
                  }
                }).error(function(ts){
                  alert(ts.responseText);
                });

                     $('#txtFacility').val(" ");
                     $('#txtDesciption').val(" ");
                     $('#txtLocation').val(" ");
                     $('#txtCapacity').val(" ");
                     $('#txtResFee').val(" ");
                     $('#txtNonResFee').val(" ");
                     $('#txtImage').val(" ");

              });

              $('#updateForm').submit(function(){

                $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  data: new FormData(this),
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(data){ 
                    tbl.clear().draw();
                    $.each(data.faci, function(key, val){
                      tbl.row.add([
                          val.FacilityID,
                          val.FacilityName,
                          val.Description,
                          val.StreetName+" St.",
                          val.Capacity,
                          val.ResRental,
                          val.NResRental,
                          val.FCondition,
                          val.Availability,
                          '<button type = "button"  class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalDetails('+val.FacilityID+')"> View </button>',
                          '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+val.FacilityID+')"><i class="fa fa-pencil"></i></button>' +
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDetails('+val.FacilityID+')"> <i class="fa fa-remove"></i></button>'

                        ]).draw(false);
                    });
                     
                    $('#updateForm .close').click();

                  },
                  error: function(request, error){
                    console.log(arguments);
                    alert(" Can't do this because: " + error);
                  }
                }).error(function(ts){
                  alert(ts.responseText);
                });

              });


              $('#deleteForm').submit(function(){
                var y = $('#dtxtID').val();
                $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  data: new FormData(this),
                  dataType: 'JSON',
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(data){ 
                    alert(y);
                    tbl.clear().draw();
                    $.each(data.faci, function(key, val){
                      tbl.row.add([
                          val.FacilityID,
                          val.FacilityName,
                          val.Description,
                          val.StreetName+" St.",
                          val.Capacity,
                          val.ResRental,
                          val.NResRental,
                          val.FCondition,
                          val.Availability,
                          '<button type = "button"  class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalDetails('+val.FacilityID+')"> View </button>',
                          '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+val.FacilityID+')"><i class="fa fa-pencil"></i></button>' +
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDetails('+val.FacilityID+')"> <i class="fa fa-remove"></i></button>'

                        ]).draw(false);
                    });
                     
                    $('#deleteForm .close').click();

                  },
                  error: function(request, error){
                    console.log(arguments);
                    alert(" Can't do this because: " + error);
                  }
                }).error(function(ts){
                  alert(ts.responseText);
                });

              });







            });
          </script>

          <script type="text/javascript">
            function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  
                  reader.onload = function (e) {
                      $('#preview').attr('src', e.target.result);
                  }
                  
                  reader.readAsDataURL(input.files[0]);
              }
              else{
                $('#preview').removeAttr('src');
              }
            }

            function readURLforEdit(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  
                  reader.onload = function (e) {
                      $('#eImg').attr('src', e.target.result);
                  }
                  
                  reader.readAsDataURL(input.files[0]);
              }
              else{
                $('#eImg').removeAttr('src');
              }
            }



            function modalDetails(x)
                {
                  $.ajax({ 
                    type: 'POST',
                    url: 'getFacDetails',
                    data: {id: x},
                    dataType: 'JSON',
                    success: function(data){

                      $('#etxtLoc').html("");
                      $.each(data.loc, function(key, val){
                        $('#etxtLoc').append('<option value = '+val.StreetID+'>'+val.StreetName+'</option>');
                      });

                       $('#vImage').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + data.fac[0].FacilityImage + "')}}");
                       $('#hiddenID').val(data.fac[0].FacilityID);
                       $('#etxtFacility').val(data.fac[0].FacilityName);
                       $('#etxtDesc').val(data.fac[0].Description);
                       $('#etxtLoc').val(data.fac[0].StreetID);
                       $('#etxtCap').val(data.fac[0].Capacity);
                       $('#etxtRFee').val(data.fac[0].ResRental);
                       $('#eTxtNFee').val(data.fac[0].NResRental);

                      $('#eImg').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + data.fac[0].FacilityImage + "')}}");
                      
                      $('#dtxtID').val(data.fac[0].FacilityID);
                      $('#dtxtFacility').val(data.fac[0].FacilityName);

                      
                      

                    
                    },
                    error: function(request, error){
                      console.log(arguments);
                      alert(" Can't do this because: " + error);
                    }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });

                }
          </script>

              
      </section>
      <!-- /.content -->
@stop