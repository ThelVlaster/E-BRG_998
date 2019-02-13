@extends('layouts_web.master')

@section('content')

<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}" type = "text/javascript"></script>

<section class="content-header">
<br><br>

<ol class="breadcrumb" align="right">
              <li><a href="<?php echo 'request' ?>"> iRequest</a></li>
              <li class="active">Regular Documents</li>
            </ol>

</section>


<section class="content">


  <div class="col-md-1">
      </div>
      <div class="well">
          <h3 style="font-family: Montserrat"><b>Step 2:</b> Select Regular Document/s to be requested </h3>
      </div><br>

<form role = "form" onsubmit="return false" action="{{URL::to('onlineDocRequest')}}" enctype="multipart/form-data" id ="onlineDoc">
  <div class="row">
     <div id="documents" class="col-md-10" style="margin: 0 10% 5%; background-color: #fff; width: 80%;">
            <div class="box-body">
                  <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"><span class="label label-primary"> Available Documents </span></h1>
                  <div class="col-md-12">
                      <center><div class="radio" >
                          <label><input type="radio" class="radiobtn" name="radioDoc" id="radioDoc" value="1" checked>Resident</label>&nbsp;&nbsp;&nbsp;
                          <label><input type="radio" class="radiobtn" name="radioDoc" id="radioDoc" value="2" >Non-resident</label>
                      </div></center><br>
                    </div>
                        <table class="table table-striped" style="font-size: 15px;overflow:auto" id = "documents">
                <thead>
                    <tr align="center">
                      <th width="100px"></th>
                      <th>Document</th>
                      <th>Fee</th>
                      <th>Purpose</th>

                    </tr>
                </thead>
              <tbody>
                @foreach($docs as $d)
                    <tr>
                      <td align="center"><input type = "checkbox" name = "checkDoc_{{$d->DocumentID}}" id = "checkDoc_{{$d->DocumentID}}" value = "{{$d->DocumentID}}"></td>
                            <td>{{ $d -> DocumentName }}</td>
                            <td>{{ $d -> DocumentFee }}</td>
                            <td><input type = "text" class = "form-control" name = "purpose_{{$d->DocumentID}}" id = "purpose_{{$d->DocumentID}}" placeholder="Purpose"></td>
                    </tr>
                @endforeach
              </tbody>
              </table>

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
        <h3 style=" font-family: Montserrat"><b>Step 3:</b> Fill up your details  <small>*If you are a registered resident, your details should match on the Barangay records. </small></h3>
       
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
                            value = "{{$reqID[0]->RequestID}}"
                            id = "txtRequestID"
                            name = "txtRequestID"
                            readonly="">
                      </div>
                    </div>

                    
                  </div>
                  

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name of Requestor</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtRequestor"
                            name = "txtRequestor"
                            >
                     
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" 
                            class="form-control" 
                            id = "txtEmail"
                            name = "txtEmail"
                            >
                      </div>
                    </div>
                  </div>

                    <hr>
                  <div class="row">
                      
                    <div class="col-md-6">
                    <label>Requested For</label>
                      <div class="form-group" id="NResRequested">
                        
                        <div class="col-md-4">
                            
                          <input type="text" 
                              class="form-control" 
                              id = "txtFReqFor"
                              name = "txtFReqFor"
                              placeholder="First Name">
                        </div>
                        <div class="col-md-4">
                          <input type="text" 
                              class="form-control" 
                              id = "txtMReqFor"
                              name = "txtMReqFor"
                              placeholder="Middle Name">
                        </div>
                        <div class="col-md-4">
                          <input type="text" 
                              class="form-control" 
                              id = "txtLReqFor"
                              name = "txtLReqFor"
                              placeholder="Last Name">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group" id="address">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtAddress"
                            name = "txtAddress">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      

                       <div class="form-group" id="NBirthdate" >
                        <label>Birthdate</label>
                        <input type="date" 
                            class="form-control" 
                            id = "txtNBirthdate"
                            name = "txtNBirthdate">
                      </div>

                    </div>

                    <div class="col-md-6">

                      <div class="form-group" id="NGender" >
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


                      <center><div class="g-recaptcha" data-sitekey="6LdbIycTAAAAAAuj50Jmfdg-k6AsCnojtNdvmLF6"></div></center><br>
              

                      <div class="box-footer" style="margin-bottom: 10px;" align="center">
                        <button data-toggle = "modal" data-target = "#requestor" type="submit" class="btn btn-success btn-flat btn-lg">Proceed</button>
                      </div>

                    </div><!--box body-->
        </div><!--row -->   
    </div>

</form>

  </section>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.radiobtn').change(function(){
        if($('input[name="radioDoc"]:checked').val() == "1")
        {
          $.ajax({
            type: 'GET',
            url: 'getDocs?docs=1',
            dataType: 'JSON',
            success: function(data){
              $('#documents tbody').empty();
              $.each(data.docs, function(key, val){
                $('#documents tbody').append(
                          '<tr><td align="middle"><input type = "checkbox" name = "checkDoc_'+val.DocumentID+'" id = "checkDoc_'+val.DocumentID+'" value = "'+val.DocumentID+'"></td><td>'+val.DocumentName+'</td><td>'+val.DocumentFee+'</td> <td><input type = "text" class = "form-control" name = "purpose_'+val.DocumentID+'" id = "purpose_'+val.DocumentID+'" placeholder = "Purpose"></td> </tr>'
                );
              });
            }
          }).error(function(ts){
            alert(ts.responseText);
          });
        }
        else if($('input[name="radioDoc"]:checked').val() == "2")
        {
          $.ajax({
            type: 'GET',
            url: 'getDocs?docs=2',
            dataType: 'JSON',
            success: function(data){

              $('#documents tbody').empty();
              $.each(data.docs, function(key, val){
                $('#documents tbody').append(
                          '<tr><td align="middle"><input type = "checkbox" name = "checkDoc_'+val.DocumentID+'" id = "checkDoc_'+val.DocumentID+'" value = "'+val.DocumentID+'"></td><td>'+val.DocumentName+'</td><td>'+val.DocumentFee+'</td> <td><input type = "text" class = "form-control" name = "purpose_'+val.DocumentID+'" id = "purpose_'+val.DocumentID+'" placeholder = "Purpose"></td> </tr>'
                );
              });
            }
          }).error(function(ts){
            alert(ts.responseText);
          });
        }
      });

      $('#txtRequestID').val(parseInt($('#txtRequestID').val())+1);

      $('#onlineDoc').submit(function(){
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: new FormData(this),
          dataType: 'JSON',
          cache: false,
          contentType: false,
          processData: false,
          success: function(data){
            if(JSON.stringify(data.resID) != "[]")
            {
              alert('success');
              window.location.href = "{{URL::to('request')}}";
            }
            else
            {
              alert('not a resident!!');
            }
          }
        }).error(function(ts){
          alert(ts.responseText);
        });
      });


    });
  </script>

@stop  <!-- <center><div class="g-recaptcha" data-sitekey="6LdbIycTAAAAAAuj50Jmfdg-k6AsCnojtNdvmLF6"></div></center> -->
              

              <!-- <div class="box-footer" style="margin-bottom: 10px;" align="center">
                        <button data-toggle = "modal" data-target = "#requestor" type="submit" class="btn btn-primary btn-flat">Submit</button>
                      </div> -->