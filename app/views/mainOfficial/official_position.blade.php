@extends('layouts.master')

@section('content')

          <section class="content-header">
            <h1>
              Maintenance <small>Official Position</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Official</a></li>
              <li class="active">Position</li>
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
                      <h3 class="box-title">Position</h3>

                    </div><!-- /.box-header -->
                    <!-- form start  <form method = "POST" action="{{URL::to('addOfficialPosition')}}">-->
                    
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Position Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtOPosition" 
                                 name="txtOPosition"
                                 placeholder="Name"
                                 required="required">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Number of Official*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtOPNumber"
                                 name="txtOPNumber"
                                 required="required">
                        </div>

                       

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="submit" class="btn btn-warning btn-flat" id = "btnSubmit">Submit</button></center>
                      </div>
                    
                  </div><!--</form> /.box -->
              </div>

<!--datatable-->
              <div class="col-md-9">
                <div class="box box-warning">
                  <div class="box-header">
                    <h3 class="box-title">List of Positions</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">

                    <table id="example1" class="table table-bordered table-striped">

                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Position Name</th>
                          <th>Number of Official</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($oPosition as $op)
                            <tr>
                              <td>{{ $op -> OfficialPositionID }}</td>
                              <td>{{ $op -> OfficialPosition }}</td>
                              <td>{{ $op -> OfficialPositionCount }}</td>
                              <td>
                                <button class="btn btn-xs btn-success btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#edit"
                                        value = "{{$op -> OfficialPositionID}}"
                                        onclick = "modalEdit(this)">
                                          <i class="fa fa-pencil"></i>
                                </button>
                                <button class="btn btn-xs btn-danger btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#delete"                                        
                                        value = "{{$op -> OfficialPositionID}}"
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
<!--datatable-->


        <div class="modal fade" id="edit">
          <div class="modal-dialog">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
                <div class="form-horizontal" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Position</h4>
              </div>
              <!-- modal content -->
              <div class="modal-body">
              <div id="Messages1"></div>
              <div id="SuccessBox1"></div>
            
                  <div class="box-body">
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">ID:</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id = "txt1" name = "txt1" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Position:</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id = "txt2" name = "txt2">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Number of Official:</label>

                      <div class="col-sm-10">
                        <input type="number" class="form-control" id = "txt3" name = "txt3">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btnUpdate">Save changes</button>
              </div><!-- /.modal-content -->
              
            </div></div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        
        </div>
      
        
        
        <div class="modal fade" id="delete">
          <div class="modal-dialog">
          <!-- form start method = "POST" action="{{URL::to('deleteOfficialPosition')}}"-->
                <div class="form-horizontal" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you want to DELETE this POSITION ?</h4>
              </div>
              
              <!-- modal content -->
              <div class="modal-body">
            
                  <div class="box-body">
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">ID:</label>

                      <div class="col-sm-10">
                        <input readonly type="text" class="form-control" id = "dtxt1" name = "dtxt1">
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Position:</label>

                      <div class="col-sm-10">
                        <input readonly type="text" class="form-control" id = "dtxt2" name = "dtxt2">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Number of Official:</label>

                      <div class="col-sm-10">
                        <input readonly type="text" class="form-control" id = "dtxt3" name = "dtxt3">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id = "btnDelete" data-dismiss="modal">Delete</button>
              </div>
            </div></div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




              <script  id = "hey" src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}" ></script>
              <script >
                $(document).ready(function(){
                  var tbl = $('#example1').DataTable();

                  $('#btnSubmit').click(function(e){
                    $('#Messages').html('');
                    e.preventDefault();
                    var posName = $('#txtOPosition').val();
                    var posNum = $('#txtOPNumber').val();
                    

                    $.ajax({
                      type: 'POST',
                      url: 'addOfficialPosition',
                      data: {posName: posName, 
                              posNum: posNum},
                      dataType: 'JSON',
                      success: function(data){
                        tbl.clear().draw();

                        $.each(data.position, function(key, val){
                          tbl.row.add([

                            val.OfficialPositionID,
                            val.OfficialPosition,
                            val.OfficialPositionCount,
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+val.OfficialPositionID+'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> '+
                               '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+val.OfficialPositionID+'" onclick = "modalDelete(this)"><i class="fa fa-remove"></i></button>'


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
                    $('#txtOPosition').val("");
                    $('#txtOPNumber').val("");
                  });
                  $('#btnUpdate').click(function(e){
                    $('#Messages1').html('');
                    e.preventDefault();
                    var txt1 = $('#txt1').val();
                    var txt2 = $('#txt2').val();
                    var txt3 = $('#txt3').val();


                    $.ajax({
                      type: 'POST',
                      url: 'updateOfficialPosition',
                      data: {txt1: txt1, 
                              txt2: txt2,
                              txt3: txt3},
                      dataType: 'JSON',
                      success: function(data){
                        tbl.clear().draw();

                        $.each(data.position, function(key, val){
                          tbl.row.add([

                            val.OfficialPositionID,
                            val.OfficialPosition,
                            val.OfficialPositionCount,
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+val.OfficialPositionID+'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> '+
                               '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+val.OfficialPositionID+'" onclick = "modalDelete(this)"><i class="fa fa-remove"></i></button>'


                            ]).draw(false);

                        });

                        if (data.messages != null) {
                        //alert(JSON.stringify(data.messages));
                        

                            $('#Messages1').append('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Warning!</h4><b></b></div>');  
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


                  $('#btnDelete').click(function(e){
                    e.preventDefault();
                    var txt1 = $('#dtxt1').val();


                    $.ajax({
                      type: 'POST',
                      url: 'deleteOfficialPosition',
                      data: {txt1: txt1},
                      dataType: 'JSON',
                      success: function(data){
                        tbl.clear().draw();

                        $.each(data.position, function(key, val){
                          tbl.row.add([

                            val.OfficialPositionID,
                            val.OfficialPosition,
                            val.OfficialPositionCount,
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+val.OfficialPositionID+'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> '+
                               '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+val.OfficialPositionID+'" onclick = "modalDelete(this)"><i class="fa fa-remove"></i></button>'


                            ]).draw(false);

                        });
                      }
                    });
                  });
                });





              </script> 


              <script type="text/javascript">
                function modalEdit(x){

                  $.ajax({
                      type: 'POST',
                      url: 'getInfoByID',
                      data: {id: x.value},
                      dataType: 'JSON',
                      success: function(data){
                        /*var str1 = JSON.stringify(data.position[0].OfficialPosition);
                        document.getElementById('txt2').value = str1.replace(/\"/g, "");
                        
                        var str2 = JSON.stringify(data.position[0].OfficialPositionCount);
                        document.getElementById('txt3').value = str2.replace(/\"/g, "");*/

                        //or 

                        $.each(data.position, function(key, val){
                          document.getElementById('txt1').value = val.OfficialPositionID;
                          
                          document.getElementById('txt2').value = val.OfficialPosition;
                          document.getElementById('txt3').value = val.OfficialPositionCount;
                        });


                      }
                    });
                }

                function modalDelete(x){

                  $.ajax({
                      type: 'POST',
                      url: 'getInfoByID',
                      data: {id: x.value},
                      dataType: 'JSON',
                      success: function(data){
                        /*var str1 = JSON.stringify(data.position[0].OfficialPosition);
                        document.getElementById('txt2').value = str1.replace(/\"/g, "");
                        
                        var str2 = JSON.stringify(data.position[0].OfficialPositionCount);
                        document.getElementById('txt3').value = str2.replace(/\"/g, "");*/

                        //or 

                        $.each(data.position, function(key, val){
                          document.getElementById('dtxt1').value = val.OfficialPositionID;
                          document.getElementById('dtxt2').value = val.OfficialPosition;
                          document.getElementById('dtxt3').value = val.OfficialPositionCount;
                        });


                      }
                    });


                }
              </script>


      </section>
      <!-- /.content -->
@stop