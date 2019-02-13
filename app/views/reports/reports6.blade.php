          <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Issued Items Report </h3>

              <div class="box-tools pull-right">
                
                <div class="form-group">
                  <div class="input-group" >
                    <button type="button" class="btn btn-primary pull-right" id="btnItems">
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
              <div id = "hiddenItems" hidden="">
                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="chart-responsive" id = "itemsCanvas">
                    <canvas id="pieItems" height="150"></canvas>
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

                <button type="button" class="btn btn-primary" style="width:100%" id = "btnViewItems" data-toggle = "modal" data-target = "#report6">View Full Report
                </button>
              </div>
              

            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->

          </div>
          <div class="modal fade" id="report6">
            <div class="modal-dialog "  style="width:1150px">
              
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body" id = "report6body">
                      <div class="box-body">
                      <div style="background-image: url({{ URL::asset('images/bg.png'); }});
                                                      background-repeat: no-repeat;
                                                      background-position: center; 
                                                      width: 100%;
                                                      height: 100%;" >
                    
                      <center><img src="{{ asset('images/head.jpg')}}" style="width: 550px; height: 145px;"  alt="" class="img-responsive "></center>

                      <center><h3><b>ISSUED ITEMS REPORT</b></h3></center>
                      <center><h4 class="daterep"></h4></center>
                        <center><table class="table table-bordered" id = "report6Table">

                        </table></center>

                        <br><br>
                        <center><table class="table table-bordered table-striped" id = "report6TableBreakdown"></table>

                        </table>
                        </div>
                      </div>
                      <!-- /.box-body -->
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id = "btnDelete" onclick = "PrintElem('#report6body')">Print</button>
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
      url: 'ReservationItem',
      dataType:'JSON',
      success: function(data){
        var pieChartitemsCanvas = $("#pieItems").get(0).getContext("2d");
        var pieChartItems = new Chart(pieChartitemsCanvas);
        var PieData6 = data.datas;  

        var pieOptions6 = {
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
        pieChartItems.Doughnut(PieData6, pieOptions6);


        $('#btnItems').daterangepicker(
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
              $('#btnItems span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              $('#hiddenItems').html(start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));

              var dates2 = $('#hiddenItems').html().split(" / ");

              var dateFrom2 = dates2[0];
              var dateTo2 = dates2[1];


              getItemsDate(pieChartItems, pieOptions6, dateFrom2, dateTo2);
            }

        );

        }
      });

    $('#btnViewItems').click(function(){

      var dates2 = $('#hiddenItems').html().split(" / ");

              var dateFrom = dates2[0];
              var dateTo = dates2[1];
      $.ajax({
        type: 'POST',
        url: 'getReport6',
        data: {
          dateFrom: dateFrom + " 00:00:00", 
          dateTo: dateTo + " 23:59:59"
        },
        dataType: 'JSON',
        success: function(data){
          //alert(JSON.stringify(data));
        $('.modal-title').html($('#btnItems span').html());
          
          $('.daterep').html($('.modal-title').html());

          $('#report6Table').html('');
          $('#report6TableBreakdown').html('');
          $('#report6Table').append('<thead><th style="width:150px">RequestID</th><th style="width:150px">Document Name</th><th style="width:150px">Date Of Request</th></thead>');
                $('#report6Table').append('<tbody></tbody>');
                $('#report6TableBreakdown').append('<tbody></tbody>');

          // $.each(data.doc, function(key,val){
            $.each(data.datas, function(key1, val1){
              // if(val1.BusDocumentID == val.DocumentID)
              // {
                //alert(val1.BusRequestID);
                
                $('#report6Table tbody').append('<tr align = "middle"><td>'+val1.ReservationID+'</td><td>'+val1.ItemName+'</td><td>'+val1.DateIssue+'</td></tr>');
              // }
            // });
          });

            $.each(data.totalPerDoc, function(key, val){
              $('#report6TableBreakdown tbody').append('<tr align = "middle"><td>'+val.ItemName+'</td><td>'+val.Total+'</td></tr>');
            });

              $('#report6TableBreakdown tbody').append('<tr align = "middle"><td><strong><u>Total<u></strong></td><td><strong><u>'+data.total+'<u></strong></td></tr>');
        }
      }).error(function(ts){
        alert(ts.responseText);
      });
    });
   });
    
  </script>

  <script type="text/javascript">

    function getItemsDate(pieChartItems, pieOptions6, dateFrom2, dateTo2){

    
       $.ajax({
        type: 'POST',
        url: 'ReserveDateItem',
        data:{
          dateFrom : dateFrom2 + " 00:00:00",
          dateTo : dateTo2 + " 23:59:59"
         },
         dataType: 'JSON',
         success: function(data){
          $('#itemsCanvas').html('');
          $('#itemsCanvas').append('<canvas id = "pieChartItems" height="150px"></canvas>');

          //alert(JSON.stringify(data.datas));
          var pieChartitemsCanvas = $("#pieChartItems").get(0).getContext("2d");
          var pieChartItems = new Chart(pieChartitemsCanvas);

          pieChartItems.Doughnut(data.datas, pieOptions6);
         }
       }).error(function(ts){
        alert(ts.responseText);
       });

      

    }
  </script>

