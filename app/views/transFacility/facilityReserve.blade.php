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
          <a href="reserveCalendar" class="btn btn-danger btn-block btn-flat">New Reservation</a><br>

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
                <li><a href="#"><i class="fa fa-clock-o"></i> Upcoming<span class="label label-warning pull-right">5</span></a></li>
                <li><a href="#"><i class="fa fa-check-square-o"></i> Finished <span class="label label-success pull-right">7</span></a></li>
                
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /. box -->
        </div>


        <div class="col-md-9">
          <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div><!-- /.box-header -->
              <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Request No</th>
                          <th>Date Requested</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Mobile No</th>
                          <th>Date Reserved</th>
                          <th>Time</th>
                          <th>Purpose</th>
                          <th></th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr>
                          <td><span class="label label-warning">RI0001</span></td>
                          <td>03/28/2016</td>
                          <td>Jomari Gustilo Ramos</td>
                          <td>Punta, Manila</td>
                          <td>0912341234</td>
                          <td>04/01/2016</td>
                          <td>1:00pm-6:00pm</td>
                          <td>Birthday</td>
                          <td><button class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#form">View Items</button></td>
                          <td>
                            <button class="btn btn-xs btn-success btn-flat"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-xs btn-danger btn-flat"><i class="fa fa-remove"></i></button>
                          </td>
                        </tr>

                        <tr>
                          <td><span class="label label-warning">RI0002</span></td>
                          <td>03/29/2016</td>
                          <td>Jessa Belleza</td>
                          <td>Pasig</td>
                          <td>099912721</td>
                          <td>04/10/2016</td>
                          <td>1:00pm-6:00pm</td>
                          <td>Wedding</td>
                          <td><button class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#form">View Items</button></td>
                          <td>
                            <button class="btn btn-xs btn-success btn-flat"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-xs btn-danger btn-flat"><i class="fa fa-remove"></i></button>
                          </td>
                        </tr>

                        <tr>
                          <td><span class="label label-warning">RI0003</span></td>
                          <td>03/29/2016</td>
                          <td>Paulo Samson</td>
                          <td>Pasig</td>
                          <td>0934732742</td>
                          <td>04/03/2016</td>
                          <td>8:00am-6:00pm</td>
                          <td>Birthday</td>
                          <td><button class="btn btn-xs btn-primary btn-flat"  data-toggle="modal" data-target="#form">View Items</button></td>
                          <td>
                            <button class="btn btn-xs btn-success btn-flat"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-xs btn-danger btn-flat"><i class="fa fa-remove"></i></button>
                          </td>
                        </tr>




                      </tbody>
                    </table>
              </div>
          </div>
        </div>

          <div class="modal fade" id="form" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">View Items</h4>
                  </div>

                  <div class="modal-body">
                    
                    <table class="table table-bordered" style="font-size: 14px">
                      <thead>
                        <tr>
                          <th>Item</th>
                          <th>Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Plastic Chair</td>
                          <td>50</td>
                        </tr>
                        <tr>
                          <td>Soccer</td>
                          <td>2</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="modal-footer">
                  </div>
                  
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
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
