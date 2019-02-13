@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Utilities
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Utilities </a></li>
              <li class="active">Menu</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
              <div class="row">


              
              <div class="col-md-3">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-bank"></i>&nbsp;&nbsp;Barangay</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <ul class="nav nav-stacked">
                      <li><a href="<?php echo 'bryDetails'?>"><span class="label label-info"><i class="fa  fa-map-signs"></i></span>&nbsp; &nbsp; Barangay Details </a></li>

                    <ul>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->

              <div class="col-md-3">
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa  fa-user"></i>&nbsp;&nbsp;User</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <ul class="nav nav-stacked">
                      <li><a href="<?php echo 'userprivilege' ?>"><span class="label label-warning"><i class="fa  fa-lock"></i></span>&nbsp; &nbsp; User Privileges </a></li>
                      <li><a href="<?php echo 'auditTrail' ?>"><span class="label label-warning"><i class="fa  fa-floppy-o"></i></span>&nbsp; &nbsp; Audit Trail </a></li>
                     <ul>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->





              <div class="col-md-3">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-gear"></i>&nbsp;&nbsp;Admin Page Settings</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <ul class="nav nav-stacked">
                      <li><a href="<?php echo 'customAdminPage'?>"><span class="label label-danger"><i class="fa   fa-paint-brush"></i></span>&nbsp; &nbsp; Customize Admin Page </a></li>
                     <ul>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->

            

             

          </div><!--row -->
      </section>
      <!-- /.content -->
@stop