@extends('layouts.master')

@section('content')
    <section class="content-header">
   
      <h1>
        Barangay Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Utilities</li>
        <li class="active">Barangay Details</li>
      </ol>
    </section>


     <!-- Main content -->
    <section class="content"> 
       <div id="SuccessBox"></div>
      <div class="row">
        <div class="col-md-6">

          <!-- Images -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><span class="label label-info">Barangay Details</span></h3>
             </div>
              <div class="box-body box-profile">
                   
                    <form role="form" method="POST" action = "{{URL::to('updateLogo')}}" enctype="multipart/form-data" id="detailsForm">
                      <div class="row">
                       <div style="margin-top: 15px" class="col-md-6">
                          <label>BARANGAY LOGO 1 (Main)</label>
                          <img width="100%" 
                                 id="prelog1"
                                 name="prelog1"
                                 src = "{{ asset ('bower_components/admin-lte/dist/images/') . '/' . Session::get('logo1')}} ">

                          <input type="file" 
                                 class="form-control" 
                                 id="txtLogo1"
                                 name="txtLogo1"
                                 onchange="readURL(this)">
                        </div>

                         <div style="margin-top: 15px" class="col-md-6">
                          <label> BARANGAY LOGO 2 </label>
                          <img width="100%" 
                                 id="prelog2"
                                 name="prelog2"
                                 src = "{{ asset ('bower_components/admin-lte/dist/images/') . '/' . Session::get('logo2')}} ">

                          <input type="file" 
                                 class="form-control" 
                                 id="txtLogo2"
                                 name="txtLogo2"
                                 onchange="readURL1(this)">
                        </div>
                        </div><br><br>
                        
             

               @foreach($bryDetail as $bryDetail)
                      <div class="col-md-12">
                        <div class="form-group">
                          <label> Barangay Name:</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBrgyName" 
                                 name="txtBrgyName" 
                                 value= "{{$bryDetail -> brgyName}}"
                                 required="required">
                         </div>
                      </div>

                      <div class="col-md-12">
                         <div class="form-group">
                          <label> Barangay Address:</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBrgyAdd"
                                 name="txtBrgyAdd" 
                                 value= "{{$bryDetail -> brgyAddress}}"
                                 placeholder="Street">
                         </div>
                      </div>  

                      <div class="col-md-6">
                         <div class="form-group">
                          <label> Telephone No: &nbsp;</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBrgyTel"
                                 name="txtBrgyTel"
                                 value= "{{$bryDetail -> brgyTelNo}}" >
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label> Mobile No: &nbsp;</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtBrgyMobile" 
                                 name="txtBrgyMobile"
                                 value= "{{$bryDetail -> brgyMobileNo}}"  >
                        </div>
                      </div>

                       <div class="col-md-12">
                        <div class="form-group">
                          <label> Email Address: &nbsp;</label>
                          <input type="email" 
                                 class="form-control" 
                                 id="txtBrgyEmail" 
                                 name="txtBrgyEmail"
                                 value= "{{$bryDetail -> brgyEmail}}"  >
                        </div>
                      </div>

                          <div class="col-md-12 form-inline">
                            <hr class="style2">
                          </div>
                        @endforeach 
                    
                        <div class="row">
                          <center><button type="submit" class="btn btn-primary btn-flat">Save Changes</button></center>
                        </div>
                 </form>
            </div> <!-- /.box-body -->

              
                    <!-- <div style="padding-bottom: 15px;">
                      <center>
                           <button type="submit" id= "btnSave" name= "btnSave" class="btn btn-primary btn-flat">Save Changes</button>
                            <button type="submit" id= "btnCancel" name= "btnCancel" class="btn btn-default btn-flat">Cancel</button>
                       </center>
                    </div> -->

          </div><!-- /.box -->
        </div><!-- col-md-6 -->
      


          <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title"><span class="label label-info">Address Fields Settings</span></h3>
                </div>
           			  <div class="box-body box-profile">

                  
                 
                  
                  <div class="col-md-12">
                    <table  style="border-spacing: 17px;border-collapse: separate;">
                      <tbody>
                        <tr>
                          <td>House/Unit/Building No.</td>
                          <td><input type="checkbox" class="check" name="checkHouse" id="checkHouse"></td>
                        </tr>
                        <tr>
                          <td>Subdivision</td>
                          <td><input type="checkbox" class="check" name="checkSub" id="checkSub"></td>
                          <td width="100px"><button class="btn btn-sm btn-block  btn-flat" id="btnAddSub" data-toggle="modal" data-target="#subdivision" disabled=""><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;ADD</button></td>
                        </tr>
                        <tr>
                          <td>Compound/Tenament</td>
                          <td><input type="checkbox" class="check" name="checkComp" id="checkComp"></td>
                          <td><button class="btn btn-sm btn-block  btn-flat" id="btnAddComp" data-toggle="modal" data-target="#compound"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;ADD</button></td>
                        </tr>
                        <tr>
                          <td>Street</td>
                          <td><input type="checkbox" class="check" name="checkSt" id="checkSt"></td>
                          <td><button class="btn btn-sm btn-block btn-flat" id="btnAddSt" data-toggle="modal" data-target="#street"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;ADD</button></td>
                        </tr>
                        <tr>
                          <td>Purok/Zone</td>
                          <td><input type="checkbox" class="check" name="checkZone" id="checkZone"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="row">
                          <center><button type="submit" class="btn btn-info btn-flat" id="btnAddress">Save Changes</button></center>
                        </div>

   
            </div>
        </div>
	  </div> <!-- /.row -->
    </div>


                <!-- Modal STREET -->
            <div id="street" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Street</h4>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <input type="text" 
                                     class="form-control" 
                                     id="txtModalStreet"
                                     placeholder="Street"
                                     required="required">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <button class="btn btn-sm btn-success btn-flat" id="btnStreet"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                    </div>

                      

                      
                       <table id="tblstreet" class="table table-bordered table-striped">
                      
                      <tbody>

                      @foreach($stF as $id)
                          <tr>
                            <td><center>{{ $id -> StreetName }}</center></td>
                              <td><center>
                                 
                                  <button class="btn btn-sm btn-danger btn-flat"
                                          id="btnDeleteSt"
                                          name="btnDeleteSt"
                                          value='{{ $id -> StreetID }}'
                                          onclick="modalStDelete(this)">
                                            <i class="fa fa-remove"></i>
                                  </button>
                                  </center></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  
                  </div>
                </div>
              </div>
            </div> <!-- mODAL -->





      <!-- Modal SUBDIVISION-->
            <div id="subdivision" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Subdivision</h4>
                  </div>
                  <div class="modal-body">

                      <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <input type="text" 
                                     class="form-control" 
                                     id="txtModalSub"
                                     placeholder="Subdivision"
                                     required="required">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <button class="btn btn-sm btn-success btn-flat" id="btnSub"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                    </div>

                        <table id="tblsubdivision" class="table table-bordered table-striped">
                      
                      <tbody>

                      @foreach($subD as $sub)
                          <tr>
                            <td><center>{{ $sub -> subdivisionName  }}</center></td>
                            <td><center>
                            
                                  <button class="btn btn-sm btn-danger btn-flat"
                                          id="btnDeleteSub"
                                          name="btnDeleteSub"
                                          value='{{ $sub ->  subdivisionID }}'
                                          onclick="modalSubDelete(this)">
                                            <i class="fa fa-remove"></i>
                                  </button>
                                  </center></td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>

              </div>
            </div> <!-- Modal -->





      <!-- Modal SUBDIVISION-->
            <div id="compound" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Compound</h4>
                  </div>
                  <div class="modal-body">

                      <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <input type="text" 
                                     class="form-control" 
                                     id="txtModalComp"
                                     placeholder="Compound"
                                     required="required">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <button class="btn btn-sm btn-success btn-flat" id="btnComp"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                    </div>

                        <table id="tblcomp" class="table table-bordered table-striped">
                      
                      <tbody>

                      @foreach($stComp as $comp)
                          <tr>
                            <td><center>{{ $comp -> compName  }}</center></td>
                            <td><center>
                            
                                  <button class="btn btn-sm btn-danger btn-flat"
                                          id="btnDeleteComp"
                                          name="btnDeleteComp"
                                          value='{{ $comp ->  compID }}'
                                          onclick="modalCompDelete(this)">
                                            <i class="fa fa-remove"></i>
                                  </button>
                                  </center></td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>

              </div>
            </div> <!-- Modal -->




  <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

        <script type="text/javascript">


                function readURL(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {

                          $('#prelog1').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#prelog1').removeAttr('src');
                  }
                }

                 function readURL1(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {
                          $('#prelog2').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#prelog2').removeAttr('src');
                  }
                }


                function modalStDelete(x){

                  $.ajax({
                      type: 'POST',
                      url: 'deleteStreet',
                      data: {
                              id: x.value, 
                            },
                      success: function(data){
                         $('#tblstreet tbody').html('');

                        $.each(data.dSt, function(key, val){
                        $('#tblstreet tbody').append('<tr><td><center>'+val.StreetName+'</center></td> <td><center> <button class="btn btn-sm btn-danger btn-flat" id="btnDeleteSt" onclick="modalStDelete('+val.StreetID+')"> <i class="fa fa-remove"></i> </button> </center></td></tr>');
                          });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });


                }

                function modalSubDelete(x){

                  $.ajax({
                      type: 'POST',
                      url: 'deleteSubdivision',
                      data: {
                              id: x.value, 
                            },
                      success: function(data){
                         $('#tblsubdivision tbody').html('');

                        $.each(data.dSub, function(key, val){
                       $('#tblsubdivision tbody').append('<tr><td><center>'+val.subdivisionName+'</center></td> <td><center> <button class="btn btn-sm btn-danger btn-flat" id="btnDeleteSt" onclick="modalSubDelete('+val.subdivisionID+')"> <i class="fa fa-remove"></i> </button> </center></td></tr>');
                          });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });


                }

                function modalCompDelete(x){

                  $.ajax({
                      type: 'POST',
                      url: 'deleteComp',
                      data: {
                              id: x.value, 
                            },
                      success: function(data){
                         $('#tblcomp tbody').html('');

                        $.each(data.dComp, function(key, val){
                       $('#tblcomp tbody').append('<tr><td><center>'+val.compName+'</center></td> <td><center> <button class="btn btn-sm btn-danger btn-flat" id="btnDeleteSt" onclick="modalCompDelete('+val.compID+')"> <i class="fa fa-remove"></i> </button> </center></td></tr>');
                          });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });


                }
      
          
        

          $(document).ready(function() {

                      $.ajax({
                      type: 'POST',
                      url: 'getCheck',
                      success: function(data){
                        if(data.bd[0].isHouse=='0'){
                          $('#checkHouse').bootstrapSwitch('state' , false);
                        } else $('#checkHouse').bootstrapSwitch('state' , true);

                         if(data.bd[0].isZone == "0"){
                          $('#checkZone').bootstrapSwitch('state' , false);
                        } else $('#checkZone').bootstrapSwitch('state' , true);

                        //street
                         if(data.bd[0].isStreet == "0"){

                          $('#checkSt').bootstrapSwitch('state' , false);
                           $('#btnAddSt').attr('disabled', 'disabled');
                        } else {
                        $('#checkSt').bootstrapSwitch('state' , true);
                         $('#btnAddSt').removeAttr('disabled');
                        }
                        //comp
                         if(data.bd[0].isComp == "0"){

                          $('#checkComp').bootstrapSwitch('state' , false);
                          $('#btnAddComp').attr('disabled', 'disabled');
                        } else {
                        $('#checkComp').bootstrapSwitch('state' , true);
                        $('#btnAddComp').removeAttr('disabled');
                         }
                        //sub
                         if(data.bd[0].isSub == "0"){

                          $('#checkSub').bootstrapSwitch('state' , false);
                          $('#btnAddSub').attr('disabled', 'disabled');

                        } else {
                                $('#checkSub').bootstrapSwitch('state' , true);
                                $('#btnAddSub').removeAttr('disabled');
                              }
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });


            $(".check").bootstrapSwitch();

            $('input[name="checkSub"]').on('switchChange.bootstrapSwitch', function(event, state) {
                if ($(this).is(':checked')) {
                    $('#btnAddSub').removeAttr('disabled');
                } else {
                    $('#btnAddSub').attr('disabled', 'disabled');
                }
              });

            $('input[name="checkComp"]').on('switchChange.bootstrapSwitch', function(event, state) {
                if ($(this).is(':checked')) {
                    $('#btnAddComp').removeAttr('disabled');
                } else {
                    $('#btnAddComp').attr('disabled', 'disabled');
                }
              });

            $('input[name="checkSt"]').on('switchChange.bootstrapSwitch', function(event, state) {
                if ($(this).is(':checked')) {
                    $('#btnAddSt').removeAttr('disabled');
                } else {
                    $('#btnAddSt').attr('disabled', 'disabled');
                }
              });

            $('#btnStreet').click(function(e){

              var street = $('#txtModalStreet').val();
                    
                   $.ajax({
                      type: 'POST',
                      url: 'addStreet',
                      data: {
                              street: street, 
                            },
                      success: function(data){
                         $('#tblstreet tbody').html('');

                        $.each(data.aS, function(key, val){
                        $('#tblstreet tbody').append('<tr><td><center>'+val.StreetName+'</center></td> <td><center> <button class="btn btn-sm btn-danger btn-flat" id="btnDeleteSt" onclick="modalStDelete('+val.StreetID+')"> <i class="fa fa-remove"></i> </button> </center></td></tr>');
                          });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });
            });




             $('#btnSub').click(function(e){

              var subdiv = $('#txtModalSub').val();
                    
                   $.ajax({
                      type: 'POST',
                      url: 'addSubdivision',
                      data: {
                              subdiv: subdiv, 
                            },
                      success: function(data){
                        $('#tblsubdivision tbody').html('');

                        $.each(data.aSub, function(key, val){
                        $('#tblsubdivision tbody').append('<tr><td><center>'+val.subdivisionName+'</center></td> <td><center> <button class="btn btn-sm btn-danger btn-flat" id="btnDeleteSt" onclick="modalSubDelete('+val.subdivisionID+')"> <i class="fa fa-remove"></i> </button> </center></td></tr>');
                          });

                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });
                 });

              $('#btnComp').click(function(e){

              var comp = $('#txtModalComp').val();
                    
                   $.ajax({
                      type: 'POST',
                      url: 'addComp',
                      data: {
                              comp: comp, 
                            },
                      success: function(data){
                        $('#tblcomp tbody').html('');

                        $.each(data.aComp, function(key, val){
                        $('#tblcomp tbody').append('<tr><td><center>'+val.compName+'</center></td> <td><center> <button class="btn btn-sm btn-danger btn-flat" id="btnDeleteSt" onclick="modalCompDelete('+val.compID+')"> <i class="fa fa-remove"></i> </button> </center></td></tr>');
                          });

                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });
                 });

              $('#btnAddress').click(function(){
                  
                  var houseno;
                  var comp;
                  var sub;
                  var street;
                  var zone;

                   if ($('#checkHouse').is(":checked"))
                    {
                      houseno = '1';
                    } else houseno = '0';

                    if ($('#checkComp').is(":checked"))
                    {
                      comp = '1';
                    } else comp = '0';

                    if ($('#checkSub').is(":checked"))
                    {
                      sub = '1';
                    } else sub = '0';

                    if ($('#checkSt').is(":checked"))
                    {
                      street = '1';
                    } else street = '0';

                    if ($('#checkZone').is(":checked"))
                    {
                      zone = '1';
                    } else zone = '0';


                    $.ajax({
                      type: 'POST',
                      url: 'updateUAdd',
                      data: {houseno: houseno,
                            comp: comp,
                            sub: sub,
                            street: street,
                              zone: zone},
                      dataType: 'JSON',
                      success: function(data){
                         $('#SuccessBox').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>Record has been successfully updated!</div>');
                          $('#SuccessBox').fadeIn().delay(1000).fadeOut();  
                        
                      }
                    });

                  });

             

             });//document
        </script>

	</section>

@endsection