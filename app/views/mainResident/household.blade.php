@extends('layouts.master')

@section('content')
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Maintenance <small>Household</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-cog"></i> Maintenance</a></li>
              <li><a href="#">Resident</a></li>
              <li class="active">Household</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
          <div id="Messages"></div>
          <div id="SuccessBox"></div>
            <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Household</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
               <form method="post" id="formHousehold" onsubmit="return false">
                      <div class="box-body">
                        <div class="form-group">
                          <label>House Owner*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtLast" 
                                 name="txtOwner" 
                                 placeholder="Last Name">
                          <input type="text" 
                                 class="form-control" 
                                 id="txtFirst" 
                                 name="txtOwner" 
                                 placeholder="First Name">
                          <input type="text" 
                                 class="form-control" 
                                 id="txtMid" 
                                 name="txtOwner" 
                                 placeholder="Middle Name">
                        </div>

                        <div class="form-group" id="divHouse">
                          <label>House/Unit/Building No.*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtAddNo"
                                 name="txtAddNo"
                                 placeholder="House/Unit/Building No." >
                        </div>

                          <div class="form-group" id="divComp">
                          <label>Compound</label>
                          <select type="text" 
                                 class="form-control select2" 
                                 id="txtComp" 
                                 name="txtComp"
                                >
                                <option selected="" disabled="">Select Compound</option>
                            @foreach( $comp as $comp)
                              <option value="{{$comp -> compID}}"> {{ $comp -> compName }}</option>
                            @endforeach

                          </select>
                        </div>

                        <div class="form-group" id="divSub">
                          <label>Subdivision</label>
                          <select type="text" 
                                 class="form-control select2" 
                                 id="txtSub" 
                                 name="txtSub"
                                >
                                <option selected="" disabled="">Select Subdivision</option>
                            @foreach( $sub as $sube)
                              <option value="{{$sube -> subdivisionID}}"> {{ $sube -> subdivisionName }} </option>
                            @endforeach

                          </select>
                        </div>
                         
                          <div class="form-group" id="divStreet">
                          <label>Street*</label>
                          <select type="text" 
                                 class="form-control select2" 
                                 id="txtStreet" 
                                 name="txtStreet"
                                >
                                <option selected="" disabled="">Select Street</option>
                            @foreach( $street as $street)
                              <option value="{{$street -> StreetID}}"> {{ $street -> StreetName }} St.</option>
                            @endforeach

                          </select>
                        </div>



                        <div class="form-group" id="divZone">
                          <label>Zone/Purok No.</label>
                          <input type="Number" 
                                 class="form-control" 
                                 id="txtZone"
                                 name="txtZone"
                                 placeholder="Zone No."
                                 min="1">
                    
                        </div>

                        <div class="form-group">
                          <label>House Type*</label>
                          <select class="form-control"
                                  id = "txtType"
                                  name = "txtType"
                                  >
                              <option>Residential</option>
                              <option>Commercial/Business</option>
                              <option>Dormitory</option>
                              <option>Apartment/Boarding House</option>
                          </select>
                        </div>

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="submit" class="btn btn-info btn-flat" id= "btnSubmit">Submit</button></center>
                      </div>
                </form>
                  </div><!-- /.box -->
              </div>

              <div class="col-md-9">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">List of Household</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th rowspan="2">ID</th>
                          <th rowspan="2">House Owner</th>
                          @if($bdetail[0] -> isComp == '1' and $bdetail[0] -> isSub == '1')
                          <th colspan="5" bgcolor="#ccffcc">Address</th>
                          @elseif($bdetail[0] -> isComp == '0' and $bdetail[0] -> isSub == '1' or $bdetail[0] -> isComp == '1' && $bdetail[0] -> isSub == '0' )
                          <th colspan="4" bgcolor="#ccffcc">Address</th>
                           @elseif($bdetail[0] -> isComp == '0' and $bdetail[0] -> isSub == '0')
                          <th colspan="3" bgcolor="#ccffcc">Address</th>
                          @endif
                          <th colspan="2"></th>
                        </tr>
                        <tr>
                           @if($bdetail[0] -> isComp == '1' and $bdetail[0] -> isSub == '1')
                          <th>House/Unit/<br>Building No.</th>
                          <th>Subdivision</th>
                          <th>Compound/<br>Tenament</th>
                          <th>Street</th>
                          <th>Zone/Purok No.</th>
                          @elseif($bdetail[0] -> isComp == '0' and $bdetail[0] -> isSub == '1')
                          <th>House/Unit/<br>Building No.</th>
                          <th>Subdivision</th>
                          <th>Street</th>
                          <th>Zone/Purok No.</th>
                          @elseif($bdetail[0] -> isComp == '1' and $bdetail[0] -> isSub == '0')
                          <th>House/Unit/<br>Building No.</th>
                          <th>Compound/<br>Tenament</th>
                          <th>Street</th>
                          <th>Zone/Purok No.</th>
                          @elseif($bdetail[0] -> isComp == '0' and $bdetail[0] -> isSub == '0')
                          <th>House/Unit/<br>Building No.</th>
                          <th>Street</th>
                          <th>Zone/Purok No.</th>
                          @endif

                          <th>House Type</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($hhold as $hh)
                          <tr>
                              <td>{{ $hh -> HouseID }}</td>
                              <td>{{ $hh -> HFirstName }} {{ $hh -> HMidName }} {{ $hh -> HLastName }}</td>
                               @if($bdetail[0] -> isComp == '1' and $bdetail[0] -> isSub == '1')
                              <td>{{ $hh -> HouseAddNo}} </td>
                              <td>{{ $hh -> subdivisionName}} </td>
                              <td>{{ $hh -> compName}} </td>
                              <td>{{ $hh -> StreetName}} </td> 
                              <td> {{ $hh -> HouseZone}}</td>
                               @elseif($bdetail[0] -> isComp == '0' and $bdetail[0] -> isSub == '1')
                               <td>{{ $hh -> HouseAddNo}} </td>
                              <td>{{ $hh -> subdivisionName}} </td>
                              <td>{{ $hh -> StreetName}} </td> 
                              <td> {{ $hh -> HouseZone}}</td>
                               @elseif($bdetail[0] -> isComp == '1' and $bdetail[0] -> isSub == '0')
                               <td>{{ $hh -> HouseAddNo}} </td>
                              <td>{{ $hh -> compName}} </td>
                              <td>{{ $hh -> StreetName}} </td> 
                              <td> {{ $hh -> HouseZone}}</td>
                               @elseif($bdetail[0] -> isComp == '0' and $bdetail[0] -> isSub == '0')
                               <td>{{ $hh -> HouseAddNo}} </td>
                              <td>{{ $hh -> StreetName}} </td> 
                              <td> {{ $hh -> HouseZone}}</td>
                              @endif
                              <td>{{ $hh -> HouseType }}</td>
                            
                            <td>
                                  <button class="btn btn-xs btn-success btn-flat" 
                                          data-toggle="modal" 
                                          data-target="#edit"
                                          value = "{{$hh -> HouseID}}"
                                          onclick = "modalEdit(this)">
                                            <i class="fa fa-pencil"></i>
                                  </button>
                                  <button class="btn btn-xs btn-danger btn-flat" 
                                          data-toggle="modal" 
                                          data-target="#delete"
                                          value = "{{$hh -> HouseID}}"
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


