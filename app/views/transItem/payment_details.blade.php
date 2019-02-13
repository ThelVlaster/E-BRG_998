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
      <div class="well">
        <div class="box-body"> 
          <div class="col-md-12">
          <table  style="border-spacing: 17px;border-collapse: separate;">
            <tbody>
              <tr>
                <td><span class="label label-warning">Request No.</span></td>
                <td><label for="reserveNo"></label></td>
                <td><span class="label label-warning">Name</span></td>
                <td><label for="Rname"></label></td>
                <td><span class="label label-warning">Request Date</span></td>
                <td><label for="rDate"></label></td>
               
              </tr>
              <tr>
                 <td id="tddatefrom"><span class="label label-warning">Date From</span></td>
                 <td id="tdlabeldatefrom"><label for="rFrom" id="dateFrom"></label></td>
                 <td id="tddateto"><span class="label label-warning">Date To</span></td>
                 <td id="tdlabeldateto"><label for="rTo" id="dateTo"></label></td>
                 <td id="manualdays" hidden><span class="label label-warning">Dates</span></td>
                 <td id="labelmanualdays" hidden></td>
                 <td id="manualtime" hidden><span class="label label-warning">Time</span></td>
                 <td id="labelmanualtime" hidden></td>
                 <td><span class="label label-warning">Day(s) Borrowed</span></td>
                 <td><label for="Day2"></label></td>
                
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
<hr>


        <div class="col-md-12">
              <table class="table table-striped" id="Rtable" estyle="font-size: 13px;">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Quantity / Duration</th>
                    <th>Price per Item / Price per Hour</th>
                    <th>Additional Payment</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                    <tbody>
                    </tbody>
              </table>
        </div> <!--col 12-->

        <div class="col-md-6">
          <div class="well">
            <div class="box-body">
            <div class="col-md-12" id="alertpay">
            </div>
    
              <div class="form-group" id="type" name="type">
              <div class="col-md-12">
                <label>Paid by:*&nbsp;&nbsp;</label>
                <input class="form-control" type="text" id="paidBy" name="paidBy" required="required"><br><br>
                <label> Payment Type:</label>
                <select class="form-control" id="paymenttype">
                  <option selected disabled>Select Payment Type</option>
                  <option value="1">Regular</option>
                  <option value="2">Discount</option>
                  <option value="3">Waived</option>
                </select>
              </div>
              </div>

            <div class="form-group"  id="disamt" hidden style="display:none;">
              <div class="col-md-12">
                  <label>Discount Amount:</label>
                  <input class="form-control" type="number" step="any" id="Disamt" name="Disamt">
              </div>
            </div>


            <div class="form-group" id="mode" name="mode" hidden>
             <div class="col-md-12">
              <label> Mode of Payment:</label>
              <select class="form-control" id="modePayment">
                <option selected disabled>Select Payment Mode</option>
                <option value="1">50% Down Payment</option>
                <option value="2"> Full Payment </option>
              </select>
            </div>
          </div>                  
        </div>
      </div>
      </div>

      <div class="col-md-1">
      </div>
                    
      <div class="col-md-5">
        <table  style="border-spacing: 17px;border-collapse: separate;">
          <tbody>
            <tr bgcolor="#ffffb3">
              <td><label>Total Amount</label></td>
              <td><input class="form-control" type="number" step="any" id="Overall" name="Overall" disabled></td>
            </tr>

            <tr bgcolor="#ffffb3" id="discount" style="display:none;">
              <td><label>Discounted Amount</label></td>
              <td><input class="form-control" type="number" step="any" id="discounted" name="discounted" disabled></td>
            </div>
            </tr>

            <tr bgcolor="#ffffb3">
              <td><label>Amount Due:</label></td>
              <td><input class="form-control" type="number" step="any" id="amtdue" name="amtdue" disabled></td>
            </tr>
            <tr bgcolor="#ffffb3">
              <td><label>Balance:</label></td>
              <td><input class="form-control" type="number" step="any" id="bal" name="bal" disabled></td>
            </tr>
          </tbody>
        </table>   

        <div id="hiddenData" style="display:none">
            <input type="text" id="totalItem" step="any" placeholder="totalItem">
            <input type="text" id="totalFac" step="any" placeholder="totalFacility">
            <input type="text" id="totalDev" step="any" placeholder="totalDevice">

            <input type="text" id="paymentName" placeholder="payment">
            <input type="text" id="total" step="any"  placeholder="total">
            <input type="text" id="ReqType" placeholder="reqtype">

            <input type="text" id="Day" placeholder="day">
            <input type="text" id="remain" placeholder="remain" value=0>
            <input type="text" id="hour" placeholder="hour" value=0>
            <input type="text" id="dates">
            <input type="text" id="datet">
            <input type="text" id="timeFrom">
            <input type="text" id="timeTo">
            <input type="text" id="offID" name="offID" value = "{{Session::get('officialID')}}">


            <input type="text" id="ctr" placeholder="ctrid" value="{{$idctr}}">
            <input type="text" id="rid" placeholder="rid" value="{{$rid}}">

             
        </div>
      </div>

      <div class="row">
        <center><button type="submit" class="btn btn-danger btn-flat" id="btnSubmit">Submit</button></center>
      </div>



