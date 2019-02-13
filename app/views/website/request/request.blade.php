@extends('layouts_web.master')

@section('content')


<!--CAROUSEL-->
       <div class="container">
          <br>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="{{ asset('assets/images/carousel1.jpg')}}"  alt="" >
              </div>

              <div class="item">
                <img src="{{ asset('assets/images/carousel2.jpg')}}"  alt="" >
              </div>
            
              <div class="item">
                <img src="{{ asset('assets/images/carousel3.jpg')}}"  alt="" >
              </div>

              <div class="item">
                <img src="{{ asset('assets/images/carousel4.jpg')}}"  alt="" >
              </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div><br><br>

<!--CAROUSEL-->
    <div class="col-md-1">
    </div>
    <div class="well">
        <h3 style="font-family: Montserrat; font-size:20 px"><b>Step 1:</b> Select your Request</h3>
    </div><br>


    <div class="row" style="margin-left:100px">
    <div class="col-md-4"
         style="font-family: Montserrat;
               font-size: 25px;
               height: 250px;
               width: 250px;">

    <center><img src="{{ asset('assets/images/dr.png')}}" style="width: 150px; height: 150px;" alt=""></center>
    <center><a href="<?php echo 'docreq' ?>"> REGULAR DOCUMENTS </a></center>
    </div>

    <div class="col-md-4" 
         style="font-family: Montserrat;
                font-size: 25px;
                height: 250px;
                width: 250px;">

     <center><img src="{{ asset('assets/images/bd.png')}}" style="width: 150px; height: 150px;" alt=""></center>
     <center><a href="<?php echo 'busdocs' ?>"> BUSINESS DOCUMENTS </a></center>
    </div>

 
    </div>

   


@stop
