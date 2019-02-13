@extends('layouts_web.master')

@section('content')

<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}" type = "text/javascript"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type = "text/javascript"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

<!-- bootstrap time picker -->
<script src="{{ asset ('bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>


<section class="content-header">
<br><br>

<ol class="breadcrumb" align="right">
              <li><a href="<?php echo 'request' ?>"> iRequest</a></li>
              <li class="active">Items &amp; Facilities</li>
            </ol>

</section>


<section class="content">


  <div class="col-md-1">
      </div>
      <div class="well">
          <h3 style=" font-family: Montserrat"><b>Step 2:</b> Select your date and time of reservation </h3>
      </div><br>


  <div class="row">
     <div id="documents" class="col-md-10" style="margin: 0 10% 5%; background-color: #fff; width: 80%;">
             <div class="box box-solid">
                <div class="box-header with-border">
                  
                <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"><span class="label label-primary">Selection of Date </span></h1>
                </div>

                <div class="box-body">
                <center><div class="col-md-12">
                      <table  style="border-spacing: 17px;border-collapse: separate;">
                      <tbody>
                        <tr>
                          <td><input type="radio" name="pickDate" id = "dRange" value="1"></td>
                          <td><label for="facName">Date Range</label></td>
                        
                           <td><input type="radio" name="pickDate" id = "mDate" value="2"></td>
                           <td><label for="facAdd">Manual Selection</label></td>
                        </tr>
                      </tbody>
                    </table><br><br>
                  </div></center>

          <div class="col-md-12" id="range" style="display:none">
            <div class="box box-solid">
              <form class="form-inline"> 
                <!-- form start -->
      
                <div class="box-body">
                        <input type="text" id="offID"  name="offID" value = "{{Session::get('OfficialID')}}" hidden>
                    
                    <center>
                      <div class="col-md-12">
                      <div class="form-group">
                          <label><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Date Range</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" style="font-size:20px; width:250px" class="form-control" id="reservationtime">
                        </div>
                      <!-- /.input group -->
                      </div> &nbsp;&nbsp;
                        <a href="#" class="btn btn-primary btn-flat">Next >></a>
                      </div><br><br><br><br>
                    </center>
                  </div>
             </form>
            </div>  <!--box frimary-->
          </div>

                <div class="col-md-12" id="manualdate" style="display:none">
                  <div class="box box-solid">
                     <div class="box-header with-border">
                          <h4 class="box-title"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Manual Selection</h4>
                            
                      </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <!-- THE CALENDAR -->
                      <div id="calendar"></div>
                    </div><!-- /.box-body --><br>

                    <div class="box-footer" style="margin-bottom: 10px;">
                        <center><a href="#" class="btn btn-primary btn-flat">Next >></a></center>
                      </div>
                  </div><!-- /. box -->
                </div><!-- /.col -->


                <div class="col-md-12" id="availform" style="display:none" style="font-size:13px">
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
                              <table class="table table-bordered table-striped" id="tableAvailable" >
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
                  
                </div>
              </div>
   </div><!--row -->   
  </div>

  <div class="col-md-1">
    </div>
    <div class="well" id="step3">
      <div class="form-group">
        <h3 style="font-family: Montserrat"><b>Step 3:</b> Fill up your details  <small>*If you are a registered resident, your details should match on the Barangay records. </small></h3>
      </div>
    </div><br>


    <div class="row">
        <div id="request" class="col-md-6" style="margin: 0 10% 5%; background-color: #fff; width: 80%;">
            <div class="box-body">
                <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"><span class="label label-primary">Requestor Details </span></h1>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Request ID</label>
                        
                        <input type="text" 
                            class="form-control" 
                            >
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label>Type</label>
                      <center><div class="radio" >
                          <label><input type="radio" class="radiobtn" name="radioDoc" id="radioDoc" value="1" checked>Resident</label>&nbsp;&nbsp;&nbsp;
                          <label><input type="radio" class="radiobtn" name="radioDoc" id="radioDoc" value="2" >Non-resident</label>
                      </div></center>
                    </div>
                  </div>
                  
                    <hr>
                  <div class="row">
                      
                    <div class="col-md-6">
                    <label>Name</label>
                      <div class="form-group" id="NResRequested">
                        
                        <div class="col-md-4">
                            
                          <input type="text" 
                              class="form-control" 
                              id = "txtFReqFor"
                              name = "txtFReqFor"
                              placeholder="First Name">
                        </div>
                        <div class="col-md-4">
                          <input type="text" 
                              class="form-control" 
                              id = "txtMReqFor"
                              name = "txtMReqFor"
                              placeholder="Middle Name">
                        </div>
                        <div class="col-md-4">
                          <input type="text" 
                              class="form-control" 
                              id = "txtLReqFor"
                              name = "txtLReqFor"
                              placeholder="Last Name">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group" id="address">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" 
                            class="form-control" 
                            id = "txtAddress"
                            name = "txtAddress">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      

                       <div class="form-group" id="NBirthdate" >
                        <label>Birthdate</label>
                        <input type="date" 
                            class="form-control" 
                            id = "txtNBirthdate"
                            name = "txtNBirthdate">
                      </div>

                    </div>

                    <div class="col-md-6">

                      <div class="form-group" id="NGender" >
                        <label>Contact No.</label>
                        <input
                               class="form-control"
                                id = "txtNGender"
                                name = "txtNGender">
                      </div>

                    </div>
                  </div>  


                      <center><div class="g-recaptcha" data-sitekey="6LdbIycTAAAAAAuj50Jmfdg-k6AsCnojtNdvmLF6"></div></center><br>
              

                      <div class="box-footer" style="margin-bottom: 10px;" align="center">
                        <button data-toggle = "modal" data-target = "#requestor" type="submit" class="btn btn-success btn-flat btn-lg">Proceed</button>
                      </div>

                    </div><!--box body-->
        </div><!--row -->   
    </div>


    <!-- fullCalendar 2.2.5 -->
  <script src="{{ asset ('bower_components/admin-lte/plugins/fullcalendar/moment.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset ('bower_components/admin-lte/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>


    <script type="text/javascript">
        $(document).ready(function () {

              $('#dRange').click(function(){
                $('#range').show();
                $('#manualdate').hide();

                var today = new Date();

                $('#reservationtime').daterangepicker
                ({
                  timepicker: true,
                  timePickerIncrement: 1,
                  format: 'YYYY-MM-DD H:mm',
                  minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()+1)
                });
              });

              $('#mDate').click(function(){
                $('#range').hide();
                $('#manualdate').show();

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
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        started = start;
                        ended = end;
                    },
                    editable: false
                    
                });
              });


             


        });//document
    </script>


  </section>


@stop  