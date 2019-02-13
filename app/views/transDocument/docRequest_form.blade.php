@extends('layouts.master')

@section('content')


	
		<section class="content-header">
            <h1>
              Transaction <small>Regular Documents</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'TransactionMenu' ?>"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li>Documents</li>
              <li class="active">Regular Documents</li>
            </ol>
          </section>

         <section class = "content">

		<div class="row">
              
              <!--left side-->
            <form method = "POST" action="{{URL::to('addDocumentRequest')}}" onsubmit="return false" enctype="multipart/form-data" id = "addDocs">
              <div class="col-md-5">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title"><span class="label label-info">Requestor Information</span></h3>

                  </div><!-- /.box-header -->
                  <!-- form start  <form method = "POST" action="{{URL::to('addOfficialPosition')}}"> style="height:500px; overflow-y:scroll"-->
                  
                    <div class="box-body">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Request ID</label>
                        
                        <input type="text" 
                            class="form-control" 
                            id = "txtRequestID"
                            name = "txtRequestID"
                            readonly=""
                            value= "{{$reqID[0] -> RequestID}}">
                        
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label></label>
                      <div class="radio" >
                          <label><input type="radio" class="radiobtn" name="radioDoc" id="radioDoc" value="1" checked>Resident</label>&nbsp;&nbsp;&nbsp;
                          <label><input type="radio" class="radiobtn" name="radioDoc" id="radioDoc" value="2" >Non-resident</label>
                      </div>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name of Requestor</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtRequestor"
                            name = "txtRequestor"
                            required="">
                     
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" 
                            class="form-control" 
                            id = "txtEmail"
                            name = "txtEmail"
                            required="">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group" id="ResRequested">
                        <label for="exampleInputEmail1">Requested For</label>
                        <select
                            class="form-control" 
                            id = "txtRequestedFor"
                            name = "txtRequestedFor">
                            <option disabled="" selected="">Select Name</option>
                            @foreach($rname as $rn)
                              <option value ="{{$rn->ResidentID}}">{{$rn->LastName}}, {{$rn->FirstName}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group" id="NResRequested" hidden>
                        <label for="exampleInputEmail1">Requested For</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtNRequestedFor"
                            name = "txtNRequestedFor">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group" id="address">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtAddress"
                            name = "txtAddress"
                            disabled="" 
                            required="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group" id="birthdate">
                        <label for="exampleInputEmail1">Birthdate</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtBirthdate"
                            name = "txtBirthdate"
                            readonly="">
                      </div>

                       <div class="form-group" id="NBirthdate" hidden>
                        <label>Birthdate</label>
                        <input type="date" 
                            class="form-control" 
                            id = "txtNBirthdate"
                            name = "txtNBirthdate">
                      </div>

                    </div>

                    <div class="col-md-6">
                      <div class="form-group" id="gender">
                        <label for="exampleInputEmail1">Gender</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtGender"
                            name = "txtGender"
                            readonly="">
                      </div>

                      <div class="form-group" id="NGender" hidden>
                        <label>Gender</label>
                        <select
                               class="form-control"
                                id = "txtNGender"
                                name = "txtNGender">
                                  <option value ="Male">Male</option>
                                  <option value ="Female">Female</option>
                        </select>
                      </div>

                    </div>
                  </div>
                     
                    </div><!-- /.box-body -->

                    
                  
                </div><!--</form> /.box -->
                
              </div><!-- /.col -->

              <!--right side-->
              <div class="col-md-7">

                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title"><span class="label label-info">Available Documents</span></h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="doculist" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Document</th>
                          <th>Fee</th>
                          <th>Purpose</th>
                        </tr>
                      </thead>
                      <tbody id="docubody">
                        @foreach($docs as $d)
                          <tr>
                            <td align="middle"><input type = "checkbox" name = "checkDoc_{{$d->DocumentID}}" id = "checkDoc_{{$d->DocumentID}}" value = "{{$d->DocumentID}}"></td>
                            <td>{{ $d -> DocumentName }}</td>
                            <td>{{ $d -> DocumentFee }}</td>
                            <td><input type = "text" class = "form-control" name = "purpose_{{$d->DocumentID}}" id = "purpose_{{$d->DocumentID}}"></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="box-footer">
                    <center><button type = "submit" class="btn btn-info btn-flat" id = "btnSubmit">Submit</button></center>
                  </div>
                </div>
                
              </div>
              </form>
            </div><!--row-->



            <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

            <script type = "text/javascript">

            $(document).ready(function(){

              var tbl = $('#doculist tbody');
              var rID = parseInt($('#txtRequestID').val())+1;
              $('#txtRequestID').val(rID);

            $('#addDocs').submit(function(){
              $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){


                    alert('Success! Your request has been saved.');
                    window.location.href = "{{URL::to('documentRequest')}}";
                  
                }
              }).error(function(ts){
                alert(ts.responseText);
              });
            });


              $(".radiobtn").change(function(e) {  
          
               if ($("input[name=radioDoc]:checked").val() == "1") { 
                   $("#ResRequested").show(); 
                   $("#NBirthdate").hide(); 
                   $("#NGender").hide(); 
                   $("#NResRequested").hide();
                   $("#birthdate").show(); 
                   $("#gender").show();  
                   $("#txtAddress").attr("disabled", "disabled");

                   $.ajax({
                    type: 'POST',
                    url: 'getDocResident',
                    dataType: 'JSON',
                    success: function(data){

                       tbl.empty();
                        $.each(data.docs, function(key, val){
                          tbl.append('<tr><td align="middle"><input type = "checkbox" name = "checkDoc_'+val.DocumentID+'" id = "checkDoc_'+val.DocumentID+'" value = "'+val.DocumentID+'"></td><td>'+val.DocumentName+'</td><td>'+val.DocumentFee+'</td> <td><input type = "text" class = "form-control" name = "purpose_'+val.DocumentID+'" id = "purpose_'+val.DocumentID+'"></td> </tr>')
                        });
                      
                    
                    },
                    error: function (request, error) {
                          console.log(arguments);
                          alert(" Can't do because: " + error);
                        }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });


               } else { 

                   $("#ResRequested").hide(); 
                   $("#NBirthdate").show(); 
                   $("#NGender").show(); 
                   $("#NResRequested").show();
                   $("#birthdate").hide(); 
                   $("#gender").hide();  
                   $("#txtAddress").removeAttr("disabled");
                   $("#txtAddress").val("");

                   $.ajax({
                    type: 'POST',
                    url: 'getDocNonResident',
                    dataType: 'JSON',
                    success: function(data){

                     
                      tbl.empty();
                        $.each(data.docs, function(key, val){
                          tbl.append('<tr><td align="middle"><input type = "checkbox" name = "checkDoc_'+val.DocumentID+'" id = "checkDoc_'+val.DocumentID+'" value = "'+val.DocumentID+'"></td><td>'+val.DocumentName+'</td><td>'+val.DocumentFee+'</td> <td><input type = "text" class = "form-control" name = "purpose_'+val.DocumentID+'" id = "purpose_'+val.DocumentID+'"></td> </tr>')
                        });
                      
                    
                    },
                    error: function (request, error) {
                          console.log(arguments);
                          alert(" Can't do because: " + error);
                        }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });

                 }



                
                 });


              $('#txtRequestedFor').select2().change(function(){
                $.ajax({
                  type: 'POST',
                  url: 'getDocRequestedForInfo',
                  data: {resID: $('#txtRequestedFor').val()},
                  dataType: 'JSON',
                  success: function(data){

                    $('#txtAddress').val(data.info[0].HouseAddNo +' '+ data.info[0].HouseStreet);
                    $('#txtBirthdate').val(data.info[0].Birthdate);
                    $('#txtGender').val(data.info[0].Gender);
                    $('#txtRStatus').val(data.info[0].ResidencyStat);
                    $('#txtReligion').val(data.info[0].Religion);
                    $('#txtCStatus').val(data.info[0].CivilStat);
                    
                  
                  },
                  error: function (request, error) {
                        console.log(arguments);
                        alert(" Can't do because: " + error);
                      }
                }).error(function(ts){
                  alert(ts.responseText);
                });
              });






            });

            
              


            </script>

    </section>



@stop