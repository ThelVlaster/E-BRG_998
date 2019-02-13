@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance <small>Consuming Devices</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Facility</a></li>
              <li class="active">Consuming Devices</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
        <div class = "row">
          
          <div class="col-md-12">
                <!-- general form elements -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Consuming Devices</h3>
                    </div><!-- /.box-header 
                     form start--> 
                    <!--{{Form::open(array('id' => 'formform', 'files' => true, 'url' => '/addDocumentDetails', 'onsubmit' => 'return false'))}}
                      -->
                      <div class="box-body">
                      <div id="Message"></div>


                      <div class = "col-md-6">
                        <div class = "well">
                          <div class = "row">

                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Search</label>
                                <select 
                                       class="form-control" 
                                       id="txtSearch" 
                                       name="txtSearch" >

                                       <option selected="" disabled="">Select Facility</option>
                                       @foreach($facility as $f)
                                        <option value = "{{$f -> FacilityID}}">{{$f -> FacilityName}} ({{$f-> Description}}) at {{$f -> StreetName}} St.</option>
                                       @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Facility Name</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="txtFaciName"
                                       name="txtFaciName"
                                       disabled="">
                              </div>
                            </div>


                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Location</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="txtLocation"
                                       name="txtLocation"
                                       disabled="">
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Description</label>
                                <textarea 
                                       class="form-control" 
                                       id="txtFaciDescription"
                                       name="txtFaciDescription"
                                       disabled=""
                                       row = "2"
                                       style = "resize:none">
                                       </textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class = "well">
                          <div class = "row">



                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Consuming Device</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="txtDevice"
                                       name="txtDevice"
                                       placeholder="Device Name">
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="txtDeviceDescription" name="txtDeviceDescription" rows="2" placeholder=" Description"></textarea>
                              </div>
                            </div>


                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Price per Hour</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="txtDevicePrice"
                                       name="txtDevicePrice"
                                       value="1"
                                       min="1">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Quantity</label>
                                <input type = "number" 
                                       class="form-control" 
                                       id="txtDeviceQuantity"
                                       name="txtDeviceQuantity"
                                       value="1"
                                       min="1">
                              </div>
                            </div>


                            

                             
                          </div>
                        </div>
                      </div>

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="submit" 
                                        class="btn btn-success btn-flat"
                                        id = "btnAddDevice"
                                        >Add Device</button></center>

                      </div>
                    
                  </div><!-- {{Form::close()}}/.box -->
              </div>  






              <div class="col-md-12">
                <!-- general form elements -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">List of Consuming Devices</h3>
                    </div><!-- /.box-header
                      -->
                      <div class="box-body">
                      <div id="Message"></div>

                        <table  id = "devices" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Device Name</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr align = "center"><td colspan="7">No Selected Facility</td></tr>
                      </tbody>
                    </table>
                      
                      
                      
                      

                      

                      </div><!-- /.box-body -->

                      
                    
                  </div><!-- {{Form::close()}}/.box -->
              </div> 



        </div>


        <!--////////////////////// MODAL EDIT-->

        <div class="modal fade" id="edit" >
            <div class="modal-dialog modal-md">
          
              <form class="form-horizontal" role="form" onsubmit="return false"  enctype="multipart/form-data" id = "updateForm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Consuming Device</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Device:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "etxtDevice" name= "etxtDevice">
                            <input type="hidden" class="form-control" id = "hiddenID" name = "hiddenID">
                          </div>
                        </div>


                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Description:</label>

                          <div class="col-sm-8">
                            <textarea class="form-control" id = "etxtDesc" name = "etxtDesc" rows="2" placeholder=" Description"></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Price per Hour:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "etxtPrice" name= "etxtPrice" >
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Quantity:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "etxtQty" name= "etxtQty" >
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

<!--////////////////////// MODAL EDIT-->


<!--////////////////////// MODAL DELETE-->

        <div class="modal fade" id="delete" >
            <div class="modal-dialog modal-md">
          
              <form class="form-horizontal" role="form" onsubmit="return false"  enctype="multipart/form-data" id = "updateForm">
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
                          <label  class="col-sm-3 control-label"> Device ID:</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "dtxtID" readonly>
                          </div>
                        </div>

                        
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Device:</label>

                          <div class="col-sm-8">
                            <textarea type="text" class="form-control" id = "dtxtDevice" readonly></textarea>
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