<!--MODAL-->



        <div class="modal fade" id="edit">
          <div class="modal-dialog">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
                <div class="form-horizontal" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Household</h4>
              </div>
              <!-- modal content -->
              <div class="modal-body">
              <div id="Messages1"></div>
              <div id="SuccessBox1"></div>
            
                  <div class="box-body">

                    <div class="form-group">
                      <label  class="col-sm-3 control-label">ID:</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id = "txt1" name = "txt1" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-3 control-label">House Owner:</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" id = "txtl" placeholder="Last Name" name = "txt2" required="required">
                      </div>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" id = "txtf" placeholder="First Name" name = "txt2" required="required">
                      </div>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" id = "txtm" placeholder="Middle Name" name = "txt2" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">House/Building/Unit No:</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id = "etxthouse" name = "txt3" placeholder = "House No." required="required">
                      </div>
                    </div>
                    <div class="form-group" id="eSub">
                      <label class="col-sm-3 control-label">Subdivision:</label>

                      <div class="col-sm-9">
                        <select  class="form-control select2" id = "etxtsub" name = "txt3" placeholder = "Subdivision" style="width:100%" required="required">
                           <option selected="" disabled="">Select Subdivision</option>
   
                        </select>
                      </div>
                    </div>
                    <div class="form-group"  id="eComp">
                      <label class="col-sm-3 control-label">Compound/Tenament:</label>

                      <div class="col-sm-9">
                        <select class="form-control select2" id = "etxtcomp" name = "txt3" required="required" style="width:100%">
                             <option selected="" disabled="">Select Compound</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group"  id="eStreet">
                      <label class="col-sm-3 control-label">Street:</label>

                      <div class="col-sm-9">
                        <select class="form-control select2" id = "etxtstreet" name = "txt3" required="required" style="width:100%">
                            <option selected="" disabled="">Select Street</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Zone No:</label>

                      <div class="col-sm-9">
                        <input type="number" class="form-control" id = "etxtzone" name = "txt3" placeholder = "House No." required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-3 control-label">House Type:</label>

                      <div class="col-sm-9">
                        <select class="form-control"
                                  id = "txt6"
                                  name = "txt6"
                                  required="required">
                              <option>Residential</option>
                              <option>Commercial/Business</option>
                              <option>Dormitory</option>
                              <option>Apartment/Boarding House</option>
                          </select>
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
                <h4 class="modal-title">Are you sure you want to DELETE this record?</h4>
              </div>
              
              <!-- modal content -->
              <div class="modal-body">
            
                   <div class="box-body">

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">ID:</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id = "dtxt1" name = "dtxt1" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">House Owner:</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id = "dtxt2" name = "dtxt2" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Address:</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id = "dtxt3" name = "dtxt3" readonly>
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">House Type:</label>

                      <div class="col-sm-9">
                       <input type="text" class="form-control" id = "dtxt4" name = "dtxt4" readonly>
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

