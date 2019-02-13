@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Transaction
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li><a href="#">Item</a></li>
              <li class="active">Issue Item</li>
            </ol>
          </section>
  <input type="text" id="hiddenResidentID" name="hiddenResidentID" value = "{{Session::get('ResidentID')}}" hidden>
  <input type="text" id="issueID" name="issueID" hidden>

      <!-- Main content -->
      <section class="content">
          <div class="col-md-3">
                <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Issue Item</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                    
                        <div class="form-group">
                         <input type="hidden" id="offID" name="offID" value = "{{Session::get('officialID')}}">
                          <label for="exampleInputEmail1">Reservation ID*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id = "reserveID"
                                 name = "reserveID"
                                 value="{{$reserve[0]->ReservationID}}"
                                 placeholder="Resevation ID"
                                 required="required"
                                 disabled>
                        </div>
                      @if($reserve[0]->RequestorType=='0')
                        <div class="form-group">
                          <label for="exampleInputEmail1">Requestor Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="itemName" 
                                 name="itemName" 
                                 value="{{$reserve[0]->LastName}} {{$reserve[0]->FirstName}}"
                                 placeholder="Reserve To"
                                 required="required"
                                 disabled>
                        </div>
                      @elseif ($reserve[0]->RequestorType=='1')
                        <div class="form-group">
                          <label for="exampleInputEmail1">Requestor Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="itemName" 
                                 name="itemName" 
                                 value="{{$reserve[0]->NonResName}}"
                                 placeholder="Reserve To"
                                 required="required"
                                 disabled>
                        </div>
                      @endif

                        <div class="form-group">
                          <label for="exampleInputEmail1">Reserved From*</label>
                          <input type="text" 
                                 class="form-control" 
                                 value="{{$reserve[0]->DateReserveFrom}} {{$reserve[0]->TimeReserveFrom}}"
                                 placeholder="Items Reserved"
                                 required="required"
                                 disabled>                             
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Reserved To*</label>
                          <input type="text" 
                                 class="form-control" 
                                 value="{{$reserve[0]->DateReserveTo}} {{$reserve[0]->TimeReserveTo}}"
                                 placeholder="Items Reserved"
                                 required="required"
                                 disabled>                             
                        </div>

