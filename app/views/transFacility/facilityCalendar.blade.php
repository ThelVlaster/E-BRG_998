
        <!-- Main content -->
          <div class="row">

            <div class="col-md-3">
             

              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Select Date </h3>
                </div>
                <div class="box-body">
                


                  
                      <table  style="border-spacing: 17px;border-collapse: separate;">
                      <tbody>
                        <tr>
                          <td><input type="radio" name="pickDate" id = "dRange" value="1"></td>
                          <td><label for="facName">Date Range</label></td>
                        </tr>
                        <tr> 
                           <td><input type="radio" name="pickDate" id = "mDate" value="2"></td>
                           <td><label for="facAdd">Manual Pick Date</label></td>
                        </tr>
                      </tbody>
                    </table>
                  
                </div>
              </div>




            </div><!-- /.col -->



            <div class="col-md-9">
              <div class="box box-danger">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->




          </div><!-- /.row -->


          <div class = "row">

            <div class = "col-md-12" id="manual" hidden>
              <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Manual Pick Date</h3>
                         <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                         </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                        <div id="Messages"></div>
                        
                        <div class="col-md-12" id="alertreqqqq"></div>
                        <table  id = "reserveDates" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th width = "10%">Remove</th>
                              <th width = "30%">Date Reserve</th>
                              <th width = "30%">From</th>
                              <th width = "30%">To</th>
                            </tr>
                          </thead>
                          <tbody>
                              <tr align = "center"><td colspan="4">No Reserve Dates</td></tr>
                          </tbody>
                        </table>

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="button" class="btn btn-info btn-flat" id= "btnReserve" data-toggle="modal" data-target = "#modalReserve">Reserve</button></center>
                      
                      </div>
                
                  </div><!-- /.box -->
            </div>
            
          </div>  


          <script type="text/javascript" src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>


          <script type = "text/javascript">
            $(document).ready(function () {

                window.clickDate = [];  
          
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var started;
                var categoryClass;

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },

                    eventLimit: true, // allow "more" link when too many events
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        started = start;
                        ended = end;
                    },
                    editable: false,
                    events: 
                      '{{URL::to("showEvents")}}',
                    
                });
                
              $('#dRange').click(function(){
                $('#manual').hide();
                $('#forDateRange').show();
                $('#calendar').fullCalendar('refetchEvents');
                $('#hiddenFields').html('<input type = "text" id = "reserveType" name = "reserveType" value = "dateRange">');
              });

              $('#mDate').click(function(){
                clickDate = [];
                $('#tableAvailable tbody').empty();
                $('#facavailable tbody tr').empty();
                $('#alertreq').empty();
                $('#reserveDates tbody').empty();
                $('#manual').show();
                $('#forDateRange').hide();
                $('#calendar').fullCalendar('destroy');
                $('#hiddenFields').html('');


                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var started;
                var categoryClass;

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'

                    },
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                      started = start;
                      ended = end;
                    },
                    editable: false,

                    dayClick: function(date, jsEvent, view) {

                    // alert('Clicked on: ' + date.format());
                    // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                    // alert('Current view: ' + view.name);
                    // change the day's background color just for fun
                    // $(this).css('background-color', 'red');
                                  
                      $('#tableAvailable tbody').empty();
                      $('#facavailable tbody tr').empty();
                      $('#alertreq').empty();
                    if(clickDate.length >= 1)
                    {
                      var a = 0;
                        for(var i = 0; i < clickDate.length; i++)
                        {
                          if(clickDate[i] == date.format())
                          {
                            a = 1;
                          }
                        }

                      if( a == 0 )
                      {
                        clickDate.push(date.format());
                        clickDate.sort();
                      }
                      else
                      {
                         $('#alertreqqqq').append('<div class="alert alert-danger alert-dismissible">'
                            +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                            +'<h4><i class="icon fa fa-ban"></i> Alert!</h4>'
                            +'Date not valid'
                            +'</div>');
                      }
                    }
                    else
                    {
                      clickDate.push(date.format());
                    }


                    $('#reserveDates tbody').html("");

                    for(var i = 0; i < clickDate.length; i++)
                    {
                      $('#reserveDates tbody').append('<tr align = "center"><td><button class="btn btn-xs btn-danger btn-flat" id = "remove_'+i+'" onclick = "sample('+i+')"><i class="fa fa-remove" ></i></button></td>'+
                          '<td><div class="form-group"><input type="text" class="form-control" id = "datepick_'+i+'" name = "datepick_'+i+'" value = "'+clickDate[i]+'"></div></td>'+
                          '<td><div class="bootstrap-timepicker"><div class="form-group"><div class="input-group"><input type="time" id = "timeFrom_'+i+'" name = "timeFrom_'+i+'"></div></div></div></td>' +
                          '<td><div class="bootstrap-timepicker"><div class="form-group"><div class="input-group"><input type="time" id = "timeTo_'+i+'" name = "timeTo_'+i+'"></div></div></div></td>' +

                          '</tr>');

                      
                    }

                      //Timepicker
                    $(".timepicker").timepicker({
                          showInputs: true,
                          minuteStep: 1

                        });
                  }, // day click
                  events: 
                    '{{URL::to("showEvents")}}',
                              
                }); // full calendar

                

              }); // mDate function

              $('#btnReserve').click(function(){
                $('#tableAvailable tbody').empty();
                $('#facavailable tbody tr').empty();
                $('#alertreq').empty();
                $('#hiddenFields').html('<input type = "text" id = "reserveType" name = "reserveType" value = "manualDate"> <br> <input type ="text" id = "dateClicks" name = "dateClicks" value = "'+ clickDate.length+'">');
                $('#hiddenManualDates').html('');

                for(var i = 0; i < clickDate.length; i++)
                {
                  $('#hiddenManualDates').append('<input type="text" class="form-control" id = "datepick_'+i+'" name = "datepick_'+i+'" value = "'+clickDate[i]+'"> <input type="text" class="form-control timepicker" id = "timeFrom_'+i+'" name = "timeFrom_'+i+'" value = "'+$('#timeFrom_'+i).val()+'"> <input type="text" class="form-control timepicker" id = "timeTo_'+i+'" name = "timeTo_'+i+'" value = "'+$('#timeTo_'+i).val()+'">' +

                          '</br>');
                }

                $.ajax({
                  type: 'GET',
                  url: 'getAvailables',
                  dataType: 'JSON',
                  success: function(data){

                    //////////////// FACILITIESSSSSSSS ///////////

                    $.each(data.facility, function(key1, faci){
                      var availability = 0;
                      for(var i = 0; i < clickDate.length; i++){
                        $.each(data.fReserve, function(key2, faciRes){
                          if(faci.FacilityID == faciRes.FacilityID){
                            
                            if($('#datepick_'+i).val() < faciRes.DateReserveFrom || $('#datepick_'+i).val() > faciRes.DateReserveTo){

                            }
                            else
                            {
                              if($('#datepick_'+i).val() == faciRes.DateReserveFrom && $('#datepick_'+i).val() != faciRes.DateReserveTo)
                              {
                                if($('#timeTo_'+i).val() < faciRes.TimeReserveFrom)
                                {

                                }
                                else
                                {
                                  availability = availability + 1;
                                }
                              }
                              else if ($('#datepick_'+i).val() != faciRes.DateReserveFrom && $('#datepick_'+i).val() == faciRes.DateReserveTo)
                              {
                                if($('#timeFrom_'+i).val() > faciRes.TimeReserveTo)
                                {

                                }
                                else
                                {
                                  availability = availability + 1;
                                }
                              }
                              else
                              {
                                if($('#timeTo_'+i).val() < faciRes.TimeReserveFrom || $('#timeFrom_'+i).val() > faciRes.TimeReserveTo)
                                {

                                }
                                else
                                {
                                  availability = availability + 1;
                                }
                              }
                            }
                            
                          }
                        });//reserve request
                      }//nirerequest na dates
                      if(availability == 0)
                      {
                          $('#facavailable tbody').append('<tr><td><center><input type="checkbox" id="checkbox_'+faci.FacilityID+'" name="checkbox_'+faci.FacilityID+'" value = "'+faci.FacilityID+'"></center></td><td>'+faci.FacilityName+'</td><td><center>'+faci.Location+'</center></td><td>'+faci.Capacity+'</td><td id="'+faci.FacilityID+'"></td></tr>');
                              
                              $.each(data.device, function(key2, val2)
                               {
                                  if (val2.DeviceFacility==faci.FacilityID)
                                  {
                                      $('#'+faci.FacilityID).append('<input type="checkbox" id="device_'+val2.DeviceID+'" name="device_'+val2.DeviceID+'" value="'+val2.DeviceID+'" onclick="ValidateDevice('+faci.FacilityID+','+val2.DeviceID+')">'+val2.DeviceName+'</td><br>');
                                  }
                              });

                        //alert(faci.FacilityID +" "+ faci.FacilityName);
                      }// alerting all the available facilities
                    });// facilities

                    //////////// END OF FACILITIESSSSSSs ////////

                    /////////// ITEMSSSSS /////////

                    $.each(data.item, function(key1, item){
                      var itemReserveCount = 0;
                      for(var i = 0; i < clickDate.length; i++){
                        $.each(data.iReserve, function(key2, itemRes){
                          if(item.ItemTypeID == itemRes.ItemTypeID)
                          {
                            if($('#datepick_'+i).val() < itemRes.DateReserveFrom || $('#datepick_'+i).val() > itemRes.DateReserveTo){

                            }
                            else
                            {
                              if($('#datepick_'+i).val() == itemRes.DateReserveFrom && $('#datepick_'+i).val() != itemRes.DateReserveTo)
                              {
                                if($('#timeTo_'+i).val() < itemRes.TimeReserveFrom)
                                {

                                }
                                else
                                {
                                  itemReserveCount = itemReserveCount + itemRes.ReserveQuantity;
                                }
                              }
                              else if ($('#datepick_'+i).val() != itemRes.DateReserveFrom && $('#datepick_'+i).val() == itemRes.DateReserveTo)
                              {
                                if($('#timeFrom_'+i).val() > itemRes.TimeReserveTo)
                                {

                                }
                                else
                                {
                                  itemReserveCount = itemReserveCount + itemRes.ReserveQuantity;
                                }
                              }
                              else
                              {
                                if($('#timeTo_'+i).val() < itemRes.TimeReserveFrom || $('#timeFrom_'+i).val() > itemRes.TimeReserveTo)
                                {

                                }
                                else
                                {
                                  itemReserveCount = itemReserveCount + itemRes.ReserveQuantity;
                                }
                              }
                            }
                          }
                        }); // mga narequest na dates
                      }// mga irerequest na dates

                      
                      $.each(data.iDetails, function(key2, iDetails){
                        if(item.ItemTypeID == iDetails.ItemTypeID)
                        {
                          var available = iDetails.ItemID - itemReserveCount;

                          $('#tableAvailable tbody').append('<tr><td><center><input type="checkbox" id="checkbox_'+item.ItemTypeID+'" name="checkbox_'+item.ItemTypeID+'" value = "'+item.ItemTypeID+'" onclick="ValidateRequire('+item.ItemTypeID+')"></center></td><td>'+item.ItemName+'</td><td> <center><span class="label label-danger"><label value="'+available+'" id="avail_'+item.ItemTypeID+'" for="avail_'+item.ItemTypeID+'">'+available+'</label></span></center></td><td><input type = "number" id="textbox_'+item.ItemTypeID+'" name="textbox_'+item.ItemTypeID+'" max="'+available+'" onkeyup="ValidateMax('+item.ItemTypeID+')" class = "form-control"></td></tr>');

                          //alert(item.ItemName + " - " + available);
                        }// dito na maglalagay ng available itemsss
                      });

                    });// items

                    //////////END OF ITEMS /////////
                  },error: function(request, error){
                    alert(error);
                  }
                }).error(function(ts){
                  alert(ts.responseText);
                });// ajax
              }); // btnReserve Clicked
          }); // document ready

        </script>

