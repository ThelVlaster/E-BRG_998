          <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Issued Facility Report</h3>

              <div class="box-tools pull-right">
                
                <div class="form-group">
                  <div class="input-group" >
                    <button type="button" class="btn btn-primary pull-right" id="btnFacility">
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
              <div id = "hiddenFacility" hidden="">
                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="chart-responsive" id = "facilityCanvas">
                    <canvas id="pieFacility" height="150"></canvas>
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

                <button type="button" class="btn btn-primary" style="width:100%" id = "btnViewFaci" data-toggle = "modal" data-target = "#report7">View Full Report
                </button>
              </div>
              

            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->

          </div>
          <div class="modal fade" id="report7">
            <div class="modal-dialog" style="width:1150px">
              
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body" id = "report7body">
                      <div class="box-body">
                      <div style="background-image: url({{ URL::asset('images/bg.png'); }});
                                                      background-repeat: no-repeat;
                                                      background-position: center; 
                                                      width: 100%;
                                                      height: 100%;" >
                    
                      <center><img src="{{ asset('images/head.jpg')}}" style="width: 550px; height: 145px;"  alt="" class="img-responsive "></center>

                      <center><h3><b>ISSUED FACILITY REPORT</b></h3></center>
                      <center><h4 class="daterep"></h4></center>
                        <center><table class="table table-bordered" id = "report7Table">

                        </table></center>

                        <br><br>
                        <center><table class="table table-bordered table-striped" id = "report7Breakdown">

                        </table></center>
                        </div>
                      </div>
                      <!-- /.box-body -->
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id = "btnDelete" onclick = "PrintElem('#report7body')">Print</button>
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
      url: 'ReservationFacility',
      dataType:'JSON',
      success: function(data){
        var pieChartfacilityCanvas = $("#pieFacility").get(0).getContext("2d");
        var pieChartFaciReservation = new Chart(pieChartfacilityCanvas);
        var PieData7 = data.datas;  

        var pieOptions7 = {
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
        pieChartFaciReservation.Doughnut(PieData7, pieOptions7);


        $('#btnFacility').daterangepicker(
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
              $('#btnFacility span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              $('#hiddenFacility').html(start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));

              var dates2 = $('#hiddenFacility').html().split(" / ");

              var dateFrom2 = dates2[0];
              var dateTo2 = dates2[1];


              getFaciDate(pieChartFaciReservation, pieOptions7, dateFrom2, dateTo2);
            }

        );

        }
      }).error(function(ts){
        alert(ts.responseText);
      });

    $('#btnViewFaci').click(function(){


      var dates2 = $('#hiddenFacility').html().split(" / ");
 alert(dates2);
              var dateFrom = dates2[0];
              var dateTo = dates2[1];
      $.ajax({
        type: 'POST',
        url: 'getReport7',
        data: {
          dateFrom: dateFrom + " 00:00:00", 
          dateTo: dateTo + " 23:59:59"
        },
        dataType: 'JSON',
        success: function(data){
          alert(JSON.stringify(data.totalPerDoc));
          $('.modal-title').html($('#btnFacility span').html());
          
          $('.daterep').html($('.modal-title').html());

          $('#report7Table').html('');
          $('#report7Breakdown').html('');


          $('#report7Table').append('<thead><th style="width:150px">ReservationIDs</th><th style="width:150px">FacilityName</th><th style="width:150px">Date Issue</th></thead>');
                $('#report7Table').append('<tbody></tbody>');
                $('#report7Breakdown').append('<tbody></tbody>');

          // $.each(data.doc, function(key,val){
            $.each(data.datas, function(key1, val1){
              // if(val1.BusDocumentID == val.DocumentID)
              // {
                //alert(val1.BusRequestID);
                
                $('#report7Table tbody').append('<tr align = "middle"><td>'+val1.ReservationID+'</td><td>'+val1.FacilityName+'</td><td>'+val1.DateFacIssue+'</td></tr>');
              // }
            // });
          });

            $.each(data.totalPerDoc, function(key, val){
              $('#report7Breakdown tbody').append('<tr align = "middle"><td>'+val.FacilityName+'</td><td>'+val.Total+'</td></tr>');
            });

              $('#report7Breakdown tbody').append('<tr align = "middle"><td><strong><u>Total<u></strong></td><td><strong><u>'+data.total+'<u></strong></td></tr>');
        }
      }).error(function(ts){
        alert(ts.responseText);
      });
    });
   });
    
  </script>

  <script type="text/javascript">

    function getFaciDate(pieChartFaciReservation, pieOptions7, dateFrom2, dateTo2){

    
       $.ajax({
        type: 'POST',
        url: 'ReserveDateFacility',
        data:{
          dateFrom : dateFrom2 + " 00:00:00",
          dateTo : dateTo2 + " 23:59:59"
         },
         dataType: 'JSON',
         success: function(data){
          $('#facilityCanvas').html('');
          $('#facilityCanvas').append('<canvas id = "pieChartFaciReservation" height="150px"></canvas>');

          //alert(JSON.stringify(data.datas));
          var pieChartfacilityCanvas = $("#pieChartFaciReservation").get(0).getContext("2d");
          var pieChartFaciReservation = new Chart(pieChartfacilityCanvas);

          pieChartFaciReservation.Doughnut(data.datas, pieOptions7);
         }
       }).error(function(ts){
        alert(ts.responseText);
       });

      

    }
  </script>

