@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance <small>Official Details</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Official</a></li>
              <li class="active">Official Details</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
      <div id="Messages"></div>
      <div id="SuccessBox"></div>
            <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Official Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" onsubmit = "return false ">
                      <div class="box-body">
                        <div class="form-group">
                          <label>Name*</label>
                          <select id = "autosearch" class="form-control" style="width: 100%;">
                            <option selected="" disabled="">Select Resident Name</option>
                            @foreach( $cResident as $cResident)
                              <option value="{{$cResident -> ResidentID}}"> {{ $cResident -> LastName }}, {{ $cResident -> FirstName }} {{ $cResident ->  MidName }} </option>
                            @endforeach
                          </select>
                        </div>
                      

                        <div class="form-group">
                          <label for="exampleInputEmail1">Birthdate</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBDate" 
                                 name="txtBDate"
                                 readonly="">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Address</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtAddress" 
                                 name="txtAddress" 
                                 readonly="">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Gender</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtGender" 
                                 name="txtGender" 
                                 readonly="" 
                                 >
                        </div>

                        <div class="form-group">
                          <label>Position</label>
                          <select class="form-control"
                                  id = "txtPosition"
                                  name = "txtPosition">
                                  <option selected="" disabled="">Select Position</option>
                                  @foreach($oPosition as $op)
                                      <option value = "{{ $op -> OfficialPositionID}}"> {{ $op -> OfficialPosition}}</option>
                                  @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Start of Term</label>
                          <input type="date" 
                                 class="form-control" 
                                 id="txtStart" 
                                 name="txtStart" 
                                 >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">End of Term</label>
                          <input type="date" 
                                 class="form-control" 
                                 id="txtEnd" 
                                 name="txtEnd" 
                                 >
                        </div>

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="submit" class="btn btn-warning btn-flat" id = "btnSubmit">Submit</button></center>
                      </div>
                    </form>
                  </div><!-- /.box -->
              </div>

              <div class="col-md-9">
                <div class="box box-warning">
                  <div class="box-header">
                    <h3 class="box-title">List of Officials</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Official Name</th>
                          <th>Position</th>
                          <th>Start of Term</th>
                          <th>End of Term</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($oDetails as $od)
                          <tr>
                            <td>{{ $od -> OfficialID }}</td>
                            <td>{{ $od -> LastName }}, {{ $od -> FirstName }} {{ $od -> MidName }}</td>
                            <td>{{ $od -> OfficialPosition }}</td>
                            <td>{{ $od -> OfficialTermStart }}</td>
                            <td>{{ $od -> OfficialTermEnd }}</td>
                            <td><button class="btn btn-xs btn-success btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#edit"
                                        value = "{{$od -> OfficialID}}"
                                        onclick = "modalEdit(this)">
                                          <i class="fa fa-pencil"></i>
                                </button>
                                <button class="btn btn-xs btn-danger btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#delete"                                        
                                        value = "{{$od -> OfficialID}}"
                                        onclick = "modalDelete(this)">
                                          <i class="fa fa-remove"></i>
                                </button></td>
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
                    <h4 class="modal-title">Edit Official Details</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                      <div class="box-body">
                      <div id="Messages1"></div>
                      <div id="SuccessBox1"></div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">ID:</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id = "etxtID" name = "etxtID" readonly>
                          </div>
                        </div>


                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Name:</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id = "etxtName" name = "etxtName" readonly="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Position:</label>

                          <div class="col-sm-9">
                            <select class="form-control"
                                  id = "etxtPosition"
                                  name = "etxtPosition">
                                  @foreach($oPosition as $op)
                                      <option value = "{{ $op -> OfficialPositionID}}"> {{ $op -> OfficialPosition}}</option>
                                  @endforeach
                          </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Start of Term:</label>

                          <div class="col-sm-9">
                            <input type="date" class="form-control" id = "etxtStart" name = "etxtStart" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">End of Term:</label>

                          <div class="col-sm-9">
                            <input type="date" class="form-control" id = "etxtEnd" name = "etxtEnd" >
                          </div>
                        </div>


                      </div>
                      <!-- /.box-body -->
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id = "btnUpdate">Save Changes</button>
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
                          <label  class="col-sm-3 control-label">ID:</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id = "dtxtID" name = "dtxtID" readonly>
                          </div>
                        </div>


                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Name:</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id = "dtxtName" name = "dtxtName" readonly>
                          </div>
                        </div>


                        

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Position:</label>

                          <div class="col-sm-9">
                            <input type="text"
                                  class="form-control"
                                  id = "dtxtPosition"
                                  name = "dtxtPosition"
                                  readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Start of Term:</label>

                          <div class="col-sm-9">
                            <input type="date" class="form-control" id = "dtxtStart" name = "dtxtStart" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">End of Term:</label>

                          <div class="col-sm-9">
                            <input type="date" class="form-control" id = "dtxtEnd" name = "dtxtEnd" readonly>
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




          <script type="text/javascript" src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

          <script type="text/javascript">
            $(document).ready(function(){

              $('#autosearch').select2().change(function(){
                $.ajax({
                  type: 'POST',
                  url: 'getResidentInfo',
                  data: {resID: $('#autosearch').val()},
                  dataType: 'JSON',
                  success: function(data){
                    $('#txtBDate').val(data.rD[0].Birthdate);
                    $('#txtAddress').val(data.rD[0].HouseAddNo + " " + data.rD[0].HouseStreet);
                    $('#txtGender').val(data.rD[0].Gender);
                  },
                  error: function (request, error) {
                        console.log(arguments);
                        alert(" Can't do because: " + error);
                      }
                }).error(function(ts){
                  alert(ts.responseText);
                });
              });


              var tbl = $('#example1').DataTable();

              $('#btnSubmit').click(function(){
                $('#Messages').html('');
                var txtPosition = $('#txtPosition').val();
                var txtStart = $('#txtStart').val();
                var txtEnd = $('#txtEnd').val();

                var txtResidentID = $('#autosearch').val();

                $.ajax({
                  type: 'POST',
                  url: 'addOfficialDetails',
                  data: { txtResidentID: txtResidentID,
                          txtPosition: txtPosition,
                          txtStart: txtStart,
                          txtEnd: txtEnd},
                  dataType: 'JSON',
                  success: function(data){
                    tbl.clear().draw();
                    $.each(data.oDetails, function(key, val){
                      tbl.row.add([
                        val.OfficialID,
                        val.LastName + ', ' + val.FirstName + ' ' + val.MidName,
                        val.OfficialPosition,
                        val.OfficialTermStart,
                        val.OfficialTermEnd,
                        '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+ val.OfficialID +'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+ val.OfficialID +'" onclick = "modalDelete(this)"> <i class="fa fa-remove"></i> </button>'
                      ]).draw(false);
                        }); 

                      if (data.messages != null) {
                 

                        $('#Messages').append('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Warning!</h4><b></b></div>');  
                              $('#Messages').fadeIn().delay(5000).fadeOut();
                        $.each(data.messages, function(key, val){
                            $('#Messages div b').append(val + '<br>');
                        });
                      }
                       
                      else {
                        $('#SuccessBox').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>Record has been successfully added</div>');
                          $('#SuccessBox').fadeIn().delay(1000).fadeOut();  
                      }
                                          
                      }
                    });                                       
                    $('#txtResidentID').val("");
                    $('#txtPosition').val("");
                    $('#txtStart').val("");
                    $('#txtEnd').val("");

                  });

              $('#btnUpdate').click(function(){
                $('#Messages1').html('');
                var etxtID = $('#etxtID').val();
                var etxtPosition = $('#etxtPosition').val();
                var etxtStart = $('#etxtStart').val();
                var etxtEnd = $('#etxtEnd').val();

                $.ajax({
                  type: 'POST',
                  url: 'updateOfficialDetails',
                  data: { etxtID: etxtID,
                          etxtPosition: etxtPosition,
                          etxtStart: etxtStart,
                          etxtEnd: etxtEnd},
                  dataType: 'JSON',
                  success: function(data){
                    tbl.clear().draw();
                    $.each(data.oDetails, function(key, val){
                      tbl.row.add([
                        val.OfficialID,
                        val.LastName + ', ' + val.FirstName + ' ' + val.MidName,
                        val.OfficialPosition,
                        val.OfficialTermStart,
                        val.OfficialTermEnd,
                        '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+ val.OfficialID +'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+ val.OfficialID +'" onclick = "modalDelete(this)"> <i class="fa fa-remove"></i> </button>'
                      ]).draw(false);

                        });

                        if (data.messages != null) {
                        //alert(JSON.stringify(data.messages));
                        

                            $('#Messages1').append('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Warning!</h4><b></b></div>');  
                              $('#Messages1').fadeIn().delay(3000).fadeOut();
                        $.each(data.messages, function(key, val){
                            $('#Messages1 div b').append(val + '<br>');
                        });
                      }
                       
                      else {
                        $('#SuccessBox1').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>Record has been successfully added</div>');
                          $('#SuccessBox1').fadeIn().delay(1000).fadeOut();  


                          $('#edit .close').click();
                      }
                      },
                      error: function(request, error){
                        alert(error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
                  });

              $('#btnDelete').click(function(){
                var dtxtID = $('#dtxtID').val();

                $.ajax({
                  type: 'POST',
                  url: 'deleteOfficialDetails',
                  data: { dtxtID: dtxtID },
                  dataType: 'JSON',
                  success: function(data){
                    tbl.clear().draw();
                    $.each(data.oDetails, function(key, val){
                      tbl.row.add([
                        val.OfficialID,
                        val.LastName + ', ' + val.FirstName + ' ' + val.MidName,
                        val.OfficialPosition,
                        val.OfficialTermStart,
                        val.OfficialTermEnd,
                        '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+ val.OfficialID +'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+ val.OfficialID +'" onclick = "modalDelete(this)"> <i class="fa fa-remove"></i> </button>'
                      ]).draw(false);
                    });
                  }
                });
              });
            });
          </script>

          <script type="text/javascript">
            function modalEdit(x)
            {
              $.ajax({
                type: 'POST',
                url: 'getOfficialDetails',
                data: {id: x.value},
                dataType: 'JSON',
                success: function(data){
                  $.each(data.oDetails, function(key, val){
                    $('#etxtID').val(val.OfficialID);
                    $('#etxtName').val(val.LastName + ", " + val.FirstName + " " + val.MidName);
                    $('#etxtPosition').val(val.OfficialPositionID);
                    $('#etxtStart').val(val.OfficialTermStart);
                    $('#etxtEnd').val(val.OfficialTermEnd);
                  });
                }
              });
            }

            function modalDelete(x)
            {
              $.ajax({
                type: 'POST',
                url: 'getOfficialDetails',
                data: {id: x.value},
                dataType: 'JSON',
                success: function(data){
                  //alert(JSON.stringify(data));
                  $.each(data.oDetails, function(key, val){
                    $('#dtxtID').val(val.OfficialID);
                    $('#dtxtName').val(val.LastName + ", " + val.FirstName + " " + val.MidName);
                    $('#dtxtPosition').val(val.OfficialPosition);
                    $('#dtxtStart').val(val.OfficialTermStart);
                    $('#dtxtEnd').val(val.OfficialTermEnd);
                  });
                }
              });
            }
          </script>

              
      </section>
      <!-- /.content -->
@stop