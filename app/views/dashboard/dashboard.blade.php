@extends('layouts.master')

@section('content')

<section class="content-header">
          
            <h1>Dashboard</h1>
</section>           
<section class="content">
<!-- Info boxes -->
      <div class="row">
         <div class="box-body">
              <div class="well" style="background-color: #007acc; color:white;">
                <div class="col-md-8">
                  <h4><i class="fa fa-sun-o"></i>  Good Day, <b>{{ Session::get('firstname') }} {{ Session::get('lastname') }}</b>!
                  <h5>Barangay {{ Session::get('position') }}</h5>
                </div><br>

                <h4 id="clockbox"></h4>
              </div>
            </div>
      </div>


  <div class="row">
    <div class="col-md-7">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">Item &amp; Facility<span class="label label-danger">   {{$resctr}}</span></a></li>
              <li><a href="#tab_2-2" data-toggle="tab">Business Docs<span class="label label-danger">   {{$busCount}}</span></a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">Regular Docs <span class="label label-danger"> {{$docCount}}</span> </a></li>

              <li class="pull-left header"> New Requests</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">

                <table id="items" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Request No.</th>
                          <th>Requestor Type</th>
                          <th>Date of Request</th>
                          <th>Reservation Status</th>
                          <th>Payment Status</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                       @foreach ($res as $r)
                        <tr>
                          <td><span class="label label-warning">IF2016{{$r->ReservationID}}</span></td>
                          @if($r->RequestorType=='1')
                          <td>Non-Resident</td>
                          @else
                          <td>Resident</td>
                          @endif
                          <td>{{$r->DateRequested}}</td>
                          <td><a class = "btn btn-block bg-navy btn-xs" href="<?php echo 'ItemRequest' ?>">{{$r -> ReserveStatus}}</a></td>
                          <td><a class = "btn btn-block bg-navy btn-xs" href="<?php echo 'Payment' ?>">{{$r-> PaymentStatus}}</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                <table class="table table-striped">
                <!--      <table  class="table table-bordered table-striped">-->
                        
                      <thead>
                        <tr>
                          
                          <th>Request No.</th>
                          <th>Date Requested</th>
                          <th>Business Name</th>
                          <th width="50px">Document</th>
                          <th width="100px">Status</th>


                        </tr>
                      </thead>
                      <tbody>
                      
                        @foreach($breq as $breq)
                        <tr>
                          
                          <td align="center"><span class="label label-warning">BD2016-{{$breq -> BusRequestID}}</span></td>
                         
                          <td>{{$breq -> DateOfRequest}}</td>
                          

                          <td> {{$breq -> BusinessName}} </td>
                          <td> {{$breq -> DocumentName}} </td>

                          <td>
                           
                                @if($breq->BusDocStatus == "New")
                                  <a  href="<?php echo 'createBusDocumentRequest' ?>?varname={{$breq->DocumentID}}&ReqID={{$breq->BusRequestID}}" class = "NEW btn btn-block btn-flat btn-primary btn-xs"> {{$breq -> BusDocStatus}}</a>
                                @endif
                                
                          </td>

                        
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3-2">

                <table class="table table-striped">
                <!--      <table  class="table table-bordered table-striped">-->
                        
                      <thead>
                        <tr>
                          
                          <th>Request No.</th>
                          <th>Date Requested</th>
                          <th width="50px">Document</th>
                          <th width="100px">Status</th>


                        </tr>
                      </thead>
                      <tbody>
                      
                        @foreach($info as $info)
                        <tr>
                          
                          <td align="center"><span class="label label-warning">RD2016-{{$info -> RequestID}}</span></td>
                         
                          <td>{{$info -> DateOfRequest}}</td>
                          

                          <td> 
                              @foreach($docInfo as $di)
                                @if($info->RequestID == $di->RequestID)
                                  {{$di -> DocumentName}}<br>
                                @else

                                @endif
                              @endforeach</td>

                          <td>
                            @foreach($docInfo as $di)
                              @if($info->RequestID == $di->RequestID)
                                @if($di->DocReqStatus == "New")
                                  <a  href="<?php echo 'createDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->RequestID}}" class = "NEW btn btn-block btn-flat btn-primary btn-xs"> {{$di -> DocReqStatus}}</a>
                                @elseif($di->DocReqStatus == "Pending")
                                  <a  href="<?php echo 'createDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->RequestID}}" class = "PEN btn btn-block btn-flat btn-warning btn-xs"> {{$di -> DocReqStatus}}</a>
                                @elseif($di->DocReqStatus == "For Approval")
                                  <a  href="<?php echo 'createDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->RequestID}}" class = "APP btn btn-block btn-flat btn-success btn-xs"> {{$di -> DocReqStatus}}</a>
                                @elseif($di->DocReqStatus == "Done")
                                  <a  href="<?php echo 'createDocumentRequest' ?>?varname={{$di->DocumentID}}&ReqID={{$info->RequestID}}" class = "DON btn btn-block btn-flat bg-navy btn-xs" disabled> {{$di -> DocReqStatus}}</a>
                                 @elseif($di->DocReqStatus == "Cancelled")
                                  <a class = "CAN btn btn-block btn-flat btn-danger  btn-xs" disabled> {{$di -> DocReqStatus}}</a>
                                
                                @endif
                              @endif
                            @endforeach
                          </td>

                        
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->


        <div class="col-md-5">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Population Breakdown by <b>Gender</b></h3>

            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-9">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150" ></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Female</li>
                    <li><i class="fa fa-circle-o text-green"></i> Male</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="<?php echo 'residentDetails' ?>#viewRes" class="btn btn-flat btn-sm btn-default pull-right">View all <i class="fa fa-arrow-circle-right"></i> </a>
            </div>
            <!-- /.footer -->



          </div>
          <!-- /.box -->
        </div>
      
    

      <div class="col-md-7">
        <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Population Breakdown by <b>Street</b></h3>        
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="<?php echo 'residentDetails' ?>#viewRes" class="btn btn-flat btn-sm btn-default pull-right">View all <i class="fa fa-arrow-circle-right"></i> </a>
            </div>
          </div>
          <!-- /.box -->


      </div>


      <div class="col-md-5">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Activities</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

              @foreach($log as $logs)
                <li class="item">
                  <div class="product-info">
                    <a href="#" class="product-title">{{$logs -> logFirstname}} {{$logs -> logLastname}}
                      <span class="label label-danger pull-right">{{$logs -> logDate}}</span></a>
                        <span class="product-description">
                        Just {{$logs -> logAction}}
                        </span>
                  </div>
                </li>
              @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="<?php echo 'auditTrail' ?>" class="uppercase">View All Activities</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div> <!-- row -->




