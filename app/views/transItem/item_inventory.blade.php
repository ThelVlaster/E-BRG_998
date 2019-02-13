@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1><i class="fa fa-shopping-cart "></i>
              Item Inventory
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li><a href="#">Item</a></li>
              <li class="active">Item Inventory</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
            <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title"><i class="fa fa-plus"></i> Add Items</h3>
                      <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" onsubmit="return false">
                      <div class="box-body">

                       
                        <div class="form-group">
                          <label for="exampleInputEmail1">Item Name*</label>
                          <select type="text" 
                                 class="form-control" 
                                 id="txtItemType" 
                                 name="txtItemType" 
                                 required="required">
                                 @foreach($iType as $it)
                                      <option value = "{{ $it -> ItemTypeID }}">{{ $it -> ItemName}}</option>
                                 @endforeach
                          </select>
                        </div>


                         <div class="form-group">
                          <label for="exampleInputEmail1">Quantity*</label>
                          <input type="number" 
                                 class="form-control" 
                                 id="txtQuantity" 
                                 name="txtQuantity"
                                 min = "1"
                                 required="required">
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
              </div> <!-- col 3 -->

            <div class="col-md-9">
              <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Item Status</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Item Reservation Status</a></li>
						  <li><a href="#tab_3" data-toggle="tab">Item Reservation Summary</a></li>
                          <li><a href="#tab_4" data-toggle="tab">Item Trail</a></li>
                         
                        </ul>
						
              <div class="tab-content" style="overflow: auto">
                <div class="tab-pane active" id="tab_1">

                      <div class="box-header"> 
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Item Number</th>
                              <th>Item Name</th>
                              <th>Item Status</th>
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
				
               <div class="tab-pane" id="tab_2">

                      <div class="box-header"> 
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Item Number</th>
                              <th>Item Name</th>
                              <th>Reservation Status</th>
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

            </div> <!--tab content -->

				
					
              </div> <!--NAV CUSTOM-->
            </div> <!--COL-9-->
			


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
                    <h4 class="modal-title">Edit Official Position</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
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
                    <h4 class="modal-title">Edit Official Position</h4>
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
                  var tb2 = $('#example2').DataTable();
                  var tb2 = $('#example3').DataTable();

                
                $('#btnSubmit').click(function(){
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
                          tbl.row.add([
                            '<input type = "hidden" value = "'+val.DateTime+'">',
                            val.ItemCode+' - ' + val.ItemID,
                            val.ItemName,
                            val.ItemStatus,
                            val.ItemCode //papalitan pa para sa action
                          ]).draw(false);
                        });

                        
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });

                  });




                  $('#btnUpdate').click(function(){
                    var tID = $('#etxtTypeID').val();
                    var origID = $('#etxtOrigID').val();

                    var itemID = $('#etxtID').val();
                    var itemStatus = $('#etxtStatus').val();

                    
                    $.ajax({
                      type: 'POST',
                      url: 'updateItemDetails',
                      data: { tID: tID,
                              origID: origID,
                              itemID: itemID,
                              itemStatus: itemStatus },
                      dataType: 'JSON',
                      success: function(data){

                      }
                    }).error(function(ts){
                      //alert(ts.responseText);
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

       <script type="text/javascript">
        $(document).ready(function(){

         $("#txtItemType").select2().change(function () {
          });
        });
      </script>
@stop