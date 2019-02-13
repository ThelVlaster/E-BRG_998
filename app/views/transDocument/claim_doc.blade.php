@extends('layouts.master')

@section('content')


	
		<section class="content-header">
            <h1>
              Transaction <small>Claim Documents</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'TransactionMenu' ?>"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li>Documents</li>
              <li class="active">Claim Documents</li>
            </ol>
          </section>

         <section class = "content">

		<div class="row">

              
               <div class="col-md-2">

                  <input type="text" id="hiddenPosition" value = "{{Session::get('position')}}" hidden>
                
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Type</h3>
                    <div class="box-tools">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                      <li><a href="<?php echo 'claimDocs' ?>?sort=reg"><i class="fa  fa-envelope text-maroon"></i> Regular</a></li>
                      <li><a href="<?php echo 'claimDocs' ?>?sort=bus"><i class="fa  fa-envelope text-blue"></i> Business</a></li>
                    </ul>
                  </div><!-- /.box-body -->
                </div><!-- /. box -->


              </div><!-- /.col -->

              <!--right side-->
              <div class="col-md-10">
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
                          <th bgcolor="#ccffcc" colspan="4">Request Details</th>
                          <th bgcolor="#ffe6e6" colspan="5">Claiming Details</th>
                        </tr>

                        <tr>
                          
                          <th>Requested by</th>
                          <th>Requested For</th>
                          <th>Type</th>
                          <th>Date Requested</th>
                          <th>Date Claimed</th>
                          <th>Claimed by</th>
                          <th>Released by</th>
                          <th width="100px">Document | Status</th>
                          <th></th>


                        </tr>
                      </thead>

                      @if($sort == 'reg')
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
                          
                           
                              <td>@foreach($claim as $di)
                                @if($info->RequestID == $di->RequestID)
                                  
                                    {{$di -> DateClaimed}}
                                 
                                @endif
                              @endforeach</td>
                              <td>@foreach($claim as $di)
                            @if($info->RequestID == $di->RequestID){{$di -> Claimedby}}@endif
                              @endforeach</td>
                              <td>@foreach($claim as $di)
                            @if($info->RequestID == $di->RequestID){{$info -> FirstName}} {{$info -> LastName}}@endif
                              @endforeach</td>


                          

                          <td>
                            @foreach($docInfo as $di)
                              @if($info->RequestID == $di->RequestID)
                                @if($di->DocReqStatus == "Done")
                                  <button type = "button"  class = "btn btn-block btn-flat bg-purple btn-xs" data-toggle="modal" data-target = "#firstPrint" onclick = "getFirstPrint({{$di->RequestID}}, {{$di->DocumentID}}, 'Reg')">{{$di -> DocumentName}} | Unclaimed</button>
                                @elseif($di->DocReqStatus == "Printed")
                                  <a  class = "NEW btn btn-block btn-flat bg-navy btn-xs" disabled> {{$di -> DocumentName}} | Printed</a>

                                 @elseif($di->DocReqStatus == "Claimed")
                                  <a  class = "NEW btn btn-block btn-flat btn-info btn-xs" disabled> {{$di -> DocumentName}} | Claimed</a>

                                @endif
                              @endif
                            @endforeach
                          </td>

                        <td>
                                @if($info->DocReqStatus == "Done")
                                <button data-toggle="modal" data-target = "#claim" value="{{$info->RequestID}}" class = "btn btn-block btn-danger btn-sm btn-flat" onclick = "modalClaim(this, 'Reg')" disabled><i class="fa fa-check-circle" ></i></button>
                                <button data-toggle="modal" data-target = "#print" value="{{$info->RequestID}}"  class="btn btn-sm btn-block btn-primary btn-flat" onclick = "modalPrint(this, 'Reg')" disabled><i class="fa fa-print"></i></button>
                                <button onclick = "sendMail({{$info->RequestID}}, 'Reg', {{$info->RFType}})" class="btn btn-block btn-sm btn-success btn-flat"><i class="fa fa-send"></i></button>

                                 @elseif($info->DocReqStatus == "Printed")
                                <button data-toggle="modal" data-target = "#claim" value="{{$info->RequestID}}" class = "btn btn-block btn-danger btn-sm btn-flat" onclick = "modalClaim(this, 'Reg')" ><i class="fa fa-check-circle"></i></button>
                                <button data-toggle="modal" data-target = "#print" value="{{$info->RequestID}}"  class="btn btn-sm btn-block btn-primary btn-flat" onclick = "modalPrint(this, 'Reg')" disabled><i class="fa fa-print" ></i></button>
                                <button onclick = "sendMail({{$info->RequestID}}, 'Reg', {{$info->RFType}})" class="btn btn-block btn-sm btn-success btn-flat"><i class="fa fa-send"></i></button
                                >
                                 @elseif($info->DocReqStatus == "Claimed")
                                <button data-toggle="modal" data-target = "#claim" value="{{$info->RequestID}}" class = "btn btn-block btn-danger btn-sm btn-flat" onclick = "modalClaim(this, 'Reg')" disabled><i class="fa fa-check-circle"></i></button><button data-toggle="modal" data-target = "#print" value="{{$info->RequestID}}"  class="btn btn-sm btn-block btn-primary btn-flat" onclick = "modalPrint(this, 'Reg')"><i class="fa fa-print"></i></button><button onclick = "sendMail({{$info->RequestID}}, 'Reg', {{$info->RFType}})" class="btn btn-block btn-sm btn-success btn-flat"><i class="fa fa-send"></i></button>
                                @endif
                          </td>
                        </tr>
                        @endforeach
                  
                      </tbody>
                      

                      @elseif($sort == 'bus')
                        <tbody>
                         @foreach($info as $info)
                        <tr>
                          
                          <td align="center"><span class="label label-warning">BD2016-{{$info -> BusRequestID}}</span></td>
                          <td>{{$info -> BusRequestor}}</td>
                          <td>{{$info -> BusinessName}}</td>
                          <td>{{$info -> BusPermitType}}</td>
                          <td>{{$info -> DateOfRequest}}</td>
                          <td>{{$info -> DateClaimed}}</td>
                          <td>{{$info -> Claimedby}}</td>
                          <td>{{$info -> FirstName}} {{$info -> LastName}}</td>
                             


                          <td>
                                @if($info->BusDocStatus == "Done")
                                  <button type = "button"  class = "btn btn-block btn-flat bg-purple btn-xs" data-toggle="modal" data-target = "#firstPrint" onclick = "getFirstPrint({{$info->BusRequestID}}, {{$info->BusDocumentID}}, 'Bus')">{{$info -> DocumentName}} | Unclaimed</button>

                                @elseif($info->BusDocStatus == "Printed")
                                  <a  class = "NEW btn btn-block btn-flat bg-navy btn-xs" disabled>{{$info -> DocumentName}} | Printed</a>

                              
                                 @elseif($info->BusDocStatus == "Claimed")
                                  <a  class = "NEW btn btn-block btn-flat btn-info btn-xs" disabled>{{$info -> DocumentName}} | Claimed</a>
                                @endif
                          </td>

                          <td>@if($info->BusDocStatus == "Done")
                            <button data-toggle="modal" data-target = "#claim" value="{{$info->BusRequestID}}" class = "btn btn-block btn-danger btn-sm btn-flat" onclick = "modalClaim(this, 'Bus')" disabled><i class="fa fa-check-circle"></i></button><button data-toggle="modal" data-target = "#print" value="{{$info->BusRequestID}}" onclick = "modalPrint(this, 'Bus')" class="btn btn-sm btn-block btn-primary btn-flat" disabled><i class="fa fa-print"></i></button><button  onclick = "sendMail({{$info->BusRequestID}}, 'Bus')" class="btn btn-sm btn-block btn-success btn-flat"><i class="fa fa-send"></i></a>
                            @elseif($info->BusDocStatus == "Printed")
                            <button data-toggle="modal" data-target = "#claim" value="{{$info->BusRequestID}}" class = "btn btn-block btn-danger btn-sm btn-flat" onclick = "modalClaim(this, 'Bus')"><i class="fa fa-check-circle"></i></button><button data-toggle="modal" data-target = "#print" value="{{$info->BusRequestID}}" onclick = "modalPrint(this, 'Bus')" class="btn btn-sm btn-block btn-primary btn-flat" disabled><i class="fa fa-print"></i></button><button  onclick = "sendMail({{$info->BusRequestID}}, 'Bus')" class="btn btn-sm btn-block btn-success btn-flat"><i class="fa fa-send"></i></a>
                             @elseif($info->BusDocStatus == "Claimed")
                              <button data-toggle="modal" data-target = "#claim" value="{{$info->BusRequestID}}" class = "btn btn-block btn-danger btn-sm btn-flat" onclick = "modalClaim(this, 'Bus')" disabled><i class="fa fa-check-circle"></i></button><button data-toggle="modal" data-target = "#print" value="{{$info->BusRequestID}}" onclick = "modalPrint(this, 'Bus')" class="btn btn-sm btn-block btn-primary btn-flat"><i class="fa fa-print"></i></button><button  onclick = "sendMail({{$info->BusRequestID}}, 'Bus')" class="btn btn-sm btn-block btn-success btn-flat"><i class="fa fa-send"></i></button>
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
            </div><!--row-->

