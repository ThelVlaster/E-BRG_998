@extends('layouts.master')

@section('content')


	
		<section class="content-header">
            <h1>
              Transaction <small>Payment/Refund</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'TransactionMenu' ?>"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li>Documents</li>
              <li class="active">Payment/Refund</li>
            </ol>
    </section>

    <section class = "content">

    	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp; Payment/Refund</a></li>
              <li><a href="#tab_2" data-toggle="tab">List of Payments</a></li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane active" id="tab_1">

                    
                <div class="well">
                  <div class="form-group">
                    
                    <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Document Type:</label>
                        <div class="radio" >
                            <label><input type="radio" class="radiobtn" name="radioDoc" id="radioDoc" value="1" checked>&nbsp;&nbsp;&nbsp;Regular</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" class="radiobtn" name="radioDoc" id="radioDoc" value="2" >&nbsp;&nbsp;&nbsp;Business</label>
                        </div>
                      </div>
                      
                      <div class="col-md-5" id="reqSelect">
                             <label>Search:</label>
                             <select class="form-control"
                                      id = "request"
                                      width="50%">
                                  <option selected="" disabled="">Select Request</option>
                                  @foreach ($regular as $reg)
                                  <option selected="">{{$reg -> RequestID}}</option>
                                  @endforeach

                             </select>
                      </div>
                      </div>
                      <hr>
                      <div class="col-md-6">
                      <table style="border-spacing: 4px;border-collapse: separate;">
                        <tbody>
                          <tr>
                            <td class="pull-right">Request No: </td>
                            <td><span class="label label-primary"><label for="docNo"></label></span></td>
                          </tr>
                          <tr>
                            <td class="pull-right">Date of Request: </td>
                            <td><label for="docDate"></label></td>
                          </tr>
                          
                        </tbody>
                      </table>
                      </div>

                       <div class="col-md-6">
                      <table style="border-spacing: 4px;border-collapse: separate;">
                        <tbody>
                      
                          <tr>
                            <td class="pull-right">Requested by: </td>
                            <td><label for="docby"></label></td>
                          </tr>
                          <tr>
                            <td class="pull-right">Requested for: </td>
                            <td><label for="docfor"></label></td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                    </div><!-- box-body -->

                  </div>
                </div><!-- well -->

                 <table class="table table-bordered" style="font-size: 14px; border-outline:black" id="tblpayment">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Document</th>
                        <th>Status</th>
                        <th width="250px">Additional Copy/ies</th>
                        <th width="300px">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

                  <div class="row">

                    <div class="col-md-5">
                        <div class="box-body">
                          <div class="form-group" id="type" name="type">
                              <div class="col-md-12">
                                <label> Payment Type:</label>
                                <select class="form-control" id="paymenttype">
                                  <option value="1">Regular</option>
                                  <option value="3">Waived</option>
                                </select>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-4">
                      <table  style="border-spacing: 17px;border-collapse: separate;">
                        <tbody>
                          <tr bgcolor="#ffffb3">
                            <td><label>Total Amount</label></td>
                            <td><input class="form-control" type="number" step="any" id="subtotal" name="subtotal" disabled></td>
                          </tr>
                          <tr bgcolor="#ffffb3">
                            <td><label>Amount Due:</label></td>
                            <td><input class="form-control" type="number" step="any" id="txtpayment" name="txtpayment" disabled></td>
                          </tr>
                        </tbody>
                      </table>   

                          <input type="hidden" id="payment">
                          <input type="hidden" id="total" step="any">
                          <input type="hidden" id="reqid" step="any">
                                    
                    </div>

                  </div>

                  <div class="row">
                    <center><button type="submit" class="btn btn-danger btn-flat"  id="btnSubmit">  Submit   </button></center>
                  </div>

              </div> <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_2">
              </div> <!-- /.tab-pane -->

            </div> <!-- /.tab-content -->
          </div> <!-- nav-tabs-custom -->
        </div> <!-- /.col -->
      </div><!--row-->

            <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

       <script type="text/javascript">
          $(document).ready(function(){

            $(".radiobtn").change(function(e) { 


              if ($("input[name=radioDoc]:checked").val() == "1") {

                $('#request').empty();
              //  alert('asfasdf');

                $.ajax({
                    type: 'POST',
                    url: 'getReg',
                    dataType: 'JSON',
                    success: function(data) {
                      
                      $.each(data.regDoc, function(key, val){
                        $('#request').append('<option value="'+val.RequestID+'"> '+val.RequestID+' </option>');
                         });
                     
                    },error:function(request, error){
                      alert('huhuhu' + error);
                    }
                  }).error(function(ts){
                      alert(ts.responseText);
                    });

              }//if

              else {

                $('#request').empty();
               // alert('haha');

                $.ajax({
                    type: 'POST',
                    url: 'getBus',
                    dataType: 'JSON',
                    success: function(data) {
                      
                      $.each(data.busDoc, function(key, val){
                        $('#request').append('<option value="'+val.BusRequestID+'"> '+val.BusRequestID+' </option>');
                         });
                     
                    },error:function(request, error){
                      alert('huhuhu' + error);
                    }
                  }).error(function(ts){
                      alert(ts.responseText);
                    });

              }//else
            });//radio onchange




              $("#request").select2().change(function () {

                if ($("input[name=radioDoc]:checked").val() == "1") {
                 $('#tblpayment tbody').empty();
                  var total=0;
                    $.ajax({
                        type: 'POST',
                        url: 'getRegInfo',
                        data: {id: $('#request').val()},
                        dataType: 'JSON',
                        success: function(data){
                          
                          $.each(data.pay, function(key, val){
                              $('#tblpayment tbody').append('<tr><td><input type="checkbox" id="checkbox_'+val.DocumentID+'" name="checkbox_'+val.DocumentID+'" value="'+val.DocumentID+'" checked></td><td>'+val.DocumentName+'</td><td>'+val.DocReqStatus+'</td><td align="center">'+val.NoAddCopy+'</td><td align="center"> &#8369; '+val.DocumentFee+'</td></tr>');
                              $("label[for='docNo']").html(val.RequestID);
                              $("label[for='docDate']").html(val.DateOfRequest);
                              $("label[for='docby']").html(val.Requestor);
                              var amount = parseInt(val.DocumentFee);
                              total= parseFloat(total)+parseFloat(amount.toFixed(2));
                             
                          });

                            $("#subtotal").val(total);

                        },
                        error: function(request, error){
                          console.log(arguments);
                          alert("cant do this because: " + error);
                        }
                      }).error(function(ts){
                        alert(ts.responseText);
                      });
              }

              else if ($("input[name=radioDoc]:checked").val() == "2") {

                 $('#tblpayment tbody').empty();

                 $.ajax({
                        type: 'POST',
                        url: 'getBusInfo',
                        data: {id: $('#request').val()},
                        dataType: 'JSON',
                        success: function(data){
                          $.each(data.pay, function(key, val){
                            $('#tblpayment tbody').append('<tr><td><input type="checkbox" id="checkbox_'+val.BusDocumentID+'" name="checkbox_'+val.BusDocumentID+'" value="'+val.BusDocumentID+'" checked></td><td>'+val.DocumentName+'</td><td>'+val.BusDocStatus+'</td><td align="center">'+val.NoAddCopy+'</td><td></td></tr>');
                              $("label[for='docNo']").html(val.BusRequestID);
                              $("label[for='docDate']").html(val.DateOfRequest);
                              $("label[for='docby']").html(val.BusRequestor);
                              $("label[for='docfor']").html(val.BusinessName);
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
            });


          });//document
      </script>

    </section>



@stop