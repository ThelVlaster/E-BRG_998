@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
             Transaction <small> Item and Facility Table</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
                 <li class="active">Item and Facility Transaction</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
                    
      <div class="col-md-12" id="cancelrequest">    
      </div>
        <div class="col-md-3">
          <a href="ItemRequestForm" class="btn btn-primary btn-block btn-flat">New Request</a><br>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Status</h3>
              <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo 'ItemRequest' ?>"><i class="fa fa-inbox"></i> All<span class="label label-info pull-right">{{$reservecount}}</span></a></li>
                <li><a href="<?php echo 'ItemRequestNew' ?>"><i class="fa fa-download"></i> New<span class="label label-info pull-right">{{$newcount}}</span></a></li>
                <li><a href="<?php echo 'ItemRequestApproved' ?>"><i class="fa fa-clock-o"></i>Approved<span class="label label-warning pull-right">{{$acount}}</span></a></li>
                <li><a href="<?php echo 'ItemRequestReleased' ?>"><i class="fa fa-check-square-o"></i>Released<span class="label label- bg-navy pull-right">{{$recount}}</span></a></li>
                <li><a href="<?php echo 'ItemRequestReturned' ?>"><i class="fa fa-check-square-o"></i>Returned<span class="label label- bg-maroon pull-right">{{$rtcount}}</span></a></li>
                <li><a href="<?php echo 'ItemRequestCancel' ?>"><i class="fa fa-check-square-o"></i>Cancelled<span class="label label- bg-teal pull-right">{{$ccount}}</span></a></li>
                
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /. box -->
        </div>

        <div id="alert">
        </div>

        <div class="col-md-9">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Request No.</th>
                          <th>Requestor</th>
                          <th>Requestor Type</th>
                          <th>Mobile No</th>
                          <th>Date of Request</th>
                          <th>Reserved From</th>
                          <th>Reserved To</th>
                          <th>Purpose</th>
                          <th>Status</th>
                          <!-- <th>Item Code</th> -->
                          <th>Action</th>

                        </tr>
                      </thead>
                      
                      <tbody>
                        @foreach($records as $rec)
                          <tr>
                            <td align="center"><span class="label label-warning">IF2016{{$rec -> ReservationID}}</span></td>
                            @if($rec -> RequestorType == 0)
                              @foreach($residents as $res)
                                @if($res->ResidentID == $rec->RequestorID)
                                    <td>{{$res -> LastName}}, {{$res -> FirstName}} </td>
                                    <td>Resident</td>
                                    <td>{{$res -> MobileNo}} </td>
                                @endif
                              @endforeach
                            @endif

                            @if($rec -> RequestorType == 1)
                              @foreach($nonresidents as $nonres)
                                @if($nonres->NonResidentID == $rec->RequestorID)
                                    <td>{{$nonres -> NonResName}} </td>
                                    <td>Non-Resident</td>
                                   <td>{{$nonres -> FRMobileNo}} </td>
                                @endif
                              @endforeach
                            @endif
                            <td>{{$rec -> DateRequested}}</td>
                            <td>{{$rec -> DateReserveFrom}} - {{$rec -> TimeReserveFrom}}</td>
                            <td>{{$rec -> DateReserveTo}} - {{$rec -> TimeReserveTo}}</td>
                            <td>{{$rec -> Purpose}}</td>
                            <td>
                              @if ($rec->ReserveStatus=='Cancelled')
                              <a class = "btn btn-block btn-danger btn-xs" disabled>{{$rec -> ReserveStatus}}</a>
                              @else
                              <a class = "btn btn-block btn-success btn-xs" disabled>{{$rec -> ReserveStatus}}</a>
                              @if($rec->PaymentStatus=='Halfpaid')
                              <a class = "btn btn-block btn-danger btn-xs" href="<?php echo 'Payment' ?>">{{$rec -> PaymentStatus}}</a>
                              @elseif($rec->PaymentStatus == 'Paid')
                              <a class = "btn btn-block btn-danger btn-xs" disabled>{{$rec -> PaymentStatus}}</a>                             
                              @elseif($rec->PaymentStatus == 'Unpaid')
                              <a class = "btn btn-block btn-danger btn-xs" href="<?php echo 'Payment' ?>">{{$rec -> PaymentStatus}}</a>                            
                              <input type="hidden" value="{{$rec->PaymentStatus}}" id="paymentStat">
                              @endif
                              @endif
                            </td>
                          
                          <td>
                              @if ($rec->ReserveStatus== 'Cancelled')
                              <a class = "btn btn-block btn-danger btn-xs" disabled>{{$rec ->ReserveStatus}}</a>
                             

                              @else
                                @if($rec->ReserveStatus == 'Approved' && $rec->PaymentStatus == 'Halfpaid')
                                <a class = "btn btn-block btn-success btn-xs" href="<?php echo 'itemIssueForm' ?>?reserveid={{$rec ->ReservationID}}&RequestorType={{ $rec -> RequestorType}}&DateFrom={{ $rec -> DateReserveFrom}}&DateTo={{$rec-> DateReserveTo}}&TimeFrom={{$rec-> TimeReserveFrom}}&TimeTo={{$rec-> TimeReserveTo}}"><i class="fa fa-cart-plus"></i></a>

                                <a class = "btn btn-block btn-info btn-xs"  href="<?php echo 'returnItems' ?>?reserveid={{$rec ->ReservationID}}&RequestorType={{$rec -> RequestorType}}" disabled><i class="fa fa-reply"></i></a>

                                <button class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#delete" onclick = "modalDelete({{$rec->ReservationID}},{{$rec->RequestorType}})"><i class="fa fa-remove"></i></button>
                               
                               @elseif($rec->ReserveStatus == 'Approved' && $rec->PaymentStatus == 'Paid')
                                <a class = "btn btn-block btn-success btn-xs" href="<?php echo 'itemIssueForm' ?>?reserveid={{$rec ->ReservationID}}&RequestorType={{ $rec -> RequestorType}}&DateFrom={{ $rec -> DateReserveFrom}}&DateTo={{$rec-> DateReserveTo}}&TimeFrom={{$rec-> TimeReserveFrom}}&TimeTo={{$rec-> TimeReserveTo}}"><i class="fa fa-cart-plus"></i></a>

                                <a class = "btn btn-block btn-info btn-xs" disabled><i class="fa fa-reply"></i></a>

                                <button class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#delete" onclick = "modalDelete({{$rec->ReservationID}},{{$rec->RequestorType}})"><i class="fa fa-remove"></i></button>
                               
                               @elseif($rec->ReserveStatus == 'Released')
                                <a class = "btn btn-block btn-success btn-xs" disabled><i class="fa fa-cart-plus"></i></a>

                                <a class = "btn btn-block btn-info btn-xs"  href="<?php echo 'returnItems' ?>?reserveid={{$rec ->ReservationID}}&RequestorType={{$rec -> RequestorType}}&DateFrom={{ $rec -> DateReserveFrom}}&DateTo={{$rec-> DateReserveTo}}&TimeFrom={{$rec-> TimeReserveFrom}}&TimeTo={{$rec-> TimeReserveTo}}"><i class="fa fa-reply"></i></a>

                                <button class="btn btn-block btn-danger btn-xs" disabled><i class="fa fa-remove"></i></button>
                               
                                @elseif ($rec->ReserveStatus == 'Returned')
                                <a class = "btn btn-block btn-success btn-xs" disabled><i class="fa fa-cart-plus"></i></a>

                                <a class = "btn btn-block btn-info btn-xs" disabled><i class="fa fa-reply"></i></a>

                                <button class="btn btn-block btn-danger btn-xs" disabled><i class="fa fa-remove"></i></button>
                                
                                @elseif ($rec->PaymentStatus== 'Unpaid')
                                <a class = "btn btn-block btn-success btn-xs" disabled><i class="fa fa-cart-plus"></i></a>

                                <a class = "btn btn-block btn-info btn-xs" disabled><i class="fa fa-reply"></i></a>

                                <button class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#delete" onclick = "modalDelete({{$rec->ReservationID}},{{$rec->RequestorType}})"><i class="fa fa-remove"></i></button>
                              @endif
                              @endif
                          </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
          </div>
          </div>