<!--////////////////////////////****************claim MODAL*****************************/////////////////////////-->
  <div class="modal fade" id="claim" name="claim">
    <div class="modal-dialog modal-lg" style="width: 1250px">
           <form method = "POST" action="{{URL::to('claimingDocument')}}" onsubmit="return true">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><center>Claiming of Document/s</center>
                    </h4>
                  </div>
              <!-- modal content -->
              <div class="modal-body">
                  

                  <div class="col-md-5">
                  <div class="well">
                    <table  style="border-spacing: 17px;border-collapse: separate;">
                      <tbody>
                        <tr>
                          <td width="50px"><span class="label label-primary">Request No.</span></td>
                          <td width="150px"><label for="docNo"></label></td>
                          <td width="50px"><span class="label label-primary">Request Date</span></td>
                          <td width="150px"><label for="docDate"></label></td>
                                        
                        </tr>
                      </tbody>
                    </table>
                 
                      <br>
                      <input type="text" id="sampleID" name="sampleID" hidden="">
                      <table class="table table-bordered" style="font-size: 14px; border-outline:black" id="tblclaim">
                        <thead>
                            <tr>
                              <th>Document</th>
                              <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>

                      <label>Claimed by</label>
                      <input type="text" class="form-control" id="claimedby" name="claimedby">
                      <input type="number" name="ctr" id = "ctr" hidden="" value = "0">
                      <input type="hidden" name="docType" id = "docType">
                    </div><!-- col3 -->

                    <button type="submit" class="btn btn-danger btn-flat pull-left"  id="btnClaimSubmit" >Submit</button>
                  </div>

                    <div class="form-group">
                      <div class="box-body">
                        <div class="col-md-7" id="docTemplate" style="overflow:auto; width:700px; height:450px">
                      </div>
                    </div>

                    </div>


                  
                </div>
               <div class="modal-footer">
                
              </div><!-- /.modal-content -->
            
              </div>
      </form>
  </div>
