@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance <small>Business Details</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Business</a></li>
              <li class="active">Business Details</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
              <!-- <div class="col-md-3">
                
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Business Details</h3>
                    </div>
                    <form role="form">
                      <div class="box-body">

                        <div class="form-group">
                          <label>Business Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBName" 
                                 name="txtBName" 
                                 placeholder="Name"
                                 required="required">
                        </div>

                        <div class="form-group">
                          <label>Business Type*</label>
                          <select class="form-control"
                                  name="txtBType"
                                  id="txtBType">
                                  @foreach($bType as $bt)
                                    <option value="{{$bt->BusinessTypeID}}">{{ $bt -> BusinessType }}</option>
                                  @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Owner Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBOwnerName" 
                                 name="txtBOwnerName" 
                                 placeholder="Owner Name"
                                 required="required">
                        </div>

                        <div class="form-group">
                          <label>Address*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBAddress" 
                                 name="txtBAddress" 
                                 placeholder="Address"
                                 required="required">
                        </div>

                      </div>

                      <div class="box-footer">
                        <center><button type="submit" 
                                        class="btn btn-primary btn-flat"
                                        id="btnSubmit">Submit</button></center>
                      </div>
                    </form>
                  </div>
              </div> -->

              <div class="col-md-12">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">List of Businesses</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>BusinessName</th>
                          <th>Type</th>
                          <th>Owner</th>
                          <th>Address</th>
                          <th>E-mail Address</th>
                          <th>Contact No.</th>
                          <th>Income per month (pesos)</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($bDetails as $bd)
                            <tr>
                                <td>{{ $bd -> BusinessID}}</td>
                                <td>{{ $bd -> BusinessName}}</td>
                                <td>{{ $bd -> BusinessType}}</td>
                                <td>{{ $bd -> BusinessOwnerName}}</td>
                                <td>{{ $bd -> BusinessAddress}}</td>
                                <td>{{ $bd -> BusEmail}}</td>
                                <td>{{ $bd -> BusContactNo}}</td>
                                <td>{{ $bd -> BusIncome}}</td>
                                <td><button class="btn btn-xs btn-success btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#edit"
                                        value = "{{$bd->BusinessID}}"
                                        onclick = "modalEdit(this)">
                                          <i class="fa fa-pencil"></i>
                                </button>
                                <button class="btn btn-xs btn-danger btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#delete"                                        
                                        value = "{{$bd->BusinessID}}"
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
                <h4 class="modal-title">Edit Business Details</h4>
              </div>
              <!-- modal content -->
              <div class="modal-body">
            
                  <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-6">
                          <label>ID</label>

                          <div id="formName">
                            <input type="text" 
                              class="form-control" 
                              id = "txtID"
                              name = "txtID"
                              readonly="">
                          </div>
                        </div>


                          <div class="col-md-6">
                          <label>Business Name</label>

                          <div id="formName">
                            <input type="text" 
                              class="form-control" 
                              id = "txtNewBusName"
                              name = "txtNewBusName">
                          </div>
                        </div>
   

                    </div>  


                      <div class="form-group">
                    
                       <div class="col-md-6">
                        <label>Owner</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtOwner"
                            name = "txtOwner"
                            >
                        </div>

                        <div class="col-md-6">
                          <label>Address</label>
                          <input type="text" 
                              class="form-control" 
                              id = "txtAddress"
                              name = "txtAddress"
                              >
                        </div>
                      </div>

                      <div class="form-group">
                      

                       <div class="col-md-6">
                        <label>Type</label>
                          <select
                               class="form-control select2" style="width: 100%;"
                                id = "txtBusType"
                                name = "txtBusType">
                              <option selected disabled value ="paulo">samson</option>
                                @foreach($type as $type)
                                  <option value ="{{$type->BusinessTypeID}}">{{$type->BusinessType}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                          <label>E-mail Address</label>
                          <input type="text" 
                              class="form-control" 
                              id = "txtEmail"
                              name = "txtEmail"
                              >
                        </div>
                      </div>

                       <div class="form-group">
                        

                       <div class="col-md-6">
                        <label>Mobile No.</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtMobile"
                            name = "txtMobile"
                            >
                      </div>

                      <div class="col-md-6">
                          <label>Monthly Income (pesos)</label>
                          <input type="text" 
                              class="form-control" 
                              id = "txtIncome"
                              name = "txtIncome"
                              >
                        </div>
                      </div>

                  </div><!--  box-body -->
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
                      <label  class="col-sm-2 control-label">Business Name:</label>

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
                $(document).ready(function(){
                   var tbl = $('#example1').DataTable();

                   $('#btnUpdate').click(function(){
                    var str1 = $('#txtID').val();
                    var str2 = $('#txtOwner').val();
                    var str3 = $('#txtAddress').val();
                    var str4 = $('#txtNewBusName').val();
                    var str5 = $('#txtBusType').val();
                    var str6 = $('#txtEmail').val();
                    var str7 = $('#txtMobile').val();
                    var str8 = $('#txtIncome').val();
                    $.ajax({
                      type: 'POST',
                      url: 'updateBusinessDetails',
                      data: {str1: str1,
                              str2: str2,
                              str3: str3,
                              str4: str4,
                              str5: str5,
                              str6: str6,
                              str7: str7,
                              str8: str8},
                      dataType: 'JSON',
                      success: function(data){
                       // alert("success");
                        tbl.clear().draw();
                        $.each(data.btype, function(key, val){

                            tbl.row.add([
                              val.BusinessID,
                              val.BusinessName,
                              val.BusinessType,
                              val.BusinessOwnerName,
                              val.BusinessAddress,
                              val.BusEmail,
                              val.BusContactNo,
                              val.BusIncome,
                              '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+val.BusinessID+'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> '+
                               '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+val.BusinessID+'" onclick = "modalDelete(this)"><i class="fa fa-remove"></i></button>'

                            ]).draw(false);

                        });
                        
                      },error:function(request, error)
                      {
                        alert(error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });

                  });

                });
              </script>


               <script type="text/javascript">

            function modalEdit(x){
              $.ajax({
                type: 'POST',
                url: 'getBusinessInfo',
                data: {id: x.value},
                dataType: 'JSON',
                success: function(data){

                  $.each(data.bus, function(key, val){

                    document.getElementById('txtID').value = val.BusinessID;
                    document.getElementById('txtNewBusName').value = val.BusinessName;
                    document.getElementById('txtBusType').value = val.BusinessTypeID;
                    document.getElementById('txtOwner').value = val.BusinessOwnerName;
                    document.getElementById('txtAddress').value = val.BusinessAddress;
                    document.getElementById('txtEmail').value = val.BusEmail;
                    document.getElementById('txtMobile').value = val.BusContactNo;
                    document.getElementById('txtIncome').value = val.BusIncome;

                  });
                },error:function(request, error){

                }
              }).error(function(ts){
                alert(ts.responseText);
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
      <!-- /.content -->
@stop