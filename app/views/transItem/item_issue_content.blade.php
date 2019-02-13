@extends('layouts.master')

@section('content')
      <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Transaction <small> Request Item </small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
                 <li class="active">Request Item</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
                    

        <div class="col-md-3">
          <a href="itemIssueForm" class="btn btn-primary btn-block btn-flat">New Request</a><br>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Status</h3>
              <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> All</a></li>
                <li><a href="#"><i class="fa fa-download"></i> New<span class="label label-info pull-right">8</span></a></li>
                <li><a href=""><i class="fa fa-clock-o"></i> Nareserve na<span class="label label-warning pull-right">5</span></a></li>
                <li><a href="#"><i class="fa fa-check-square-o"></i> Nasa hiraman na <span class="label label-success pull-right">7</span></a></li>
                
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /. box -->
        </div>


        <div class="col-md-9">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div><!-- /.box-header -->
              <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Issue No.</th>
                          <th>Requestor</th>
                          <th>Requestor Type</th>
                          <th>Mobile No</th>
                          <th>Date of Issue</th>
                          <th>Reserved From</th>
                          <th>Reserved To</th>
                          <th>Status</th>
                          <th>Payment</th>

                        </tr>
                      </thead>
                      
                      <tbody>
                      </tbody>
                    </table>
          </div>
          </div>
        </div>

        <!-- payment end -->

      </section>
      <!-- /.content -->

<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
         //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

@stop