</div>
  <!--////////////////////////////****************CANCEL MODAL*****************************////////?/////////////////-->



<div class="modal fade" id="firstPrint" name="firstPrint">
    <div class="modal-dialog modal-lg" style="width: 1250px">
           
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><center>Printing of Document</center>
                    </h4>
                  </div>
              <!-- modal content -->
              <div class="modal-body">
                  

                  <div class="col-md-12">
                  <div class="well">
                    <table  style="border-spacing: 17px;border-collapse: separate;">
                      <tbody>
                        <tr>
                          <td width="50px"><span class="label label-primary">Request No.</span></td>
                          <td width="150px"><label for="docNo"></label></td>
                          <td width="50px"><span class="label label-primary">Request Date</span></td>
                          <td width="150px"><label for="docDate"></label></td>
                          <td width="50px"><span class="label label-primary">Document Name</span></td>
                          <td width="150px"><label for="docName"></label></td>
                                        
                        </tr>
                      </tbody>
                    </table>
                 
                      <br>
                      <input type="text" id="sampleID" name="sampleID" hidden="">

                      <div id = "hiddenFields"></div>

                      
                    </div><!-- col3 -->

                    <button type="button" class="btn btn-danger btn-flat pull-left"  id="btnFirstSubmit" disabled = "disabled" >Submit</button> 
                    <button type="button" class="btn btn-success btn-flat pull-right"  id="btnFirstPrint" >Download</button>


                  </div>
                    
                    <div class="form-group" align="center">
                      <h4><span class="label label-primary">Document Preview</span></h4>
                      <div class="box-body" style="overflow:auto">
                        <div class="col-md-7" id="previewFinal">
                      </div>
                    </div>

                    </div>

                    


                  
                </div>
               <div class="modal-footer">
                
              </div><!-- /.modal-content -->
            
              </div>
  </div>
