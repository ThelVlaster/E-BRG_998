@extends('layouts_web.master')

@section('content')


    <div class="col-md-8" style="margin: 5% 25% 5%;
                                background-color: #fff;
                                width: 50%;">

                <!-- form start -->
                  <div class="box-body">
                  <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"> Details </h1>
                  
                    <div class="form-inline" style="margin-bottom: 5%; margin-left: 5%;">
                        <label> Name: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 300px; margin-right: 5%;">

                        <label> Gender: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 100px;">
                    </div>

                    <div class="form-inline" style="margin-bottom: 5%; margin-left: 5%;">
                        <label> Address: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 450px;"><br>
                    </div>

                    <div class="form-inline" style="margin-bottom: 5%; margin-left: 5%;">
                        <label> E-mail: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 300px; margin-right: 5%;">

                        <label> Birthday: </label>
                        <input type="text" class="form-control" placeholder="" style="width: 100px;">
                    </div>



                        <center><button type="submit" class="btn btn-primary btn-flat">Proceed</button><br><br>

                  </div><!-- /.col -->
     </div><!--row --> 

@stop