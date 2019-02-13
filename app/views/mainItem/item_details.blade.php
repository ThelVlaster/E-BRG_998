@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance <small>Item Quantity</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Item</a></li>
              <li class="active">Item Quantity</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
       <div id="Messages"></div>
       <div id="SuccessBox"></div>
            <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Item Quantity</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" onsubmit="return false">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Quantity*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtQuantity" 
                                 name="txtQuantity">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Item Name*</label>
                          <select type="text" 
                                 class="form-control" 
                                 id="txtItemType" 
                                 name="txtItemType" >
                                 <option selected="" disabled="">Select Item Type</option>
                                 @foreach($iType as $it)
                                      <option value = "{{ $it -> ItemTypeID }}">{{ $it -> ItemName}}</option>
                                 @endforeach
                          </select>
                        </div>

                        

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="submit" 
                                        class="btn btn-primary btn-flat"
                                        id="btnSubmit"
                                        data-toggle="modal"
                                        data-target="#addedItems"
                                        >Submit</button></center>
                      </div>
                    </form>
                  </div><!-- /.box -->
              </div>

              <div class="col-md-9">
                <div class="box box-primary ">
                  <div class="box-header">
                    <h3 class="box-title">List of Individual Items</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Item Number</th>
                          <th>Item Type</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($iDetails as $id)
                          <tr>
                            <td> <input type = "text" value = "{{$id->DateTime}}" hidden>  </td>
                            <td>{{ $id -> ItemCode }} - {{ $id -> ItemID }}</td>
                            <td>{{ $id -> ItemName }}</td>
                            <td>{{ $id -> ItemStatus }}</td>
                            <td><button class="btn btn-xs btn-success btn-flat"
                                        data-toggle="modal"
                                        data-target="#edit"
                                        onclick="modalEdit({{ $id -> ItemID }}, {{ $id -> ItemTypeID }})"
                                        ><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-xs btn-danger btn-flat"
                                      class="btn btn-xs btn-success btn-flat"
                                      data-toggle="modal"
                                      data-target="#delete"
                                      onclick="modalDelete({{ $id -> ItemID }}, {{ $id -> ItemTypeID }})"
                                      ><i class="fa fa-remove"></i></button></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


        <div class="modal fade" id="addedItems">
          <div class="modal-dialog">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
                <div class="form-horizontal" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Added Item/s</h4>
              </div>
              <!-- modal content -->
              <div class="modal-body" >
            
                  <div class="box-body">
                    <table class = "table table-striped">
                      <tbody>
                        <tr>
                          <td><h5>Quantity: </h5></td>
                          <td><h5 id = "q"></h5></td>
                        </tr>
                        <tr>
                          <td><h5>Type: </h5></td>
                          <td><h5 id = "t"></h5></td>
                        </tr>
                        <tr>
                          <td><h5>Status: </h5></td>
                          <td><h5 id = "s"></h5></td>
                        </tr>
                        <tr>
                          <td><h5>ID/s Numbers: </h5></td>
                          <td><h5 id = "i"></h5></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div><!-- /.modal-content -->
              
            </div></div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        
        </div>


          <div class="modal fade" id="edit">
            <div class="modal-dialog">
          
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Item Quantity</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                  <div id="Meesages1"></div>
                  <div id="SuccessBox1"></div>
                      <div class="box-body">

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Type:</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id = "etxtType" name = "etxtType" readonly>
                            <input type="hidden" name="etxtTypeID" id="etxtTypeID">
                          </div>
                        </div>


                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Item Number:</label>

                          <div class="col-sm-3">
                            <input type="text" class="form-control" id = "etxtCode" name = "etxtCode" readonly>
                          </div>

                          <div class="col-sm-6">
                            <input type="text" class="form-control" id = "etxtID" name = "etxtID" >
                            <input type="hidden" name="etxtOrigID" id="etxtOrigID">
                          </div>


                        </div>


                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Status:</label>

                          <div class="col-sm-9">
                            <select class="form-control" 
                                    id = "etxtStatus" 
                                    name = "etxtStatus" >
                              <option>Good</option>
                              <option>Under Maintenance</option>
                              <option>Broken</option>
                              <option>Lost</option>
                            </select>
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
                    <h4 class="modal-title">Delete Item</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                      <div class="box-body">

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Type:</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id = "dtxtType" name = "dtxtType" readonly>
                            <input type="hidden" name="dtxtTypeID" id="dtxtTypeID">
                          </div>
                        </div>


                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Item Number:</label>

                          <div class="col-sm-3">
                            <input type="text" class="form-control" id = "dtxtCode" name = "dtxtCode" readonly>
                          </div>

                          <div class="col-sm-6">
                            <input type="text" class="form-control" id = "dtxtID" name = "dtxtID" readonly>
                            <input type="hidden" name="dtxtOrigID" id="dtxtOrigID">
                          </div>


                        </div>


                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Status:</label>

                          <div class="col-sm-9">
                            <input type = "text" class="form-control" 
                                    id = "dtxtStatus" 
                                    name = "dtxtStatus" readonly>
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
                    $('#Messages').html('');
                    

                    var quan = $('#txtQuantity').val();
                    var iType = $('#txtItemType').val();

                    $.ajax({
                      type: 'POST',
                      url: 'addItemDetails',
                      data: { quan: quan,
                              iType: iType},
                      dataType: 'JSON',
                      success: function(data){

                        $('#q').html(quan);
                        $('#t').html(data.it[0].ItemName);
                        $('#s').html(data.it[0].status);

                        if(data.ctr == 0)
                        {
                          if(quan == 1)
                          {
                            $('#i').html(data.it[0].ItemCode + " - " + 1);
                          }
                          else
                          {
                            $('#i').html(data.it[0].ItemCode + " - " + 1 + "   to   " + data.it[0].ItemCode + " - " + quan);
                          }
                        }
                        else
                        {
                          if(quan == 1)
                          {
                            $('#i').html(data.it[0].ItemCode + " - " + (data.te[0].ItemID+1));
                          }
                          else
                          {
                            $('#i').html(data.it[0].ItemCode + " - " + (data.te[0].ItemID+1) + "   to   " + data.it[0].ItemCode + " - " + (parseInt(quan) + parseInt(data.te[0].ItemID)));
                          }
                        }



                        tbl.clear().draw();

                        $.each(data.iDetails, function(key, val){
                          alert(val.ItemTypeID);
                          tbl.row.add([
                            '<input type = "hidden" value = "'+val.DateTime+'">',
                            val.ItemCode+' - ' + val.ItemID,
                            val.ItemName,
                            val.ItemStatus,
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick="modalEdit('+val.ItemID+', '+val.ItemTypeID+')" ><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger btn-flat" class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#delete" onclick="modalDelete('+val.ItemID+', '+val.ItemTypeID+')" ><i class="fa fa-remove"></i></button>'
                         ]).draw(false);
                        }); 

                      if (data.messages != null) {
                 
                        
                        $('#Messages').append('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Warning!</h4><b></b></div>');  
                        $('#Messages').fadeIn().delay(3000).fadeOut();
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
                    $('#txtQuantity').val("");
                    $('#txtItemType').val("");

                  });




                  $('#btnUpdate').click(function(){
                    $('#Messages1').html('');
                    
                    $.ajax({
                      type: 'POST',
                      url: 'updateItemDetails',
                      data: { tID: $('#etxtTypeID').val(),
                              origID: $('#etxtOrigID').val(),
                              itemID: $('#etxtID').val(),
                              itemStatus: $('#etxtStatus').val() },
                      dataType: 'JSON',
                      success: function(data){

                        tbl.clear().draw();

                        $.each(data.uDetails, function(key, val){
                          console.log(val.ItemTypeID);
                          tbl.row.add([
                            '<input type = "hidden" value = "'+val.DateTime+'">',
                            val.ItemCode+' - ' + val.ItemID,
                            val.ItemName,
                            val.ItemStatus,
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick="modalEdit('+val.ItemID+', '+val.ItemTypeID+')" ><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger btn-flat" class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#delete" onclick="modalDelete('+val.ItemID+', '+val.ItemTypeID+')" ><i class="fa fa-remove"></i></button>'
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


                  $('#btnDelete').click(function(){
                    var tID = $('#dtxtTypeID').val();
                    var origID = $('#dtxtOrigID').val();

                    
                    $.ajax({
                      type: 'POST',
                      url: 'deleteItemDetails',
                      data: { tID: tID,
                              origID: origID },
                      dataType: 'JSON',
                      success: function(data){

                         tbl.clear().draw();

                        $.each(data.uDetails, function(key, val){
                          tbl.row.add([
                            '<input type = "hidden" value = "'+val.DateTime+'">',
                            val.ItemCode+' - ' + val.ItemID,
                            val.ItemName,
                            val.ItemStatus,
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick="modalEdit('+val.ItemID+', '+val.ItemTypeID+')" ><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger btn-flat" class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#delete" onclick="modalDelete('+val.ItemID+', '+val.ItemTypeID+')" ><i class="fa fa-remove"></i></button>'
                         ]).draw(false);
                        });

                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
                  });


                });
              </script>

              <script type="text/javascript">
                
              function modalEdit(x,y)
              {
                $.ajax({
                  type: 'POST',
                  url: 'getItemDetailsInfo',
                  data:{x:x,
                        y:y},
                  dataType:'JSON',
                  success: function(data){
                    $.each(data.iInfo, function(key, val){
                      $('#etxtType').val(val.ItemName);
                      $('#etxtTypeID').val(val.ItemTypeID);
                      $('#etxtCode').val(val.ItemCode);
                      $('#etxtID').val(val.ItemID);
                      $('#etxtOrigID').val(val.ItemID);
                      $('#etxtStatus').val(val.ItemStatus);


                    });
                  }
                }).error(function(ts){
                  alert(ts.responseText);
                });
              }


              function modalDelete(x,y)
              {
                $.ajax({
                  type: 'POST',
                  url: 'getItemDetailsInfo',
                  data:{x:x,
                        y:y},
                  dataType:'JSON',
                  success: function(data){
                    $.each(data.iInfo, function(key, val){
                      $('#dtxtType').val(val.ItemName);
                      $('#dtxtTypeID').val(val.ItemTypeID);
                      $('#dtxtCode').val(val.ItemCode);
                      $('#dtxtID').val(val.ItemID);
                      $('#dtxtOrigID').val(val.ItemID);
                      $('#dtxtStatus').val(val.ItemStatus);
                    });
                  }
                }).error(function(ts){
                  alert(ts.responseText);
                });
              }



              </script>

      </section>
      <!-- /.content -->
@stop