</div>




<!--////////////////////////////****************ADPRINT MODAL*****************************/////////////////////////-->
  <div class="modal fade" id="print" name="print">
    <div class="modal-dialog modal-lg" style="width: 550px">
           <form method = "POST" action="{{URL::to('ReprintPayment')}}" onsubmit="return false" id = "reprinting" name = "reprinting" enctype="multipart/form-data">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Print Additional Copy
                    </h4>
                  </div>
              <!-- modal content -->
              <div class="modal-body">
                  
              <div class="box-body">
                  <div class="col-md-12">
               
                    <table  style="border-spacing: 17px;border-collapse: separate;">
                      <tbody>
                        <tr>
                          <td width="50px"><span class="label label-warning">Request No.</span></td>
                          <td width="150px"><label for="pdocNo"></label></td>
                          <td width="50px"><span class="label label-warning">Request Date</span></td>
                          <td width="150px"><label for="pdocDate"></label></td>
                                        
                        </tr>
                      </tbody>
                    </table>
                 
                      <br>
                      <input type="text" id="psampleID" name="psampleID" hidden="">
                      <table class="table table-bordered" style="font-size: 14px; border-outline:black" id="tblprint">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Document</th>
                            <th>No. of Additional Copies</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>

                      <input type="hidden" name="ReprintCTR" id="ReprintCTR" value = "0">
                      <input type="text" name="pDocType" id = "pDocType" hidden="">



                    
                  </div><button type="submit" class="btn btn-danger btn-flat pull-right"  id="btnReprintConfirm">Confirm</button>

                  <br><br>

                  <div id = "ReprintPayment"></div>
                </div>
                </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-flat pull-left"  id="btnDoneReprint" style="align:center; display:none" >Done</button>
              </div><!-- /.modal-content -->
            
              </div>
      </form>
  </div>
