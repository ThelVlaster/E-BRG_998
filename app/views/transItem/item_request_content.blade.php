
@extends('layouts.master')

@section('content')
<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

<!-- bootstrap time picker -->
<script src="{{ asset ('bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>

  <section class="content-header">
             <h1>
             Transaction <small> Request Item and Facility Form </small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li><a href="#">Item</a></li>
              <li class="active">Item / Facility Request</li>
            </ol>
  </section>
<input type="text" id="hiddenResidentID" name="hiddenResidentID" value = "{{Session::get('ResidentID')}}"hidden>  
  <section class="content">

      @include('transFacility.facilityCalendar')

    <div class="row" id = "forDateRange" hidden>
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-solid">
              <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Date Range</h3>
                     <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                     </div><!-- /.box-tools -->
              </div><!-- /.box-header -->
              <form class="form-inline"> 
                <!-- form start -->
      
          <div class="box-body">
                  <input type="text" id="offID"  name="offID" value = "{{Session::get('OfficialID')}}" hidden>
              
            <div class="well">
              
              <center>
                <div class="form-group">
               <!--  <label><h4><span class="label label-primary">Date and Time</span></h4></label> -->
                  <div class="input-group">
                      <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>&nbsp;&nbsp; Date and Time of Reservation
                      </div>
                      <input type="text" style="font-size:20px; width:400px" class="form-control" id="reservationtime">
                  </div>
                <!-- /.input group -->
                </div> &nbsp;&nbsp;
                <button class="btn btn-info btn-flat btn-sm" type="button" id="btnGo" data-toggle="modal" data-target = "#modalReserve">Reserve</button>
               <!--  <button class="btn btn-flat btn-sm" type="button" id="btnCalendar">View Calendar</button> -->
           
                
              </center>
            </div>
            </div>
       </form>
      </div>  <!--box frimary-->
    </div>  <!--col md-12-->
  </div> <!--row-->


  <!--////////////////////////////****************RESERVE MODAL*****************************/////////////////////////-->
  <div class="modal fade" id="modalReserve" name="modalReserve">
    <div class="modal-dialog modal-lg" style="width: 1000px">
      <form role="form" method="POST" action="{{URL::to('addItemRequest')}}"> 
