@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Transaction
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li class="active">Menu</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
              <div class="row">

              <div class="col-md-3">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-file"></i>&nbsp;&nbsp;Document</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <ul class="nav nav-stacked">
                      <li><a href="<?php echo 'documentRequest' ?>"><span class="label label-info"><i class="fa fa-envelope"></i></span>&nbsp; &nbsp; Regular Documents </a></li>
                      <li><a href="<?php echo 'busdocumentRequest' ?>"><span class="label label-info"><i class="fa fa-envelope-o"></i></span>&nbsp; &nbsp; Business Documents </a></li>
                      <li><a href="<?php echo 'claimDocs' ?>?sort=reg"><span class="label label-info"><i class="fa fa-chevron-down"></i></span>&nbsp; &nbsp; Claim Documents </a></li>
                      <li><a href="<?php echo 'docPayment' ?>?sort=reg"><span class="label label-info"><i class="fa fa-money"></i></span>&nbsp; &nbsp; Payment </a></li>

                    <ul>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->


              <div class="col-md-3">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-soccer-ball-o"></i>&nbsp;&nbsp;Item & Facility</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <ul class="nav nav-stacked">
                      <li><a href="<?php echo 'ItemRequest'?>"><span class="label label-success"><i class="fa fa-chevron-circle-up"></i></span>&nbsp; &nbsp; Request Item / Facility</a></li>
                      <li><a href="<?php echo 'Payment'?>"><span class="label label-success"><i class="fa fa-money"></i></span>&nbsp; &nbsp;Payment</a></li>
                    <ul>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->



            <div class="col-md-3">
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-bank"></i>&nbsp;&nbsp;Residents</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <ul class="nav nav-stacked">
                      <li><a href="<?php echo 'transRes'?>"><span class="label label-warning"><i class="fa  fa-user"></i></span>&nbsp; &nbsp; Manage Residents </a></li>
                    <ul>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->


          </div><!--row -->

          
      </section>
      <!-- /.content -->
@stop