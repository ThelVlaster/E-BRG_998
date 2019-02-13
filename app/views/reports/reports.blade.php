@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->

<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="{{ asset ('bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>



          <section class="content-header">
            <h1>
              Reports
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i>Reports</a></li>
            
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
 
          <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Regular Document Request Report</h3>

              <div class="box-tools pull-right">
                
                <div class="form-group">
                  <div class="input-group" >
                    <button type="button" class="btn btn-primary pull-right" id="daterange-btn">
                      <span>
                        <i class="fa fa-calendar"></i> Date Picker
                      </span>
                      <i class="fa fa-caret-down"></i>
                    </button>
                  </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <div id = "dateRangeDiv" hidden="">
                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="chart-responsive" id = "reportCanvass">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class = "col-md-12">

                <button type="button" class="btn btn-primary" style="width:100%" id = "btnReport1" data-target="#delete" data-toggle="modal">View Full Report
                </button>
              </div>
              

            </div>
            <!-- /.footer -->
          </div>

          </div>

          <div class="modal fade" id="delete">
            <div class="modal-dialog" style="width:1150px">
              
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body" id = "trybody">
                    <!--  -->
                      <div class="box-body">

                      <div style="background-image: url({{ URL::asset('images/bg.png'); }});
                                                      background-repeat: no-repeat;
                                                      background-position: center; 
                                                      width: 100%;
                                                      height: 100%;" >
                    
                      <center><img src="{{ asset('images/head.jpg')}}" style="width: 550px; height: 145px;"  alt="" class="img-responsive "></center>

                      <center><h3><b>REGULAR DOCUMENT REQUESTS REPORT</b></h3></center>
                      <center><h4 class="daterep"></h4></center>

                       <center> <table class="table table-bordered" id = "report1Table">

                        </table></center>

                        <br><br>


                        <center><table class="table table-bordered table-striped" id = "report1TableBreakdown">

                        </table></center>
                      </div>
                      <!-- /.box-body -->
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id = "btnDelete" onclick = "PrintElem('#trybody')">Print</button>
                  </div>
                </div><!-- /.modal-content -->
              </form>
            </div>
            <!-- /.modal-dialog -->
          </div>

          <!-- /.box -->
        </div><!--row -->
        
          @include('reports.reports2')
          
        </div>
        
        <div class="row">
          @include('reports.reports3')

          </div>

          <div class="row">
          @include('reports.reports4')

          </div>
          <div class="row">
           @include('reports.reports6')
            @include('reports.reports7')
         

          </div>
          <div class="row">
        
          @include('reports.reports5')

          </div>
          
 <script type="text/javascript">
         
   $(document).ready(function(){


    var startDate;
var endDate;
// Get context with jQuery - using jQuery's .get() method.

    $.ajax({
      type:'get',
      url: 'ReqPerRegDoc',
      dataType:'JSON',
      success: function(data){
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData2 = data.datas;  

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
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData2, pieOptions);


        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment(),


            },
            function (start, end) {
              $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              $('#dateRangeDiv').html(start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));

              var dates = $('#dateRangeDiv').html().split(" / ");

              var dateFrom = dates[0];
              var dateTo = dates[1];

              huhu(pieChart, pieOptions, dateFrom, dateTo);
            }

        );

        }
      });

    $('#btnReport1').click(function(){
      var dates = $('#dateRangeDiv').html().split(" / ");

              var dateFrom = dates[0];
              var dateTo = dates[1];
      $.ajax({
        type: 'POST',
        url: 'getReport1',
        data: {
          dateFrom: dateFrom + " 00:00:00", 
          dateTo: dateTo + " 23:59:59"
        },
        dataType: 'JSON',
        success: function(data){
          //alert(JSON.stringify(data));
         $('.modal-title').html($('#daterange-btn span').html());
          
          $('.daterep').html($('.modal-title').html());

          $('#report1Table').html('');
          $('#report1TableBreakdown').html('');

          //$.each(data.doc, function(key,val){
            $('#report1Table').append('<thead><th style="width:150px">RequestID</th><th style="width:150px">Name of Requestor</th><th style="width:150px">Document Name</th><th style="width:150px">Date Of Request</th></thead>');
             $('#report1TableBreakdown').append('<thead><th style="width:150px">Documents</th><th style="width:150px">No. of Requests</th></thead>');
                $('#report1Table').append('<tbody></tbody>');
                $('#report1TableBreakdown').append('<tbody></tbody>');

            $.each(data.datas, function(key1, val1){
              // if(val1.DocumentID == val.DocumentID)
              // {
                //alert(val1.RequestID);
                
                $('#report1Table tbody').append('<tr align = "middle"><td>RD2016-'+val1.RequestID+'</td><td>'+val1.Requestor+'</td><td>'+val1.DocumentName+'</td><td>'+val1.DateOfRequest+'</td></tr>');

              //}
            });
          //});
            $.each(data.totalPerDoc, function(key, val){
              $('#report1TableBreakdown tbody').append('<tr align = "middle"><td>'+val.DocumentName+'</td><td>'+val.Total+'</td></tr>');
            });

              $('#report1TableBreakdown tbody').append('<tr align = "middle"><td><strong><u>Total<u></strong></td><td><strong><u>'+data.total+'<u></strong></td></tr>');
        }
      }).error(function(ts){
        alert(ts.responseText);
      });
    });
   });
    
  </script>

  <script type="text/javascript">
    function get_random_color() {
      function c() {
        var hex = Math.floor(Math.random()*256).toString(16);
        return ("0"+String(hex)).substr(-2); // pad with zero
      }
      return "#"+c()+c()+c();
    }

    function huhu(pieChart, pieOptions, dateFrom, dateTo){

    
       $.ajax({
        type: 'POST',
        url: 'docPerDateRange',
        data:{
          dateFrom : dateFrom + " 00:00:00",
          dateTo : dateTo + " 23:59:59"
         },
         dataType: 'JSON',
         success: function(data){
          $('#reportCanvass').html('');
          $('#reportCanvass').append('<canvas id = "pieChart" height="150px"></canvas>');

          //alert(JSON.stringify(data.datas));
          var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
          var pieChart = new Chart(pieChartCanvas);

          pieChart.Doughnut(data.datas, pieOptions);
         }
       });

      

    }
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
  </script>


      </section>
      <!-- /.content -->
@stop