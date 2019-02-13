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
              <div class="col-md-3">

                  <input type="text" id="hiddenPosition" value = "{{Session::get('position')}}" hidden>
                 <!-- <a href="<?php //echo 'busdocumentRequestForm' ?>" class="btn btn-info btn-block btn-flat">New Request</a><br> -->
                 

                  <a href="<?php echo 'busdocumentRequestForm' ?>" class="btn btn-info btn-block btn-flat">New Request</a><br>
                   <input type="text" 
                      class="form-control" 
                      id = "txtOfficialID"
                      name = "txtOfficialID"
                      value="{{Session::get('officialID')}}" style="display:none">
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Status</h3>
                    <div class="box-tools">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="box-body no-padding">
                   <ul class="nav nav-pills nav-stacked">
                      <li><a href="<?php echo 'busdocumentRequest' ?>?sort="><i class="fa fa-inbox "></i> All<span class="label bg-maroon pull-right">{{$all}}</span></a></li>
                      <li><a href="<?php echo 'busdocumentRequest' ?>?sort=New"><i class="fa fa-download"></i> New <span class="label label-primary pull-right">{{$new}}</span></a></li>
                      <li><a href="<?php echo 'busdocumentRequest' ?>?sort=Pending"><i class="fa fa-clock-o"></i> Pending <span class="label label-warning pull-right">{{$pen}}</span> </a></li>
                      <li><a href="<?php echo 'busdocumentRequest' ?>?sort=ForApproval"><i class="fa fa-check-square-o"></i> For Approval <span class="label label-success pull-right">{{$app}}</span></a></li>
                      <li><a href="<?php echo 'busdocumentRequest' ?>?sort=Done"><i class="fa fa-exclamation-circle"></i> Done <span class="label bg-navy pull-right">{{$done}}</span></a></li>
                      <li><a href="<?php echo 'busdocumentRequest' ?>?sort=Cancelled"><i class="fa fa-ban"></i> Cancelled <span class="label label-danger pull-right">{{$can}}</span></a></li>
                      
                    </ul>
                  </div><!-- /.box-body -->
                </div><!-- /. box -->
                



              </div><!-- /.col -->

              <!--right side-->
              <div class="col-md-9">
                <div class="box box-solid ">
                  <div class="box-header">
                    <h3 class="box-title">All Requests</h3>
                  </div><!-- /.box-header -->
                  
                  <div class="box-body">
                    <table  id="example1" class="table table-bordered table-striped">
                <!--      <table  class="table table-bordered table-striped">-->
                        
                      <thead>
                        <tr>
                          <th>Request No.</th>
                          <th>Requestor Name</th>
                          <th>Business Name</th>
                          <th>Request Date</th>
                          <th>Expiration Date</th>
                          <th>Permit Type</th>
                          <th width="150px">Document | Status</th>
                          <th>Action</th>


                        </tr>
                      </thead>
                      <tbody>
                        @foreach($info as $info)
                        <tr>
                          <td align="center"><span class="label label-warning">BD2016-{{$info -> BusRequestID}}</span></td>
                          <td>{{$info -> BusRequestor}}</td>
                          <td>{{$info -> BusinessName}}</td>
                          <td>{{$info -> DateOfRequest}}</td>
                          <td>{{$info -> DateOfExpiration}}</td>
                          <td align="center">{{$info -> BusPermitType}}</td>
                          <td>
                            @foreach($docInfo as $di)
                              @if($info->BusRequestID == $di->BusRequestID)
                                @if($di->BusDocStatus == "New")
                                  <a  href="<?php echo 'createBusDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->BusRequestID}}" class = "NEW btn btn-block btn-flat btn-primary btn-xs"> {{$di -> DocumentName}} | {{$di -> BusDocStatus}} </a>
                                @elseif($di->BusDocStatus == "Pending")
                                  <a  href="<?php echo 'createBusDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->BusRequestID}}" class = "PEN btn btn-block btn-flat btn-warning btn-xs"> {{$di -> DocumentName}} | {{$di -> BusDocStatus}} </a>
                                @elseif($di->BusDocStatus == "For Approval")
                                  <a  href="<?php echo 'createBusDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->BusRequestID}}" class = "APP btn btn-block btn-flat btn-success btn-xs"> {{$di -> DocumentName}} | {{$di -> BusDocStatus}}  </a>
                                @elseif($di->BusDocStatus == "Done")
                                  <a  class = "DON btn btn-block btn-flat bg-navy btn-xs" disabled> {{$di -> DocumentName}} | {{$di -> BusDocStatus}} </a>
                                @elseif($di->BusDocStatus == "Cancelled")
                                  <a class = "CAN btn btn-flat btn-block btn-info btn-danger btn-xs" disabled="disabled"> {{$di -> DocumentName}} | {{$di -> BusDocStatus}}</a>
                                @endif
                              @endif
                            @endforeach
                          </td>
                          <td>
                            <button data-toggle="modal" data-target = "#cancel" value="{{$info->BusRequestID}}" class = "btn btn-block btn-danger btn-sm btn-flat" onclick = "modalCancel(this)"><i class="fa fa-ban"></i><button  onclick = "sendMail({{$info->BusRequestID}}, 'Bus')" class="btn btn-sm btn-block btn-success btn-flat"><i class="fa fa-send"></i></button>
                          </td> 
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!--row-->