<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function (){


   
    

    $.ajax({
      type: 'POST',
      url: 'countResInfo',
      dataType: 'JSON',
      success: function(data){
              
               //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
                var pieChart = new Chart(pieChartCanvas);
                var PieData = [
                  {
                    value: data.female,
                    color: "#f56954",
                    highlight: "#f56954",
                    label: "Female"
                  },
                  {
                    value: data.male,
                    color: "#00a65a",
                    highlight: "#00a65a",
                    label: "Male"
                  },
                ];
                var pieOptions = {
                  //Boolean - Whether we should show a stroke on each segment
                  segmentShowStroke: true,
                  //String - The colour of each segment stroke
                  segmentStrokeColor: "#fff",
                  //Number - The width of each segment stroke
                  segmentStrokeWidth: 2,
                  //Number - The percentage of the chart that we cut out of the middle
                  percentageInnerCutout: 50, // This is 0 for Pie charts
                  //Number - Amount of animation steps
                  animationSteps: 100,
                  //String - Animation easing effect
                  animationEasing: "easeOutBounce",
                  //Boolean - Whether we animate the rotation of the Doughnut
                  animateRotate: true,
                  //Boolean - Whether we animate scaling the Doughnut from the centre
                  animateScale: true,
                  //Boolean - whether to make the chart responsive to window resizing
                  responsive: true,
                  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                  maintainAspectRatio: true,
                  //String - A legend template
                  legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
                };
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                pieChart.Doughnut(PieData, pieOptions);
                        
          }
      });              
   
      
  $.ajax({
      type: 'GET',
      url: 'countResStreetInfo',
      dataType: 'JSON',
      success: function(data){
        var x = [];
        var y = [];
        $.each(data.res, function(key, val){
              x.push(val.StreetName);
              y.push(val.countRes);

              });//each

        //-------------
        //- BAR CHART -
        var areaChartData = {
          labels: x,
          datasets: [
            {
              label: "Population by Street",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: y
            }
          ]
        };

        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;


        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };
      barChartOptions.datasetFill = true;
      barChart.Bar(barChartData, barChartOptions);
        

       }//success
      }).error(function(ts){
        alert(ts.responseText);
      });



  });//document
</script>


<script type="text/javascript">


        tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

        function GetClock(){
            var d=new Date();
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear(),nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

                 if(nhour==0){ap=" AM";nhour=12;}
            else if(nhour<12){ap=" AM";}
            else if(nhour==12){ap=" PM";}
            else if(nhour>12){ap=" PM";nhour-=12;}

            if(nyear<1000) nyear+=1900;
            if(nmin<=9) nmin="0"+nmin;
            if(nsec<=9) nsec="0"+nsec;

            document.getElementById('clockbox').innerHTML=""+tday[nday]+" | "+tmonth[nmonth]+" "+ndate+", "+nyear+" | "+nhour+":"+nmin+":"+nsec+ap+"";
            }

            window.onload=function(){
            GetClock();
            setInterval(GetClock,1000);
        }
</script>






    </section>
    @stop