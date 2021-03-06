          <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Summary of Payment</h3>

              <div class="box-tools pull-right">
                
                <div class="form-group">
                  <div class="input-group" >
                    <button type="button" class="btn btn-primary pull-right" id="btnRegDocPay">
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
              <div id = "hiddenRegDocPay" hidden="">
                
              </div>
              <div class="row">
              <br>
                <div class="col-md-">
                  <div class="chart-responsive" id = "busDocCanvas">
                    <canvas id="salesChartOfRegular" style="height: 180px; width: 100%"></canvas>
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

                <button type="button" class="btn btn-primary" style="width:100%" id = "btnViewRegDocPay" data-toggle="modal" data-target="#report3">View Full Report
                </button>
              </div>
              

            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->

          </div>

        <div class="modal fade" id="report3">
            <div class="modal-dialog ">
              
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body" id = "report3body">
                      <div class="box-body">
                        <table class="table table-bordered table-striped" id = "report3Table">

                        </table>
                        <br><br>
                        <table class="table table-bordered table-striped" id = "report3TableBreakdown">

                        </table>

                      </div>
                      <!-- /.box-body -->
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" onclick="PrintElem('#report3body')">Print</button>
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
      url: 'RegDocPayment',
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


        var lineChartRegular = $("#salesChartOfRegular").get(0).getContext("2d");
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


        $('#btnRegDocPay').daterangepicker(
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
              $('#btnRegDocPay span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              $('#hiddenRegDocPay').html(start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));

              var dates2 = $('#hiddenRegDocPay').html().split(" / ");

              var dateFrom2 = dates2[0];
              var dateTo2 = dates2[1];


              //getRegDocPay(pieChartBusDoc, pieOptions2, dateFrom2, dateTo2);
            }

        );

        }
      });

    $('#btnViewRegDocPay').click(function(){

      var dates2 = $('#hiddenRegDocPay').html().split(" / ");

              var dateFrom = dates2[0];
              var dateTo = dates2[1];
      $.ajax({
        type: 'POST',
        url: 'getReport3',
        data: {
          dateFrom: dateFrom + " 00:00:00", 
          dateTo: dateTo + " 23:59:59"
        },
        dataType: 'JSON',
        success: function(data){
          //alert(JSON.stringify(data));
          $('.modal-title').html($('#btnRegDocPay-btn span').html());

          $('#report3Table').html('');
           $('#report3Table').append('<thead><th>PaymentID</th><th>PaymentDate</th><th>Paid Amount</th></thead>');
                $('#report3Table').append('<tbody></tbody>');
                $('#report3TableBreakdown').append('<tbody></tbody>');

            $.each(data.datas, function(key1, val1){
             
               if(val1.PaidAmount != 0)
               {
                $('#report3Table tbody').append('<tr align = "middle"><td>'+val1.PaymentID+'</td><td>'+val1.PaymentDate+'</td><td>'+val1.PaidAmount+'</td></tr>');

               }
              
            });
            $('#report3TableBreakdown tbody').append('<tr align = "middle"><td><strong>Total</strong></td><td>'+data.total[0].Total+'</td></tr>');

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

