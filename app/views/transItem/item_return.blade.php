
@extends('layouts.master')
@section('content')


          <section class="content-header">
            <h1>
              Transaction
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li class="active">Return Item/ Facility</li>
            </ol>
          </section>
          
          <input type="hidden" id="offID" name="hiddenOfficialID" value = "{{Session::get('OfficialID')}}" hidden>
          <input type="hidden" id="hiddenResidentID" name="hiddenResidentID" value = "{{Session::get('ResidentID')}}"hidden>  

<section class="content">
    <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Return Items</h3>
                     <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                     </div><!-- /.box-tools -->
              </div><!-- /.box-header -->

                <!-- form start -->

 <div class="box-body">
    <div class="col-md-12" id="requestform">
      <div style="display:none">
      @if ($ItemCtr=='0')
      <input type="text" id="issueID" value="{{$ItemCtr}}">
      @else
      <input type="text" id="issueID" value="{{$issue[0]->ItemIssueID}}">
      @endif

      <input type="text" id="DateFrom" value="{{$reserve[0]->DateReserveFrom}}">
      <input type="text" id="DateTo" value="{{$reserve[0]->DateReserveTo}}">
      <input type="text" id="TimeFrom" value="{{$reserve[0]->TimeReserveFrom}}">
      <input type="text" id="TimeTo" value="{{$reserve[0]->TimeReserveTo}}">

      <input type="text" id="reserveID" value="{{$reserve[0]->ReservationID}}">
      <input type="text" id="paymentStat" value="{{$reserve[0]->PaymentStatus}}">
      <input type="text" id="timereserve" value="{{$reserve[0]->TimeReserveTo}}">
      <input type="text" id="datereserve" value="{{$reserve[0]->DateReserveTo}}">
      <input type="text" id="reqtype" value="{{$reserve[0]->RequestorType}}">
      <input type="text" id="remain" value='0'>
      <input type="text" id="hour" value='0'>
      <input type="text" id="Facall" value='0'>
      <input type="text" id="itemall" value='0'>
      <input type="text" id="devall" value='0'>
      <input type="text" id="allall" value="0">
      <input type="text" id="txtpenalty" value="0">
      <input type="text" id="txtitem" value="0">
      <input type="text" id="devctr" value='0'>

      @if ($facCtr=='0')
      <input type="text" id="FacissueID" value="{{$facCtr}}">
      @else
      <input type="text" id="FacissueID" value="{{$Facissue[0]->FacIssueID}}">
      @endif
      </div>

            @if($reserve[0]->RequestorType=='0')
              <div class="form-group">
                <label for="exampleInputEmail1">Requestor Name*</label>
                <input type="text" 
                      class="form-control" 
                      id="requestorname" 
                      name="requestorname" 
                      value="{{$reserve[0]->LastName}} {{$reserve[0]->FirstName}}"
                      placeholder="Requestor Name"
                      required="required"
                      disabled>
              </div>
            @else
              <div class="form-group">
                <label for="exampleInputEmail1">Requestor Name*</label>
                <input type="text" 
                      class="form-control" 
                      id="requestorname" 
                      name="requestorname"  
                      value="{{$reserve[0]->NonResName}}"
                      placeholder="Requestor Name"
                      required="required"
                      disabled>
              </div>
            @endif
     
      @if($ItemCtr=="0")
              <div class="form-group">
                <label for="exampleInputEmail1">Date Issued*</label>
                <input type="text" 
                       class="form-control" 
                       id="dateFacIssue" 
                       name="dateFacIssue"
                       value="{{$Facissue[0]->DateFacIssue}}"
                       placeholder="Date Issued"
                       required="required"
                       disabled>                             
              </div>
        @elseif ($facCtr=="0")
              <div class="form-group">
                <label for="exampleInputEmail1">Date Issued*</label>
                <input type="text" 
                       class="form-control" 
                       id="dateIssue" 
                       name="dateIssue"
                       value="{{$issue[0]->DateIssue}}"
                       placeholder="Date Issued"
                       required="required"
                       disabled>                             
              </div>
        @else
                <div class="form-group">
                <label for="exampleInputEmail1">Date Issued*</label>
                <input type="text" 
                       class="form-control" 
                       id="dateFacIssue" 
                       name="dateFacIssue"
                       value="{{$Facissue[0]->DateFacIssue}}"
                       placeholder="Date Issued"
                       required="required"
                       disabled>                         
              </div>

        @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Date Today*</label>
                <input type="text" 
                       class="form-control" 
                       id="dateToday" 
                       name="dateToday"
                       placeholder="Date Today"
                       required="required"
                       disabled>                         
              </div>

    </div><!-- /.col -->           

      <center><button class="btn btn-info btn-flat" type="button" id="btnSubmit" data-toggle="modal" data-target="#penalty">Submit</button></center>

    </div><!-- box body-->

      </div>  <!--box frimary-->
    </div>  <!--col md-12-->

            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border"> </div><!-- /.box-header -->

                <!-- form start -->

 <div class="box-body">
    <div class="col-md-12">
              <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id = "itemTypes">
                         
                        </ul>
              <div class="tab-content" style="overflow: auto" id = "itemDetails">
            </div> <!--tab content -->
              </div> <!--NAV CUSTOM-->
              </div> <!--col 12-->

      </div> <!--box body-->
      
  </div>  <!--box primary-->

