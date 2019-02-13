@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance <small>Item Name</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Item</a></li>
              <li class="active">Item Name</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
        <div id="SuccessBox"></div>
          <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Item Name</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" onsubmit="return false" action = "{{URL::to('addItemType')}}" enctype="multipart/form-data" id = "addForm">
                      <div class="box-body">

                        <input type="text" id="hiddenOfficialID" name="hiddenOfficialID" value = "{{Session::get('OfficialID')}}" hidden>
                        <input type="text" id="hiddenResidentID" name="hiddenResidentID" value = "{{Session::get('ResidentID')}}"hidden>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Item Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtIName" 
                                 name="txtIName" 
                                 placeholder="Name"
                                 required="required">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Item Code*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtICode" 
                                 name="txtICode" 
                                 placeholder="Code"
                                 required="required">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Rental Fee (Residents)*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtIRFee" 
                                 name="txtIRFee" 
                                 placeholder="Fee"
                                 required="required">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Rental Fee (Non-Residents)*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtINRFee" 
                                 name="txtINRFee" 
                                 placeholder="Fee"
                                 required="required">
                        </div>

                        <div class="form-group">
                          <label for="Penalty">Penalty Price*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="Penalty" 
                                 name="Penalty" 
                                 placeholder="Penalty Price"
                                 required="required">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Image*</label>
                          <input type="file" 
                                 class="form-control" 
                                 id="txtIImage" 
                                 name="txtIImage" 
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
                                        class="btn btn-primary btn-flat"
                                        id="btnSubmit">Submit</button></center>
                      </div>
                    </form>
                  </div><!-- /.box -->
              </div>

              <div class="col-md-9">
                <div class="box box-primary ">
                  <div class="box-header">
                    <h3 class="box-title">Item Table</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Item Name</th>
                          <th>Item Code</th>
                          <th>Rental Fee Res(per piece)</th>
                          <th>Rental Fee NRes(per piece)</th>
                          <th>Penalty(per piece)</th>

                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($iType as $it)
                          <tr>
                            <td>{{ $it -> ItemTypeID }}</td>
                            <td>{{ $it -> ItemName }}</td>
                            <td>{{ $it -> ItemCode }}</td>
                            <td>{{ $it -> ItemRentalRes }}</td>
                            <td>{{ $it -> ItemRentalNRes }}</td>
                            <td>{{ $it -> Penalty }}</td>
                            <td><button type = "button" 
                                        class = "btn btn-block btn-info btn-xs"
                                        data-toggle = "modal"
                                        data-target = "#viewImage"
                                        onclick = "modalEdit({{ $it -> ItemTypeID }})"> View </button></td>
                            <td><button class="btn btn-xs btn-success btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#edit"
                                        onclick = "modalEdit({{ $it -> ItemTypeID }})">
                                          <i class="fa fa-pencil"></i>
                                </button>
                                <button class="btn btn-xs btn-danger btn-flat"
                                        data-toggle="modal" 
                                        data-target="#delete"
                                        onclick = "modalDelete({{ $it -> ItemTypeID }})">
                                          <i class="fa fa-remove"></i>
                                </button>
                            </td>
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
                    <h4 class="modal-title">Item Image</h4>
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
              
                  <form class="form-horizontal" onsubmit="return false" action = "{{URL::to('updateItemType')}}" enctype="multipart/form-data" id = "updateForm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Item Name</h4>
                      </div>
                    <!-- modal content -->
                      <div class="modal-body">
                    
                          <div class="box-body">
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">ID:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "etxtID" name = "etxtID" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Item Name:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "etxtIName" name = "etxtIName" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Item Code:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "etxtICode" name = "etxtICode" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Rental Fee Res:</label>

                              <div class="col-sm-8">
                                <input type="number" class="form-control" id = "etxtIRFee" name = "etxtIRFee" >
                              </div>
                            </div>

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Rental Fee NonRes:</label>

                              <div class="col-sm-8">
                                <input type="number" class="form-control" id = "etxtINRFee" name = "etxtINRFee" >
                              </div>
                            </div>

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Penalty:</label>

                              <div class="col-sm-8">
                                <input type="number" class="form-control" id = "ePenalty" name = "ePenalty" >
                              </div>
                            </div>

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Image:</label>
                              <div class="col-sm-8">
                                <img id = "etxtIImage" name = "etxtIImage" width="100%">
                              </div>
                            </div>

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Change Image:</label>

                              <div class="col-sm-8">
                                <input type="file" class="form-control" id = "etxtIImageChange" name = "etxtIImageChange" onchange="readURLforEdit(this)">
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
              
                  <form class="form-horizontal" onsubmit="return false" action = "{{URL::to('deleteItemType')}}" enctype="multipart/form-data" id = "deleteForm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Item Name</h4>
                      </div>
                    <!-- modal content -->
                      <div class="modal-body">
                    
                          <div class="box-body">
                           <div class="form-group">
                              <label  class="col-sm-3 control-label">ID:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "dtxtID" name = "dtxtID" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Item Name:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "dtxtIName" name = "dtxtIName" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Item Code:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "dtxtICode" name = "dtxtICode" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Rental Fee Res:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "dtxtIRFee" name = "dtxtIRFee" readonly>
                              </div>
                            </div>

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Rental Fee Non Res:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "dtxtINRFee" name = "dtxtINRFee" readonly>
                              </div>
                            </div>

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Penalty Price:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "dPenalty" name = "dPenalty" readonly>
                              </div>
                            </div>

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Image:</label>
                              <div class="col-sm-8">
                                <img id = "dtxtIImage" name = "dtxtIImage" width="100%">
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

                        $('#SuccessBox').append('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>Record has been successfully added</div>');  

                        
                        tbl.clear().draw();
                        $.each(data.itemType, function(key, val){
                          tbl.row.add([
                            val.ItemTypeID,
                            val.ItemName,
                            val.ItemCode,
                            val.ItemRentalRes,
                            val.ItemRentalNRes,
                            val.Penalty,
                            '<button type = "button" class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalEdit('+ val.ItemTypeID +')"> View </button>',
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick = "modalEdit('+ val.ItemTypeID +')"><i class="fa fa-pencil"></i></button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" onclick = "modalDelete('+ val.ItemTypeID +')"> <i class="fa fa-remove"></i></button>'

                            
                          ]).draw(false);
                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("can't do this because: " + error);
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
                        $.each(data.itemType, function(key, val){
                          tbl.row.add([
                            val.ItemTypeID,
                            val.ItemName,
                            val.ItemCode,
                            val.ItemRentalRes,
                            val.ItemRentalNRes,
                            val.Penalty,
                            '<button type = "button" class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalEdit('+ val.ItemTypeID +')"> View </button>',
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick = "modalEdit('+ val.ItemTypeID +')"><i class="fa fa-pencil"></i></button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" onclick = "modalDelete('+ val.ItemTypeID +')"> <i class="fa fa-remove"></i></button>'

                            
                          ]).draw(false);
                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("can't do this because: " + error);
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
                      dataType: 'JSON',
                      cache: false,
                      contentType: false,
                      processData: false,
                      success: function(data){
                        tbl.clear().draw();
                        $.each(data.itemType, function(key, val){
                          tbl.row.add([
                            val.ItemTypeID,
                            val.ItemName,
                            val.ItemCode,
                            val.ItemRentalRes,
                            val.ItemRentalNRes,
                            val.Penalty,
                            '<button type = "button" class = "btn btn-block btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalEdit('+ val.ItemTypeID +')"> View </button>',
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick = "modalEdit('+ val.ItemTypeID +')"><i class="fa fa-pencil"></i></button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" onclick = "modalDelete('+ val.ItemTypeID +')"> <i class="fa fa-remove"></i></button>'

                            
                          ]).draw(false);
                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("can't do this because: " + error);
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
                          $('#etxtIImage').removeAttr('src');
                          $('#etxtIImage').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#etxtIImage').removeAttr('src');
                  }
                }


                function modalEdit(x)
                {
                  $.ajax({
                    type: 'POST',
                    url: 'getItemTypeInfo',
                    data: { id : x },
                    dataType: 'JSON',
                    success: function(data){
                      $.each(data.itemType, function(key, val){
                        $('#etxtID').val(val.ItemTypeID);
                        $('#etxtIName').val(val.ItemName);
                        $('#etxtICode').val(val.ItemCode);
                        $('#etxtIRFee').val(val.ItemRentalRes);
                        $('#etxtINRFee').val(val.ItemRentalNRes);
                        $('#ePenalty').val(val.Penalty);

                        $('#etxtIImage').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + val.ItemImage + "')}}");
                        

                        $('#vImage').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + val.ItemImage + "')}}");
                      });
                    }
                  });
                }

                function modalDelete(x)
                {
                  $.ajax({
                    type: 'POST',
                    url: 'getItemTypeInfo',
                    data: { id : x },
                    dataType: 'JSON',
                    success: function(data){
                      $.each(data.itemType, function(key, val){
                        $('#dtxtID').val(val.ItemTypeID);
                        $('#dtxtIName').val(val.ItemName);
                        $('#dtxtICode').val(val.ItemCode);
                        $('#dtxtIRFee').val(val.ItemRentalRes);
                        $('#dtxtINRFee').val(val.ItemRentalNRes);
                        $('#dPenalty').val(val.Penalty);
                        $('#dtxtIImage').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + val.ItemImage + "')}}");

                      });
                    }
                  });
                }
              </script>
      </section>
      <!-- /.content -->
@stop