<!--////////////////////////////****************CANCEL MODAL*****************************/////////////////////////-->
  <div class="modal fade" id="cancel" name="cancel">
    <div class="modal-dialog modal-lg" style="width: 650px">
           <form method = "POST" action="{{URL::to('busupdateCancel')}}" onsubmit="return true">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><center>Cancellation of Request</center>
                    </h4>
                  </div>
              <!-- modal content -->
              <div class="modal-body">
                  

                  <div class="col-md-12">
                    <table  style="border-spacing: 17px;border-collapse: separate;">
                      <tbody>
                        <tr>
                          <td width="100px"><span class="label label-primary">Request No.</span></td>
                          <td width="100px"><label for="docNo"></label></td>
                          <td width="100px"><span class="label label-primary">Request Date</span></td>
                          <td width="100px"><label for="docDate"></label></td>
                                        
                        </tr>
                      </tbody>
                    </table>
                  </div>

                    <div class="col-md-12">
                      <br>
                      <input type="text" id="sampleID" name="sampleID" hidden="">
                      <table class="table table-bordered" style="font-size: 14px;" id="tblcancel">
                        <thead>
                            <tr>
                              <th>Document</th>
                              <th>Status</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>


                  

               <div class="modal-footer">
                <button type="submit" class="btn btn-danger"  id="btnCancel" >Submit</button>
              </div><!-- /.modal-content -->
            
              </div>
        </div><!-- content -->
      </form>
  </div>
</div>
  <!--////////////////////////////****************CANCEL MODAL*****************************////////?/////////////////-->
      




            <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

            <script type = "text/javascript">


              $(document).ready(function(){
                $('#example1').DataTable( {
                    "order": [[ 0, "desc" ]]
                } );

                var id = $('#txtOfficialID').val();
                  $.ajax({
                    type: 'POST',
                    url: 'getAccess',
                    data: {id: id},
                    dataType: 'JSON',
                    success: function(data) {
                      
                        if(data.access[0].isNew == '0') {
                            $('.NEW').attr("disabled", "disabled");
                            $('.NEW').removeAttr("href");
                        }

                        if(data.access[0].isPend == '0') {
                            $('.PEN').attr("disabled", "disabled");
                            $('.PEN').removeAttr("href");
                        }

                        if(data.access[0].isApp == '0') {
                            $('.APP').attr("disabled", "disabled");
                            $('.APP').removeAttr("href");
                        }

                     
                    },error:function(request, error){
                      alert('huhuhu' + error);
                    }
                  }).error(function(ts){
                      alert(ts.responseText);
                    });



              });


              
              


            </script>


            <script type="text/javascript">

                function sendMail(x, y)
              {
                if(y == "Bus")
                {
                  window.location.href = "{{URL::to('sendRBusDocStat')}}?ReqID="+x;

                }
               
              }
              
                function modalCancel(x) {
 
                 $('#tblcancel tbody').empty();

                  $.ajax({
                    type: 'POST',
                    url: 'busgetCancel',
                    data: {id: x.value},
                    dataType: 'JSON',
                    success: function(data) {
                      $.each(data.cancel, function(key, val){
                        $('#tblcancel tbody').append('<tr><td>'+val.DocumentName+'</td><td>'+val.BusDocStatus+'</td></tr>');
                         $('#sampleID').val(val.BusRequestID);
                         $("label[for='docNo']").html(val.BusRequestID);
                         $("label[for='docDate']").html(val.DateOfRequest);
                         });
                      
                     
                    },error:function(request, error){
                      alert('huhuhu' + error);
                    }
                  }).error(function(ts){
                      alert(ts.responseText);
                    });
                }//modalCancel
            </script>
    </section>



@stop