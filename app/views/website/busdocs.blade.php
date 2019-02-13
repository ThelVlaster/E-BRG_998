@extends('layouts.master')

@section('content')

  <!-- FORM -->
 <div class="col-md-10" style="margin-top: 5%;
 								margin-bottom: 5%;
 								border-top: 3px solid #3c8dbc;
 								background-color: #fff;
 								width: 30%;">
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-15">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" style="margin-top: 20px; margin-bottom: 20px;"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Requestor Information</h3>
                  <!--<div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->

                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                   
                    <div class="col-md-12">
                     <div class="well">
                        
                        <div class="form-group">
                          <label> Type: </label>&nbsp;&nbsp;&nbsp;
                          <label><input type="radio" class="flat-red">&nbsp;Resident</label>&nbsp;&nbsp;&nbsp;
                          <label><input type="radio" class="flat-red">&nbsp;Nonresident</label>  
                        </div>

                        <div class="form-group">
                          <label> Name: </label>
                          <div class="row">
                            
                          <div class="col-md-12">
                             <input type="text" class="form-control" id="#" placeholder="Name">
                          </div>
                          
                        </div>
                        </div>

                        <div class="form-group">
  							<label for="sel1">Requested for:</label>
  								<select class="form-control" id="sel1">
    								<option>1</option>
    								<option>2</option>
    								<option>3</option>
    								<option>4</option>
  								</select>
						</div>

                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" class="form-control" id="#" placeholder="Address" disabled>
                        </div>

                        <div class="form-group">
                          <label> Birthday: </label>
                          <input type="text" class="form-control" id="#" placeholder="Birthday" disabled>
                        </div>

                        <div class="form-group">
                          <label> Gender: </label>
                          <input type="text" class="form-control" id="#" placeholder="Gender" disabled>
                        </div>

                        <div class="form-group">
                          <label> Residence Status: </label>
                          <input type="text" class="form-control" id="#" placeholder="Status" disabled>
                        </div>
                    
                        </div><!-- col-md-15 -->
                        </div><!--well-->

                        <div class="box-footer" style="margin-bottom: 10px; margin-left: 35%;">
                    		<button type="submit" class="btn btn-primary btn-flat">Submit</button>
                  		</div>

				  </div><!-- /.col -->



                  </div><!-- /.box-body -->


                  </form>
              	  </div><!-- /.box -->
                  </div><!-- /.col -->


        </div>
      </section> 

   <div class="col-md-10" style="margin: 5% 5% 5%;
 								border-top: 3px solid #3c8dbc;
 								background-color: #fff;
 								width: 60%;">

                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                  <h1 style="margin-bottom: 5%; padding-top: 20px; font-size: 20px;"> Available Documents </h1>
                  
                        <table class="table table-striped" style="font-size: 13px;">
    						<thead>
      							<tr>
        							<th></th>
        							<th>Document</th>
        							<th>Fee</th>
      							</tr>
    						</thead>
    					<tbody>
      							<tr>
        							<td><center><input type="checkbox" name="fee" value="fee"></center></td>
        							<td>Business Certificate</td>
        							<td>20.00</td>
      							</tr>
      							<tr>
        							<td><center><input type="checkbox" name="fee" value="fee"></center></td>
        							<td>Business Certificate</td>
        							<td>30.00</td>
      							</tr>
      							<tr>
        							<td><center><input type="checkbox" name="fee" value="fee"></center></td>
        							<td>Business Certificate</td>
        							<td>30.00</td>
      							</tr>
    					</tbody>
  						</table>

                        <div class="box-footer" style="margin-bottom: 10px;">
                    	<center><button type="submit" class="btn btn-primary btn-flat">Submit</button></center>
                  		</div>

				  </div><!-- /.col -->
				</form>
	 </div><!--row -->   



@stop