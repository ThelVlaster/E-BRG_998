@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance <small>Facility Name</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Facility</a></li>
              <li class="active">Facility Name</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
            <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Facility Name</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div id="Messages"></div>
                    <form role="form" onsubmit="return false">
                      <div class="box-body">

                        <div class="form-group">
                          <label for="exampleInputEmail1">Facility Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtFacility" 
                                 name="txtFacility" 
                                 placeholder="Name"
                                >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Facility Code*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtFCode"
                                 name="txtFCode"
                                 >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Rental Fee (for Residents)*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtResFee"
                                 name="txtResFee"
                                 
                                 value = "0">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Rental Fee (for Non Residents)*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtNonResFee"
                                 name="txtNonResFee"
                                 >
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
                          <th>ID</th>
                          <th>Facility Name</th>
                          <th>Facility Code</th>
                          <th>Rental Fee (for Residents)</th>
                          <th>Rental Fee (for Non-Residents)</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($fType as $ft)
                          <tr>
                            <td>{{ $ft -> FacilityTypeID }}</td>
                            <td>{{ $ft -> FacilityName }}</td>
                            <td>{{ $ft -> FacilityCode }}</td>
                            <td>{{ $ft -> FRRental }}</td>
                            <td>{{ $ft -> FNRRental }}</td>
                            <td><button class="btn btn-xs btn-success btn-flat"
                                        data-toggle = "modal"
                                        data-target = "#edit"
                                        onclick = "modalDetails({{$ft->FacilityTypeID}})">
                                          <i class="fa fa-pencil"></i></button>
                              <button class="btn btn-xs btn-danger btn-flat"
                                        data-toggle = "modal"
                                        data-target = "#delete"
                                        onclick = "modalDetails({{$ft->FacilityTypeID}})">
                                          <i class="fa fa-remove"></i></button></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


          <div class="modal fade" id="edit">
            <div class="modal-dialog">
          
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Facility Name</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">ID:</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id = "etxt1" name = "etxt1" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Facility Name:</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id = "etxt2" name = "etxt2" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Facility Code:</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id = "etxt3" name = "etxt3" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Rental Fee (for Residents):</label>

                          <div class="col-sm-10">
                            <input type="number" class="form-control" id = "etxt4" name = "etxt4" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Rental Fee (for Non-Residents):</label>

                          <div class="col-sm-10">
                            <input type="number" class="form-control" id = "etxt5" name = "etxt5" >
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id = "btnUpdate" data-dismiss="modal">Save Changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </form>
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->


          <div class="modal fade" id="delete">
            <div class="modal-dialog">
          
              <form class="form-horizontal" >
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
                          <label  class="col-sm-2 control-label">ID:</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id = "dtxt1" name = "dtxt1" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Facility Name:</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id = "dtxt2" name = "dtxt2" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Facility Code:</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id = "dtxt3" name = "dtxt3" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Rental Fee (for Residents):</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id = "dtxt4" name = "dtxt4" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Rental Fee (for Non-Residents):</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id = "dtxt5" name = "dtxt5" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id = "btnDelete" data-dismiss="modal">Delete</button>
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

                $('#btnSubmit').click(function(){

                  $.ajax({
                    type: 'POST',
                    url: 'addFacilityType',
                    data: {txtFacility: $('#txtFacility').val(),
                            txtFCode: $('#txtFCode').val(),
                            txtResFee: $('#txtResFee').val(),
                            txtNonResFee: $('#txtNonResFee').val()},
                    dataType: 'JSON',
                    success: function(data){ 
                      tbl.clear().draw();
                      $.each(data.fType, function(key, val){
                        tbl.row.add([
                           val.FacilityTypeID,
                           val.FacilityName,
                           val.FacilityCode,
                           val.FRRental,
                           val.FNRRental,
                           '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+ val.FacilityTypeID +')"> <i class="fa fa-pencil"></i></button> '+
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete"  onclick = "modalDetails('+ val.FacilityTypeID +')"> <i class="fa fa-remove"></i></button>'
                          ]).draw(false);
                        });

                        $.each(data.messages, function(key, val){

                            $('#Messages').append('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><b><span class="glyphicon glyphicon-exclamtion-sign" aria-hidden="true">'+val+'</span></b></div>');  

                        });
                                            
                      }
                    });                    
                    $('#txtFacility').val("");
                    $('#txtFCode').val("");
                    $('#txtResFee').val("");
                    $('#txtNonResFee').val("");

                  });

                $('#btnUpdate').click(function(){
                  $.ajax({
                    type: 'POST',
                    url: 'updateFacilityType',
                    data: {
                      etxt1: $('#etxt1').val(),
                      etxt2: $('#etxt2').val(),
                      etxt3: $('#etxt3').val(),
                      etxt4: $('#etxt4').val(),
                      etxt5: $('#etxt5').val()
                    },
                    dataType:'JSON',
                    success: function(data){
                      tbl.clear().draw();
                      $.each(data.fType, function(key, val){
                        tbl.row.add([
                           val.FacilityTypeID,
                           val.FacilityName,
                           val.FacilityCode,
                           val.FRRental,
                           val.FNRRental,
                           '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+ val.FacilityTypeID +')"> <i class="fa fa-pencil"></i></button> '+
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete"  onclick = "modalDetails('+ val.FacilityTypeID +')"> <i class="fa fa-remove"></i></button>'
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

                $('#btnDelete').click(function(){
                  $.ajax({
                    type: 'POST',
                    url: 'deleteFacilityType',
                    data: {
                      dtxt1: $('#dtxt1').val()
                    },
                    dataType:'JSON',
                    success: function(data){
                      tbl.clear().draw();
                      $.each(data.fType, function(key, val){
                        tbl.row.add([
                           val.FacilityTypeID,
                           val.FacilityName,
                           val.FacilityCode,
                           val.FRRental,
                           val.FNRRental,
                           '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+ val.FacilityTypeID +')"> <i class="fa fa-pencil"></i></button> '+
                              '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete"  onclick = "modalDetails('+ val.FacilityTypeID +')"> <i class="fa fa-remove"></i></button>'
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


              });


              </script>

              <script type="text/javascript">
                function modalDetails(x)
                {
                  $.ajax({
                    type: 'POST',
                    url: 'getFacilityType',
                    data: {id: x},
                    dataType: 'JSON',
                    success: function(data){
                      $('#etxt1').val(data.info[0].FacilityTypeID);
                      $('#etxt2').val(data.info[0].FacilityName);
                      $('#etxt3').val(data.info[0].FacilityCode);
                      $('#etxt4').val(data.info[0].FRRental);
                      $('#etxt5').val(data.info[0].FNRRental);


                      $('#dtxt1').val(data.info[0].FacilityTypeID);
                      $('#dtxt2').val(data.info[0].FacilityName);
                      $('#dtxt3').val(data.info[0].FacilityCode);
                      $('#dtxt4').val(data.info[0].FRRental);
                      $('#dtxt5').val(data.info[0].FNRRental);

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