<div style="display:none">
<input type="text" id="HaveFac">
<input type="text" id="HaveItem">
<input type="text" id="HaveDev">
<input type="text" id="DateFrom" value="{{$reserve[0]->DateReserveFrom}}">
<input type="text" id="DateTo" value="{{$reserve[0]->DateReserveTo}}">
<input type="text" id="TimeFrom" value="{{$reserve[0]->TimeReserveFrom}}">
<input type="text" id="TimeTo" value="{{$reserve[0]->TimeReserveTo}}">
</div>

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center>
                         <button class="btn btn-info btn-flat" id="btnSubmit" data-toggle="modal" data-target="#payments">Submit</button>
                        </center>
                      </div>

                  </div><!-- /.box -->
              </div>

    <div class="col-md-9" id="issueitemform">
        <h5><span class="label label-primary">Reserved Item/Facility</span></h5><br><br>  
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#ItemDetails" data-toggle="tab"><i class="fa fa-gavel"></i>&nbsp;&nbsp;Item</a></li>
            <li><a href="#FacilityDetails" data-toggle="tab"><i class="fa fa-university"></i>&nbsp;&nbsp;Facility</a></li>
          </ul>                  
        <div class="tab-content">
            <div class="tab-pane active" id="ItemDetails">

            </div> <!--tab 1 itemdetails-->

            <div class="tab-pane" id="FacilityDetails">
            </div> <!--tab 2 facilitydetails-->
          </div><!-- /.tab - content -->
        </div><!-- /.tabs custom -->

    </div><!-- /.col -->


    <div class="modal fade" id="payments" name="payments">
      <div class="modal-dialog modal-lg" style="width: 850px">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
          <div class="form-horizontal" >
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="paymentTitle"><i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp; Add/Refund Item Payment
                    </h4>
                  </div>
              <!-- modal content -->
              <div class="modal-body">
                <div class="box-body">
                  <div class="col-md-12">
                      <br>
                      <input type="hidden" id = "req" name = "req">

                      <table class="table table-striped" id="ConfirmTable" estyle="font-size: 13px;">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Number of Deficient / Excess Item</th>
                              <th>Item Price</th>
                              <th>Amount</th>
                              <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>

                    <div class="col-md-5">
                     <div class="well" hidden id = "addPay">
                          
                          
                            <div class="form-group" id="type" name="type">
                            <div class="col-md-12">
                              <label> Payment Type:</label>
                              <select class="form-control" id="paymenttype">
                                <option disabled selected>Select Payment Type</option>
                                <option>Ordinary</option>
                                <option>Discount</option>
                                <option>Waived</option>
                              </select>
                            </div>
                          </div>

                         <div class="form-group"  id="disamt" hidden style="display:none;">
                          <div class="col-md-6"> 
                            <label>Percentage: </label>
                            <input class="form-control" type="number" step="any" id="txtDisamt" max="100" placeholder="Percent Discount">
                          </div>
                          <div class="col-md-6">
                              <label>Discounted Amount:</label>
                              <input class="form-control" type="number" step="any" id="amtdue" name="amtdue" disabled>
                          </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <table  style="border-spacing: 17px;border-collapse: separate;" id = "summary">
                        <tbody>

                          <tr bgcolor="#ffffb3">
                            <td><label>*Issue To:</label></td>
                            <td><input class="form-control" style="width:140%" type="text" id="refpaidby" name="refpaidby"></td>
                          </tr>
                        
                          <tr bgcolor="#ffffb3">
                            <td><label>Status</label></td>
                            <td><input class="form-control" style="width:140%" type="text" id="finalStat" name="finalStat" disabled></td>
                          </tr>
                          
                          <tr bgcolor="#ffffb3">
                            <td><label>Total Amount</label></td>
                            <td><input class="form-control" style="width:140%" type="number" step="any" id="totalAmt" name="subtotal" value = 0 disabled></td>
                          </tr>

                          <tr bgcolor="#ffffb3" class = "forRefund">
                            <td><label>Previous Payment</label></td>
                            <td><input class="form-control" style="width:140%" type="text" id="previousPayment" disabled></td>
                          </tr>

                          <tr bgcolor="#ffffb3" class = "forRefund">
                            <td><label>Refunded Amount</label></td>
                            <td><input class="form-control" style="width:140%" type="number" step="any" id="refAmt" value = 0 disabled></td>
                          </tr>
                        </tbody>
                      </table>   
                                    
                    </div>
                    <div id="facility"></div>
                  </div>
              </div>
              <div class="modal-footer" id="forButton">
               <button type="submit" class="btn btn-success"  id="btnConfirm" data-dismiss="modal">Confirm</button>    
              </div><!-- /.modal-content -->
              </div>
              </div>
        </div>
      </div>

  <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <script type="text/javascript">

       $(document).ready(function(){
            $('#ItemDetails').empty();
            var itypeID=[];
            var itemName=[];
            var ctr=0;
            var index=0;
             var q = 0;

              $.ajax({
              type: 'POST',
              url: 'getReserveDetailInfo',
              data: {reserveID: $('#reserveID').val()},
              dataType: 'JSON',
              success: function(data){

                $('#HaveItem').val(data.Itemctr);
                  $.each(data.itemtype, function(key,val)
                  {
                    $('#ItemDetails').append('<div class="row"><div class="col-md-4"><label class="btn btn bg-teal btn-xs" style="font-size: 13px;">Item Name :</label><input class="form-control" style="text-align:center;font-size:15px;width:50%" type="text" value='+val.ItemName+' id="itemname" name="itemname" disabled><input type="hidden" value="'+val.ItemTypeID+'" id="itemtype_'+val.ItemTypeID+'" name="itemtype_'+val.ItemTypeID+'"  disabled></div><div class="col-md-4"><a class = "btn btn bg-teal btn-xs" style="font-size: 13px;">Reserve Quantity :</a><input class="form-control"  type="text" style="text-align:center;font-size:15px;width:50%`" value="'+val.ReserveQuantity+'" id="itemQuan_'+val.ItemTypeID+'" name="itemQuan_'+val.ItemTypeID+'" disabled></div> <div class="col-md-4"><a class = "btn btn bg-teal btn-xs" style="font-size: 13px;">Actual Quantity :</a><input class="form-control" style="text-align:center;font-size:15px;width:50%" type="number" value="0" id="actualQuan_'+val.ItemTypeID+'" name="actualQuan_'+val.ItemTypeID+'"  disabled></div> </div> <br><table class="table table-bordered table-striped" id="tableItemID_'+val.ItemTypeID+'" estyle="font-size: 13px;"><thead><tr><th></th><th>ItemID</th></tr></thead><tbody></tbody></table>');
                   var chck;
                  $.each(data.inventory, function(key1, val1)
                    {
                      if (val.ItemTypeID==val1.ItemTypeID)
                      {
                        $.each(data.itemname,function(key2,val2)
                          {
                           if (val1.ItemTypeID==val2.ItemTypeID)
                              {
                                if (index < $('#itemQuan_'+val2.ItemTypeID).val())
                                {
                                  $('#tableItemID_'+val1.ItemTypeID+' tbody').append('<tr><td align="center"><input type="checkbox" id="checkbox_'+val1.ItemID+val.ItemTypeID+'" name="checkbox_'+val1.ItemID+val.ItemTypeID+'" value="'+val1.ItemID+'" onclick="trytry('+val.ItemTypeID+','+val1.ItemID+')" checked></td><td align="center">'+val2.ItemCode+"-"+val1.ItemID+'</td></tr>'); 

                                    chck = parseInt($('#actualQuan_'+val.ItemTypeID).val());
                                    $('#actualQuan_'+val.ItemTypeID).val(chck+1);  
                                }
                                else
                                {
                                  $('#tableItemID_'+val1.ItemTypeID+' tbody').append('<tr><td align="center"><input type="checkbox" id="checkbox_'+val1.ItemID+val.ItemTypeID+'" name="checkbox_'+val1.ItemID+val.ItemTypeID+'" value="'+val1.ItemID+'" onclick= "trytry('+val.ItemTypeID+','+val1.ItemID+')" </td><td align="center">'+val2.ItemCode+"-"+val1.ItemID+'</td></tr>');      
                                             
                                }
                                index++;
                              } 
                         });  //itemname

                       } //first if

                  }); //inventory
                  index=0;

                  //



                  }); //itemtype
                },error: function (request, error) {
                    console.log(arguments);
                    alert(" Can't do because: " + error);
                }
                }).error(function(ts){
                  alert(ts.responseText);
                });

    $('#btnSubmit').click(function(){

      $.ajax({
        type: 'POST',
        url: 'RefAdd',
        data:{reserID: $('#reserveID').val()},
        dataType: 'JSON',
        success: function(data){
        if($('#HaveItem').val()=="0")  
        {
          //alert(JSON.stringify(data));
          $('#ConfirmTable tbody').html('');

          $.each(data.reqType, function(key, val){
            $('#req').val(val.RequestorType);
          });

          $('#previousPayment').val(data.pptype[0].PaymentType);



          var totalamount = 0;
          $.each(data.type, function(key, val)
          {


            var itemCount = parseInt($('#actualQuan_'+val.ItemTypeID).val()) - parseInt($('#itemQuan_'+val.ItemTypeID).val());
            var stat;


              if(itemCount == 0)
              {
                stat = "Issue enough Item/s"
              }
              else if (itemCount < 0)
              {
                stat = "Issue Insufficient Item/s"
              }
              else if (itemCount > 0)
              {
                stat = "Issue Excess Item/s"
              }

            if(parseInt($('#req').val())==0)
            {
             

              var amount = itemCount * val.ItemRentalRes;

              

              $('#ConfirmTable tbody').append('<tr align = "center">  <td>'+val.ItemName+'</td>  <td>'+Math.abs(itemCount)+'</td>  <td>'+val.ItemRentalRes+'</td>  <td>'+Math.abs(amount)+'</td>  <td>'+stat+'</td>  </tr>');

              totalamount = totalamount + amount;
            }

            else if(parseInt($('#req').val())==1)
            {
             
              var amount = itemCount * val.ItemRentalNRes;


              $('#ConfirmTable tbody').append('<tr align =  "center">  <td>'+val.ItemName+'</td>  <td>'+Math.abs(itemCount)+'</td>  <td>'+val.ItemRentalNRes+'</td>  <td>'+Math.abs(amount)+'</td>  <td>'+stat+'</td>  </tr>');

                    totalamount = totalamount+ amount;
                  }


                });

                $('#totalAmt').val(Math.abs(totalamount).toFixed(2));
                if (totalamount == 0)
                {
                  
                  $('#finalStat').val("No changes");
                }
                else if (totalamount > 0)
                {
                  $('#finalStat').val("Add extra payment");
                }
                else if (totalamount < 0)
                {
                  $('#finalStat').val("Refund");
                }

                if($('#finalStat').val() == "Add extra payment")
                {
                  $('#addPay').show();
                }else
                {
                  $('#addPay').hide();
                }


                if($('#finalStat').val() == "Refund")
                {
                  $('.forRefund').show();


                  if($('#previousPayment').val() == "Regular")
                  {
                    $('#refAmt').val($('#totalAmt').val());
                  }
                  else if ($('#previousPayment').val() == "Discount")
                  {
                    var amtDiscount = data.pptype[0].OriginalPrice - data.pptype[0].TotalAmount;
                    var discountPercent = amtDiscount/data.pptype[0].OriginalPrice;

                    var discount = parseInt($('#totalAmt').val())*discountPercent;
                    var discountedRefund = parseInt($('#totalAmt').val()) - discount;

                    $('#refAmt').val(Math.floor(discountedRefund).toFixed(2));
                  }
                  else if ($('#previousPayment').val() == "Waived")
                  {
                    $('#refAmt').val("0.00");
                  }
                }
                else
                {
                  $('.forRefund').hide();
                }
            }
       
		else if($('#HaveItem').val()=="1")
		 {
			ShortcutFacility();
		 }
  
		}});

        });

            $('#paymenttype').change(function()
            {
              $('#disamt').hide();
              if($('#paymenttype').val()=="Ordinary")
              {
                $('#disamt').hide();
              }
              else if($('#paymenttype').val() == "Discount")
              {
                $('#disamt').show();
              }
              else
              {
                $('#disamt').hide();
              }
            });



            
            $('#txtDisamt').keyup(function(e){

                var subtotal= $('#totalAmt').val();
                var discount=  $('#txtDisamt').val();
                var total=0;
                var discountAmt=0;

                discountAmt=parseFloat(subtotal)*(parseFloat(discount)/100);
                total = parseFloat(subtotal) - parseFloat(discountAmt);
                
                $('#amtdue').val(total.toFixed(2));
                $('#total').val(total.toFixed(2));

                });




  $('#btnConfirm').click(function()
{
    $.ajax({
      type: 'POST',
      url: 'RefAddPayment',
      data: {
        finalStat: $('#finalStat').val(),
        paymentType: $('#paymenttype').val(),
        totalAmt: $('#totalAmt').val(),
        reserveID: $('#reserveID').val(),
        discounted: $('#amtdue').val(),
        previousPayment: $('#previousPayment').val(),
        refundAmount: $('#refAmt').val(),
        paidBy: $('#refpaidby').val(),
        offID: $('#offID').val(),
      },
      success: function(data){
      }
    });

if($('#HaveItem').val()=="0")
{
    $.ajax({
        type: 'POST',
        url: 'addIssueHeader',
        data:{
          reserveID: $('#reserveID').val(),
          offID: $('#offID').val(),
          DateFrom: $('#DateFrom').val(),
          TimeFrom: $('#TimeFrom').val(),
          DateTo: $('#DateTo').val(),
          TimeTo: $('#TimeTo').val(),
        },
        datatype: 'JSON',
        success: function(data){
          alert("Success!");

//*****************ADD ISSUE TYPES**********************************************//
          $.ajax({
          type: 'POST',
          url: 'getIssueItems',
          data:{reserveID: $('#reserveID').val()},
          datatype: 'JSON',
          success: function(data){

          $.each(data.itemtype, function(key,val)
            {
               // alert("ITEM TYPE:   "+ val.ItemTypeID);
      
                  $.ajax({   
                  type: 'POST',
                  url: 'addIssue',
                  data:{ItemTypeID: val.ItemTypeID,
                        reserveID: $('#reserveID').val()},
                  datatype: 'JSON',
                  success: function(data1){
                      alert("Success!");




//************SAVE TO ISSUE DETAILS ***********//



                      $.ajax({
                        type: 'POST',
                        url: 'getIssueItems',
                        data:{reserveID: $('#reserveID').val()},
                        datatype: 'JSON',
                        success: function(data){


                        $.each(data.itemtype, function(key,val)
                          {

                            $.ajax({
                              type: 'POST',
                              url: 'getInventory',
                              data: {itemTypeID: val.ItemTypeID},
                              dataType: 'JSON',
                              success: function(data2){
                  
                
                              $.each(data2.inventory, function(key1, val1)

                                { 
                                   if(val1.ItemTypeID == val.ItemTypeID)
                                    {
                                     if($('#checkbox_'+val1.ItemID+val.ItemTypeID).is(':checked'))
                                      {
                                        // alert("ITEM TYPE1:  "+ val.ItemTypeID);
                                        //  alert("ITEM id:  "+ val1.ItemID);
                                                  $.ajax({
                                                    type: 'POST',
                                                    url: 'addIssueItemsDetails',
                                                    data:{ItemTypeID: val1.ItemTypeID,
                                                          ItemID: val1.ItemID},
                                                    datatype: 'JSON',
                                                    success: function(data1){

                                                       alert("Success!");
                                                    }});
                                      }
                                    }
                                }); //each inventory

                             
                              }
                            });
                          });


                        },error: function (request, error) {
                            console.log(arguments);
                            alert(" Can't do because: " + error);
                        }
                      }).error(function(ts){
                        alert(ts.responseText);
                      });


                  },error: function (request1, error1) {
                  console.log(arguments);
                  alert(" Can't do because: " + error);
                  }
                  }).error(function(ts1){
                    alert(ts1.responseText);
                  });
            });

          },error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        }).error(function(ts){
          alert(ts.responseText);
        });

//***************************Add to issue header******************************************************//

        },error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
        }
        }).error(function(ts){
          alert(ts.responseText);
        });
} // if have Item
//***************SAVING TO DATABASE (((Facility)))*******************************//
if($('#HaveFac').val()=="0")
{
  $.ajax({
      type: 'POST',
      url: 'addFacIssueHeader',
      data: {
              offID: $('#offID').val(),
              reserveID: $('#reserveID').val(),
              DateFrom: $('#DateFrom').val(),
              TimeFrom: $('#TimeFrom').val(),
              DateTo: $('#DateTo').val(),
              TimeTo: $('#TimeTo').val(),
            },
      dataType: 'JSON',
      success: function(data)
      {
        $('#issueID').val(data.issueID);

        $.each(data.fac, function(key,val){
          
          var fac = "facility_"+val.FacilityID;
            
            if($('#'+fac).is(':checked'))
             { 
                    $.ajax({
                    type: 'POST',
                    url: 'addFacIssueDetails',
                    data: {
                            facID: val.FacilityID,
                            issueID: $('#issueID').val(),
                            reserveID: $('#reserveID').val(),
                            DateFrom: $('#DateFrom').val(),
                            TimeFrom: $('#TimeFrom').val(),
                            DateTo: $('#DateTo').val(),
                            TimeTo: $('#TimeTo').val(),
                          },
                    dataType: 'JSON',
                    success: function(data)
                    {
                      alert("Success!");
                      if ($('#HaveDev').val()=="0")
                      {
                            $.each(data.dev, function(key,val){
                              
                              var device = "device_"+val.DeviceID;
                                
                                if($('#'+device).is(':checked'))
                                 { 
                                        $.ajax({
                                        type: 'POST',
                                        url: 'addFacIssueDevice',
                                        data: {
                                                devID: val.DeviceID,
                                                issueID: $('#issueID').val(),
                                                devFac : val.DeviceFacilityID,
                                                DateFrom: $('#DateFrom').val(),
                                                TimeFrom: $('#TimeFrom').val(),
                                                DateTo: $('#DateTo').val(),
                                                TimeTo: $('#TimeTo').val(),
                                              },
                                        //dataType: 'JSON',
                                        success: function(data) {
                                              alert("Success!");
                                        }
                                       ,error: function (request, error) {
                                        console.log(arguments);
                                        alert(" Can't do because: " + error);
                                        }
                                        }).error(function(ts){
                                          alert(ts.responseText);
                                        });
                                  } //if device is checked
                            });
                     }
                      
                   }
                     ,error: function (request, error) {
                    console.log(arguments);
                    alert(" Can't do because: " + error);
                    }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
              } //if facility is checked
        });
       }
       ,error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
        }
        }).error(function(ts){
          alert(ts.responseText);
        });
} //if have facility
     }); // button submit

//***********facility******************//
   $.ajax({
      type: 'POST',
      url: 'getFacReserveInfo',
      data: {reserveID: $('#reserveID').val()},
      dataType: 'JSON',
      success: function(data)
      {
         $('#HaveFac').val(data.HaveFac);
         $('#HaveDev').val(data.HaveDev);
              $.each(data.fac, function(key, val)
              {

                $('#FacilityDetails').append('<div class="col-md-12"><span class="label label bg-navy" style="font-size: 13px;">Facility Name:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" width="500px" id="facility_'+val.FacilityID+'" name="facility_'+val.FacilityID+'" checked disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class = "btn btn bg-teal btn-xs" style="font-size: 13px;">'+val.FacilityName+'</a></div><br><br><table class="table table-bordered table-striped" estyle="font-size: 13px;" id="Factable_'+val.FacilityID+'" name="Factable_'+val.FacilityID+'"><thead><tr><th></th><th>Consumable Device</th></tr></thead><tbody></tbody></table>');

                    $.each(data.dev, function(key1, val1)
                    {
                      if (val1.DeviceFacility==val.FacilityID)
                      {
                        $('#Factable_'+val1.DeviceFacility+' tbody').append('<tr>'
                        +'<td align="center"><input type="checkbox" id="device_'+val1.DeviceID+'" name="device_'+val1.DeviceID+'" onclick="validateDevice('+val1.DeviceFacility+','+val1.DeviceID+')" checked disabled></td>'
                        +'<td align="center">'+val1.DeviceName+'</td></tr>');
                      }
                      
                    });
              });
          
      },error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
        }
        }).error(function(ts){
          alert(ts.responseText);
        });

  }); // DOCUMENT READY
  </script>

  <script type="text/javascript">

    function trytry(IttyID, iID)
    {
     if ($('#checkbox_'+iID+IttyID).is(':checked')) {
          $('#actualQuan_'+IttyID).val(parseInt($('#actualQuan_'+IttyID).val())+1);
      }

      else
      {
           $('#actualQuan_'+IttyID).val(parseInt($('#actualQuan_'+IttyID).val())-1);  
      }

    }
       function validateDevice (FacID, devID)
    {
      if ($('#facility_'+FacID).is(':checked')) {}
      else
          {
          
              $('#device_'+devID).prop('checked',false);
             
          }
    }



