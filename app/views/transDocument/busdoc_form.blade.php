@extends('layouts.master')

@section('content')


  
    <section class="content-header">
            <h1>
              Transaction <small>Business Documents</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'TransactionMenu' ?>"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li>Documents</li>
              <li class="active">Business Documents</li>
            </ol>
          </section>

         <section class = "content">

    <div class="row">
              
              <!--left side-->
            <form method = "POST" action="{{URL::to('addBusDocumentRequest')}}" onsubmit="return false" enctype="multipart/form-data" id = "addDocs">
              <div class="col-md-5">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title"><span class="label label-info">Requestor Details</span></h3>

                  </div><!-- /.box-header -->
                  <!-- form start  <form method = "POST" action="{{URL::to('addOfficialPosition')}}"> style="height:500px; overflow-y:scroll"-->
                  
                    <div class="box-body">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Request ID</label>
                        @foreach($reqID as $reqID)
                          <input type="text" 
                              class="form-control" 
                              id = "txtRequestID"
                              name = "txtRequestID"
                              readonly=""
                              value= "{{$reqID -> BusRequestID}}">
                          @endforeach
                       
                      </div>
                    </div>

                    <div class="col-md-6">
                          <label>Permit Type</label>
                          <div class="radio" >
                          <label><input type="radio" class="radiobtn" name="radioBus" id="radioBus" value="new" checked>New</label>&nbsp;&nbsp;&nbsp;
                          <label><input type="radio" class="radiobtn" name="radioBus" id="radioBus" value="renew" >Renew</label>
                          </div>
                        </div>
                  </div>
                
                  <div class="row">
                    <div class="col-md-6">
                     
                        <label for="exampleInputEmail1">Name of Requestor</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtRequestor"
                            name = "txtRequestor">
                     
                     
                    </div>

                    <div class="col-md-6">
                     
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" 
                            class="form-control" 
                            id = "txtREmail"
                            name = "txtREmail">
                      
                    </div>
                  </div>
                  <br>
                  
                  <h4 class="box-title"><span class="label label-info">Business Details</span></h4>
                  <hr>

                  <div class="row">
                   <div class="col-md-6">
                          <label>Business Name</label>
                          <br>
                          <div  id="formAutosearch" hidden>
                            <select
                               class="form-control select2" style="width: 100%;"
                                id = "txtRequestedFor"
                                name = "txtRequestedFor">

                                <option disabled="" selected="">Select Business</option>
                                @foreach($bname as $bn)
                                  <option value ="{{$bn->BusinessID}}">{{$bn->BusinessName}}</option>
                                @endforeach
                              
                            </select>
                          </div>

                          <div id="formName">
                            <input type="text" 
                              class="form-control" 
                              id = "txtNewBusName"
                              name = "txtNewBusName">
                          </div>
                        </div>

                   <div class="col-md-6">
                        <label>Owner</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtOwner"
                            name = "txtOwner"
                            >
                        </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                          <label>Address</label>
                          <input type="text" 
                              class="form-control" 
                              id = "txtAddress"
                              name = "txtAddress"
                              >
                        </div>

                    <div class="col-md-6">
                        <label>Type</label>
                        <div id="formSelect">
                          <select
                               class="form-control select2" style="width: 100%;"
                                id = "txtBusType"
                                name = "txtBusType">
                                @foreach($type as $type)
                                  <option value ="{{$type->BusinessTypeID}}">{{$type->BusinessType}}</option>
                                @endforeach
                               
                            </select>
                        </div>


                        <div id="formType" hidden>
                          <input type="text" 
                              class="form-control" 
                              id = "txtType"
                              name = "txtType"
                              >
                        </div>
                    </div>
                  </div>


                  <div class="row">
                      <div class="col-md-6">
                          <label>Email Address</label>
                          <input type="text" 
                              class="form-control" 
                              id = "txtEmail"
                              name = "txtEmail"
                              >
                      </div>


                      <div class="col-md-6">
                        <label>Mobile No.</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtMobile"
                            name = "txtMobile"
                            >
                      </div>
                  </div>

                  <div class="row">
                        <div class="col-md-12">
                          <label>Estimated Monthly Income (pesos)</label>
                          <input type="number" 
                              class="form-control" 
                              id = "txtIncome"
                              name = "txtIncome"
                              >
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
                    <table id="" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Document</th>
                          <th>Fee</th>
                        </tr>
                      </thead>
                      <tbody id="docubody">
                        @foreach($docs as $d)
                          <tr>
                            <td align="middle"><input type = "radio" name = "radioDoc" id = "checkDoc_{{$d->DocumentID}}" value = "{{$d->DocumentID}}"></td>
                            <td>{{ $d -> DocumentName }}</td>
                            <td>{{ $d -> DocumentFee }}</td>

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
                    window.location.href = "{{URL::to('busdocumentRequest')}}";
                  
                }
              }).error(function(ts){
                alert(ts.responseText);
              });
            });


              $(".radiobtn").change(function(e) {  
          
               if ($("input[name=radioBus]:checked").val() == "new") { 
                  $("#formName").show(); 
                  $("#formSelect").show(); 
                  $("#formType").hide(); 
                  $("#txtAddress").removeAttr("disabled");  
                  $("#txtOwner").removeAttr("disabled"); 
                  $("#txtEmail").removeAttr("disabled"); 
                  $("#txtMobile").removeAttr("disabled"); 
                  $("#txtIncome").removeAttr("disabled"); 

                  $("#formAutosearch").hide();
                   $("#rdateest").hide(); 
                 $("#dateest").show(); 

               } else { 

                  $("#formAutosearch").show();
                  $("#formType").show();
                 $("#formName").hide(); 
                 $("#formSelect").hide(); 
                 $("#txtType").attr("disabled", "disabled");  
                 $("#txtAddress").attr("disabled", "disabled");  
                 $("#txtOwner").attr("disabled", "disabled"); 
                  $("#txtEmail").attr("disabled", "disabled"); 
                  $("#txtMobile").attr("disabled", "disabled"); 
                 $("#txtIncome").attr("disabled", "disabled"); 
                 $("#rdateest").show(); 
                 $("#dateest").hide(); 
                 }

                 });


              $('#txtRequestedFor').select2().change(function(){

                $.ajax({
                  type: 'POST',
                  url: 'busgetDocRequestedForInfo',
                  data: {busID: $('#txtRequestedFor').val()},
                  dataType: 'JSON',
                  success: function(data){
                    
                    $.each(data.info, function(key, val){
                      alert('hahaha');
                      $('#txtOwner').val(val.BusinessOwnerName);
                      $('#txtAddress').val(val.BusinessAddress);
                      $('#txtType').val(val.BusinessType);
                      $('#txtEmail').val(val.BusEmail);
                      $('#txtMobile').val(val.BusContactNo);
                      $('#txtIncome').val(val.BusIncome);
                    });

                  
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