@extends('layouts.master')

@section('content')
          <section class="content-header">
            <h1>
              Maintenance <small>Business Type</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Business</a></li>
              <li class="active">Business Type</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
          <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Business Type</h3>
                    </div><!-- /.box-header -->
                    <!-- form start"  "    <form role="form" method = "POST" action = "{{URL::to('addBusinessType')}}">-->
                    
                      <div class="box-body">

                      <div id="Messages"></div>
                        <div class="form-group">
                          <label>Business Type*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBusType" 
                                 name="txtBusType"
                                 placeholder="Type"
                                 required="required">
                        </div>
                      
                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="submit" 
                                        class="btn btn-primary btn-flat" 
                                        id = "btn">Submit</button></center>
                      </div>
                    
                  </div><!-- /.box     </form>-->
    


              </div>

              <div class="col-md-9">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">List of Business Types</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Business Type</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($btype as $bt)
                          <tr>
                            <td>{{ $bt->BusinessTypeID }}</td>
                            <td>{{ $bt->BusinessType }}</td>
                            <td>
                                <button class="btn btn-xs btn-success btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#edit"
                                        value = "{{$bt->BusinessTypeID}}"
                                        onclick = "modalEdit(this)">
                                          <i class="fa fa-pencil"></i>
                                </button>
                                <button class="btn btn-xs btn-danger btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#delete"                                        
                                        value = "{{$bt->BusinessTypeID}}"
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
          <!-- form start 
                <form class="form-horizontal" method = "POST" action="{{URL::to('updateBusinessType')}}">
            -->
            <div class = "form-horizontal">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Business Type</h4>
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
                      <label  class="col-sm-2 control-label">Business Type:</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id = "etxt2" name = "etxt2">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btnUpdate" data-dismiss="modal">Save changes</button>
              </div><!-- /.modal-content -->
              
            </div>
</div>
            <!--</form> /.modal-dialog -->
          </div>
          <!-- /.modal -->
          </div>

          <div class="modal fade" id="delete">
          <div class="modal-dialog">
          <!-- form start     method = "POST" action="{{URL::to('deleteBusinessType')}}"-->
                <div class="form-horizontal" >
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
                      <label  class="col-sm-2 control-label">Business Type:</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id = "dtxt2" name = "dtxt2" readonly>
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
              </div>
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->



              <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
              <script type="text/javascript">
                $(document).ready(function (){
                  
                  var tbl = $('#example1').DataTable();

                  $('#btn').click(function (){
                    var bt = $('#txtBusType').val();
                    
                    $.ajax({
                      type: 'POST',
                      url: 'addBusinessType',
                      data: {bt: bt},
                      dataType: 'JSON',
                      success: function(data){
                        tbl.clear().draw();
                        $.each(data.btype, function(key, val){
                            tbl.row.add([
                              val.BusinessTypeID,
                              val.BusinessType,
                              '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+val.BusinessTypeID+'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> '+
                               '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+val.BusinessTypeID+'" onclick = "modalDelete(this)"><i class="fa fa-remove"></i></button>'

                            ]).draw(false);
                        });

                        $.each(data.messages, function(key, val){

                            $('#Messages').append('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><b><span class="glyphicon glyphicon-exclamtion-sign" aria-hidden="true">'+val+'</span></b></div>');  

                        });
                                            
                      },//success
                      error: function (request, error) {
                        console.log(arguments);
                        alert(" Can't do because: " + error);
                      }
                    }).error(function(ts){
                        alert(ts.responseText);
                      });//ajax                    
                    $('#txtBusType').val("");

                  });

                  $('#btnUpdate').click(function(){
                    var str1 = $('#etxt1').val();
                    var str2 = $('#etxt2').val();
                    $.ajax({
                      type: 'POST',
                      url: 'updateBusinessType',
                      data: {str1: str1,
                              str2: str2},
                      dataType: 'JSON',
                      success: function(data){
                        tbl.clear().draw();
                        $.each(data.btype, function(key, val){
                            tbl.row.add([
                              val.BusinessTypeID,
                              val.BusinessType,
                              '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+val.BusinessTypeID+'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> '+
                               '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+val.BusinessTypeID+'" onclick = "modalDelete(this)"><i class="fa fa-remove"></i></button>'

                            ]).draw(false);

                        });
                        
                      }
                    });

                  });

                  $('#btnDelete').click(function(){
                    var str1 = $('#dtxt1').val();
                    $.ajax({
                      type: 'POST',
                      url: 'deleteBusinessType',
                      data: {str1: str1},
                      dataType: 'JSON',
                      success: function(data){
                        tbl.clear().draw();
                        $.each(data.btype, function(key, val){
                            tbl.row.add([
                              val.BusinessTypeID,
                              val.BusinessType,
                              '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+val.BusinessTypeID+'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> '+
                               '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+val.BusinessTypeID+'" onclick = "modalDelete(this)"><i class="fa fa-remove"></i></button>'

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
                url: 'getBusinessTypeInfo',
                data: {id: x.value},
                dataType: 'JSON',
                success: function(data){
                  $.each(data.bType, function(key, val){
                    document.getElementById('etxt1').value = val.BusinessTypeID;
                    document.getElementById('etxt2').value = val.BusinessType;

                  });
                }
              });
            }

            function modalDelete(x){
              $.ajax({
                type: 'POST',
                url: 'getBusinessTypeInfo',
                data: {id: x.value},
                dataType: 'JSON',
                success: function(data){
                  $.each(data.bType, function(key, val){
                    document.getElementById('dtxt1').value = val.BusinessTypeID;
                    document.getElementById('dtxt2').value = val.BusinessType;

                  });
                }
              });
            }
          </script>

      </section>

@stop