</div> <!--col 8s-->


    <div class="modal fade" id="penalty" name="penalty">
      <div class="modal-dialog modal-lg" style="width: 850px">
          <div class="form-horizontal" >
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="paymentTitle"><i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp; Penalty
                    </h4>
                  </div>
              <!-- modal content -->
              <div class="modal-body">
                <div class="box-body">
                  <div class="col-md-12">
                      <br>
                      <table class="table table-striped" id="PenaltyTable" estyle="font-size: 13px;">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Quantity</th>
                              <th>Reason</th>
                              <th>Penalty Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>

                    <div class="col-md-7">
                      <table  style="border-spacing: 17px;border-collapse: separate;" id = "penaltyInfo">
                        <tbody>

                          <tr bgcolor="#ffffb3">
                            <td><label>Total Penalty Amount: </label></td>
                            <td><input class="form-control" style="width:140%" type="number" step="any" id="penaltyAmt" name="penaltyAmt" value="0" step="any" disabled></td>
                          </tr>

                          <tr bgcolor="#ffffb3">
                            <td align="center"><input type="checkbox" name="penwaived" id="penwaived"></td>
                            <td align="center">Waived</td>
                          </tr>

                          <tr bgcolor="#ffffb3">
                            <td><label>Paid By:*&nbsp;&nbsp;</label></td>
                            <td><input class="form-control" style="width:140%" type="text" id="penpaidby" name="penpaidby" required="required"></td>
                          </tr>
                        </tbody>
                      </table>   
                                    
                    </div>
                  </div>
              </div>
              <div id="nopenalty"></div>
              <div class="modal-footer" id="forButton">
               <button type="submit" class="btn btn-success"  id="btnPenalty">Confirm</button>
              </div><!-- /.modal-content -->
              </div>
              </div>
        </div>
      </div>


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
    var timereserve = $('#timereserve').val();
    var datereserve = $('#datereserve').val();
    var datetoday = String(fyear)+"-"+String(fmonth)+"-"+String(fday)+" "+String(fhh)+":"+String(fmm)+":"+String(fss);

    $('#dateToday').val(datetoday);

    var reserve =String(datereserve)+" "+ String(timereserve);
    var end = datetoday;
    reserve = new Date(reserve);
    end = new Date(end);

    if (reserve < end)
    {
        var diff= end - reserve;
        var seconds= diff/1000;
        var min= Math.floor(seconds/60);
        var hour = Math.floor(min/60);
        var remainMin=(min%60);
        $('#remain').val(remainMin);
        $('#hour').val(hour);
    }


        $('#itemTypes').empty();
        $('#itemDetails').empty();
        $.ajax({
          type: 'POST',
          url: 'issueInfo',
          data: {
                issueID: $('#issueID').val(),
                FacissueID: $('#FacissueID').val(),
                },
          dataType: 'JSON',
          success: function(data){
            // $('#txtBDate').val(data.issueInfo[0].DateIssue);
            // $('#txtOfficial').val(data.issueInfo[0].IssueOfficialID);
            $.each(data.issueType, function(key, val){
              
              $('#itemTypes').append('<li><a href="#tab_'+val.ItemTypeID+'" data-toggle="tab">'+val.ItemName+'</a></li>');

              $('#itemDetails').append('<div class="tab-pane" id="tab_'+val.ItemTypeID+'">'
                      +'<div class="box-header"> '
                      +'</div><!-- /.box-header -->'
                      +'<div class="box-body">'
                      +'<input type="hidden" id="ctr_'+val.ItemTypeID+'" value=0>'
                      + '<table class="table table-bordered table-striped" id = "table_'+val.ItemTypeID+'">'
                      +    '<thead>'
                      +      '<tr>'
                      +        '<th></th>'
                      +        '<th>Item ID</th>'
                      +        '<th>Return Status</th>'
                      +      '</tr>'
                          
                      +    '</thead>'
                      +    '<tbody>'
                      +    '</tbody>'
                      +  '</table>'
                      +'</div>'

                  +'</div>');
            });

            $.each(data.issueIDs, function(key, val){
              $('#table_'+val.ItemTypeID+' tbody').append('<tr>'
                      +        '<td align="center"></td>'
                      +        '<td align="center">'+val.ItemName+ ' - ' + val.ItemID + '</td>'
                      +        '<td align="center"><select id = "select_'+val.ItemTypeID+val.ItemID+'" onchange="penalty('+val.ItemTypeID+','+val.ItemID+',this)"><option selected>Good</option><option>Broken</option><option>Lost</option></select></td>'
                      +      '</tr>');
            });
            
              $.each(data.FacDetails, function(key, val){
                
                $('#itemTypes').append('<li><a href="#tab_'+val.FacilityID+'" data-toggle="tab">'+val.FacilityName+'</a></li>');

                $('#itemDetails').append('<div class="tab-pane" id="tab_'+val.FacilityID+'">'
                        +'<div class="box-header"> '
                        +'</div><!-- /.box-header -->'
                        +'<div class="box-body">'
                        + '<table class="table table-bordered table-striped" id = "Factable_'+val.FacilityID+'">'
                        +    '<thead>'
                        +      '<tr>'
                        +        '<th></th>'
                        +        '<th>Device Name</th>'
                        +        '<th>Return Status</th>'
                        +      '</tr>'
                            
                        +    '</thead>'
                        +    '<tbody>'
                        +    '</tbody>'
                        +  '</table>'
                        +'</div>'

                    +'</div>');
              });

              $.each(data.FacDetails, function(key1, val1){
              
                $('#Factable_'+val1.FacilityID+' tbody').append('<tr>'
                      +        '<td align="center"></td>'
                      +        '<td align="center">'+val1.FacilityName+'</td>'
                      +        '<td align="center"><a class = "btn btn bg-navy btn-xs" style="font-size: 13px;">Clear</a>'
                      +      '</tr>');
            });

            $.each(data.FacDev, function(key1, val1){
              
                $('#Factable_'+val1.DeviceFacilityID+' tbody').append('<tr>'
                      +        '<td align="center"></td>'
                      +        '<td>'+val1.DeviceName+'</td>'
                      +        '<td><select id="Facselect_'+val1.DeviceID+val1.DeviceFacilityID+'" onchange="PenaltyDevice('+val1.DeviceID+','+val1.DeviceFacilityID+',this)"><option selected>Good</option><option>Broken</option><option>Lost</option></select>'
                      +   '<div id="devpen_'+val1.DeviceID+'" name="devpen_'+val1.DeviceID+'" style="display:none"><label>*Penalty Amount:</label><input type="number" style="margin-left:25px" id="devpenalty_'+val1.DeviceID+'" id="devpenalty_'+val1.DeviceID+'" required="required"></div>'
                      +      '</td></tr>');
            });


          },
          error: function(request, error){
              alert(error);
          }
        }).error(function(ts){
          alert(ts.responseText);
        });
    });


