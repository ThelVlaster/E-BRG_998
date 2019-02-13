@extends('layouts.master')

@section('content')


            <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
	
		<section class="content-header">
            <h1>
              Transaction <small>Payment</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'TransactionMenu' ?>"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li>Documents</li>
              <li class="active">Payment</li>
            </ol>
    </section>

    <section class = "content">

    	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
              <div class="box">
                  <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp;Payment/Refund</h3>
                  </div><!-- /.box-header --> 
    
              <div class="box-body">
                <div class="well">
                  <div class="form-group">
                    
                    <div class="box-body">

                      <div class="col-md-6">
                      <table style="border-spacing: 4px;border-collapse: separate;">
                        <tbody>
                          <tr>
                            <td class="pull-right">Request No: </td>
                            <td><span class="label label-primary"><label for="docNo">{{$request[0] -> RequestID}}</label></span></td>
                          </tr>
                          <tr>
                            <td class="pull-right">Date of Request: </td>
                            <td><label for="docDate">{{$request[0] -> DateOfRequest}}</label></td>
                          </tr>
                          
                        </tbody>
                      </table>
                      </div>

                       <div class="col-md-6">
                      <table style="border-spacing: 4px;border-collapse: separate;">
                        <tbody>
                      
                          <tr>
                            <td class="pull-right">Requested by: </td>
                            <td><label for="docby">{{$request[0] -> Requestor}}</label></td>
                          </tr>
                          <tr>
                            <td class="pull-right">Requested for: </td>
                            <td><label for="docfor">{{$person}}</label></td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div><!-- well -->


                <div class="col-md-12">
                 <table class="table table-bordered" style="font-size: 14px; border-outline:black" id="tblpayment">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Document</th>
                        <th>Status</th>
                        <th width="300px">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($request as $req)
                        <tr>
                          <td>
                            
                            
                          </td>
                          <td>{{$req -> DocumentName}}</td>
                          <td>{{$req -> DocReqStatus}}</td>
                          <td>
                            <label for="amount">{{$req -> DocumentFee}}</label>
                            
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="row">

                    <div class="col-md-5">
                        <div class="box-body">
                          <div class="form-group">
                            <label>Paid By</label>
                            <input type="text" 
                                class="form-control" 
                                id = "paidBy"
                                name = "paidBy">
                          </div>

                          <div class="form-group" id="type" name="type">
                              
                                <label> Payment Type:</label>
                                <select class="form-control" id="paymenttype">
                                  <option selected="" disabled="">Select Payment Type</option>
                                  <option>Regular</option>
                                  <option>Waived</option>
                                </select>
                             
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
                            <td><input class="form-control" type="number" step="any" id="subtotal" name="subtotal" disabled >
                            </td>
                          </tr>
                          <tr bgcolor="#ffffb3">
                            <td><label>Amount Due:</label></td>
                            <td><input class="form-control" type="number" step="any" id="txtpayment" name="txtpayment" disabled></td>
                          </tr>
                        </tbody>
                      </table>  
                      </div> 

                          <input type="hidden" id="payment">
                          <input type="hidden" id="total" step="any">
                          <input type="hidden" id="reqid" step="any">
                          <input type="hidden" name="officialID" id = "officialID" value = "{{Session::get('officialID')}}">
                                    
                    </div>

                  </div>

                  <div class="row">
                    <center><button type="submit" class="btn btn-danger btn-flat"  id="btnSubmit">  Submit   </button> <button type="submit" class="btn btn-danger btn-flat"  id="btnPrint">  Print   </button></center>

                  </div>

            </div><!-- box-body -->
          </div>
        </div> <!-- /.col -->
      </div><!--row-->

    </section>


    <script type="text/javascript">
      $(document).ready(function(){
       
        $.ajax({
          type: 'POST',
          url: 'computeTotal',
          data: { reqID: $('label[for="docNo"]').html()},
          dataType: 'JSON',
          success: function(data){
            var sub = 0;
            $.each(data.prices, function(key, val){
              sub = sub + (parseFloat(val.DocumentFee) +(parseInt(val.AdditionalCopy) * parseFloat(val.DuplicateFee)));
            });
            $('#subtotal').val(sub.toFixed(2));
          }
        }).error(function(ts){
          alert(ts.responseText);
        });

        $('#paymenttype').change(function(){
          if($(this).val()=="Regular")
          {
            $('#txtpayment').val($('#subtotal').val());
          }
          else
          {
            $('#txtpayment').val("0.00");
          }
        });

        $('#btnPrint').click(function(){

          var paidAmount = 0;

          if($('#paymenttype').val() == "Regular")
          {
            paidAmount = $('#subtotal').val();
          }
          else
          {
            paidAmount = 0;
          }


          $.ajax({
            type: 'POST',
            url: 'payDocs',
            data: {
              reqID: $('label[for="docNo"]').html(),
              paidBy: $('#paidBy').val(),
              transacName: "RegularDoc",
              paidAmount: paidAmount,
              totalAmount: $('#subtotal').val(),
              origPrice: $('#subtotal').val(),
              paymentType: $('#paymenttype').val(),
              officialID: $('#officialID').val(),

            },
            success: function(data)
            {
              window.location.href = "{{URL::to('docReceipt')}}?reqID=" + $('label[for="docNo"]').html() + "";
            }
          }).error(function(ts){
            alert(ts.responseText);
          });
        });

        $('#btnSubmit').click(function(){
          $.ajax({
            type: 'POST',
            url: 'docPaid',
            data: {
              reqID: $('label[for="docNo"]').html(),
              paymentType: $('#paymentType').val()
            },
            success:function(data){
              window.location.href = "{{URL::to('docPayment')}}?sort=reg";
            }           
          });
          
        });


      });
    </script>
@stop