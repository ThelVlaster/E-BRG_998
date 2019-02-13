@extends('layouts_web.master')

@section('content')


    <h1 style="margin-top: 5%; margin-bottom: 5%;"><center>iREQUEST</center></h1>

    <div class="col-sm-3 col-md-6"
         style="border: 3px solid black;
               background-color: #fff;
               font-family: Montserrat;
               font-size: 25px;
               height: 250px;
               width: 250px;
               margin-bottom: 40px;
               margin-left: 10%;">

    <center><img src="{{ asset('assets/images/dr.png')}}" style="width: 150px; height: 150px;" alt=""></center>
    <center><a href="<?php echo 'confirm' ?>"> REGULAR DOCUMENTS </a></center>
    </div>

    <div class="col-sm-9 col-md-6" 
         style="border: 3px solid black;
                background-color: #fff;
                font-family: Montserrat;
                font-size: 25px;
                height: 250px;
                width: 250px;
                margin-left: 20px;
                margin-bottom: 40px;">

     <center><img src="{{ asset('assets/images/bd.png')}}" style="width: 150px; height: 150px;" alt=""></center>
     <center><a href="<?php echo 'confirm' ?>"> BUSINESS DOCUMENTS </a></center>
    </div>

    <div class="col-sm-3 col-md-6" 
         style="border: 3px solid black;
                background-color: #fff;
                font-family: Montserrat;
                font-size: 25px;
                height: 250px;
                width: 250px;
                margin-left: 20px;
                margin-bottom: 40px;">

    <center><img src="{{ asset('assets/images/items.png')}}" style="width: 150px; height: 150px; margin-top: 15px;" alt=""></center>
    <center><a href="<?php echo 'confirm' ?>"> ITEMS </a></center>
    </div>

    <div class="col-sm-9 col-md-6" 
         style="border: 3px solid black;
                background-color: #fff;
                font-family: Montserrat;
                font-size: 25px;
                height: 250px;
                width: 250px;
                margin-left: 20px;
                margin-bottom: 40px;">

     <center><img src="{{ asset('assets/images/f.png')}}" style="width: 150px; height: 150px; margin-top: 15px;" alt=""></center>
     <center><a href="<?php echo 'confirm' ?>"> FACILITIES </a></center>
    </div>
   

@stop