          <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Business Document Request Report </h3>

              <div class="box-tools pull-right">
                
                <div class="form-group">
                  <div class="input-group" >
                    <button type="button" class="btn btn-primary pull-right" id="btnBusDocs">
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
              <div id = "hiddenBusDocs" hidden="">
                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="chart-responsive" id = "busDocCanvas">
                    <canvas id="pieChartBusDocBusDoc" height="150"></canvas>
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

                <button type="button" class="btn btn-primary" style="width:100%" id = "btnViewBusDocs" data-toggle = "modal" data-target = "#report2">View Full Report
                </button>
              </div>
              

            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->

          </div>
          <div class="modal fade" id="report2">
            <div class="modal-dialog " style="width:1150px">
              
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body" id = "report2body">
                      <div class="box-body">
                      <div style="background-image: url({{ URL::asset('images/bg.png'); }});
                                                      background-repeat: no-repeat;
                                                      background-position: center; 
                                                      width: 100%;
                                                      height: 100%;" >
                    
                      <center><img src="{{ asset('images/head.jpg')}}" style="width: 550px; height: 145px;"  alt="" class="img-responsive "></center>

                      <center><h3><b>BUSINESS DOCUMENT REQUESTS REPORT</b></h3></center>
                      <center><h4 class="daterep"></h4></center>
                        <center><table class="table table-bordered" id = "report2Table">

                        </table></center>

                        <br><br>
                        <center><table class="table table-bordered table-striped" id = "report2TableBreakdown">

                        </table></center>
                        </div>
                      </div>
                      <!-- /.box-body -->
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id = "btnDelete" onclick = "PrintElem('#report2body')">Print</button>
                  </div>
                </div><!-- /.modal-content -->
              </form>
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div><!--row -->

        

<script type="text/javascript">
         
   $(document).ready(function(){
    var startDate;
var endDate;
// Get context with jQuery - using jQuery's .get() method.


    $.ajax({
      type:'get',
      url: 'ReqPerBusDoc',
      dataType:'JSON',
      success: function(data){
        var pieChartBusDocCanvas = $("#pieChartBusDocBusDoc").get(0).getContext("2d");
        var pieChartBusDoc = new Chart(pieChartBusDocCanvas);
        var PieData2 = data.datas;  

        var pieOptions2 = {
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
        pieChartBusDoc.Doughnut(PieData2, pieOptions2);


        $('#btnBusDocs').daterangepicker(
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
              $('#btnBusDocs span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              $('#hiddenBusDocs').html(start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));

              var dates2 = $('#hiddenBusDocs').html().split(" / ");

              var dateFrom2 = dates2[0];
              var dateTo2 = dates2[1];


              getBusDateRange(pieChartBusDoc, pieOptions2, dateFrom2, dateTo2);
            }

        );

        }
      });

    $('#btnViewBusDocs').click(function(){

      var dates2 = $('#hiddenBusDocs').html().split(" / ");

              var dateFrom = dates2[0];
              var dateTo = dates2[1];
      $.ajax({
        type: 'POST',
        url: 'getReport2',
        data: {
          dateFrom: dateFrom + " 00:00:00", 
          dateTo: dateTo + " 23:59:59"
        },
        dataType: 'JSON',
        success: function(data){
          //alert(JSON.stringify(data));
          $('.modal-title').html($('#btnBusDocs span').html());
          
          $('.daterep').html($('.modal-title').html());

          $('#report2Table').html('');
          $('#report2TableBreakdown').html('');

          $('#report2Table').append('<thead><th style="width:150px">RequestID</th><th style="width:150px">Name of Requestor</th><th style="width:150px">Document Name</th><th style="width:150px">Date Of Request</th></thead>');
             $('#report2TableBreakdown').append('<thead><th style="width:150px">Documents</th><th style="width:150px">No. of Requests</th></thead>');
                $('#report2Table').append('<tbody></tbody>');
                $('#report2TableBreakdown').append('<tbody></tbody>');

          // $.each(data.doc, function(key,val){
            $.each(data.datas, function(key1, val1){
              // if(val1.BusDocumentID == val.DocumentID)
              // {
                //alert(val1.BusRequestID);
                
                $('#report2Table tbody').append('<tr align = "middle"><td>BD2016-'+val1.BusRequestID+'</td><td>'+val1.BusRequestor+'</td><td>'+val1.DocumentName+'</td><td>'+val1.DateOfRequest+'</td></tr>');
              // }
            // });
          });

            $.each(data.totalPerDoc, function(key, val){
              $('#report2TableBreakdown tbody').append('<tr align = "middle"><td>'+val.DocumentName+'</td><td>'+val.Total+'</td></tr>');
            });

               $('#report2TableBreakdown tbody').append('<tr align = "middle"><td><strong><u>Total<u></strong></td><td><strong><u>'+data.total+'<u></strong></td></tr>');
        }
      });
    });
   });
    
  </script>

  <script type="text/javascript">

    function getBusDateRange(pieChartBusDoc, pieOptions2, dateFrom2, dateTo2){

    
       $.ajax({
        type: 'POST',
        url: 'BusDocPerDateRange',
        data:{
          dateFrom : dateFrom2 + " 00:00:00",
          dateTo : dateTo2 + " 23:59:59"
         },
         dataType: 'JSON',
         success: function(data){
          $('#busDocCanvas').html('');
          $('#busDocCanvas').append('<canvas id = "pieChartBusDoc" height="150px"></canvas>');

          //alert(JSON.stringify(data.datas));
          var pieChartBusDocCanvas = $("#pieChartBusDoc").get(0).getContext("2d");
          var pieChartBusDoc = new Chart(pieChartBusDocCanvas);

          pieChartBusDoc.Doughnut(data.datas, pieOptions2);
         }
       }).error(function(ts){
        alert(ts.responseText);
       });

      

    }
  </script>