<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      window.a=0;
      window.fac;
      window.device;
      window.add=0;
      window.adddevice;
      window.totalItem=0;
      window.facTotal=0;
      window.devTotal=0;
      window.hourTotal=0;
      window.remainTotal=0;
      // window.addFac;

	if ($('#ctr').val()=='1')
	{
      $.ajax({
        type:'POST',
        url: 'getPaymentInfo',
        data:{ },
        dataType:'JSON',
        success: function(data){
         $.each(data.ReserveRec, function(key4, val4)
         {
               if(val4.ReservationID==$('#rid').val())    { 
                $('#dates').val(val4.DateReserveFrom);
                $('#datet').val(val4.DateReserveTo);
                $('#timeFrom').val(val4.TimeReserveFrom);
                $('#timeTo').val(val4.TimeReserveTo);
                var dateTo= new Date(val4.DateReserveTo);
                var dateFrom= new Date(val4.DateReserveFrom);
                var dateReq= new Date(val4.DateRequested); 
                var diff = new Date(dateTo - dateFrom);
                var days = diff/1000/60/60/24;
                $("label[for='Day2']").html(days);
                $('#ReqType').val(val4.RequestorType);
                $('#Day').val(days);

                $("label[for='reserveNo']").html(val4.ReservationID);
                $("label[for='rDate']").html(dateReq.toDateString() +" - "+ dateReq.toLocaleTimeString());
                $("label[for='rFrom']").html(dateFrom.toDateString()+ " - " +val4.TimeReserveFrom);
                $("label[for='rTo']").html(dateTo.toDateString()+ " - " +val4.TimeReserveTo);
                  
                  $.each(data.Rresidents, function(key1,val1)   { 
                    if(val4.RequestorID==val1.ResidentID && val4.RequestorType=='0')    { 
                      $("label[for='Rname']").html(val1.FirstName+" "+val1.LastName);
                    }
                  });

                  $.each(data.Rnonresidents, function(key2, val2)   {
                    if(val4.RequestorID==val2.NonResidentID && val4.RequestorType=='1')   {
                          $("label[for='Rname']").html(val2.NonResName);                    
                        }
                  });
               }
          });//RESERVEREC
          $('#Rtable tbody').empty();
          $.each(data.ReserveType, function(key3, val3)   {
             if (parseInt($('#ReqType').val())==0)   {
              var price = val3.ItemRentalRes;
               if (parseInt($('#Day').val())==0) 
                 a = (parseInt($('#Day').val()+1)*parseInt(val3.ReserveQuantity)*parseFloat(val3.ItemRentalRes));
              else
                 a = (parseInt($('#Day').val())*parseInt(val3.ReserveQuantity)*parseFloat(val3.ItemRentalRes));    
             }
            else if (parseInt($('#ReqType').val())==1)    { 
              var price = val3.ItemRentalNRes;
              if (parseFloat($('#Day').val())==0) 
                a=(parseInt($('#Day').val()+1)*parseInt(val3.ReserveQuantity)*parseFloat(val3.ItemRentalNRes));
              else 
                 a=(parseInt($('#Day').val())*parseInt(val3.ReserveQuantity)*parseFloat(val3.ItemRentalNRes));
            }
            if(val3.ReservationID==$('#rid').val())    { 
              $('#Rtable tbody').append('<tr><td align="center" bgcolor="#d6ccfc">'+val3.ItemName+'</td><td align="center">Item</td><td align="center">'+val3.ReserveQuantity+'</td><td align="center">&#8369;'+price+'</td><td align="center">-</td><td align="center" bgcolor="#d6ccfc">&#8369;'+a.toFixed(2)+'</td></tr>');
              totalItem = (parseFloat(totalItem)+parseFloat(a.toFixed(2)));
            }
          }); //RESERVE TYPE
          $('#totalItem').val(totalItem);

 //**facility computation****//
      var FacStart = $("#timeFrom").val();
      var FacEnd = $("#timeTo").val();
      var FacDStart = $("#dates").val();
      var FacDEnd = $("#datet").val();

      var start = FacDStart + " " + FacStart;
      var end = FacDEnd + " " + FacEnd;

      start = new Date(start);
      end = new Date(end);
      var diff = end - start;
      var seconds = diff/1000;
      var min = seconds/60;
      var hour = Math.floor(min/60);
      var remainMin = min%60;
    $('#remain').val(remainMin);
    $('#hour').val(hour);
//****end of facility computation***//


//*******FACILITY*******//
            var facAddTotal=0;
            var fac=0;
            var facAdd=0;
            var facHour = $('#hour').val();
            var facMin = $('#remain').val();
            var price=0;

          $.each(data.facility, function(key, val)   {
             if(val.ReservationID==$('#rid').val())
              {
                if (parseInt($('#ReqType').val())==0)
                {   
                  price = val.ResRental;
                  fac = parseFloat(val.ResRental*parseInt(facHour));

                  if (remainMin=="0")                          
                      add = 0;
                  else if (remainMin <= 15)                          
                      add = add + parseFloat(val.ResRental/4);

                    else if (remainMin > 15 && remainMin <= 30)
                      add = add + parseFloat(val.ResRental/2);

                    else if (remainMin > 30 && remainMin <= 45)
                      add = add + parseFloat(val.ResRental*3/4);
                  
                    else if (remainMin > 45)
                      add = parseFloat(val.ResRental);
                }

                else if (parseInt($('#ReqType').val())==1)
                { 
                  price = val.NResRental;
                  fac = parseFloat(val.NResRental*parseInt(facHour));

                  if (remainMin=="0")                          
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

                facAdd = parseFloat(add) + parseFloat(fac);
                facTotal = parseFloat(facTotal) + parseFloat(facAdd);

                  $('#Rtable tbody').append('<tr><td align="center" bgcolor="#ccfcde">'+val.FacilityName+'</td><td align="center">Facility</td><td align="center">'+facHour+' hour/s and '+facMin+' min/s</td><td align="center">'+price+'</td><td align="center">&#8369;'+add.toFixed(2)+'</td><td align="center" bgcolor="#ccfcde">&#8369;'+facAdd.toFixed(2)+'</td></tr>');
              }
            }); //FACILITY
          
          $('#totalFac').val(facTotal);

//****************DEVICESS**********//
            var dev=0;
            var devH = $('#hour').val();
            var devM = $('#remain').val();
            var devHour = 0;

            $.each(data.device, function(key, val)   {
               if(val.ReservationID==$('#rid').val())
                { 
                  devHour = parseFloat(val.DeviceAmount*parseInt(devH));

                    if (remainMin <= 15)                          
                      adddevice = parseFloat(val.DeviceAmount/4);

                    else if (remainMin > 15 && remainMin <= 30)
                      adddevice = parseFloat(val.DeviceAmount/2);
  
                    else if (remainMin > 30 && remainMin <= 45)
                      adddevice = parseFloat(val.DeviceAmount*3/4);
                    
                    else if (remainMin > 45)
                      adddevice = parseFloat(val.DeviceAmount);

                  dev = parseFloat(adddevice) + parseFloat(devHour);
                  devTotal += parseFloat(dev);


                  $('#Rtable tbody').append('<tr><td align="center" bgcolor="#eeb6ef">'+val.DeviceName+'</td><td align="center">Consumable Device</td><td align="center">'+devH+' hour/s and '+devM+' min/s</td><td align="center">&#8369;'+val.DeviceAmount+'</td><td align="center">&#8369;'+adddevice.toFixed(2)+'</td><td align="center" bgcolor="#eeb6ef">&#8369;'+dev.toFixed(2)+'</td></tr>');
                }
            });//DEVICES
                  $('#totalDev').val(devTotal);

        },error: function (request, error)    {
                    console.log(arguments);
                    alert(" Can't do because: " + error);
                  }
            }).error(function(ts){
              alert(ts.responseText);
           });
  } // if SINGLE RESERVATION ID 












//**PARA SA MANUAL****//






  else if ($('#ctr').val()>1)
  {
    $('#tdlabeldateto').hide();
    $('#tdlabeldatefrom').hide();
    $('#tddateto').hide();
    $('#manualtime').show();
    $('#manualdays').show();
    $('#labelmanualdays').show();
    $('#labelmanualtime').show();
    $('#tddatefrom').hide();
    $('#Rtable tbody').empty();

              var mintotal = 0;

    $.ajax({
          type:'POST',
          url: 'getPaymentInfoforManual',
          data:{ reserveid: $('#rid').val()},
          dataType:'JSON',
          success: function(data)
          {
            $("label[for='Day2']").html(data.ctrIDs);
            $('#Day').val(data.ctrIDs);

            $.each(data.reserveInfo, function(key1, val1)
            {
              $.each(data.res, function(key, val)
              {

                if (val1.RequestorType=='0')
                $("label[for='Rname']").html(val.FirstName+" "+val.LastName);
                else
                $("label[for='Rname']").html(val.NonResName);

              });
              $('#labelmanualdays').append('<label>'+val1.DateReserveFrom+'</label><br>');
              $('#labelmanualtime').append('<label>'+val1.TimeReserveFrom+'-'+val1.TimeReserveTo+'</label><br>');
              $("label[for='reserveNo']").html(val1.ReservationID);
              $("label[for='rDate']").html(val1.DateRequested);
               //**hour and minute computation****//
              var start = val1.DateReserveFrom + " " + val1.TimeReserveFrom;
              var end= val1.DateReserveTo + " " + val1.TimeReserveTo;
              start = new Date(start);
              end = new Date(end);
              var diff = end - start;
              var seconds = diff/1000;
              var min = seconds/60;
              var hour = Math.floor(min/60);
              var remainMin = min%60;
              hourTotal = hour + hourTotal;
              remainTotal = remainMin + remainTotal;
              $('#ReqType').val(val1.RequestorType);
          }); //RESERVE INFORMATION

            $.each(data.reservetype, function(key3, val3)
            {
             if ($('#ReqType').val()=='0')   {
              var price = val3.ItemRentalRes;
               if (parseInt($('#Day').val())==0) 
                 a = (parseInt($('#Day').val()+1)*parseInt(val3.ReserveQuantity)*parseFloat(val3.ItemRentalRes));
              else
                 a = (parseInt($('#Day').val())*parseInt(val3.ReserveQuantity)*parseFloat(val3.ItemRentalRes));    
             }
            else if ($('#ReqType').val()=='1')    { 
              var price = val3.ItemRentalNRes;
              if (parseFloat($('#Day').val())==0) 
                a=(parseInt($('#Day').val()+1)*parseInt(val3.ReserveQuantity)*parseFloat(val3.ItemRentalNRes));
              else 
                 a=(parseInt($('#Day').val())*parseInt(val3.ReserveQuantity)*parseFloat(val3.ItemRentalNRes));
            }
            if(val3.ReservationID==$('#rid').val())    { 
              $('#Rtable tbody').append('<tr><td align="center" bgcolor="#d6ccfc">'+val3.ItemName+'</td><td align="center">Item</td><td align="center">'+val3.ReserveQuantity*parseInt($('#Day').val())+'</td><td align="center">&#8369;'+price+'</td><td align="center">-</td><td align="center" bgcolor="#d6ccfc">&#8369;'+a.toFixed(2)+'</td></tr>');
              totalItem = (parseFloat(totalItem)+parseFloat(a.toFixed(2)*parseInt($('#Day').val())));
            }
          }); //RESERVE TYPE

          if (remainTotal%60==0)
          {
            hourTotal=hourTotal+(remainTotal/60);
            remainTotal = 0;
          }
          $('#remain').val(remainTotal);
          $('#hour').val(hourTotal);
          $('#totalItem').val(totalItem);

            //*******FACILITY*******//
          var facAddTotal=0;
          var fac=0;
          var facAdd=0;
          var facHour = parseFloat($('#hour').val());
          var facMin = parseFloat($('#remain').val());
          var price=0;

          $.each(data.facility, function(key1, val1)
          {
             if(val1.ReservationID==$('#rid').val())
              {
                if ($('#ReqType').val()=='0')
                {   
                  price = val1.ResRental;
                  fac = parseFloat(val1.ResRental*facHour);

                  if (facMin==0)                          
                      add = 0;
                  else if (facMin <= 15)                          
                      add = add + parseFloat(val1.ResRental/4);

                    else if (facMin > 15 && facMin<= 30)
                      add = add + parseFloat(val1.ResRental/2);

                    else if (facMin > 30 && facMin <= 45)
                      add = add + parseFloat(val1.ResRental*3/4);
                  
                    else if (facMin > 45)
                      add = parseFloat(val1.ResRental);
                }

                else if ($('#ReqType').val()=='1')
                { 
                  price = val1.NResRental;
                  fac = parseFloat(val1.NResRental*parseInt(facHour));

                  if (facMin==0)                          
                      add = 0;
                  else if (facMin <= 15)                          
                    add = add + parseFloat(val1.NResRental/4);

                  else if (facMin > 15 && facMin<= 30)
                    add = add + parseFloat(val1.NResRental/2);

                  else if (facMin > 30 && facMin <= 45)
                    add = add + parseFloat(val1.NResRental*3/4);
                  
                  else if (facMin > 45)
                    add = parseFloat(val1.NResRental);
                }

                facAdd = parseFloat(add) + parseFloat(fac);
                facTotal = parseFloat(facTotal) + parseFloat(facAdd);

                  $('#Rtable tbody').append('<tr><td align="center" bgcolor="#ccfcde">'+val1.FacilityName+'</td><td align="center">Facility</td><td align="center">'+facHour+' hour/s and '+facMin+' min/s</td><td align="center">'+price+'</td><td align="center">&#8369;'+add.toFixed(2)+'</td><td align="center" bgcolor="#ccfcde">&#8369;'+facAdd.toFixed(2)+'</td></tr>');
              }
            }); //FACILITY
          
          $('#totalFac').val(facTotal);

//****************DEVICESS**********//
            var dev=0;
            var devH = $('#hour').val();
            var devM = $('#remain').val();
            var devHour = 0;

            $.each(data.device, function(key1, val1)   {
               if(val1.ReservationID==$('#rid').val())
                { 
                  devHour = parseFloat(val1.DeviceAmount*parseInt(devH));
                    if (devM==0)                          
                      adddevice = 0;
                    else if (devM <= 15)                          
                      adddevice = parseFloat(val1.DeviceAmount/4);

                    else if (devM > 15 && devM <= 30)
                      adddevice = parseFloat(val1.DeviceAmount/2);
  
                    else if (devM > 30 && devM <= 45)
                      adddevice = parseFloat(val1.DeviceAmount*3/4);
                    
                    else if (devM > 45)
                      adddevice = parseFloat(val1.DeviceAmount);

                  dev = parseFloat(adddevice) + parseFloat(devHour);
                  devTotal += parseFloat(dev);


                  $('#Rtable tbody').append('<tr><td align="center" bgcolor="#eeb6ef">'+val1.DeviceName+'</td><td align="center">Consumable Device</td><td align="center">'+devH+' hour/s and '+devM+' min/s</td><td align="center">&#8369;'+val1.DeviceAmount+'</td><td align="center">&#8369;'+adddevice.toFixed(2)+'</td><td align="center" bgcolor="#eeb6ef">&#8369;'+dev.toFixed(2)+'</td></tr>');
                }
            });//DEVICES
                  $('#totalDev').val(devTotal);

      
          },error: function (request, error)    {
                      console.log(arguments);
                      alert(" Can't do because: " + error);
                    }
              }).error(function(ts){
                alert(ts.responseText);
             });
    } //ELSE IF RESERVATION ID IS GREATER THAN 0

//****************END OF DEVICESS**********//





















    $('#mode').change(function(e){
        var balance = 0;
        var all = $('#Overall').val();

      if ($('#modePayment').val()=="1" && $("#paymenttype").val() =="1")
        {
           balance = parseFloat(all)/2;
            $('#bal').val(balance.toFixed(2));
            $('#amtdue').val(balance.toFixed(2));
            $('#total').val($('#Overall').val());
        }

        else if ($('#modePayment').val()=="2" && $("#paymenttype").val() =="1")
        {
          $('#bal').val("0.00");
          $('#amtdue').val(all);
          $('#total').val($('#Overall').val());
        }

        else if ($('#modePayment').val()=="1" && $("#paymenttype").val() =="2")
        {
          var balance = 0;
          balance = parseFloat($('#discounted').val())/2;
          $('#bal').val(balance.toFixed(2));
          $('#amtdue').val(balance.toFixed(2));
        }

        else {
          $('#bal').val("0.00");
          $('#amtdue').val($('#discounted').val());

        }    
  });

  $('#Disamt').keyup(function(e){

      var subtotal= $('#Overall').val();
      var Disamt = $('#Disamt').val();
      var Distotal = 0;

      Distotal = parseFloat(subtotal) - parseFloat(Disamt);
       $('#discounted').val(Distotal.toFixed(2));
       $('#total').val($('#discounted').val());
    });

  

  $("#type").change(function(e) {
      //****************TOTAL COMPUTATION**********//

        var item= $('#totalItem').val();
        var fac= $('#totalFac').val();
        var device= $('#totalDev').val();
        var totaloverall = 0;
        totaloverall = parseFloat(item)+parseFloat(fac)+parseFloat(device);
        //totaloverall = parseFloat(totaloverall);

        $('#Overall').val(totaloverall.toFixed(2));

      //****************END TOTAL COMPUTATION*********//

      if ($("#paymenttype").val() =="1") {
          $('#mode').show();
          $('#disamt').hide();
          $('#bal').val("");
          $('#amtdue').val("");
          $("#paymentName").val("Regular");
          }

      else if ($("#paymenttype").val() == "2") {
          $('#disamt').show();
          $('#discount').show();
          $('#mode').show();
          $('#amtdue').val("");
          $('#bal').val("");
          $('#paymentName').val("Discount");
        }

      else if ($("#paymenttype").val() =="3") {
          $('#disamt').hide();
          $('#discount').hide();
          $('#mode').hide();
          $('#bal').val("0.00");
          $('#amtdue').val("0.00");
          $('#total').val("0.00");
          $('#paymentName').val("Waived");

        }
      
    });

  $('#btnSubmit').click(function(e) { 

    if ($('#Overall').val()=="" || $('#amtdue').val()=="" || $('#paidBy').val()=="" || $('#bal').val()=="")
      $('#alertpay').append('<div class="alert alert-danger alert-dismissible">'
            +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
            +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
            +'Incomplete Details!'
            +'</div>');
    else
      {
        $.ajax({
        type:'POST',
        url: 'addPayment',
        data:{
               reserveid: $('#rid').val(),
               balance: $('#bal').val(),
               paidAmt: $('#amtdue').val(),
               totalAmt: $('#total').val(),
               OrgPrice: $('#Overall').val(),
               paymentType: $('#paymentName').val(),
               paidBy: $('#paidBy').val(),
               offID: $('#offID').val(),
             },
        success: function(data)
        {
          window.location.href = "{{URL::to('ItemRequest')}}";
        },error: function (request, error) {
                    console.log(arguments);
                    alert(" Can't do because: " + error);
                  }
            }).error(function(ts){
              alert(ts.responseText);
           });
    }

    });


});

</script>
</section>



@stop