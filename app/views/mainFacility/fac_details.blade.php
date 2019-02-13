@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
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
                    <form role="form" onsubmit="return false" action = "{{URL::to('addFacilityDetails')}}" enctype="multipart/form-data" id = "addForm">
                      <div class="box-body">

                        

                        <div class="form-group">
                          <label for="exampleInputPassword1">Facility Name*</label>
                          <select type="text" 
                                 class="form-control" 
                                 id="txtFType"
                                 name="txtFType"
                                 required="required">
                                 <option disabled="" selected=""> Select Facility Name</option>
                                 @foreach($fType as $ft)
                                    <option value = "{{$ft -> FacilityTypeID}}">{{$ft -> FacilityName}}</option>
                                 @endforeach
                          </select>
                        </div>

                        <div class="form-group" hidden>
                          <label for="exampleInputEmail1">Street Location*</label>
                          <select type="text" 
                                 class="form-control" 
                                 id="txtQuantity" 
                                 name="txtQuantity" 
                                 required="required">
                                <option selected="" disabled=""> Select Street</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Image</label>
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
                    <h3 class="box-title">Facility Table</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="120px">Facility Number</th>
                          <th>Facility Name</th>
                          <!-- <th>Street Location</th> -->
                          <th>Status</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($fDetails as $fd)
                          <tr>
                            <td>{{ $fd -> FacilityCode }} - {{ $fd -> FacilityID }}</td>
                            <td>{{ $fd -> FacilityName }}</td>
                            <!-- <td></td> -->
                            <td>{{ $fd -> status }}</td>
                            <td><button type = "button" 
                                        class = "btn btn-block btn-info btn-xs"
                                        data-toggle = "modal"
                                        data-target = "#viewImage"
                                        onclick = "modalDetails({{$fd->FacilityID}}, {{$fd->FacilityTypeID}})"> View </button></td>
                            <td><button class="btn btn-xs btn-success btn-flat"
                                        data-toggle = "modal"
                                        data-target = "#edit"
                                        onclick = "modalDetails({{$fd->FacilityID}}, {{$fd->FacilityTypeID}})">
                                          <i class="fa fa-pencil"></i></button>
                              <button class="btn btn-xs btn-danger btn-flat"
                                        data-toggle = "modal"
                                        data-target = "#delete"
                                        onclick = "modalDetails({{$fd->FacilityID}}, {{$fd->FacilityTypeID}})">
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


          <div class="modal fade" id="edit">
            <div class="modal-dialog">
          
              <form class="form-horizontal" role="form" onsubmit="return false" action = "{{URL::to('updateFacilityDetails')}}" enctype="multipart/form-data" id = "updateForm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Facility Type</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Facility Name:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "etxt1" name = "etxt1" readonly>
                            <input type="hidden" name="hiddenTypeID" id="hiddenTypeID">
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Facility Number:</label>

                          <div class="col-sm-2">
                            <input type="text" class="form-control" id = "etxt2" name = "etxt2" readonly>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id = "etxt3" name = "etxt3" >
                            <input type="hidden" name="hiddenFID" id="hiddenFID">
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Street Location:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "etxt4" name = "etxt4" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Status:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "etxt5" name = "etxt5" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Image:</label>

                          <div class="col-sm-8">
                            <img id = "etxt6" name = "etxt6" width="100%">
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Change Image:</label>

                          <div class="col-sm-8">
                            <input type="file" class="form-control" id = "etxt7" name = "etxt7" onchange="readURLforEdit(this)">
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


          <div class="modal fade" id="delete">
            <div class="modal-dialog">
          
              <form class="form-horizontal" role="form" onsubmit="return false" action = "{{URL::to('deleteFacilityDetails')}}" enctype="multipart/form-data" id = "deleteForm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Facility Type</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Facility Name:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "dtxt1" name = "dtxt1" readonly>
                            <input type="hidden" name="hiddenTypeID2" id="hiddenTypeID2">
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Facility Number:</label>

                          <div class="col-sm-2">
                            <input type="text" class="form-control" id = "dtxt2" name = "dtxt2" readonly>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id = "dtxt3" name = "dtxt3" readonly>
                            <input type="hidden" name="hiddenFID2" id="hiddenFID2">
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Street Location:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "dtxt4" name = "dtxt4" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Status:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "dtxt5" name = "dtxt5" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Image:</label>

                          <div class="col-sm-8">
                            <img id = "dtxt6" name = "dtxt6" width="100%">
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


          

              <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

             <script type="text/javascript">
                
              $(document).ready(function(){



                var tbl = $('#example1').DataTable();

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
                      $.each(data.fd, function(key, val){
                        //var string1 = "{{asset('bower_components/admin-lte/dist/images/"+val.Image+"')}}"
                        tbl.row.add([
                           val.FacilityCode +' - '+ val.FacilityID,
                           val.FacilityName,
                           '<label></label>',
                           val.status,
                           '<button type = "button" class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> View </button>',
                           '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> <i class="fa fa-pencil"></i></button> '+
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete"  onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> <i class="fa fa-remove"></i></button>'
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

                });

                $('#updateForm').submit(function(){
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
                      $.each(data.fd, function(key, val){
                        //var string1 = "{{asset('bower_components/admin-lte/dist/images/"+val.Image+"')}}"
                        tbl.row.add([
                           val.FacilityCode +' - '+ val.FacilityID,
                           val.FacilityName,
                           '<label></label>',
                           val.status,
                           '<button type = "button" class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> View </button>',
                           '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> <i class="fa fa-pencil"></i></button> '+
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete"  onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> <i class="fa fa-remove"></i></button>'
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

                  $('#edit').modal('hide');
                });

                $('#deleteForm').submit(function(){
                  $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    dataType:'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                      tbl.clear().draw();
                      $.each(data.fd, function(key, val){
                        //var string1 = "{{asset('bower_components/admin-lte/dist/images/"+val.Image+"')}}"
                        tbl.row.add([
                           val.FacilityCode +' - '+ val.FacilityID,
                           val.FacilityName,
                           '<label></label>',
                           val.status,
                           '<button type = "button" class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> View </button>',
                           '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> <i class="fa fa-pencil"></i></button> '+
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete"  onclick = "modalDetails('+ val.FacilityID +', '+ val.FacilityTypeID +')"> <i class="fa fa-remove"></i></button>'
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
                  $('#delete').modal('hide');
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
                          $('#etxt6').removeAttr('src');
                          $('#etxt6').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#etxt6').removeAttr('src');
                  }
                }


                function modalDetails(x,y)
                {
                  $.ajax({
                    type: 'POST',
                    url: 'getFacilityDetails',
                    data: {fID: x,
                            ftID: y},
                    dataType: 'JSON',
                    success: function(data){
                      $('#vImage').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + data.info[0].Image + "')}}");
                      




                      $('#etxt1').val(data.info[0].FacilityName);
                      $('#hiddenTypeID').val(data.info[0].FacilityTypeID);

                      $('#etxt2').val(data.info[0].FacilityCode);
                      $('#etxt3').val(data.info[0].FacilityID);
                      $('#hiddenFID').val(data.info[0].FacilityID);

                      $('#etxt5').val(data.info[0].status);
                      $('#etxt6').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + data.info[0].Image + "')}}");
                      




                      $('#dtxt1').val(data.info[0].FacilityName);
                      $('#hiddenTypeID2').val(data.info[0].FacilityTypeID);

                      $('#dtxt2').val(data.info[0].FacilityCode);
                      $('#dtxt3').val(data.info[0].FacilityID);
                      $('#hiddenFID2').val(data.info[0].FacilityID);

                      $('#dtxt5').val(data.info[0].status);
                      $('#dtxt6').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + data.info[0].Image + "')}}");
                    
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