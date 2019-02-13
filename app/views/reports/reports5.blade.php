          <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reservation Payment Report</h3>

              <div class="box-tools pull-right">
                
                <div class="form-group">
                  <div class="input-group" >
                    <button type="button" class="btn btn-primary pull-right" id="btnResPayment">
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
              <div id = "hiddenResPayment" hidden="">
                
              </div>
              <div class="row">
              <br>
                <div class="col-md-">
                  <div class="chart-responsive" id = "payResCanvas">
                    <canvas id="paymentReservation" style="height: 180px; width: 100%"></canvas>
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

                <button type="button" class="btn btn-primary" style="width:100%" id = "btnViewResPayment" data-toggle = "modal" data-target = "#report5">View Full Report
                </button>
              </div>
              

            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->

          </div>

          <div class="modal fade" id="report5">
            <div class="modal-dialog" style="width:1150px">
              
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body" id = "report5body">
                      <div class="box-body">
                      <div style="background-image: url({{ URL::asset('images/bg.png'); }});
                                                      background-repeat: no-repeat;
                                                      background-position: center; 
                                                      width: 100%;
                                                      height: 100%;" >
                    
                      <center><img src="{{ asset('images/head.jpg')}}" style="width: 550px; height: 145px;"  alt="" class="img-responsive "></center>

                      <center><h3><b>RESERVATION PAYMENT REPORT</b></h3></center>
                      <center><h4 class="daterep"></h4></center>
                        <center><table class="table table-bordered" id = "report5Table">

                        </table></center>

                        <br><br>

                        <center><table class="table table-bordered table-striped" id = "report5TableBreakdown">

                        </table></center>
                        </div>
                      </div>
                      <!-- /.box-body -->
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" onclick="PrintElem('#report5body')">Print</button>
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
      url: 'ReservationPayment',
      dataType:'JSON',
      success: function(data){

        var mPayment = [];

        $.each(data.datas, function (key, val){
          if(val == null)
          {
            mPayment.push(0);
          }
          else
          {
            mPayment.push(val);
          }
          

        });


        var lineChartRegular = $("#paymentReservation").get(0).getContext("2d");
        var lineChartReg = new Chart(lineChartRegular);
        var lineChartRegData = {
          labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
          datasets: [
            
            {
              label: "Digital Goods",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: mPayment
            }
          ]
        };

        var lineChartRegOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: false,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

        lineChartReg.Line(lineChartRegData, lineChartRegOptions);


        $('#btnResPayment').daterangepicker(
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
              $('#btnResPayment span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              $('#hiddenResPayment').html(start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));

              var dates2 = $('#hiddenResPayment').html().split(" / ");

              var dateFrom2 = dates2[0];
              var dateTo2 = dates2[1];


              //getRegDocPay(pieChartBusDoc, pieOptions2, dateFrom2, dateTo2);
            }

        );

        }
      });

    $('#btnViewResPayment').click(function(){

      var dates2 = $('#hiddenResPayment').html().split(" / ");

              var dateFrom = dates2[0];
              var dateTo = dates2[1];
      $.ajax({
        type: 'POST',
        url: 'getReport5',
        data: {
          dateFrom: dateFrom + " 00:00:00", 
          dateTo: dateTo + " 23:59:59"
        },
        dataType: 'JSON',
        success: function(data){

          //alert(JSON.stringify(data));
           $('.modal-title').html($('#btnResPayment span').html());
          
          $('.daterep').html($('.modal-title').html());

          $('#report5Table').html('');
          $('#report5TableBreakdown').html('');
           $('#report5Table').append('<thead><th style="width:150px">PaymentID</th><th style="width:150px">PaymentDate</th><th style="width:150px">Paid Amount</th></thead>');
                $('#report5Table').append('<tbody></tbody>');
                $('#report5TableBreakdown').append('<tbody></tbody>');

            $.each(data.datas, function(key1, val1){
             
               //if(val1.PaidAmount != 0)
               //{
                $('#report5Table tbody').append('<tr align = "middle"><td>'+val1.PaymentID+'</td><td>'+val1.PaymentDate+'</td><td>'+val1.PaidAmount+'('+val1.PaymentType+')</td></tr>');
               //}
            });
            $('#report5TableBreakdown tbody').append('<tr align = "middle"><td><strong><u>Total<u></strong></td><td><strong><u>'+data.total[0].Total+'<u></strong></td></tr>');
        }
      }).error(function(ts){
        alert(ts.responseText);
      });

    });
   });
    
  </script>

  <script type="text/javascript">

    function getRegDocPay(pieChartBusDoc, pieOptions2, dateFrom2, dateTo2){

    
       $.ajax({
        type: 'POST',
        url: 'BusDocPerDateRange',
        data:{
          dateFrom : dateFrom2 + " 00:00:00",
          dateTo : dateTo2 + " 23:59:59"
         },
         dataType: 'JSON',
         success: function(data){
          $('#payResCanvas').html('');
          $('#payResCanvas').append('<canvas id = "pieChartBusDoc" height="150px"></canvas>');

          //alert(JSON.stringify(data.datas));
          var pieChartpayResCanvas = $("#pieChartBusDoc").get(0).getContext("2d");
          var pieChartBusDoc = new Chart(pieChartpayResCanvas);

          pieChartBusDoc.Doughnut(data.datas, pieOptions2);
         }
       }).error(function(ts){
        alert(ts.responseText);
       });

      

    }
  </script>

