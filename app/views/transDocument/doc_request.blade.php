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

              
               <div class="col-md-3">

                  <input type="text" id="hiddenPosition" value = "{{Session::get('position')}}" hidden>
                <a href="<?php echo 'documentRequestForm' ?>" class="btn btn-info btn-block btn-flat">New Request</a><br>
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
                      <li><a href="<?php echo 'documentRequest' ?>?sort="><i class="fa fa-inbox "></i> All <span class="label bg-maroon pull-right">{{$all}}</span></a> </li>
                      <li><a href="<?php echo 'documentRequest' ?>?sort=New"><i class="fa fa-download"></i> New <span class="label label-primary pull-right">{{$new}}</span></a></li>
                      <li><a href="<?php echo 'documentRequest' ?>?sort=Pending"><i class="fa fa-clock-o"></i> Pending <span class="label label-warning pull-right">{{$pen}}</span></a></li>
                      <li><a href="<?php echo 'documentRequest' ?>?sort=For Approval"><i class="fa fa-check-square-o"></i> For Approval <span class="label label-success pull-right">{{$app}}</span></a></li>
                      <li><a href="<?php echo 'documentRequest' ?>?sort=Done"><i class="fa fa-exclamation-circle"></i> Done <span class="label bg-navy pull-right">{{$done}}</span></a></li>
                      <li><a href="<?php echo 'documentRequest' ?>?sort=Cancelled"><i class="fa fa-ban"></i> Cancelled <span class="label label-danger pull-right">{{$can}}</span></a></li>
                      
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
                          <th>Requestor</th>
                          <th>Requested For</th>
                          <th>Type</th>
                          <th>Date Requested</th>
                          <th width="150px">Document | Status</th>
                          <th></th>


                        </tr>
                      </thead>
                      <tbody>
                      
                        @foreach($info as $info)
                        <tr>
                          
                          <td align="center"><span class="label label-warning">RD2016-{{$info -> RequestID}}</span></td>
                          <td>{{$info -> Requestor}}</td>
                          @if($info -> RFType == 0)
                            @foreach($residents as $res)
                              @if($res->ResidentID == $info->RFResidentID)
                                    <td>{{$res -> FirstName}} {{$res -> LastName}} </td>
                                    <td>Resident</td>
                              @endif
                            @endforeach
                          @endif

                          @if($info -> RFType == 1)
                              @foreach($nonresidents as $nonres)
                                @if($nonres->NonResidentID == $info->RFResidentID)
                                    <td>{{$nonres -> NonResName}} </td>
                                    <td>Non-Resident</td>
                                @endif
                              @endforeach
                            @endif
                          <td>{{$info -> DateOfRequest}}</td>
                          

                        

                          <td>
                            @foreach($docInfo as $di)
                              @if($info->RequestID == $di->RequestID)
                                @if($di->DocReqStatus == "New")
                                  <a  href="<?php echo 'createDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->RequestID}}" class = "NEW btn btn-block btn-flat btn-primary btn-xs"> {{$di -> DocumentName}} | {{$di -> DocReqStatus}}</a>
                                @elseif($di->DocReqStatus == "Pending")
                                  <a  href="<?php echo 'createDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->RequestID}}" class = "PEN btn btn-block btn-flat btn-warning btn-xs"> {{$di -> DocumentName}} | {{$di -> DocReqStatus}}</a>
                                @elseif($di->DocReqStatus == "For Approval")
                                  <a  href="<?php echo 'createDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->RequestID}}" class = "APP btn btn-block btn-flat btn-success btn-xs"> {{$di -> DocumentName}} | {{$di -> DocReqStatus}}</a>
                                @elseif($di->DocReqStatus == "Done")
                                  <a  class = "DON btn btn-block btn-flat bg-navy btn-xs" disabled> {{$di -> DocumentName}} | {{$di -> DocReqStatus}}</a>
                                 @elseif($di->DocReqStatus == "Cancelled")
                                  <a class = "CAN btn btn-block btn-flat btn-danger  btn-xs" disabled> {{$di -> DocumentName}} | {{$di -> DocReqStatus}}</a>
                                
                                @endif
                              @endif
                            @endforeach
                          </td>

                          <td>
                            <!-- <a  href="<?php //echo 'docSummary' ?>?ReqID={{$info->RequestID}}" class = "btn btn-danger btn-xs btn-flat"><i class="fa fa-money"></i></a> --><button data-toggle="modal" data-target = "#cancel" value="{{$info->RequestID}}" class = "btn btn-block btn-danger btn-sm btn-flat" onclick = "modalCancel(this)"><i class="fa fa-ban"></i></button><button onclick = "sendMail({{$info->RequestID}}, 'Reg', {{$info->RFType}})" class="btn btn-block btn-sm btn-success btn-flat"><i class="fa fa-send"></i></button>

                            
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
           <form method = "POST" action="{{URL::to('updateCancel')}}" onsubmit="return true">
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
                              <th></th>
                              <th>Document</th>
                              <th>Status</th>
                              <th>Payment</th>
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




              });//document


            </script>

            <script type="text/javascript">
               function sendMail(x, y, type)
              {
                if(y == "Reg")
                {
                  window.location.href = "{{URL::to('sendRDocStat')}}?ReqID="+x+"&reqType="+type;

                }
                
              }


                function modalCancel(x) {
 
                 $('#tblcancel tbody').empty();

                  $.ajax({
                    type: 'POST',
                    url: 'getCancel',
                    data: {id: x.value},
                    dataType: 'JSON',
                    success: function(data) {
                      $.each(data.cancel, function(key, val){
                        $('#tblcancel tbody').append('<tr><td><input type="checkbox" id="checkbox_'+val.DocumentID+'" name="checkbox_'+val.DocumentID+'" value="'+val.DocumentID+'" checked></td><td>'+val.DocumentName+'</td><td>'+val.DocReqStatus+'</td><td>'+val.PaymentStatus+'</td></tr>');
                         $('#sampleID').val(val.RequestID);
                         $("label[for='docNo']").html(val.RequestID);
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