<input type="text" id="offID"  name="offID" value = "{{Session::get('OfficialID')}}" hidden>
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Reservation Details
                  </h4>
              </div>
              <!-- modal content -->

              <div class="modal-body">
                <div class="box-body">

                  <!--div class="row"-->
                      <div class="col-md-8" id="availform" style="display:block">
                      <div class="col-md-12" id="alertreq"></div>
                        <div class="col-md-12">       
                            <label>Purpose/Event*&nbsp;&nbsp; </label>
                            <input class="form-control" style="width:80%" type="text" id="purpose" name="purpose" required><br><br>
                        </div>

        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-gavel"></i>&nbsp;&nbsp;Item</a></li>
            <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-university"></i>&nbsp;&nbsp;Facility</a></li>

          </ul>                  
          <div class="tab-content" style="overflow: auto">
            <div class="tab-pane active" id="tab_1">
              <table class="table table-bordered table-striped" id="tableAvailable">
                <thead>
                   <tr>
                      <th></th>
                      <th>Item</th>
                      <th>Available</th>
                       <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
              </table> 
            </div>

            <div class="tab-pane" id="tab_2">
              <table class="table table-bordered table-striped" id="facavailable">
                <thead>
                   <tr>
                      <th></th>
                      <th>Facility Name</th>
                      <th>Location</th>
                      <th>Capacity</th>
                      <th>Consumable Devices</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
              </table> 
            </div> <!--tab 2-->


          </div> <!--tab content-->
        </div>  <!--custom-->
      </div> <!--availform-->

                    <div class="col-md-4" id="requestorInfo">
                      <div class="well">
                        <h5 class="box-title"><span class="label label-info">Requestor Details</span></h5>
                                                  
                          <div class="row">
                            <div class="col-md-12">
                              <center>
                                <div class="form-group" >
                                  <label><input type="radio" class="radiobtn" name="radioRes" id="resident" value="no" checked>Resident</label>&nbsp;&nbsp;&nbsp;
                                  <label><input type="radio" class="radiobtn" name="radioRes" id="nonresident" value="yes">Non-Resident</label>
                                </div> 
                              </center>
                            </div>
                          </div><br>

                          <div class="row">
                            <div class="col-md-12">
                               <div class="form-group" id="formAutosearch" >
                                  <label style="width:80px;">Name*</label>&nbsp;&nbsp;&nbsp;
                                  <select id = "autosearch" name="autosearch" class="form-control" style="width: 100%; display: none" >
                                    <option selected="" disabled="">Select Resident Name</option>
                                    @foreach( $cResident as $cResident)
                                    <option value="{{$cResident -> ResidentID}}"> {{ $cResident -> LastName }}, {{ $cResident -> FirstName }} {{ $cResident ->  MidName }} </option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group" id="formName" style="display:none">  
                                  <label style="width:80px;">Name*</label>&nbsp;&nbsp;&nbsp;    
                                  <input type="text" class="form-control" id="txtnonName" name="txtName" placeholder="Name">  
                                </div>
                            </div>
                          </div><br>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label style="width:80px;">Address*</label>&nbsp;&nbsp;&nbsp;
                                <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Address" required disabled="">
                              </div>                                  
                            </div>
                          </div><br>

                          <div class="row">
                            <div class="col-md-12">            
                              <div class="form-group">
                                <label style="width:80px;">Mobile No*</label>&nbsp;&nbsp;&nbsp;
                                <input type="text" class="form-control" id="txtMobile" name="txtMobile" placeholder="Mobile No" required disabled="">
                              </div>
                            </div>
                          </div><br>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label style="width:80px;">Birthday*</label>&nbsp;&nbsp;&nbsp;
                                <input type="date" class="form-control" id="txtBdate" name="txtBdate" placeholder="Birthday" required disabled=""> 
                              </div>
                            </div>
                          </div><br>
                                <div id = "hiddenFields" hidden></div>  
                                <div id = "hiddenManualDates" hidden></div>                     
                                <input type="hidden" class="form-control" id="dateTo" name="dateTo">
                                <input type="hidden" class="form-control" id="dateFrom" name="dateFrom">
                                <input type="hidden" class="form-control" id="timeTo" name="timeTo">
                                <input type="hidden" class="form-control" id="timeFrom" name="timeFrom">

                <center><button class="btn btn-flat btn-primary" id="btnSubmit" data-toggle="modal" data-target="#summaryInfo"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Submit</button></center>
                                    
      </div><!-- well -->
    </div><!-- /.col -->


                </div> <!--body-->
              </div><!-- modal body -->

              <div class="modal-footer" id="forButton">
                            
              </div><!-- /.modal-footer -->
              
              </div><!-- modal content -->
          </form>
      </div>
  </div>
  <!--////////////////////////////****************DOWNPAYMENT MODAL*****************************////////?/////////////////-->

        


      <script type= "text/javascript">
      function ShowAvail () {
     //   document.getElementById("availform").style.display="block";
     // document.getElementById("requestorInfo").style.display="block";
       }