</div>
  <!--////////////////////////////****************ADPRINT MODAL*****************************////////?/////////////////-->



            <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

            <script type = "text/javascript">


              $(document).ready(function(){

                 $('#example1').DataTable( {
                    "order": [[ 0, "desc" ]]
                } );




                if($('#hiddenPosition').val() == "Kagawad")
                {
                  $('.PEN').attr("disabled", "disabled");
                  $('.PEN').removeAttr("href");
                  $('.APP').attr("disabled", "disabled");
                  $('.APP').removeAttr("href");

                }
                else if($('#hiddenPosition').val() == "Secretary")
                {

                  $('.NEW').attr("disabled", "disabled");
                  $('.NEW').removeAttr("href");
                  $('.APP').attr("disabled", "disabled");
                  $('.APP').removeAttr("href");
                }
                else if($('#hiddenPosition').val() == "Chairman")
                {

                  $('.NEW').attr("disabled", "disabled");
                  $('.NEW').removeAttr("href");
                  $('.PEN').attr("disabled", "disabled");
                  $('.PEN').removeAttr("href");
                }


                

                $('#btnFirstSubmit').click(function(){
                  $.ajax({
                    type: 'POST',
                    url: 'donePrinting',
                    data: {
                      rID: $('#forReqID').val(),
                      dID: $('#forDocID').val()
                    },
                    success: function(data){
                      window.location.href = "{{URL::to('claimDocs')}}?sort=reg";
                    }
                  });
                });

                $('#btnFirstPrint').click(function(){
                  $('#btnFirstSubmit').removeAttr('disabled');
                  //alert($('#fpDoctType').val());
                  if($('#fpDoctType').val() == "Reg")
                  {
                    window.location.href = "{{URL::to('printTemplate')}}?idr="+$('#forReqID').val()+"&idd="+$('#forDocID').val()+"";
                  }
                  else
                  {
                    window.location.href = "{{URL::to('busprintTemplate')}}?idr="+$('#forReqID').val()+"&idd="+$('#forDocID').val()+"";
                  }

                  
                });



                $('#reprinting').submit(function(){
                    $.ajax({
                      type: 'POST',
                      url: $(this).attr('action'),
                      data: new FormData(this),
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType:'JSON',
                      success: function(data){
                        console.log(JSON.stringify(data));
                        $('#btnDoneReprint').show();
                        $('#btnReprintConfirm').hide();
                        $('#ReprintPayment').html('<h4><span class="label label-warning">Payment</span><h4><hr><table class="table table-bordered" style="font-size: 14px; border-outline:black" id="additional">'+
                          '<thead>'+
                            '<tr>'+
                              '<th>Document</th>'+
                              '<th>Payment</th>'+
                              '<th>Print</th>'+
                            '</tr>'+
                          '</thead>'+
                          '<tbody>'+
                          '</tbody>'+
                        '</table>');

                        $('#ReprintPayment').append('<label>Total Amount:</label><input type = "text" class = "form-control" id = "total" name = "total" value = "0">');
                        $('#ReprintPayment').append('<br><label>Paid by:</label><input type = "text" class = "form-control" id = "paidBy" name = "paidBy">');


                        var i = 0;
                        $.each(data.doc, function(key1, val1){
                          $('#additional tbody').append('<tr align = "center">'
                            +     '<td>'+val1.DocumentName+'</td>'
                            +     '<td>'+(val1.DuplicateFee*data.adds[i]).toFixed(2)+'</td>'
                            +     '<td><button type = "button" class="btn btn-success btn-flat" onclick = "dunno('+val1.DocumentID+', '+$('label[for="pdocNo"]').html()+')">PRINT</button></td>'

                            +'</tr>');

                            var total = parseInt($('#total').val())+(parseInt(val1.DuplicateFee)*parseInt(data.adds[i]));
                            $('#total').val(total.toFixed(2));
                          i++;
                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("can't do this because: " + error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });//error

                  });//addform


                $('#btnDoneReprint').click(function(){
                  $.ajax({
                    type: 'POST',
                    url: 'reprintDone',
                    data: {
                      rID: $('label[for="pdocNo"]').html(),
                      total: $('#total').val(),
                      paidBy: $('#paidBy').val(),
                      docType: $('#pDocType').val()
                    },
                    success: function(data){
                      if($('#pDocType').val() == "Reg")
                      {
                        window.location.href = "{{URL::to('claimDocs')}}?sort=reg";
                      }
                      else
                      {
                        window.location.href = "{{URL::to('claimDocs')}}?sort=bus";
                      }
                      
                    }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });
                });


                

              });//document


            </script>

            <script type="text/javascript">
              function sendMail(x, y, type)
              {
                if(y == "Reg")
                {
                  window.location.href = "{{URL::to('sendDocStat')}}?ReqID="+x+"&reqType="+type;

                }
                else
                {
                  window.location.href = "{{URL::to('sendBusDocStat')}}?ReqID="+x;
                }
              }

              function dunno(idd, idr)
              { 
                if($('#pDocType').val() == "Reg")
                {
                  window.location.href = "{{URL::to('printTemplate')}}?idr="+idr+"&idd="+idd+"";
                }
                else
                {
                   window.location.href = "{{URL::to('busprintTemplate')}}?idr="+idr+"&idd="+idd+"";
                }
                
              }
              
                function modalClaim(x, y) {
 
                 $('#tblclaim tbody').empty();

                  $.ajax({
                    type: 'POST',
                    url: 'getClaim',
                    data: {id: x.value,
                            docType: y},
                    dataType: 'JSON',
                    success: function(data) {
                      var i = 0;
                      if (y == 'Reg'){
                        $.each(data.claim, function(key, val){
                          $('#tblclaim tbody').append('<tr align = "center"><td>'+val.DocumentName+' <input type = "hidden" id = "docID_'+i+'" name = "docID_'+i+'" value = "'+val.DocumentID+'"></td><td><a class="btn btn-xs  btn-primary btn-flat" value="'+val.DocumentID+'" onclick="modalView('+val.DocumentID+')"><i class="fa fa-eye"></i></a></td></tr>');
                           $('#sampleID').val(val.RequestID);
                           $('#claimedby').val(val.Requestor);
                           $("label[for='docNo']").html(val.RequestID);
                           $("label[for='docDate']").html(val.DateOfRequest);
                           $('#docType').val(y);
                           $('#ctr').val(parseInt($('#ctr').val())+1);
                           i++;
                           });
                        $("#docTemplate").html(data.claim[0].TemplateFinal);
                       }
                       else
                       {
                        $.each(data.claim, function(key, val){
                          $('#tblclaim tbody').append('<tr align = "center"><td>'+val.DocumentName+' <input type = "hidden" id = "docID_'+i+'" name = "docID_'+i+'" value = "'+val.DocumentID+'"></td><td><a class="btn btn-xs  btn-primary btn-flat" value="'+val.DocumentID+'" onclick="modalView('+val.DocumentID+')"><i class="fa fa-eye"></i></a></td></tr>');
                           $('#sampleID').val(val.BusRequestID);
                           $('#claimedby').val(val.BusRequestor);
                           $("label[for='docNo']").html(val.BusRequestID);
                           $("label[for='docDate']").html(val.DateOfRequest);
                           $('#docType').val(y);
                           $('#ctr').val(parseInt($('#ctr').val())+1);
                           i++;
                           });
                        $("#docTemplate").html(data.claim[0].BusTemplate);
                       }
                    },error:function(request, error){
                      alert('huhuhu' + error);
                    }
                  }).error(function(ts){
                      alert(ts.responseText);
                    });
                }//modalCancel


                function modalPrint(x, y) {
 
                 $('#tblprint tbody').empty();
                 //alert(x.value);

                  $.ajax({
                    type: 'POST',
                    url: 'getAdPrint',
                    data: {id: x.value,
                          docType: y},
                    dataType: 'JSON',
                    success: function(data) {
                      var i = 0
                      if(y == "Reg"){
                        $.each(data.print, function(key, val){
    
                          $('#ReprintCTR').val(parseInt($('#ReprintCTR').val())+1);
  
                          $('#tblprint tbody').append('<tr><td><input type="checkbox" id="pcheckbox_'+i+'" name="pcheckbox_'+i+'" value="'+val.DocumentID+'" checked><input type ="hidden" name = "hiddenDocID_'+i+'" value = "'+val.DocumentID+'"> <input type = "hidden" name = "hiddenReqID_'+i+'" value = "'+x.value+'"></td><td>'+val.DocumentName+'</td><td><input type="number" id="adcopy_'+i+'" name="adcopy_'+i+'" min="1" value="1" class="form-control"></td></tr>');
                           $('#psampleID').val(val.RequestID);
                           $("label[for='pdocNo']").html(val.RequestID);
                           $("label[for='pdocDate']").html(val.DateOfRequest);
                           $('#pDocType').val(y);
                           i++;
                           });
                      }
                      else
                      {
                        $.each(data.print, function(key, val){
    
                          $('#ReprintCTR').val(parseInt($('#ReprintCTR').val())+1);
  
                          $('#tblprint tbody').append('<tr><td><input type="checkbox" id="pcheckbox_'+i+'" name="pcheckbox_'+i+'" value="'+val.DocumentID+'" checked><input type ="hidden" name = "hiddenDocID_'+i+'" value = "'+val.DocumentID+'"> <input type = "hidden" name = "hiddenReqID_'+i+'" value = "'+x.value+'"></td><td>'+val.DocumentName+'</td><td><input type="number" id="adcopy_'+i+'" name="adcopy_'+i+'" min="1" value="1" class="form-control"></td></tr>');
                           $('#psampleID').val(val.BusRequestID);
                           $("label[for='pdocNo']").html(val.BusRequestID);
                           $("label[for='pdocDate']").html(val.DateOfRequest);
                           $('#pDocType').val(y);
                           i++;
                           });
                      }
 
                    },error:function(request, error){
                      alert('huhuhu' + error);
                    }
                  }).error(function(ts){
                      alert(ts.responseText);
                    });
                }//modalCancel




                function modalView(y) {
 
               $('#docTemplate').empty();

                 var z = $('#sampleID').val();
                  $.ajax({
                    type: 'POST',
                    url: 'getView',
                    data: {docid: y,
                            reqid: z},
                    dataType: 'JSON',
                    success: function(data) {
                       $.each(data.view, function(key, val){
                          $("#docTemplate").html(val.TemplateFinal);
                       }); 

                    },error:function(request, error){
                      alert('huhuhu' + error);
                    }
                  }).error(function(ts){
                      alert(ts.responseText);
                    });
                }//modalCancel

                function getFirstPrint(rID, dID, doctype)
                {
                  //alert(doctype);
                  $.ajax({
                    type: 'POST',
                    url: 'getFirstPrint',
                    data: {
                      rID: rID,
                      dID: dID,
                      docType: doctype
                    },
                    dataType: 'JSON',
                    success: function(data){
                      

                      $('label[for="docNo"]').html(rID);
                      $('label[for="docDate"]').html(data.request[0].DateOfRequest);
                      $('label[for="docName"]').html(data.request[0].DocumentName);

                      $('#hiddenFields').html('');
                      $('#hiddenFields').append('<input type = "hidden" value = "'+dID+'" id = "forDocID">');
                      $('#hiddenFields').append('<input type = "hidden" value = "'+rID+'" id = "forReqID">');


                      if(doctype == "Reg")
                      {
                        $('#previewFinal').html(data.request[0].TemplateFinal);
                        $('#hiddenFields').append('<input type = "hidden" value = "Reg" name = "fpDocType" id = "fpDoctType">');
                      }
                      else
                      {
                        $('#previewFinal').html(data.request[0].BusTemplate);
                        $('#hiddenFields').append('<input type = "hidden" value = "Bus" name = "fpDocType" id = "fpDoctType">');
                      }
                    }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });
                }
            </script>

    </section>



@stop