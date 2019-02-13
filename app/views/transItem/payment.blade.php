@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
             Transaction <small>Item & Facility Payment</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
                 <li class="active">Payment</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
                    

        <div class="col-md-3">

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Status</h3>
              <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo 'Payment' ?>"><i class="fa fa-inbox"></i>All<span class="label label-warning pull-right">{{$all}}</span></a></li>    
                <li><a href="<?php echo 'paymentPaid' ?>"><i class="fa fa-download"></i>Paid<span class="label label-info pull-right">{{$paid}}</span></a></li>
                <li><a href="<?php echo 'paymentUnpaid' ?>"><i class="fa fa-clock-o"></i>Unpaid<span class="label label-warning pull-right">{{$unpaid}}</span></a></li>                
                <li><a href="<?php echo 'paymentHalfpaid' ?>"><i class="fa fa-clock-o"></i>Halfpaid<span class="label label-warning pull-right">{{$half}}</span></a></li>                
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /. box -->
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
                          <th>Status</th>
                          <th>Payment Status</th>
                          <th>Payment</th>
                          <th>Download Payment Summary</th>

                        </tr>
                      </thead>
                      
                      <tbody>
                        @foreach($records as $rec)
                          <tr>
                            <td align="center"><span class="label label-warning">{{$rec -> ReservationID}}</span></td>
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
                            <td><a class = "btn btn-block btn-success btn-xs" href="<?php echo 'ItemRequest' ?>">{{$rec -> ReserveStatus}}</a></td>
                            <td><a class = "btn btn-block bg-purple btn-xs" disabled>{{$rec -> PaymentStatus}}</a></td>
                          <td>
                              @if($rec->PaymentStatus == 'Paid')
                                <button class = "btn btn-block btn-danger btn-xs" href="<?php echo 'paymentDetails' ?>" disabled><i class="fa fa-money"></i></button>

                              @elseif ($rec->PaymentStatus== 'Unpaid')
                                <a class = "btn btn-block btn-danger btn-xs"  href="<?php echo 'paymentDetails' ?>?reserveid={{$rec ->ReservationID}}"><i class="fa fa-money"></i></a>
                              
                              @elseif ($rec->PaymentStatus== 'Halfpaid')
                                <a class = "btn btn-block bg-maroon btn-xs"  href="<?php echo 'DPpaymentDetails' ?>?reserveid={{$rec ->ReservationID}}"><i class="fa fa-money"></i></a>
                              @endif

                          </td>

                          <td>
                            @if($rec->PaymentStatus == 'Paid')
                            <a class = "btn btn-block bg-teal btn-xs"  href="<?php echo 'itemReceipt' ?>?reserveid={{$rec ->ReservationID}}"><i class="fa  fa-download"></i></a>
                            @else
                            <button class = "btn btn-block bg-teal btn-xs" disabled><i class="fa  fa-download"></i></button>
                            @endif
                          </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
          </div>
          </div>
        </div>
    </section>
    <!-- /.content -->

<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

 <script type="text/javascript">

 $(document).ready(function(){
    
            var today = new Date();
            var tomorrow = new Date();
            tomorrow.setDate(today.getDate()+1);
           // alert(tomorrow);
 });

    </script>

@stop
