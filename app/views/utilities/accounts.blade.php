@extends('layouts.master')

@section('content')
 <section class="content-header">
   
      <h1>
        Accounts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Utilities</li>
        <li class="active">Accounts</li>
      </ol>
  </section>


     <!-- Main content -->
  <section class="content">
    <div class="row"> 
      <div class="col-md-12">

    <div class="box box-warning">
        <div class="box-body box-profile">

      <div style="margin-top: 15px">
            <button class="btn btn-primary" id="btnAccount" style="margin-left: 950px" data-toggle="modal" data-target="#addAccount"><i  class="fa fa-plus-square">    Add Account</i></button>
          </div>
        <br>


    <div class="box-body" style="overflow:scroll">
       <table id="tblaccount" class="table table-bordered table-striped">
          <thead>
           <tr>

               <th>Official ID</th>
               <th>Name</th>
               <th>Position</th>
               <th>Username</th>
               <th>Password</th>
               <th>Action</th>
            
          </tr>
          </thead>

          <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
            <td><button class="btn btn-xs btn-success btn-flat"
                                        data-toggle = "modal"
                                        data-target = "#edit">
                                          <i class="fa fa-pencil"></i></button>
                <input id="switch-state" type="checkbox" checked>
              </td>
          </tr>
        </table>

     </div>
   

  
          <div class="modal fade" id="addAccount">
            <div class="modal-dialog">
          
              <form class="form-horizontal" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Account </h4>
                  </div>
             
                <!-- modal content -->
                  <div class="modal-body">
                      <div class="box-body">

                      
                        <div class="form-group">
                        
                         <div class="col-md-8 form-inline" >
                          <label>Official:</label>
                          <select style="margin-left: 24px" type="text" class="form-control" id="dropPos" name="dropPos" ></select>
                         </div>

                        
                         <div class="col-md-8 form-inline">
                          <br>
                          <label>Position:</label>
                          <input style="margin-left: 20px" type=text class="form-control" id="reqType">
                         </div>

                        
                          <div class="col-md-8 form-inline">
                           <br>
                          <label>Username:</label>
                          <input style="margin-left: 12px" type=text class="form-control" id="reqType">
                         </div>

                         
                         <div class="col-md-8 form-inline">
                          <br>
                          <label>Password:</label>
                          <input style="margin-left: 14px" type=text class="form-control" id="reqType">
                         </div>

                     

                        </div>
                         

                      </div>
                      <!-- /.box-body -->
                  </div>
                  <center>
               <button style="margin-bottom: 10px " type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                     <button style="margin-bottom: 10px; margin-left: 10px" type="submit" class="btn btn-primary" id = "btnAdd" data-dismiss="modal">Add</button> 
                     </center>
                </div><!-- /.modal-content -->
              </form>
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->



        </div>
      </div>
 
      </div>
   </div>

	</section>

@endsection