<input type="hidden" id="offID"  name="offID" value = "{{Session::get('OfficialID')}}">
        </div>

    <div class="modal fade" id="delete">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Cancel Reservation</h4>
            </div>
          <!-- modal content -->
            <div class="modal-body">
          
                <div class="box-body">
                 <div class="form-group">
                    <label  class="col-sm-3 control-label">Reservation ID:</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id = "creserveID" name = "reserveID" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Requestor Name:</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id = "crequestor" name = "requestor" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Reserve From:</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id = "creserveFrom" name = "reserveFrom" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Reserve To:</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id = "creserveTo" name = "reserveTo" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Purpose:</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id = "cpurpose" name = "cpurpose" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Refund:</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id = "crefund" name = "refund" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Cancelled by:</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id = "creceive" name = "creceive" required="required">
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id = "btnCancel">Cancel Reservation</button>
            </div>
          </div><!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->









  </section>
    <!-- /.content -->

<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

 <script type="text/javascript">

 $(document).ready(function(){


      var today = new Date();
      var fyear = today.getFullYear();
      var fmonth = today.getMonth()+1;
      var fday =today.getDate();
      var fhh =today.getHours();
      var fmm =today.getMinutes();
      var fss = today.getSeconds();
      var datetoday = String(fyear)+"-"+String(fmonth)+"-"+String(fday)+" "+String(fhh)+":"+String(fmm)+":"+String(fss);
      var end = datetoday;
      end = new Date(end);

  //REQUEST CANCEL AUTOMATIC
      $.ajax({
            type: 'POST',
            url: 'CancelRequestAuto',
            data:{  },
            success: function(data){ 
            var reserve;
              $.each(data.reserves, function (key, val) {

                reserve = String(val.DateReserveFrom)+" "+ String(val.TimeReserveFrom);
                reserve = new Date(reserve);
                var fyear = reserve.getFullYear();
                var fmonth = reserve.getMonth()+1;
                var fday =reserve.getDate()-1;
                var fhh =reserve.getHours();
                var fmm =reserve.getMinutes();
                var fss = reserve.getSeconds();
                var expdate = String(fyear)+"-"+String(fmonth)+"-"+String(fday)+" "+String(fhh)+":"+String(fmm)+":"+String(fss);
                reserve = new Date(expdate);
                
                  if (reserve==end || reserve < end)
                  {
                    $('#cancelrequest').append('<div class="alert alert-danger alert-dismissible">'
                  +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
                  +'Reservation No: '+val.ReservationID+' is about to cancel!<br>'
                  +'<button type="button" class="btn-default btn-xs" data-toggle="modal" data-target="#delete" onclick = "modalDelete('+val.ReservationID+','+val.RequestorType+')"><i class="fa fa-remove">Cancel Reservation</i></button>'
                  +'<button class="btn btn-info" data-dismiss="alert"><i class="fa fa-remove">No</i></button>'
                  +'</div>');
                  }
              });

            },error: function(request, error){}
            }).error(function(ts){
            alert(ts.responseText);
            });



  function itemIssue(ReserveID) {
     window.location.href="{{URL::to('itemIssueForm')}}";
      }

    $('#btnCancel').click(function(){
      

            $.ajax({
              type: 'POST',
              url: 'CancelRequest',
              data:{
                    paidBy: $('#creceive').val(),
                    requestID: $('#creserveID').val(),
                    offID: $('#offID').val(),
                    refund: $('#crefund').val(),
                  },
              // dataType: 'JSON',
              success: function(data){ 
              window.location.href="{{URL::to('ItemRequest')}}"; 
              },error: function(request, error){}
              }).error(function(ts){
              alert(ts.responseText);
            });
     });
});
</script>


 <script type="text/javascript">

  function modalDelete(reserveid,requestortype)
  {
        var totalrefund=0;
        $.ajax({
          type: 'POST',
          url: 'getReserveInfotoCancel',
          data: { reserveid : reserveid,
                  requestortype:  requestortype},
          dataType: 'JSON',
          success: function(data){

            $.each(data.reserveinfo, function(key, val){
              $('#creserveID').val(reserveid);
              $('#cpurpose').val(val.Purpose);
              $('#creserveFrom').val(val.DateReserveFrom + " - " +val.TimeReserveFrom);
              $('#creserveTo').val(val.DateReserveTo + " - " +val.TimeReserveTo);
                  if(val.RequestorType=='0')
                  $('#crequestor').val(val.FirstName + " " +val.LastName);
                  else
                  $('#crequestor').val(val.NonResName);
            });

            $.each(data.paymentinfo, function(key1, val1){
              if (val1.RequestID==reserveid)
              totalrefund = parseFloat(totalrefund)+parseFloat(val1.PaidAmount);
            });
            $('#crefund').val(totalrefund.toFixed(2));
          }
        });
    }


      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //tooltip
         $('[data-toggle="tooltip"]').tooltip(); 

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
         //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

@stop