function ShortcutFacility ()
{
  $('#summary').hide();
  $('#ConfirmTable').hide();
  $('#forButton').hide();
  $('#facility').append('<center><label>Facility to be Issue</label><center>');
   
    $.ajax({
      type: 'POST',
      url: 'addFacIssueHeader',
      data: {
              offID: $('#offID').val(),
              reserveID: $('#reserveID').val(),
              DateFrom: $('#DateFrom').val(),
              TimeFrom: $('#TimeFrom').val(),
              DateTo: $('#DateTo').val(),
              TimeTo: $('#TimeTo').val(),
            },
      dataType: 'JSON',
      success: function(data)
      {
        $('#issueID').val(data.issueID);
            if($('#HaveFac').val()=="0")
            {
                $.each(data.fac, function(key,val)
                {
                  var fac = "facility_"+val.FacilityID;
                    
                    if($('#'+fac).is(':checked'))
                     { 
                            $.ajax({
                            type: 'POST',
                            url: 'addFacIssueDetails',
                            data: {
                                    facID: val.FacilityID,
                                    issueID: $('#issueID').val(),
                                    reserveID: $('#reserveID').val(),
                                    DateFrom: $('#DateFrom').val(),
                                    TimeFrom: $('#TimeFrom').val(),
                                    DateTo: $('#DateTo').val(),
                                    TimeTo: $('#TimeTo').val(),
                                  },
                            dataType: 'JSON',
                            success: function(data)
                            {
                              if ($('#HaveDev').val()=="0")
                              {
                                $.each(data.dev, function(key,val)
                                {
                                  var device = "device_"+val.DeviceID;
                                  
                                    if($('#'+device).is(':checked'))
                                     { 
                                        $.ajax({
                                        type: 'POST',
                                        url: 'addFacIssueDevice',
                                        data: {
                                                devID: val.DeviceID,
                                                issueID: $('#issueID').val(),
                                                devFac : val.DeviceFacilityID,
                                                reserveID: $('#reserveID').val(),
                                                DateFrom: $('#DateFrom').val(),
                                                TimeFrom: $('#TimeFrom').val(),
                                                DateTo: $('#DateTo').val(),
                                                TimeTo: $('#TimeTo').val(),
                                              },
                                        //dataType: 'JSON',
                                        success: function(data)
                                             { 
                                              alert("Success!");
                                             }
                                               // ,error: function (request, error) {
                                               //  console.log(arguments);
                                               //  alert(" Can't do because: " + error);
                                               //  }
                                               //  }).error(function(ts){
                                               //    alert(ts.responseText);
                                        })
                                      } //if device is checked
                                });
                              }
                            }
                                    //  ,error: function (request, error) {
                                    // console.log(arguments);
                                    // alert(" Can't do because: " + error);
                                    // }
                                    // }).error(function(ts){
                                    //   alert(ts.responseText);
                          })
                      } //if facility is cheecked
                  }); //each fac
            }
        }
                       // ,error: function (request, error) {
                       //  console.log(arguments);
                       //  alert(" Can't do because: " + error);
                       //  }
                       //  }).error(function(ts){
                       //    alert(ts.responseText);
    });

  }//function shortcut to save facility

  </script>
      </section>
      <!-- /.content -->
@stop