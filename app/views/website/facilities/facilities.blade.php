@extends('layouts_web.master')

@section('content')

<div class="col-md-8" style="margin: 5% 17% 5%;
                                background-color: #fff;
                                width: 65%;">

                <!-- form start -->
                  <div class="box-body">
                  <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"><b> Details </b></h1>
                  
                    <div class="form-inline" style="margin-bottom: 5%; margin-left: 5%;">
                        <label> Name: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 300px; margin-right: 3%;">

                        <label> Gender: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 100px; margin-right: 3%;">

                        <label> Birthday: </label>
                        <input type="date" class="form-control" placeholder="" style="width: 100px;">
                    </div>

                    <div class="form-inline" style="margin-bottom: 5%; margin-left: 10%;">
                        <label> E-mail: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 300px; margin-right: 5%;">

                        <label> Civil Status: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 100px;">
                    </div>

                    <div class="form-inline" style="margin-bottom: 5%; margin-left: 15%;">

                        <label> Address: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 400px; margin-right: 3%;">
                        
                    </div>


                        <center><button id="show" type="submit" class="btn btn-primary btn-flat">Proceed</button><br><br>

                  </div><!-- /.col -->
     </div><!--row -->

<!-- Main content -->
        <section id="facilities" class="content" style="margin-left: 3%; display: none;">
          <div class="row">

            <div class="col-md-8" style="margin: 0 8% 5% 15%; background-color: #fff; border-top: 3px solid #3c8dbc;">
              
              <div class="box box-solid">
                <div class="box-header with-border">
                  <br>
                  <h3 class="box-title"><center><b> Request Details </b></center></h3>
                </div>
                <div class="box-body">
                  <!-- <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>
                      <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                    </ul> 
                  </div> -->

                  <br>
                  <div class="form-group" align="center">
                        <div class="radio">
                          <label><input type="radio" class="radiobtn" name="radioRes" id="resident">Resident</label>&nbsp;&nbsp;&nbsp;
                          <label><input type="radio" class="radiobtn" name="radioRes" id="nonresident" value="yes" >Non-Resident</label>
                        </div>
                  </div>

                   <div class="form-inline" align="center" style="margin-top: 3%;">
                          <label>Facility*</label>
                          <select id="txtEvent" class="form-control" >
                                      <option>Court</option>
                                      <option>Library</option>
                           </select>

                           <label style="margin-left: 5%;">Date and time range:</label>

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="date" class="form-control pull-right" id="reservationtime">
                          </div>
                          
                  </div><br>


                  <div class="form-inline" align="center">
                          <label>Purpose*</label>
                          <textarea  class="form-control" id="txtPurpose" rows="2" style="width: 350px;" ></textarea>   
                  </div><br>

                  <center><div class="box-footer" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                  </div></center>

                  <!-- Date and time range -->
                  <div class="form-group">
                    
                    <!-- /.input group -->
                  </div>


                </div>
              </div>

          <div class="box box-solid">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <!--
                  <div id="external-events">
                    <div class="external-event bg-light-blue">Name: Barangay Dance Contest<br>Description: Annual Dance Contest<br>Organizer: Barangay</div>
                    <div class="external-event bg-red">Name: Konsehal Sandy's Feeding Program<br>Description: 3-day program<br>Organizer: Cong. Sandy Ocampo C</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                  -->

                  <!--
                  <div class="form-group">
                          <label>Name*</label>
                          <input type="text" class="form-control" id="txtAddress" placeholder="Name">
                  </div>


                  <div class="form-group">
                          <label>Address*</label>
                          <input type="text" class="form-control" id="txtAddress" placeholder="Address">
                  </div>
                          
                  <div class="form-group">
                          <label>Mobile No.*</label>
                          <input type="text" class="form-control" id="txtGender" placeholder="Mobile No">
                  </div>

                  <div class="form-group">
                          <label>Birthdate*</label>
                          <input type="date" class="form-control" id="txtGender" placeholder="Mobile No">
                  </div>

                  <center>
                            <button id="add-new-event" type="button" class="btn btn-danger btn-flat" style="margin-bottom: 15px;">Add</button>
                  </center>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            </div>

      <script>
      $(document).ready(function(){
          $("#show").click(function(){
              $("#facilities").show();
          });
      });
    </script>

@stop