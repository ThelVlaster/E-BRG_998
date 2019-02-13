@extends('layouts.master')

@section('content')


	
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
              <div class="col-md-3">

                  <input type="text" id="hiddenPosition" value = "{{Session::get('position')}}" hidden>

               

                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Sort</h3>
                    <div class="box-tools">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                      <li><a href="<?php echo 'docPayment' ?>?sort=reg"><i class="fa  fa-circle-o text-red"></i> Regular</a></li>
                      <li><a href="<?php echo 'docPayment' ?>?sort=bus"><i class="fa  fa-circle-o text-yellow"></i> Business</a></li>
                    </ul>
                  </div><!-- /.box-body -->
                </div><!-- /. box -->


              </div><!-- /.col -->

              <div class="col-md-9">
                <div class="box box-solid ">
                  <div class="box-header">
                    <h3 class="box-title"></h3>
                  </div><!-- /.box-header -->
                  
                  <div class="box-body">

                    <table  id="example1" class="table table-bordered table-striped">
                <!--      <table  class="table table-bordered table-striped">-->
                        
                      <thead>

                         <tr>
                          <th rowspan="2" align="center">Request No.</th>
                          <th bgcolor="#f0f5f5" colspan="4">Request Details</th>
                          <th bgcolor="#ffffe6" colspan="6">Payment Details</th>
                        </tr>

                        <tr>
                          
                          <th>Requested by</th>
                          <th>Requested For</th>
                          <th>Date Requested</th>
                          <th>Date of Payment</th>
                          <th width="50px">Document</th>
                          <th>Status</th>
                          <th>Payment Status</th>
                          <th>Action</th>


                        </tr>
                      </thead>

                      @if($sort == 'reg')
                      <tbody>
                       @foreach($request as $request)

                          <tr>
                            <td><span class="label label-success">RD2016-{{$request -> RequestID}}</span></td>
                            <td>{{$request -> Requestor}}</td>
                            <td>
                              @if($request -> RFType == 0)
                                @foreach($res as $resi)
                                  @if($resi -> ResidentID == $request -> RFResidentID)
                                    {{$resi->LastName}}, {{$resi -> FirstName}}
                                  @endif
                                @endforeach
                              @else
                                @foreach($nres as $nresi)
                                  @if($nresi -> NonResidentID == $request -> RFResidentID)
                                    {{$nresi->NonResName}}
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>{{$request -> DateOfRequest}}</td>
                            <td>{{$request -> PaymentDate}}</td>
                            <td>
                              @foreach($reqDocs as $rq)
                                @if($request -> RequestID == $rq -> RequestID)
                                  {{$rq -> DocumentName}} <br>
                                @endif
                              @endforeach
                            </td>
                            <td>
                              @foreach($reqDocs as $rq)
                                @if($request -> RequestID == $rq -> RequestID)
                                  {{$rq -> DocReqStatus}} <br>
                                @endif
                              @endforeach
                            </td>
                            <td>{{$request -> PaymentStatus}}</td>
                            <td>
                              @if($request -> PaymentStatus == "Unpaid")
                                <a class = "btn btn-block btn-flat btn-danger  btn-sm" href = "<?php echo 'docPaymentForm'?>?RequestID={{$request -> RequestID}}"><i class="fa fa-money"></i></a>
                              @else
                                <a class = "btn btn-block btn-flat btn-primary  btn-sm" disabled> <i class="fa fa-money"></i></a>
                              @endif
                            </td>
                          </tr>

                       @endforeach

                        
                      </tbody>
                          @elseif($sort == 'bus')
                              <tbody>
                           @foreach($req as $req)

                              <tr>
                                <td><span class="label label-success">BD2016-{{$req -> BusRequestID}}</span></td>
                                <td>{{$req -> BusRequestor}}</td>
                                <td>{{$req -> BusinessName}}</td>
                                <td>{{$req -> DateOfRequest}}</td>
                                <td>{{$req -> PaymentDate}}</td>
                              
                                <td>{{$req -> DocumentName}}</td>
                              
                                <td>
                                  {{$req -> BusDocStatus}}
                                </td>
                                <td>{{$req -> PaymentStatus}}</td>
                                <td>
                                  @if($req -> PaymentStatus == "Unpaid")
                                    <a class = "btn btn-block btn-flat btn-danger  btn-sm" href = "<?php echo 'busdocPaymentForm'?>?RequestID={{$req -> BusRequestID}}"><i class="fa fa-money"></i></a>
                                  @else
                                    <a class = "btn btn-block btn-flat btn-primary  btn-sm" disabled> <i class="fa fa-money"></i></a>
                                  @endif
                                </td>
                              </tr>

                           @endforeach

                            
                          </tbody>
                       @endif


                    </table>
                  </div>
                </div>
              </div>


        </div> <!-- /.col -->
      </div><!--row-->


  </section>
@stop