<!--END OF MODAL-->

        
               <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

               <script type="text/javascript">


                     
                 
               </script>
              <script type="text/javascript">
                $(document).ready(function(){

                   $(".select2").select2();

                  var tbl = $('#example1').DataTable();

                    $.ajax({
                      type: 'POST',
                      url: 'getAddress',
                      dataType: 'JSON',
                      success: function(data){
                        if(data.add[0].isHouse == '0') {
                          $('#divHouse').hide();
                        }else $('#divHouse').show();

                        if(data.add[0].isSub == '0') {
                          $('#divSub').hide();
                          $('#eSub').hide();
                        }else {
                          $('#divSub').show();
                          $('#eSub').show();
                          }
                         if(data.add[0].isComp == '0') {
                          $('#divComp').hide();
                          $('#eComp').hide();
                        }else {
                          $('#divComp').show();
                          $('#eComp').show();
                          }

                         if(data.add[0].isStreet == '0') {
                          $('#divStreet').hide();
                        }else $('#divStreet').show();

                         if(data.add[0].isZone == '0') {
                          $('#divZone').hide();
                        }else $('#divZone').show();

                      }
                    });

                  //$('#formHousehold').validate();

                  $('#btnSubmit').click(function(e){
                    $('#Messages').html('');


                    e.preventDefault();
                    var hhlast = $('#txtLast').val();
                    var hhfirst = $('#txtFirst').val();
                    var hhmid = $('#txtMid').val();
                    var hhaddno = $('#txtAddNo').val();
                    var hhcomp = $('#txtComp').val();
                    var hhsub = $('#txtSub').val();
                    var hhstreet = $('#txtStreet').val();
                    var hhzone = $('#txtZone').val();
                    var hhtype = $('#txtType').val();
                    

                    $.ajax({
                      type: 'POST',
                      url: 'addHousehold',
                      data: {hhlast:hhlast,
                              hhfirst:hhfirst,
                              hhmid:hhmid, 
                              hhaddno: hhaddno,
                              hhsub: hhsub,
                              hhcomp: hhcomp,
                              hhstreet: hhstreet,
                              hhzone: hhzone,
                              hhtype: hhtype},
                      dataType: 'JSON',
                      success: function(data){
                        window.location.href = "{{URL::to('householdDetails')}}";

                      if (data.messages != null) {
                        //alert(JSON.stringify(data.messages));
                        

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
                    $('#txtFirst').val("");
                    $('#txtLast').val("");
                    $('#txtMid').val("");
                    $('#txtAddNo').val("");
                    $('#txtStreet').val("");
                    $('#txtZone').val("");
                    $('#txtType').val("");
                  });



                    $('#btnUpdate').click(function(e){
                      $('#Messages1').html('');
                    e.preventDefault();
                    var txt1 = $('#txt1').val();
                    var txtl = $('#txtl').val();
                    var txtf = $('#txtf').val();
                    var txtm = $('#txtm').val();
                    var etxtcomp = $('#etxtcomp').val();
                    var etxthouse = $('#etxthouse').val();
                    var etxtsub = $('#etxtsub').val();
                    var etxtstreet = $('#etxtstreet').val();
                    var etxtzone = $('#etxtzone').val();
                    var txt6 = $('#txt6').val();


                    $.ajax({
                      type: 'POST',
                      url: 'updateHousehold',
                      data: {txt1: txt1, 
                              txtl: txtl,
                              txtf: txtf,
                              txtm: txtm,
                              etxthouse: etxthouse,
                              etxtstreet: etxtstreet,
                              etxtzone: etxtzone,
                              etxtsub: etxtsub,
                              etxtcomp: etxtcomp,
                              txt6: txt6},
                      dataType: 'JSON',
                      success: function(data){

                        //alert(JSON.stringify(data));
                          window.location.href = "{{URL::to('householdDetails')}}";

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
                      url: 'deleteHousehold',
                      data: {txt1: txt1},
                      dataType: 'JSON',
                     success: function(data){
                         window.location.href = "{{URL::to('householdDetails')}}";
                      },
                      error: function(request, error){
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
                      url: 'getInfo',
                      data: {id: x.value},
                      dataType: 'JSON',
                      success: function(data){

                      $('#etxtstreet').html("");
                      $('#etxtcomp').html("");
                      $('#etxtsub').html("");
                      $.each(data.street, function(key, val){
                        $('#etxtstreet').append('<option value = '+val.StreetID+'>'+val.StreetName+'</option>');
                      });

                      $.each(data.comp, function(key, val){
                        $('#etxtcomp').append('<option value = '+val.compID+'>'+val.compName+'</option>');
                      });
                      $.each(data.sub, function(key, val){
                        $('#etxtsub').append('<option value = '+val.subdivisionID+'>'+val.subdivisionName+'</option>');
                      });

                        $.each(data.house, function(key, val){
                           $('#txt1').val(val.HouseID);
                           $('#txtl').val(val.HLastName);
                           $('#txtf').val(val.HFirstName);
                           $('#txtm').val(val.HMidName);
                           $('#etxthouse').val(val.HouseAddNo);
                           $('#etxtcomp').val(val.compName);
                           $('#etxtsub').val(val.subdivisionName);
                           $('#etxtstreet').val(val.HouseStreet);
                           $('#etxtzone').val(val.HouseZone);
                           $('#txt6').val(val.HouseType);
                        });


                      }
                    });
                }

                function modalDelete(x){


                  $.ajax({
                      type: 'POST',
                      url: 'getInfo',
                      data: {id: x.value},
                      dataType: 'JSON',
                      success: function(data){
                        $.each(data.house, function(key, val){
                          $('#dtxt1').val(val.HouseID);
                          $('#dtxt2').val(val.HFirstName +" "+ val.HMidName+" "+val.HLastName);
                          $('#dtxt3').val(val.HouseAddNo + " " + val.HouseStreet + "Street, " + "Zone" + val.HouseZone);
                          $('#dtxt4').val(val.HouseType);
                        });


                      }
                    });


                }

              </script>

          </section><!--content -->
@stop