</script>

 <script type="text/javascript">
         
   $(document).ready(function(){
    
            var today = new Date();
            var tomorrow= new Date(today.getFullYear(), today.getMonth(),today.getDate()+1);

      
    $('#reservationtime').daterangepicker
    ({
          timePicker: true,
          timePickerIncrement: 1,
         format: 'YYYY-MM-DD H:mm',
         minDate: tomorrow
    });
            
    $('#autosearch').select2();

    $('#autosearch').select2().change(function(){
        var ResID = $('#autosearch').val();
          $.ajax({
          type: 'POST',
          url: 'getResidentInfo',
          data: {resID: $('#autosearch').val()},
          dataType: 'JSON',
          success: function(data){
            $('#txtid').val(data.rD[0].ResidentID);
            $('#txtBdate').val(data.rD[0].Birthdate);
            $('#txtAddress').val(data.rD[0].HouseAddNo + " " + data.rD[0].HouseStreet);
            $('#txtMobile').val(data.rD[0].MobileNo);
            $('#txtEmail').val(data.rD[0].EmailAdd);
          },
          error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
              }
        }).error(function(ts){
          alert(ts.responseText);
        });
    }); 
  });
    $('#btnGo').click(function(){
      // document.getElementById("availform").style.display="block";
      // document.getElementById("requestorInfo").style.display="block";
      
      $('#tableAvailable tbody tr').remove();
      $('#facavailable tbody tr').remove();
      $('#alertreq').empty();

      var fullDate = $('#reservationtime').val().split(" - ");
      
      var dateTimeFrom = fullDate[0].split(" ");
      var dateFrom = dateTimeFrom[0];
      var timeFrom = dateTimeFrom[1];

      var dateTimeTo = fullDate[1].split(" ");
      var dateTo = dateTimeTo[0];
      var timeTo = dateTimeTo[1];

      var count = 0;
      var reserveid = [];

      $('#dateTo').val(dateTo);
      $('#dateFrom').val(dateFrom);
      $('#timeTo').val(timeTo);
      $('#timeFrom').val(timeFrom);
      
      $.ajax({
        type: 'GET',
        url: 'getItemTypes',
        dataType: 'JSON',
        success: function(data){


          //alert(JSON.stringify(data));

          $.each(data.types, function(key1, val1)
          {
            var ctr = 0;
            var ctrPerItemType = 0;
            count = 0;
            $.each(data.headers, function(key2, val2)
            {
              if(dateTo < val2.DateReserveFrom || dateFrom > val2.DateReserveTo)
              {
                //alert('huhu');
              }

              else
              {
                if(dateTo == val2.DateReserveFrom && dateFrom != val2.DateReserveTo)
                {
                  
                  if(timeTo < val2.TimeReserveFrom) { }
                  else // kunin ang reserve id na to ibabawas sa inventory
                  {
                   // alert("mhehehe"+ val2.ReservationID);
                   // alert('kunindd =' + val2.ReservationID);
                    count = continuation(data, val1, val2, ctr);
                    ctrPerItemType +=count;
                  }
                }
                else if(dateFrom == val2.DateReserveTo && dateTo != val2.DateReserveFrom)
                {
                 // alert("no");
                  if(timeFrom > val2.TimeReserveTo)
                  {
                    //alert('yey'); 
                  }
                  else // kunin ang reserve id na to ibabawas sa inventory
                  {
                    //alert('kuninww ' + val2.ReservationID);
                     // alert("meow");
                    count = continuation(data, val1, val2, ctr);
                    ctrPerItemType +=count;
                  }
                }
                else // kunin ang reserve id na to ibabawas sa inventory
                {
                  //alert('kunin' + val2.ReservationID);
                    count = continuation(data, val1, val2, ctr);
                    ctrPerItemType +=count;
                }
              }

             // alert(val2.ReservationID + " - " +count);
             //alert(count);
            });

              
            //alert(val1.ItemName + " - " + ctrPerItemType);

            $.ajax({
              type: "POST",
              url: "getAvailableItems",
              data:{minusItem: ctrPerItemType,
                    iType: val1.ItemTypeID},
              dataType: "JSON",
              success: function(data){

                $('#tableAvailable tbody').append('<tr><td><center><input type="checkbox" id="checkbox_'+val1.ItemTypeID+'" name="checkbox_'+val1.ItemTypeID+'" value = "'+val1.ItemTypeID+'" onclick="ValidateRequire('+val1.ItemTypeID+')"></center></td><td>'+val1.ItemName+'</td><td> <center><span class="label label-danger"><label value="'+data.available+'" id="avail_'+val1.ItemTypeID+'" for="avail_'+val1.ItemTypeID+'">'+data.available+'</label></span></center></td><td><input type = "number" id="textbox_'+val1.ItemTypeID+'" name="textbox_'+val1.ItemTypeID+'" max="'+data.available+'" onkeyup="ValidateMax('+val1.ItemTypeID+')" class = "form-control"></td></tr>');
                available (data.available, val1.ItemTypeID);
            },
              error: function(request, error){

              }
            }).error(function(ts){
              alert(ts.responseText);
            });

            //
           });
          
        },
        error: function(request, error){

        }
      }).error(function(ts){
        alert(ts.responseText);
      });

//***Facility validation***//
      $.ajax({
        type: 'GET',
        url: 'getFacility',
        dataType: 'JSON',
        success: function(data){
          $.each(data.facreserve, function(key2, val2)
          {
            $.each(data.facreq, function(key1, val1)
            {
            if(dateTo < val2.DateReserveFrom || dateFrom > val2.DateReserveTo) { }
            else
            {
              if(dateTo == val2.DateReserveFrom && dateFrom != val2.DateReserveTo)
              {
                if(timeTo < val2.TimeReserveFrom) { }
                else // kunin ang reserve id na to ibabawas sa inventory
                {
                 if(val2.ReservationID===val1.ReservationID)
                 {
                  reserveid.push(val1.FacilityID);
                 }
                }
              }
              else if(dateFrom == val2.DateReserveTo && dateTo != val2.DateReserveFrom)
              {
               // alert("no");
                if(timeFrom > val2.TimeReserveTo)   { }
                else // kunin ang reserve id na to ibabawas sa inventory
                {
                    if(val2.ReservationID===val1.ReservationID) {
                        reserveid.push(val1.FacilityID);
                      }
                }
              }
              else // kunin ang reserve id na to ibabawas sa inventory
              {
                //alert('kunin' + val2.ReservationID);
                 if(val2.ReservationID===val1.ReservationID)
                 {
                  reserveid.push(val1.FacilityID);
                 }
       

               
              }
            }

          });//each
        }); //each facreq

                $.ajax({
                type: "POST",
                url: "availableFacility",
                data:{reserveid: reserveid},
                dataType: "JSON",
                success: function(data){
                    $.each(data.facid, function(key1, val1)
                    {
                       $('#facavailable tbody').append('<tr><td><center><input type="checkbox" id="checkbox_'+val1.FacilityID+'" name="checkbox_'+val1.FacilityID+'" value = "'+val1.FacilityID+'"></center></td><td>'+val1.FacilityName+'</td><td><center>'+val1.Location+'</center></td><td>'+val1.Capacity+'</td><td id="'+val1.FacilityID+'"></td></tr>');
                              
                              $.each(data.device, function(key2, val2)
                               {
                                  if (val2.DeviceFacility==val1.FacilityID)
                                  {
                                      $('#'+val1.FacilityID).append('<input type="checkbox" id="device_'+val2.DeviceID+'" name="device_'+val2.DeviceID+'" value="'+val2.DeviceID+'" onclick="ValidateDevice('+val1.FacilityID+','+val2.DeviceID+')">'+val2.DeviceName+'</td><br>');
                                  }
                              });
                      });
              },
                error: function(request, error){

                }
              }).error(function(ts){
                alert(ts.responseText);
              });
        },
        error: function(request, error){
        }
      }).error(function(ts){
        alert(ts.responseText);
      });
    });//BTNSUBMIT

      
 $(".radiobtn").change(function(e) {  
          
       if ($("input[name=radioRes]:checked").val() == "yes") { 
          $("#formName").show(); 
          $("#txtAddress").removeAttr("disabled");   
          $("#txtMobile").removeAttr("disabled"); 
          $("#txtBdate").removeAttr("disabled"); 
          $("#txtAddress").val("");  
          $("#txtMobile").val("");   
          $("#txtBdate").val(""); 
          $("#formAutosearch").hide();
       }

       else { 

          $("#formAutosearch").show();
         $("#formName").hide(); 
         $("#txtAddress").attr("disabled", "disabled");  
         $("#txtMobile").attr("disabled", "disabled"); 
         $("#txtBdate").attr("disabled", "disabled"); 
         }

         });

        </script>

        <script type="text/javascript">
          function continuation(data, val1, val2, ctr)
          {
            $.each(data.details, function(key3, val3){
              if(val3.ReservationID == val2.ReservationID && val3.ItemTypeID == val1.ItemTypeID)
              {
                ctr = ctr + val3.ReserveQuantity;
              }
            });

            return ctr;
          }

        function ValidateMax(ItemTypeID)
          {
           var check = "checkbox_"+ItemTypeID;
           if($('#'+check).is(':checked'))
           {}
          else
             $('#alertreq').append('<div class="alert alert-danger alert-dismissible">'
            +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
            +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
            +'Check the corresponding checkbox of the Item first!'
            +'</div>');

            if (parseInt($('#textbox_'+ItemTypeID).val())==0) {
              $('#alertreq').append('<div class="alert alert-danger alert-dismissible">'
            +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
            +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
            +'Reservation Quantity must be greater than 0'
            +'</div>');
              $('#textbox_'+ItemTypeID).val("");
            }
            if (parseInt($('#textbox_'+ItemTypeID).val())>parseInt($('#avail_'+ItemTypeID).text())) {
              $('#alertreq').append('<div class="alert alert-danger alert-dismissible">'
            +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
            +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
            +'Reservation Quantity must be lesss than or equal to Available Items'
            +'</div>');
              $('#textbox_'+ItemTypeID).val("");
            }
          }

        function ValidateDevice (FacID, deviceID)
        {
            var fac = "checkbox_"+FacID;
            var device = "device_"+deviceID;

          if($('#'+device).is(':checked') && $('#'+fac).is(':checked'))
           { }

          else if($('#'+device).is(':checked') && !$('#'+fac).is(':checked'))
          {
            $('#alertreq').append('<div class="alert alert-danger alert-dismissible">'
            +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
            +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
            +'Check the corresponding checkbox of the Facility First!'
            +'</div>');
             $('#'+device).prop('checked',false);
          }
        }


      function ValidateRequire (ItemTypeID)
        {
            var text = "textbox_"+ItemTypeID;
            var item = "checkbox_"+ItemTypeID;

          if($('#'+item).is(':checked'))
          {
            $('#'+text).prop('required', 'required');
          }
          
          if(!$('#'+item).is(':checked'))
          {
            $('#'+text).prop('required', false);
          }
        }

      function available (dataavail, ItemTypeID)
        {
            var text = "textbox_"+ItemTypeID;
            var item = "checkbox_"+ItemTypeID;

          if(dataavail=="0")
          { 
            $('#'+text).prop('disabled',true);
            $('#'+item).prop('disabled', 'disabled');
          }
        }

        </script>

  </section>

@stop