<script type="text/javascript">
  function sample(i)
  {
    clickDate = jQuery.grep(clickDate, function(value) {
      console.log(clickDate[i]);
      return value != clickDate[i];
    });

    $('#reserveDates tbody').html("");

      for(var ctr = 0; ctr < clickDate.length; ctr++)
      {
        $('#reserveDates tbody').append('<tr align = "center"><td><button class="btn btn-xs btn-danger btn-flat" id = "remove_'+ctr+'" onclick = "sample('+ctr+')"><i class="fa fa-remove" ></i></button></td>'+
            '<td><div class="form-group"><input type="text" class="form-control" id = "datepick_'+ctr+'" value = "'+clickDate[ctr]+'"></div></td>'+
            '<td><div class="bootstrap-timepicker"><div class="form-group"><div class="input-group"><input type="time" class="form-control" id = "timeFrom_'+ctr+'"></div></div></div></td>' +
            '<td><div class="bootstrap-timepicker"><div class="form-group"><div class="input-group"><input type="time" class="form-control" id = "timeTo_'+ctr+'"></div></div></div></td>' +

            '</tr>');
      }

       //Timepicker
      $(".timepicker").timepicker({
        showInputs: true,
        minuteStep: 1

      });

      if(clickDate.length == 0)
      {
        
         $('#reserveDates tbody').html('<tr align = "center"><td colspan="4">No Reserve Dates</td></tr>');
      }
  }
</script>