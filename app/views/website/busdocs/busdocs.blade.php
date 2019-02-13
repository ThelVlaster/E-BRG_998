@extends('layouts_web.master')

@section('content')



<section class="content-header">
<br><br>

<ol class="breadcrumb" align="right">
              <li><a href="<?php echo 'request' ?>"> iRequest</a></li>
              <li class="active">Business Documents</li>
            </ol>

</section>


<section class="content">
<div id="SuccessBox"></div>

  <div class="col-md-1">
      </div>
      <div class="well">
          <h3 style="font-family: Montserrat"><b>Step 2:</b> Select Business Document/s to be requested </h3>
      </div><br>

<form role = "form" onsubmit="return false" action="{{URL::to('onlineBusRequest')}}" enctype="multipart/form-data" id ="onlineBus">
  <div class="row">
     <div id="documents" class="col-md-10" style="margin: 0 10% 5%; background-color: #fff; width: 80%;">
            <div class="box-body">
                  <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"><span class="label label-primary"> Available Documents </span></h1>
                  
                        <table class="table table-striped" style="font-size: 15px;overflow:auto">
                <thead>
                    <tr align="center">
                      <th width="100px"></th>
                      <th>Document</th>
                      <th>Fee</th>

                    </tr>
                </thead>
              <tbody>
                     @foreach($docs as $d)
                          <tr>
                            <td align="middle"><input type = "radio" name = "radioDoc" id = "checkDoc_{{$d->DocumentID}}" name = "checkDoc_{{$d->DocumentID}}" value = "{{$d->DocumentID}}"></td>
                            <td>{{ $d -> DocumentName }}</td>
                            <td>{{ $d -> DocumentFee }}</td>
                          </tr>
                        @endforeach
                    
              </tbody>
              </table>

              <!-- <center><div class="g-recaptcha" data-sitekey="6LdbIycTAAAAAAuj50Jmfdg-k6AsCnojtNdvmLF6"></div></center> -->
              <br>

              <div class="box-footer" style="margin-bottom: 10px;" align="center">
                        <a href="#step3" class="btn btn-primary btn-flat">Next >></a>
                      </div>

          </div><!-- /.col -->
   </div><!--row -->   
  </div>

  <div class="col-md-1">
    </div>
    <div class="well" id="step3">
      <div class="form-group">
        <h3 style="font-family: Montserrat"><b>Step 3:</b> Fill up your details  <small>*If you are a registered resident, your details should match on the Barangay records. </small></h3>
       
      </div>
    </div><br>


    <div class="row">
        <div id="request" class="col-md-10" style="margin: 0 10% 5%; background-color: #fff; width: 80%;">
            <div class="box-body">
                <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"><span class="label label-primary">Requestor Details </span></h1>

                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Request ID</label>
                           <input type="text" 
                              class="form-control" 
                              id = "txtRequestID"
                              name = "txtRequestID"
                              readonly=""
                              value= "{{$reqID[0] -> BusRequestID}}">
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
                  
                  <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"><span class="label label-primary">Business Details </span></h1>

                  <div class="row">
                   <div class="col-md-6">
                          <label>Business Name</label>

                          <div  id="formAutosearch" hidden>
                            <select
                               class="form-control select2" style="width: 100%;"
                                id = "txtRequestedFor"
                                name = "txtRequestedFor">

                                <option disabled="" select
                                ed="">Select Business</option>
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
                                  <option disabled="" selected="">Select Business Type</option>
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

                  </div><br>


                      <center><div class="g-recaptcha" data-sitekey="6LdbIycTAAAAAAuj50Jmfdg-k6AsCnojtNdvmLF6"></div></center><br>
              

                      <div class="box-footer" style="margin-bottom: 10px;" align="center">
                        <button data-toggle = "modal" data-target = "#requestor" type="submit" class="btn btn-success btn-flat btn-lg">Proceed</button>
                      </div>

                    </div><!--box body-->
        </div><!--row -->   
    </div>
    </form><!-- //onlineBusForm -->



 

<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){


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

      $('#txtRequestID').val(parseInt($('#txtRequestID').val())+1);


      $('#txtRequestedFor').change(function(){
        $.ajax({
          type: 'POST',
          url: 'busgetDocRequestedForInfo',
          data: {busID: $('#txtRequestedFor').val()},
          dataType: 'JSON',
          success: function(data){
            
            $.each(data.info, function(key, val){
              alert('jaaja');
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


      $('#onlineBus').submit(function(){
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: new FormData(this),
          cache: false,
          contentType: false,
          processData: false,
          success: function(data){
            
              alert('Success! Your request has been sent. Please check your email for the approval. Thank you!');
              window.location.href = "{{URL::to('request')}}";
            
          }
        }).error(function(ts){
          alert(ts.responseText);
        });
      });
    });
  </script>

   </section>
@stop 