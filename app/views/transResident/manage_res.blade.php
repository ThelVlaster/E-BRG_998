@extends('layouts.master')

@section('content')


	
		<section class="content-header">
            <h1>
              Transaction <small>Manage Residents</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'TransactionMenu' ?>"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li>Residents</li>
              <li class="active">Manage Residents</li>
            </ol>
          </section>

         <section class = "content">

		<div class="row">


              <!--right side-->
              <div class="col-md-12">
                <div class="box box-warning ">
                  <div class="box-header">
                    <h3 class="box-title">List of Families</h3>
                  </div><!-- /.box-header -->
                  
                  <div class="box-body">

                     <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Family ID</th>
                          <th>House ID</th>
                          <th>Address</th>
                          <th>Family Head</th>
                          <th></th>
                         
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($fam as $fam)
                            <tr>
                                <td align="center"><span class="label label-warning">{{ $fam -> HouseID}}</span></td>
                                <td align="center"><span class="label label-danger">{{ $fam -> FamilyID}}</span></td>
                                <td>{{ $fam -> HouseAddNo}} {{ $fam ->  subdivisionName}} {{ $fam -> compName}} {{ $fam -> StreetName}} Street, Zone {{ $fam -> HouseZone}}  </td>
                                <td>{{ $fam -> FirstName}} {{ $fam ->  MidName}} {{ $fam -> LastName}} </td>
                                <td><a  href="<?php echo 'famProfile' ?>?houseid={{ $fam -> HouseID}}&familyid={{ $fam -> FamilyID}}" class = "btn btn-block btn-flat btn-primary btn-xs"> View Family </a></td>

                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                   
                  </div> <!-- box-body -->
                </div>
              </div>
            </div><!--row-->

            <div class="row">

    </section>



@stop