<!--////////////////////// MODAL DELETE-->

              


          <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>


          <script type="text/javascript">
            $(document).ready(function(){
             $('#txtSearch').select2().change(function(){
              $.ajax({
                type: 'POST',
                url: 'getFacilityInfo',
                data: {
                  facilityID: $(this).val()
                },
                dataType: 'JSON',
                success: function(data){
                  $('#txtFaciName').val(data.faciInfo[0].FacilityName);
                  $('#txtLocation').val(data.faciInfo[0].Location);
                  $('#txtFaciDescription').val(data.faciInfo[0].Description);
                  $('#devices tbody').html("");

                  if(data.faciDev == 0)
                  {
                    $('#devices tbody').append('<tr align = "center"><td colspan = "7"> No Devices under this Facility </td></tr>');
                  }
                  else
                  {
                    $.each(data.faciDev, function(key, val){
                      $('#devices tbody').append('<tr align = "center">'+

                          '<td>'+val.DeviceID+'</td>'+
                          '<td>'+val.DeviceName+'</td>'+
                          '<td>'+val.DeviceDesc+'</td>'+
                          '<td>'+val.DevicePrice+'</td>'+
                          '<td>'+val.DeviceQuantity+'</td>'+
                          '<td>'+val.DeviceAmount+'</td>'+
                          '<td><button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+val.DeviceID+')"> <i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDetails('+val.DeviceID+')"> <i class="fa fa-remove"></i></button></td>'+

                        '</tr>');
                    });
                  }
                  
                }
              });

             });

   //add devices
   $('#btnAddDevice').click(function(){

                

              $.ajax({
                type:'POST',
                url: 'addDevice',
                data: {
                  deviceName: $('#txtDevice').val(),
                  devDesc: $('#txtDeviceDescription').val(),
                  devPrice: $('#txtDevicePrice').val(),
                  devQuantity: $('#txtDeviceQuantity').val(),
                  devFaci: $('#txtSearch').val(),

                },
                dataType: 'JSON',
                success: function(data){

                  $('#devices tbody').html("");

                  $.each( data.devices, function(key, val){
                    $('#devices tbody').append('<tr align = "center">'+

                          '<td>'+val.DeviceID+'</td>'+
                          '<td>'+val.DeviceName+'</td>'+
                          '<td>'+val.DeviceDesc+'</td>'+
                          '<td>'+val.DevicePrice+'</td>'+
                          '<td>'+val.DeviceQuantity+'</td>'+
                          '<td>'+val.DeviceAmount+'</td>'+
                          '<td><button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+val.DeviceID+')"> <i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDetails('+val.DeviceID+')"> <i class="fa fa-remove"></i></button></td>'+

                        '</tr>');
                  });


                }
              }).error(function(ts){
                alert(ts.responseText);
              });

              });


      $('#btnUpdate').click(function(){

                

              $.ajax({
                type:'POST',
                url: 'updateDevice',
                data: {
                  id:$('#hiddenID').val(),
                  deviceName: $('#etxtDevice').val(),
                  devDesc: $('#etxtDesc').val(),
                  devPrice: $('#etxtPrice').val(),
                  devQuantity: $('#etxtQty').val(),
                  devFaci: $('#txtSearch').val(),
                },
                dataType: 'JSON',
                success: function(data){

                  $('#devices tbody').html("");

                  $.each( data.devices, function(key, val){
                    $('#devices tbody').append('<tr align = "center">'+

                          '<td>'+val.DeviceID+'</td>'+
                          '<td>'+val.DeviceName+'</td>'+
                          '<td>'+val.DeviceDesc+'</td>'+
                          '<td>'+val.DevicePrice+'</td>'+
                          '<td>'+val.DeviceQuantity+'</td>'+
                          '<td>'+val.DeviceAmount+'</td>'+
                          '<td><button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+val.DeviceID+')"> <i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDetails('+val.DeviceID+')"> <i class="fa fa-remove"></i></button></td>'+

                        '</tr>');
                  });


                }
              }).error(function(ts){
                alert(ts.responseText);
              });

              });



            //add devices
            $('#btnDelete').click(function(){

                

              $.ajax({
                type:'POST',
                url: 'deleteDevice',
                data: {
                  id:$('#dtxtID').val(),
                  devFaci: $('#txtSearch').val()
                },
                dataType: 'JSON',
                success: function(data){

                  $('#devices tbody').html("");

                  $.each( data.devices, function(key, val){
                    $('#devices tbody').append('<tr align = "center">'+

                          '<td>'+val.DeviceID+'</td>'+
                          '<td>'+val.DeviceName+'</td>'+
                          '<td>'+val.DeviceDesc+'</td>'+
                          '<td>'+val.DevicePrice+'</td>'+
                          '<td>'+val.DeviceQuantity+'</td>'+
                          '<td>'+val.DeviceAmount+'</td>'+
                          '<td><button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalDetails('+val.DeviceID+')"> <i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDetails('+val.DeviceID+')"> <i class="fa fa-remove"></i></button></td>'+

                        '</tr>');
                  });


                }
              }).error(function(ts){
                alert(ts.responseText);
              });

              });


            });//docu
          </script>

          <script type="text/javascript">
            function modalDetails(x)
                {
                  $.ajax({
                    type: 'POST',
                    url: 'getDevice',
                    data: {id: x},
                    dataType: 'JSON',
                    success: function(data){

                      
                      $.each(data.fac, function(key, val){
                        
                       $('#hiddenID').val(data.fac[0].DeviceID);
                       $('#etxtDevice').val(data.fac[0].DeviceName);
                       $('#etxtPrice').val(data.fac[0].DevicePrice);
                       $('#etxtDesc').val(data.fac[0].DeviceDesc);
                       $('#etxtQty').val(data.fac[0].DeviceQuantity);

                      
                      $('#dtxtID').val(data.fac[0].DeviceID);
                      $('#dtxtDevice').val(data.fac[0].DeviceName);

                      
                      });

                    
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