$('#btnPenalty').click(function(){
    if ($('#issueID').val()!=0)
    {
        $.ajax({
          type:'POST',
          url: 'returnNa',
          data:
              {
                issueID: $('#issueID').val(),
                reserveid: $('#reserveID').val(),
                offID: $('#offID').val(),
                paidBy: $('#penpaidby').val(),
                penaltyAmt: $('#penaltyAmt').val(),
                txtpenalty: $('#txtpenalty').val(),
                DateFrom: $('#DateFrom').val(),
                TimeFrom: $('#TimeFrom').val(),
                DateTo: $('#DateTo').val(),
                TimeTo: $('#TimeTo').val(),
              },
          dataType: 'JSON',
          success:function(data){
              alert("Success!");

            $.each(data.issueType, function(key, val){
                      $.ajax({
                        type: 'POST',
                        url: 'returnType',
                        data: {itemTypeID: val.ItemTypeID,
                                issueID: $('#issueID').val()},
                        dataType: 'JSON',
                        success: function(data)
                        {
                                alert("Success!");
                          $.each(data.issueIDs, function(key1, val1){
                            if(val.ItemTypeID == val1.ITypeID)
                            {
                                $.ajax({
                                  type: 'POST',
                                  url: 'returnIDs',
                                  data:{itemTypeID: val.ItemTypeID,
                                        itemID: val1.ItemID,
                                        issueID: $('#issueID').val(),
                                        reserveID: $('#reserveID').val(),
                                        stat: $('#select_'+val.ItemTypeID+val1.ItemID).val(),
                                        DateFrom: $('#DateFrom').val(),
                                        TimeFrom: $('#TimeFrom').val(),
                                        DateTo: $('#DateTo').val(),
                                        TimeTo: $('#TimeTo').val(),},
                                  dataType: 'JSON',
                                  success: function(data)
                                  {
                                      alert("Success!");                    
                          
                                  },error: function(request, error){ }
                                  }).error(function(ts){
                                  alert(ts.responseText);
                                  });
                            }
                      // .error(function(ts){
                      //     alert(ts.responseText);
                      //   });
                          });
                        },error: function(request, error){ }
                        }).error(function(ts){
                        alert(ts.responseText);
                        });
                // error:function(requests, errors)
                //   {
                //     alert(errors);
                //   }
                });
              },error: function(request, error){ }
              }).error(function(ts){
              alert(ts.responseText);
              });
          }
          // ,error: function(request, error){
          //   alert(error);
          // }//error

        // .error(function(ts){
        //   alert(ts.responseText);
        // });//ajax
if ($('#FacissueID').val()!=0)
{
        $.ajax({
          type:'POST',
          url: 'returnFacilityHeader',
          data:
              {
                FacissueID: $('#FacissueID').val(),
                reserveid: $('#reserveID').val(),
                offID: $('#offID').val(),
                paidBy: $('#penpaidby').val(),
                penaltyAmt: $('#penaltyAmt').val(),
                txtitem: $('#txtitem').val(),
                txtpenalty: $('#txtpenalty').val(),
                DateFrom: $('#DateFrom').val(),
                TimeFrom: $('#TimeFrom').val(),
                DateTo: $('#DateTo').val(),
                TimeTo: $('#TimeTo').val(),
              },
          dataType: 'JSON',
          success:function(data){

            alert("Success!");
           
             $.each(data.FacIssueDetails, function(key, val){
              $.ajax({
                type: 'POST',
                url: 'returnFacilityDetails',
                data: { facilityID: val.FacilityID,
                        reserveid: $('#reserveID').val(),
                        FacissueID: $('#FacissueID').val(),
                        DateFrom: $('#DateFrom').val(),
                        TimeFrom: $('#TimeFrom').val(),
                        DateTo: $('#DateTo').val(),
                        TimeTo: $('#TimeTo').val(),
                      },
                dataType: 'JSON',
                success: function(data){
                   alert("Success!");
                 
                if (data.DevCtr!=0)
                {
                  $.each(data.issueDevices, function(key1, val1)
                  {
                        $.ajax({
                          type: 'POST',
                          url: 'returnFacilityDevices',
                          data:{
                                DFID: val1.DeviceFacilityID,
                                DeviceID: val1.DeviceID,
                                FacissueID: $('#FacissueID').val(),
                                reserveID: $('#reserveID').val(),
                                 Devstat: $('#Facselect_'+val1.DeviceID+val1.DeviceFacilityID).val(),
                                 DateFrom: $('#DateFrom').val(),
                                TimeFrom: $('#TimeFrom').val(),
                                DateTo: $('#DateTo').val(),
                                TimeTo: $('#TimeTo').val(),
                               },
                          dataType: 'JSON',
                          success: function(data2){
                              alert("Success!");                    
                           // window.location.href = "{{URL::to('ItemRequest')}}";
                            },error: function(request, error){ }
                            }).error(function(ts){
                            alert(ts.responseText);
                            });
                   });
                } // if devctr==0
                else { window.location.href = "{{URL::to('ItemRequest')}}";   }
                 },error: function(request, error){ }
                }).error(function(ts){
                alert(ts.responseText);
                });

                });
             },error: function(request, error){ }
            }).error(function(ts){
            alert(ts.responseText);
            });
          
          // ,error: function(request, error){
          //   alert(error);
          // }//error
        
        // .error(function(ts){
        //   alert(ts.responseText);
        // });//ajax
  }

});

   window.ItemType = [];
   window.Devpen = [];


   function penalty(ItemTypeID,ItemID,stat)
   {
    if (stat.value!='Good')
    { 
      $('#txtitem').val(1);
      ItemType.push(ItemTypeID);
      var ctr = $('#ctr_'+ItemTypeID).val();
      $('#ctr_'+ItemTypeID).val(parseInt(ctr)+1);
    }
    else if (stat.value=='Good')
      {
        $('#txtitem').val(0);
      }
   }

  function PenaltyDevice(devID,facID,devStat)
  {
    $('#devctr').val(1);
    if (devStat.value!='Good')
    { 
      $('#devpen_'+devID).show();
      Devpen.push(devID);
    }
    else if(devStat.value=='Good')
    {
      $('#devpen_'+devID).hide();
      
      for (var ctr=0;ctr<=Devpen.length; ctr++)
      {
        if (Devpen[ctr]==devID)
          {
            Devpen.splice(ctr,1);
          }
      }
    }
  }

  $('#btnSubmit').click(function(){
    var Ioverall=0;
    var quantity=0;
    var totalPenalty=0;
    var facpenalty=0;
    var penperfac=0;
    var penallfac=0;
    var penaltyamt=0;
    var Overalltotal=0;
    $('#Facall').val('0');
    $('#itemall').val('0');
    $('#devall').val('0');
    $('#allall').val("0");
    $('#penaltyAmt').val('0');
    $('#PenaltyTable').show();
    $('#penaltyInfo').show();
    $('#nopenalty').hide();
    $('#PenaltyTable tbody').empty();
     $.ajax({
          type: 'POST',
          url: 'ItemPenalty',
          data: {
                ItemType: ItemType,
                },
          dataType: 'JSON',
          success: function(data){
            if (data.itempen=='1')
                $('#txtitem').val(0);
            else
            {
              $.each(data.penalty, function(key, val){

                quantity = $('#ctr_'+val.ItemTypeID).val();
                totalPenalty = parseFloat(val.Penalty)*parseInt(quantity);
                Ioverall= Ioverall+totalPenalty;

                $('#PenaltyTable tbody').append('<tr>'
                        +        '<td align="center">'+val.ItemName+'</td>'
                        +        '<td align="center">Item</td>'
                        +        '<td align="center">'+quantity+'</td>'
                        +        '<td align="center">Broken / Lost</td>'
                        +        '<td align="center">'+totalPenalty.toFixed(2)+'</td>'
                        +      '</tr>');

                $('#ctr_'+val.ItemTypeID).val(0);

              });

              $('#itemall').val(Ioverall.toFixed(2));
              penaltyamt = parseFloat($('#penaltyAmt').val())+parseFloat($('#itemall').val());
              $('#penaltyAmt').val(penaltyamt.toFixed(2));
              $('#allall').val(penaltyamt.toFixed(2));
            }

             },error: function(request, error){ }
            }).error(function(ts){
            alert(ts.responseText);
            });

  if ($('#remain').val()!="0" || $('#hour').val()!="0")
  {
        $.ajax({
          type: 'POST',
          url: 'FacilityPenalty',
          data: {FacIssueID: $('#FacissueID').val()},
          dataType: 'JSON',
          success: function(data)
          {
              var remainMin=parseFloat($('#remain').val());
              var hour=parseFloat($('#hour').val());
              

              $.each(data.facility, function(key, val)
              {
                var add=0;
                if ($('#reqtype').val()=='0')
                {   

                  facpenalty = parseInt(hour)*parseFloat(val.ResRental);

                  if (remainMin==0)                          
                      add=0;
                  else if (remainMin<=15)
                      add=add+parseFloat(val.ResRental/4);

                    else if (remainMin > 15 && remainMin <= 30)
                      add = add + parseFloat(val.ResRental/2);

                    else if (remainMin > 30 && remainMin <= 45)
                      add = add + parseFloat(val.ResRental*3/4);
                  
                    else if (remainMin > 45)
                      add = parseFloat(val.ResRental);
                }

                else if ($('#reqtype').val()=='1')
                { 

                  facpenalty = hour*parseFloat(val.NResRental);

                  if (remainMin==0)                          
                      add = 0;
                  else if (remainMin <= 15)                          
                    add = add + parseFloat(val.NResRental/4);

                  else if (remainMin > 15 && remainMin <= 30)
                    add = add + parseFloat(val.NResRental/2);

                  else if (remainMin > 30 && remainMin <= 45)
                    add = add + parseFloat(val.NResRental*3/4);
                  
                  else if (remainMin > 45)
                    add = parseFloat(val.NResRental);
                }

                penperfac=parseFloat(facpenalty)+parseFloat(add);
                penallfac = parseFloat(penperfac)+parseFloat(penallfac);
                 $('#PenaltyTable tbody').append('<tr>'
                      +        '<td align="center">'+val.FacilityName+'</td>'
                      +        '<td align="center">Facility</td>'
                      +        '<td align="center">-</td>'
                      +        '<td align="center">'+$('#hour').val()+' hour and '+$('#remain').val()+' minutes extended</td>'
                      +        '<td align="center">'+penperfac.toFixed(2)+'</td>'
                      +      '</tr>');
              });
              $('#Facall').val(penallfac);            
              penaltyamt = parseFloat($('#penaltyAmt').val())+parseFloat($('#Facall').val());
              $('#allall').val(penaltyamt.toFixed(2));
              $('#penaltyAmt').val(penaltyamt.toFixed(2));
             },error: function(request, error){ }
            }).error(function(ts){
            alert(ts.responseText);
            });

    }

  if ($('#devctr').val()!="0")
  {
      $.ajax({
        type: 'POST',
        url: 'DevicePenalty',
        data: {
                FacIssueID: $('#FacissueID').val(),
                deviceid: Devpen,
              },
        dataType: 'JSON',
        success: function(data)
         {
          var penalldev=0;
          var devpenalty;

            $.each(data.device, function(key, val)
            { 
                devpenalty = parseFloat($('#devpenalty_'+val.DeviceID).val());

               $('#PenaltyTable tbody').append('<tr>'
                    +        '<td align="center">'+val.DeviceName+'</td>'
                    +        '<td align="center">Consumable Device</td>'
                    +        '<td align="center">-</td>'
                    +        '<td align="center">Damage/Lost</td>'
                    +        '<td align="center">'+devpenalty.toFixed(2)+'</td>'
                    +      '</tr>');
              
              penalldev=parseFloat(penalldev)+parseFloat($('#devpenalty_'+val.DeviceID).val());

           });
              $('#devall').val(penalldev.toFixed(2));
              penaltyamt = parseFloat($('#penaltyAmt').val())+parseFloat($('#devall').val());
              $('#allall').val(penaltyamt.toFixed(2));
              $('#penaltyAmt').val(penaltyamt.toFixed(2));
           },error: function(request, error){ }
          }).error(function(ts){
          alert(ts.responseText);
          });

  }

else if($('#txtitem').val()=='0' && $('#remain').val()=='0' && $('#hour').val()=='0' && $('#devctr').val()=='0')
  {
   $('#PenaltyTable').hide();
   $('#penaltyInfo').hide();
   $('#nopenalty').show();
   $('#nopenalty').empty();
   $('#nopenalty').append('<div class="callout callout-success"><h4>Congratulations!</h4><p>No Penalty</p></div>');
   $('#txtpenalty').val(1);
  }
    ItemType=[];
  });

$("#penwaived").click(function(){

      if($('#penwaived').is(':checked')) {
        $("#penaltyAmt").val("0.00");
       }

      else {
        $('#penaltyAmt').val($('#allall').val());
      }
  });



</script>

</section>
  @stop