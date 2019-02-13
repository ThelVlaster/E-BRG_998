@extends('layouts.master')

@section('content')
 <section class="content-header">
   
      <h1>
        Customize Admin Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Utilities</li>
        <li class="active">Customize Admin Page</li>
      </ol>
  </section>


     <!-- Main content -->
  <section class="content">
    <div class="row"> 
      <div class="col-md-12">

    <div class="box box-warning">
        <div class="box-body box-profile">

  <h3>Change Color Design</h3>
 
  <div class="box box-solid" style="max-width: 300px;">
    <div class="box-body no-padding">
      <table id="layout-skins-list" class="table table-striped bring-up nth-2-center">
        <thead>
          <tr>
            <th style="width: 210px;">Class</th>
            <th>Change</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>Blue</code></td>
            <td><a href="#" data-skin="skin-blue" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Light blue</code></td>
            <td><a href="#" data-skin="skin-blue-light" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Yellow</code></td>
            <td><a href="#" data-skin="skin-yellow" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Light yellow</code></td>
            <td><a href="#" data-skin="skin-yellow-light" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Green</code></td>
            <td><a href="#" data-skin="skin-green" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Light green</code></td>
            <td><a href="#" data-skin="skin-green-light" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Purple</code></td>
            <td><a href="#" data-skin="skin-purple" class="btn bg-purple btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Purple Light</code></td>
            <td><a href="#" data-skin="skin-purple-light" class="btn bg-purple btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Red</code></td>
            <td><a href="#" data-skin="skin-red" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Light Red</code></td>
            <td><a href="#" data-skin="skin-red-light" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>Black</code></td>
            <td><a href="#" data-skin="skin-black" class="btn bg-black btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td><code>black light</code></td>
            <td><a href="#" data-skin="skin-black-light" class="btn bg-black btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
        </tbody>
      </table>

      </div>
      </div>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
</section>

      
      </div>
   </div>
	</section>

@endsection