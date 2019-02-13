@extends('layouts.master')

@section('content')
    <section class="content-header">
   
      <h1>
        Queries
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <li class="active">Queries</li>
      </ol>
    </section>


     <!-- Main content -->
    <section class="content">

      <div class="row">
         <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-file"></i>&nbsp;&nbsp;Constraints</h3>
                  <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
  
          <form role="form" method = POST name = "queries_main">
          <div class="box-body">

              <div class="form-group">
                 <div class="row">
                         
                     <div class="col-md-12">
                            <!-- 
                             <label style="margin-left: 400px">Search</label> -->
                         <center>
                          <select class="form-control" style="width: 300px"
                               id = "drop">
                               <option selected="" disabled="">Find Query for</option>
                                      <option value="1"> Household </option>
                                      <option value="2"> Resident </option>
                                      <option value="3"> Official </option>
                                      <option value="4"> Document </option>
                                      <option value="5"> Business </option>
                                      <option value="6"> Facility </option>
                                      <option value="7"> Item </option>
                             </select>
                            </center>
                            </div>
                  </div>
               </div>

               <div class="col-md-12">
                  <div class="well">

<!--******************************** Household******************************************************************-->
                      <div class="form-group" id="one" hidden="">
                          <div class="row">
                                <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
                                  <center> <label>Find Query for Household</label> </center>
                                </div>
                              
                              <div class="col-md-3"><br>
                                  <label>House Street and Type</label>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr><th></th></tr>
                                        </thead>
                                          <tbody>
                                            <tr><td><input type="checkbox" name="select-all" id="HouseStreet">Select All</td></tr>
                                            @foreach($hName as $hName)
                                              <tr><td><input type="checkbox" name="street" value="{{$hName->HouseStreet}}">{{$hName->HouseStreet}}</td></tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                              </div>

                              <div class="col-md-3"><br>
                                  <label>House Street</label>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr><th></th></tr>
                                        </thead>
                                          <tbody>
                                            <tr><td><input type="checkbox" name="select-all" id="HouseType">Select All</td></tr>
                                            @foreach($HouseT as $Hame)
                                              <tr><td><input type="checkbox" name="Htype" value="{{$Hame->HouseType}}">{{$Hame->HouseType}}</td></tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                              </div>

                              <div class="col-md-3">
                                 <br>
                                 <label>Sort by</label>
                                   <select class="form-control" style="width: 175px" id = "dropHouseSort">
                                      <option value="1" checked>Owner's Name</option>
                                      <option value="2">House Type</option>
                                      <option value="3">House Street</option>
                                      <option value="4">House Status</option>
                                    </select>
                              </div>

                              <div class="col-md-3">
                                  <br>
                                  <label>Order by</label>
                                     <div class="radio" >
                                   
                                    <label><input type="radio" class="radiobtn" name="Horder" id="HouseOrder" value="1" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                   <label><input type="radio" class="radiobtn" name="Horder" id="HouseOrder" value="2">Descending</label>
                                     </div>
                              </div>

                              <div class="col-md-3"><br>
                                <label>Status</label>
                                  <table class="table table-bordered table-striped">
                                      <thead>
                                        <tr><th></th></tr>
                                      </thead>
                                        <tbody>
                                          <tr><td><input type="checkbox" name="select-all" id="HouseStatus">Select All</td></tr>
                                          <tr><td><input type="checkbox" name="Hstatus" value="Active">Active</td></tr>
                                          <tr><td><input type="checkbox" name="Hstatus" value="Inactive">Inactive</td></tr>
                                        </tbody>
                                  </table>
                              </div> 

                        </div><br>
                                <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnHouse">Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
                      </div>
                      <!-- Household -->

<!--**************************************RESIDENT*******************************************************************-->
                      <div class="form-group" id="two" hidden="">
                          <div class="row">
                            <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
                              <center> <label>Find Query for Residents</label> </center>
                            </div>
                            
                            <div class="col-md-12">
                                <!-- Custom Tabs -->
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Personal Details</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Health Details</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">Education and Literacy</a></li>
                                    <li><a href="#tab_4" data-toggle="tab">Economic Details</a></li>
                                  </ul>
                                  
                                  <div class="tab-content">
                                  <div class="tab-pane active" id="tab_1">
                                    <div class="col-md-3"><br>
                                      <label>Select Residency Status</label>
                                        <table class="table table-bordered table-striped">
                                          <thead>
                                            <tr><th></th></tr>
                                          </thead>
                                            <tbody>
                                              <tr><td><input type="checkbox" name="select-all" id="ResCheckAll">Select All</td></tr>
                                              <tr><td><input type="checkbox" name="Status" value="House Owner">House Owner</td></tr>
                                              <tr><td><input type="checkbox" name="Status" value="Renter" >Renter</td></tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-3"><br>
                                        <label>Select Age Range</label><br> 
                                          <label><input type="checkbox" name="AllAge" id="AllAge">All</label><br>
                                          <label style="width:80px; text-align:right">Age From*:</label>
                                            <input type="number" class="form-control" id="AgeFrom" name="AgeFrom" placeholder="Age From" required disabled>
                                          <label style="width:80px; text-align:right">Age To*:</label>&nbsp;&nbsp;&nbsp;
                                            <input type="number" class="form-control" id="AgeTo" name="AgeTo" placeholder="Age To" required disabled>
                                    </div>
                                
                                    <div class="col-md-3"><br>
                                      <label>Gender</label>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                              <tr><th></th></tr>
                                            </thead>
                                              <tbody>
                                                <tr><td><input type="checkbox" name="select-all" id="ResGenderAll">Select All</td></tr>
                                                <tr><td><input type="checkbox" name="Gender" value="Male">Male</td></tr>
                                                <tr><td><input type="checkbox" name="Gender" value="Female">Female</td></tr>
                                              </tbody>
                                        </table>
                                    </div>


                                    <div class="col-md-3"><br>
                                      <label>Select Civil Status</label>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                              <tr><th></th></tr>
                                            </thead>
                                              <tbody>
                                                <tr><td><input type="checkbox" name="select-all" id="ResCivilAll">Select All</td></tr>
                                                <tr><td><input type="checkbox" name="CivilStatus" value="Single">Single</td></tr>
                                                <tr><td><input type="checkbox" name="CivilStatus" value="Married">Married</td></tr>
                                                <tr><td><input type="checkbox" name="CivilStatus" value="Divorced">Divorced</td></tr>
                                                <tr><td><input type="checkbox" name="CivilStatus" value="Separated">Separated</td></tr>
                                              </tbody>
                                        </table>
                                    </div>
                                   
                                    <div class="col-md-3"><br>
                                       <label>Sort by</label>
                                          <select class="form-control" style="width: 175px" id="ResSort">
                                            <option value="1" checked>Last Name</option>
                                            <option value="2">First Name</option>
                                            <option value="3">Age</option>
                                            <option value="4">Gender</option>
                                            <option value="5">Residency Status</option>


                                          </select>
                                    </div>
                                
                                    <div class="col-md-3"><br>
                                      <label>Order by</label>
                                        <div class="radio" >
                                           <label><input type="radio" class="radiobtn" name="ResOrder" id="ResAsc" value="asc" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                           <label><input type="radio" class="radiobtn" name="ResOrder" id="ResDesc" value="desc">Descending</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3"><br>
                                      <label>Status</label>
                                        <div class="radio" >
                                          <label><input type="radio" class="radiobtn" name="ResStatus" id="ResActive" value="active" checked>Active</label>&nbsp;&nbsp;&nbsp;
                                          <label><input type="radio" class="radiobtn" name="ResStatus" id="ResDesceased" value="Desceased">Desceased</label>
                                          <label><input type="radio" class="radiobtn" name="ResStatus" id="ResMove" value="Move outs">Move Out</label>
                                        </div>
                                    </div>



                                      </div>
<!--***************************////////////////////tab 2///////////********************************************************-->
                                  <div class="tab-pane" id="tab_2">

                                        <div class="col-md-3"><br>
                                        <label>Select Height Range</label><br> 
                                          <label><input type="checkbox" name="AllH" id="AllH">All</label><br>
                                          <label>Height From*:</label>
                                            <input type="number" class="form-control" id="HFrom" name="HFrom" placeholder="Height From" required disabled>
                                          <label>Height To*:</label>&nbsp;&nbsp;&nbsp;
                                            <input type="number" class="form-control" id="HTo" name="HTo" placeholder="Height To" required disabled>
                                        </div>

                                        <div class="col-md-3"><br>
                                        <label>Select Weight Range</label><br> 
                                          <label><input type="checkbox" name="AllW" id="AllW">All</label><br>
                                          <label>Weight From*:</label>
                                            <input type="number" class="form-control" id="WFrom" name="WFrom" placeholder="Weight From" required disabled>
                                          <label>Weight To*:</label>&nbsp;&nbsp;&nbsp;
                                            <input type="number" class="form-control" id="WTo" name="WTo" placeholder="Weight To" required disabled>
                                        </div>


                                        <div class="col-md-3"><br>
                                        <label>Select Health Category</label>
                                          <table class="table table-bordered table-striped">
                                              <thead>
                                              <tr><th></th></tr>
                                            </thead>
                                              <tbody>
                                                <tr><td><input type="checkbox" name="select-all" id="HealthCate">Select All</td></tr>
                                                <tr><td><input type="checkbox" name="HealthCat" value="Severely Underweight"> Severely Underweight</td></tr>
                                                <tr><td><input type="checkbox" name="HealthCat" value="Underweight">Underweight</td></tr>
                                                <tr><td><input type="checkbox" name="HealthCat" value="Normal">Normal</td></tr>
                                                <tr><td><input type="checkbox" name="HealthCat" value="Overweight">Overweight</td></tr>
                                                <tr><td><input type="checkbox" name="HealthCat" value="Obese">Obese</td></tr>
                                              </tbody>
                                          </table>
                                        </div>
                                
                                      </div>



<!--***************************////////////////////tab 3///////////********************************************************-->
                            <div class="tab-pane" id="tab_3">
                              
                              <div class="col-md-3"><br>
                                  <label>Currently Studying?</label>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr><th></th></tr>
                                        </thead>
                                          <tbody>
                                            <tr><td><input type="checkbox" name="select-all" id="CurStud">Select All</td></tr>
                                            <tr><td><input type="checkbox" name="cur" value="Yes">Yes</td></tr>
                                            <tr><td><input type="checkbox" name="cur" value="No">No</td></tr>
                                          </tbody>
                                    </table>
                                </div>



                                  <div class="col-md-3"><br>
                                <label>Select Current Educational Level</label>
                                  <table class="table table-bordered table-striped">
                                      <thead>
                                      <tr><th></th></tr>
                                    </thead>
                                      <tbody>
                                        <tr><td><input type="checkbox" name="select-all" id="CurrentEdu">Select All</td></tr>
                                        <tr><td><input type="checkbox" name="CurEdu" value="Pre-school/Day Care/">Pre-school/Day Care/Kinder</td></tr>
                                        <tr><td><input type="checkbox" name="CurEdu" value="%Grade%">Elementary Level</td></tr>
                                        <tr><td><input type="checkbox" name="CurEdu" value="Vocational Course">Vocational Course</td></tr>
                                        <tr><td><input type="checkbox" name="CurEdu" value="College">College Level</td></tr></tr>
                                        <tr><td><input type="checkbox" name="CurEdu" value="Masters-Post Graduate">Masters-Post Graduate</td></tr>
                                        <tr><td><input type="checkbox" name="CurEdu" value="Doctoral-Post Graduate">Doctoral-Post Graduate</td></tr>
                                      </tbody>
                                  </table>
                                </div>

                                <div class="col-md-3"><br>
                                <label>Select Highest Educational Attainment</label>
                                  <table class="table table-bordered table-striped">
                                      <thead>
                                      <tr><th></th></tr>
                                    </thead>
                                      <tbody>
                                        <tr><td><input type="checkbox" name="select-all" id="HighestEdu">Select All</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="Never been in school">Never been in School</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="Elementary Level">Elementary Level</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="Elementary Graduate">Elementary Graduate</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="Highschool Level">Highschool Level</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="Highschool Graduate">Highschool Graduate</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="College Level">College Level</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="College Graduate">College Graduate</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="Post Graduate Level">Post Graduate Level</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="Post Graduate Master">Post Graduate Master</td></tr>
                                        <tr><td><input type="checkbox" name="HighEdu" value="Graduate Doctoral">Graduate Doctoral</td></tr>
                                      </tbody>
                                  </table>
                                </div>

                                
                                

                                  <div class="col-md-3"><br>
                                  <label>Reading Literacy (Can read in any language)</label>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr><th></th></tr>
                                        </thead>
                                          <tbody>
                                            <tr><td><input type="checkbox" name="select-all" id="ReadLit">Select All</td></tr>
                                            <tr><td><input type="checkbox" name="read" value="Yes">Yes</td></tr>
                                            <tr><td><input type="checkbox" name="read" value="No">No</td></tr>
                                          </tbody>
                                    </table>
                                  </div>

                                  <div class="col-md-3"><br>
                                    <label>Writing Literacy (Can write in any language)</label>
                                      <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr><th></th></tr>
                                        </thead>
                                          <tbody>
                                            <tr><td><input type="checkbox" name="select-all" id="WriteLit">Select All</td></tr>
                                            <tr><td><input type="checkbox" name="write" value="Yes">Yes</td></tr>
                                            <tr><td><input type="checkbox" name="write" value="No">No</td></tr>
                                          </tbody>
                                    </table>
                                  </div>

                             </div>



                              <div class="tab-pane" id="tab_4">
                                    <div class="col-md-3"><br>
                                      <label>Currently Employeed/Earning?</label>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                              <tr><th></th></tr>
                                            </thead>
                                              <tbody>
                                                <tr><td><input type="checkbox" name="select-all" id="Employeed">Select All</td></tr>
                                                <tr><td><input type="checkbox" name="emp" value="Yes">Yes</td></tr>
                                                <tr><td><input type="checkbox" name="emp" value="No">No</td></tr>
                                              </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-3"><br>
                                        <label>Select Salary Range</label><br> 
                                          <label><input type="checkbox" name="AllSalary" id="AllSalary">All</label><br>
                                          <label>Salary From*:</label>
                                            <input type="number" class="form-control" id="SFrom" name="SFrom" placeholder="Salary From" required disabled>
                                          <label>Salary To*:</label>&nbsp;&nbsp;&nbsp;
                                            <input type="number" class="form-control" id="STo" name="STo" placeholder="Salary To" required disabled>
                                    </div>
                              </div> <!-- /.tab 4pane -->

                                    </div>
                                    <!-- /.tab-content -->
                                  </div>
                                  <!-- nav-tabs-custom -->
                                </div>
                                <!-- /.col -->
                            



                                
                          </div><br>
                                <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnResident">Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
                      </div>
<!--************************************END OF RESIDENT*******************************************************************-->
 

<!--***********************************OFFICIAL*******************************************************************-->
                      <!-- Officials -->
                      <div class="form-group" id="three" hidden="" >
                        <div class="row">
                            <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
                              <center> <label>Find Query for Officials</label> </center>
                            </div>
                              <div class="col-md-3"><br>
                                <label>Select Official Position</label>
                                  <table class="table table-bordered table-striped">
                                      <thead>
                                        <tr><th></th></tr>
                                      </thead>
                                        <tbody>
                                          <tr><td><input type="checkbox" name="select-all" id="OfficialPosition">Select All</td></tr>
                                          @foreach($oName as $oName)
                                            <tr><td><input type="checkbox" name="position" value="{{$oName->OfficialPosition}}">{{$oName->OfficialPosition}}</td></tr>
                                          @endforeach
                                        </tbody>
                                  </table>
                              </div>

                              <div class="col-md-3">
                                 <br>
                                 <label>Sort by</label>
                                   <select class="form-control" style="width: 175px" id = "dropOfficialSort">
                                      <option value="1" checked>Official Position Name</option>
                                      <option value="2">Number of Official</option>
                                      <option value="3">House Status</option>
                                    </select>
                              </div>

                              <div class="col-md-3">
                                  <br>
                                  <label>Order by</label>
                                     <div class="radio" >
                                   
                                    <label><input type="radio" class="radiobtn" name="Offorder" id="Offorder" value="1" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                   <label><input type="radio" class="radiobtn" name="Offorder" id="Offorder" value="2">Descending</label>
                                     </div>
                              </div>

                              <div class="col-md-3"><br>
                                <label>Status</label>
                                  <table class="table table-bordered table-striped">
                                      <thead>
                                        <tr><th></th></tr>
                                      </thead>
                                        <tbody>
                                          <tr><td><input type="checkbox" name="select-all" id="OfficialStatus">Select All</td></tr>
                                          <tr><td><input type="checkbox" name="Offtatus" value="Active">Active</td></tr>
                                          <tr><td><input type="checkbox" name="Offstatus" value="Inactive">Inactive</td></tr>
                                        </tbody>
                                  </table>
                              </div> 

                        </div><br>
                                <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnofficial">Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
                      </div>
                      <!-- Officials -->


<!--**********************************DOCUMENTS*****************************************************************-->
                      <div class="form-group" id="four" hidden="" >
                          <div class="row">
                             
                               <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
                                  <center> <label>Find Query for Documents</label> </center>
                                </div>

                               <div class="col-md-3" style="margin-left: 100px">
                                <br>
                                 <label>Select Document Name</label>
                                  <table class="table table-bordered table-striped" id="TableDocName">
                                <thead>
                                   <tr>
                                      <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <tr><td><input type="checkbox" name="select-all" id="checkAllDoc"/>Select All</td></tr>
                                    @foreach ($DName as $DName)
                                    <tr>
                                      <td><input type="checkbox" name="DocName" value="{{$DName->DocumentID}}">{{$DName -> DocumentName}}</td></tr>
                                      @endforeach
                                  </tbody>
                                </table>
                                </div>

                                <div class="col-md-3" style="margin-left: 0px">
                                  <label>Select Document Status</label>
                                  <table class="table table-bordered table-striped" id="tableDocStatus">
                                    <thead>
                                       <tr>
                                          <th></th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <tr><td><input type="checkbox" name="select-all" id="DocStatus"/>Select All</td></tr>
                                        <tr><td><input type="checkbox" name="DocStat" value="Active">Active</td></tr>
                                        <tr><td><input type="checkbox" name="DocStat" value="Inactive">Inactive</td></tr>
                                      </tbody>
                                  </table>
                              </div>
                                

                                <div class="col-md-3">
                                 <br>
                                 <label>Sort by</label>
                                   <select class="form-control" style="width: 175px"
                                        id = "DocSort">
                                      <option value="1" checked>Document Name</option>
                                      <option value="2">Status</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-5">
                                 <br>
                                 <label>Order by</label>
                                     <div class="radio" >
                                   
                                   <label><input type="radio" class="radiobtn" name="radioDoc" id="asc" value="yes" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                   <label><input type="radio" class="radiobtn" name="radioDoc" id="desc" value="no" >Descending</label>
                                    </div>
                               </div>
                      </div><br>
                           <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnDoc">          Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
                      </div>
                      <!-- Regular Documents -->


<!--**************************************BUSINESS***************************************************************-->
                      <div class="form-group" id="five" hidden="" >
                          <div class="row">
                             
                               <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
                                  <center> <label>Find Query for Business</label> </center>
                                </div>

                                <div class="col-md-3" style="margin-left: 85px">
                                <br>
                                 <label>Select Business Type</label>
                                   <table class="table table-bordered table-striped" id="BusTableName">
                                <thead>
                                   <tr>
                                      <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <tr><td><input type="checkbox" name="select-all" id="checkAllBus"/>Select All</td></tr>
                                    @foreach ($bName as $bName)
                                    <tr>
                                      <td><input type="checkbox" name="BusName" value="{{$bName->BusinessTypeID}}">{{$bName -> BusinessType}}</td></tr>
                                      @endforeach
                                  </tbody>
                                </table>
                                </div>


                               <div style="margin-left: 0px"  class="col-md-3">
                               <br>
                               <label>Sort by</label>
                                 <select class="form-control" style="width: 175px" id="BusSortBy">
                                    <option value="1" checked>Business Type Name</option>
                                  <!--   <option value="2">Facility Status</option> -->
                                  </select>
                              </div>
                                
                                <div class="col-md-5">
                                  <br>
                                  <label>Order by</label>
                                     <div class="radio" >
                                   
                                   <label><input type="radio" class="radiobtn" name="BusOrder" value="asc" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                   <label><input type="radio" class="radiobtn" name="BusOrder" value="desc" >Descending</label>
                                     </div>
                                </div>
  
                          </div><br>
                           <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnBus">          Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
                      </div>
                      <!-- Business Documents -->

<!--**************************************FACILITITY*******************************************************************-->
                      <div class="form-group" id="six" hidden="" >
                         <!--  <div class="row">
                             
                               <div style="background-color: lightblue; font-size: 15px">
                                  <center> <label>Find Query for Facilities</label> </center>
                                </div>

                                <div class="col-md-3" style="margin-left: 100px">
                                <br>
                                 <label>Select Facility Name</label>
                                  <table class="table table-bordered table-striped" id="tableFacName">
                                <thead>
                                   <tr>
                                      <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <tr><td><input type="checkbox" name="select-all" id="checkAllFac"/>Select All</td></tr>
                                    @foreach ($fName as $fName)
                                    <tr>
                                      <td><input type="checkbox" name="FacName" value="{{$fName->FacilityID}}">{{$fName -> FacilityName}}</td></tr>
                                      @endforeach
                                  </tbody>
                                </table>
                                </div>
                               
                                <div class="col-md-3" style="margin-left: 0px">
                               <label>Select Item Status</label>
                                  <table class="table table-bordered table-striped" id="tableFacStatus">
                                <thead>
                                   <tr>
                                      <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <tr><td><input type="checkbox" name="select-all" id="FacCheckAllStatus"/>Select All</td></tr>
                                    <tr><td><input type="checkbox" name="FacStatus" value="Good">Good</td></tr>
                                    <tr><td><input type="checkbox" name="FacStatus" value="Broken">Broken</td></tr>
                                    <tr><td><input type="checkbox" name="FacStatus" value="Lost">Lost</td></tr>
                                    <tr><td><input type="checkbox" name="FacStatus" value="Under Maintenance">Under Maintenance</td></tr>
                                  </tbody>
                                  </table>
                              </div>
                                
                                
                              <div class="col-md-3"><br>
                               <label>Sort by</label>
                                  <select class="form-control" style="width: 175px" id="FacSortBy">
                                    <option value="1" checked>Facility Name</option>
                                    <option value="2">Facility Status</option>
                                  </select>
                              </div>
                                
                                <div class="col-md-3"><br>
                                  <label>Order by</label>
                                    <div class="radio" >
                                       <label><input type="radio" class="radiobtn" name="Facradiorder" id="Facorderby" value="asc" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                       <label><input type="radio" class="radiobtn" name="Facradiorder" id="Facorderbydesc" value="desc">Descending</label>
                                    </div>
                                </div>

                            </div><br>
                                <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnFac">Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div> -->
                      </div>
                      <!-- Facilities -->

<!--*******************************ITEMSSSS**********************************************************************->
                       <!-Items -->
                      <div class="form-group" id="seven" hidden="" >
                        <div class="row">
                         <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
                            <center> <label>Find Query for Items</label> </center>
                          </div>
                              <div class="col-md-3" style="margin-left: 0px">
                               <label>Select Item Name</label>
                               <table class="table table-bordered table-striped" id="tableItemName">
                                <thead>
                                   <tr>
                                      <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <tr><td><input type="checkbox" name="select-all" id="checkAll"/>Select All</td></tr>
                                    @foreach ($iName as $iName)
                                    <tr>
                                      <td><input type="checkbox" name="ItemName" value="{{$iName->ItemTypeID}}">{{$iName -> ItemName}}</td></tr>
                                      @endforeach
                                  </tbody>
                                </table>
                              </div>


                              <div class="col-md-3" style="margin-left: 0px">
                               <label>Select Item Status</label>
                                  <table class="table table-bordered table-striped" id="tableItemStatus">
                                <thead>
                                   <tr>
                                      <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <tr><td><input type="checkbox" name="select-all" id="checkAllStatus"/>Select All</td></tr>
                                    <tr><td><input type="checkbox" name="ItemStatus" value="Good">Good</td></tr>
                                    <tr><td><input type="checkbox" name="ItemStatus" value="Broken">Broken</td></tr>
                                    <tr><td><input type="checkbox" name="ItemStatus" value="Lost">Lost</td></tr>
                                    <tr><td><input type="checkbox" name="ItemStatus" value="Under Maintenance">Under Maintenance</td></tr>
                                  </tbody>
                                  </table>
                              </div>

                              <div style="margin-left: 0px"  class="col-md-3">
                               <br>
                               <label>Sort by</label>
                                 <select class="form-control" style="width: 175px" id="sortBy">
                                    <option value="1" checked> Item Name </option>
                                    <option value="2"> Item Status </option>
                                  </select>
                              </div>
                                
                                <div class="col-md-3">
                                  <br>
                                  <label>Order by</label>
                                     <div class="radio" >
                                   
                                   <label><input type="radio" class="radiobtn" name="radiorder" id="orderby" value="asc" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                   <label><input type="radio" class="radiobtn" name="radiorder" id="orderbydesc" value="desc">Descending</label>
                                     </div>
                                </div>
  
                          </div><br>
                           <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnItem">          Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
                      </div>

                      <!-- Items -->

                    
                  </div><!--well-->
                </div><!-- /.col -->
       

            </div><!-- box-body -->
                
          </form>
                    
        </div><!--box-info-->


</div><!--row-->

          <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-list"></i>&nbsp;&nbsp;Data</h3>
                  <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
  
                <div class="box-body">
                    <div  style="overflow:auto">
                    <table id="tabledata" class="table table-bordered table-striped" style="font-size:13px" >
                    </table> 
                    </div>  
          </div><!-- box-body -->                
        </div><!--box-info-->
      </div>
    </div>


 <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){

  var age, height, weight;
  var wage="1";
  var ItemTypeID = [];
  $("input[type='checkbox']").attr('checked', 'checked');
  age='1';
  height='1';
  weight='1';

  $.each($("input[name='ItemName']:checked"),function(){            
    ItemTypeID.push($(this).val());
  });

  $('#drop').change(function() {
        $('#tabledata').empty();
    if($('#drop').val() == 1) {
        $("#seven").hide();
        $("#six").hide();
        $("#five").hide();
        $("#four").hide();
        $("#three").hide();
        $("#two").hide();
        $("#one").show();
    }
    else if($('#drop').val() == 2) {
        $("#seven").hide();
        $("#six").hide();
        $("#five").hide();
        $("#four").hide();
        $("#three").hide();
        $("#two").show();
        $("#one").hide();
     }
    else if($('#drop').val() == 3) {
        $("#seven").hide();
        $("#six").hide();
        $("#five").hide();
        $("#four").hide();
        $("#three").show();
        $("#two").hide();
        $("#one").hide();
    }
    else if($('#drop').val() == 4){
        $("#seven").hide();
        $("#six").hide();
        $("#five").hide();
        $("#four").show();
        $("#three").hide();
        $("#two").hide();
        $("#one").hide();
    }
    else if($('#drop').val() == 5){
         $("#seven").hide();
        $("#six").hide();
        $("#five").show();
        $("#four").hide();
        $("#three").hide();
        $("#two").hide();
        $("#one").hide();
    }
    else if($('#drop').val() == 6){
        $("#seven").hide();
        $("#six").show();
        $("#five").hide();
        $("#four").hide();
        $("#three").hide();
        $("#two").hide();
        $("#one").hide();
        
    }
    else if($('#drop').val() == 7){
        $("#seven").show();
        $("#six").hide();
        $("#five").hide();
        $("#four").hide();
        $("#three").hide();
        $("#two").hide();
        $("#one").hide();
        
    }
   
  });//drop


//***********************ITEMS***********************************************************************************//
  $("#checkAll").click(function(){
    $("input[name='ItemName']").not(this).prop('checked', this.checked);
  });

  $("#checkAllStatus").click(function(){
    $("input[name='ItemStatus']").not(this).prop('checked', this.checked);
  });


  $('#btnItem').click(function(){

    var un= [];
    $.each($("input[name='ItemName']:not(:checked)"),function() {
         un.push($(this).val());

    });
    
  if (un.length!=ItemTypeID.length)
    {
      ItemTypeID= [];
        $.each($("input[name='ItemName']:checked"),function(){            
         ItemTypeID.push($(this).val());
        });
    }
  else if (un.length==ItemTypeID.length)
      ItemTypeID=un.slice();

  var ItemStatus = [];
  $.each($("input[name='ItemStatus']:checked"), function(){            
      ItemStatus.push($(this).val());
  });

  if ($('#sortBy').val()=='1')
    var sortBy= 'ItemName';
  if ($('#sortBy').val()=='2')
    var sortBy= 'ItemStatus';
  if($("input[name=radiorder]:checked").val() == "asc")
     var orderBy= 'asc';
   else
    var orderBy= 'desc';

  $('#tabledata').empty();
  $('#tabledata').append('<thead><tr><th>Item ID</th><th>Status</th></tr></thead>');

    $.ajax({
        type: 'POST',
        url: 'ItemQuery',
        data: {
              ItemTypeID: ItemTypeID,
              ItemStatus: ItemStatus,
              SortBy: sortBy,
              OrderBy:orderBy },
        dataType: 'JSON',
        success: function(data){
          $.each(data.ItemNames, function(key, val)
          {
            $('#tabledata').append('<tbody align="center"><tr><td>'+val.ItemName+'-'+val.ItemID+'</td><td>'+val.ItemStatus+'</td></tr></tbody>');
          });
        },error: function(request, error){

              }
            }).error(function(ts){
              alert(ts.responseText);
            });  
   });

//************************************FACILITY**********************************************************************************//
  // $("#checkAllFac").click(function(){
  //   $("input[name='FacName']").not(this).prop('checked', this.checked);
  // });

  // $("#FacCheckAllStatus").click(function(){
  //   $("input[name='FacStatus']").not(this).prop('checked', this.checked);
  // });


  // $('#btnFac').click(function(){
  //   var FacID = [];
  //     $.each($("input[name='FacName']:checked"), function(){            
  //         FacID.push($(this).val());
          
  //     });

  //     var FacStatus = [];
  //     $.each($("input[name='FacStatus']:checked"), function(){            
  //        FacStatus.push($(this).val());
         
  //     });

  //     if ($('#FacSortBy').val()=='1')
  //       var FacSortBy= 'FacilityName';
  //     if ($('#FacSortBy').val()=='2')
  //       var FacSortBy= 'status';
     
  //     if($("input[name=Facradiorder]:checked").val() == "asc")
  //        var FacorderBy= 'asc';
  //      else
  //       var FacorderBy= 'desc';
     
  //   $('#tabledata').empty();
  //   $('#tabledata').append('<thead><tr><th>Facility ID</th><th>Facility Name</th><th>Status</th></tr></thead>');

  //   $.ajax({
  //       type: 'POST',
  //       url: 'FacQuery',
  //       data: {FacID: FacID,
  //             FacStatus: FacStatus,
  //            FacSortBy: FacSortBy,
  //             FacorderBy: FacorderBy},
  //       dataType: 'JSON',
  //       success: function(data){
  //         $.each(data.fac, function(key1, val1)
  //         { 
  //           $('#tabledata').append('<tbody align="center"><tr><td>'+val1.FacilityCode+'-'+val1.FacilityID+'</td><td>'+val1.FacilityName+'</td><td>'+val1.status+'</td></tr></tbody>');
  //         });
  //       },error: function(request, error){ }
  //           }).error(function(ts){
  //             alert(ts.responseText);
  //           });  
  // });

//***********************************BUSINESS***********************************************************************//
$("#checkAllBus").click(function(){
    $("input[name='BusName']").not(this).prop('checked', this.checked);
});

  $('#btnBus').click(function(){
    var BusID = [];
      $.each($("input[name='BusName']:checked"), function(){            
          BusID.push($(this).val());
          
      });

      if ($('#BusSortBy').val()=='1')
        var BusSortBy= 'BusinessType';
     
      if($("input[name=BusOrder]:checked").val() == "asc")
         var BusorderBy= 'asc';
       else
        var BusorderBy= 'desc';
     
    $('#tabledata').empty();
    $('#tabledata').append('<thead><tr><th>Business ID</th><th>Business Type Name</th></tr></thead>');

    $.ajax({
        type: 'POST',
        url: 'BusQuery',
        data: {BusID: BusID,
             BusSortBy: BusSortBy,
              BusorderBy: BusorderBy},
        dataType: 'JSON',
        success: function(data){
          $.each(data.bus, function(key2, val2)
          { 
            $('#tabledata').append('<tbody align="center"><tr><td>'+val2.BusinessTypeID+'</td><td>'+val2.BusinessType+'</td></tr></tbody>');
          });
        },error: function(request, error){ }
            }).error(function(ts){
              alert(ts.responseText);
            });  
  });

//***********************************RESIDENT***********************************************************************//

//*******************PERSONAL DETAILS***************//
    $("#ResCheckAll").click(function(){
        $("input[name='Status']").not(this).prop('checked', this.checked);
    });

    $("#AllAge").click(function(){

      if($('#AllAge').is(':checked')) {
        $("#AgeFrom").attr("disabled", "disabled");
        $("#AgeTo").attr("disabled", "disabled");
        $("#AgeFrom").val("");
        $("#AgeTo").val("");
        age='1';
       }
      else {
        $('#AgeFrom').removeAttr('disabled');
        $('#AgeTo').removeAttr('disabled');
        age='2';
      }
    });

    $("#ResGenderAll").click(function(){
        $("input[name='Gender']").not(this).prop('checked', this.checked);
    });

    $("#ResCivilAll").click(function(){
        $("input[name='CivilStatus']").not(this).prop('checked', this.checked);
    });


//***********************HEALTH DETAILS****************************//
    $("#HealthCate").click(function(){
        $("input[name='HealthCat']").not(this).prop('checked', this.checked);
    });

    $("#AllH").click(function(){

      if($('#AllH').is(':checked'))
      {
        $("#HFrom").attr("disabled", "disabled");
        $("#HTo").attr("disabled", "disabled");
        $("#HFrom").val("");
        $("#HTo").val("");
        height="1";
      }

      else
      {
        $('#HFrom').removeAttr('disabled');
        $('#HTo').removeAttr('disabled');
        height="2";
      }

    });

    $("#AllW").click(function(){

      if($('#AllW').is(':checked'))
      {
        $("#WFrom").attr("disabled", "disabled");
        $("#WTo").attr("disabled", "disabled");
        $("#WFrom").val("");
        $("#WTo").val("");
        weight="1";
      }
      else
      {
        $('#WFrom').removeAttr('disabled');
        $('#WTo').removeAttr('disabled');
        weight="2";
      }

    });

//***********************EDUCATION DETAILS*********************//

    $("#CurrentEdu").click(function(){
        $("input[name='CurEdu']").not(this).prop('checked', this.checked);
    });

    $("#HighestEdu").click(function(){
        $("input[name='HighEdu']").not(this).prop('checked', this.checked);
    });

    $("#ReadLit").click(function(){
        $("input[name='read']").not(this).prop('checked', this.checked);
    });

    $("#WriteLit").click(function(){
        $("input[name='write']").not(this).prop('checked', this.checked);
    });

    $("#CurStud").click(function(){
        $("input[name='cur']").not(this).prop('checked', this.checked);
    });


//***********************ECONOMIC DETAILS*********************//

    $("#Employeed").click(function(){
        $("input[name='emp']").not(this).prop('checked', this.checked);
    });

    $("#AllSalary").click(function(){

      if($('#AllSalary').is(':checked'))
      {
        $("#SFrom").attr("disabled", "disabled");
        $("#STo").attr("disabled", "disabled");
        $("#SFrom").val("");
        $("#STo").val("");
        wage="1";

      }

      else
      {
        $('#SFrom').removeAttr('disabled');
        $('#STo').removeAttr('disabled');
        wage="2";
      }

    });



/**^^^^^^^^^^^^^^^^^^^^BTN CLICK^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^**/

  $('#btnResident').click(function(){
    var bdayArr= [];
    var HArr= [];
    var WArr= [];
    var HealthArr= [];
    var CurStudArr= [];
    var ReadArr = [];
    var WriteArr = [];
    var HighArr = [];
    var CurEduArr = [];
    var EmpArr = [];
    var SalaryArr = [];

//****************PERSONAL DETAILS*********************//
    var today = new Date();
    var ageFrom = $('#AgeFrom').val();
    var fyear = (today.getFullYear()-parseInt(ageFrom));
    var fmonth = today.getMonth()+1;
    var fday =today.getDate();
    var fromyear= String(fyear)+"-"+String(fmonth)+"-"+String(fday);

    var ageTo= $('#AgeTo').val();
    var yyear = (today.getFullYear()-parseInt(ageTo));
    var yearTo= String(yyear)+"-"+"01"+"-"+"01";
    bdayArr.push(yearTo);
    bdayArr.push(fromyear);

    var GenderArr= [];
      $.each($("input[name='Gender']:checked"), function(){            
          GenderArr.push($(this).val()); 
      });
    var CivilArr= [];
      $.each($("input[name='CivilStatus']:checked"), function(){            
          CivilArr.push($(this).val());
      });
    var StatusArr= [];
      $.each($("input[name='Status']:checked"), function(){            
          StatusArr.push($(this).val());
      });
    if ($('#ResSort').val()=='1')
      var ResSortBy= 'LastName';
    if ($('#ResSort').val()=='2')
      var ResSortBy= 'FirstName';
    if ($('#ResSort').val()=='3')
      var ResSortBy= 'Birthdate';
    if ($('#ResSort').val()=='4')
      var ResSortBy= 'Gender';
    if ($('#ResSort').val()=='5')
      var ResSortBy= 'ResidencyStat';

    if($("input[name=ResOrder]:checked").val() == "asc")
         var ResOrderBy= 'asc';
    else var ResOrderBy= 'desc';

    if($("input[name=ResStatus]:checked").val() == "active")
       var ResStatus= 'active';
    else if($("input[name=ResStatus]:checked").val() == "Desceased")
       var ResStatus= 'Deceased';
    else if($("input[name=ResStatus]:checked").val() == "Move outs")
       var ResStatus= 'Move outs';


//****************HEALTH DETAILS*********************//
    HealthArr= [];
      $.each($("input[name='HealthCat']:checked"), function(){            
          HealthArr.push($(this).val());
      });

    HArr.push($('#HFrom').val());
    HArr.push($('#HTo').val());

    WArr.push($('#WFrom').val());
    WArr.push($('#WTo').val());

//***************EDUCATION DETAILS*********************//

    $.each($("input[name='read']:checked"), function(){            
            ReadArr.push($(this).val());
        });

    $.each($("input[name='write']:checked"), function(){            
           WriteArr.push($(this).val());
        });

    $.each($("input[name='cur']:checked"), function(){            
            CurStudArr.push($(this).val());
        });

    $.each($("input[name='HighEdu']:checked"), function(){            
           HighArr.push($(this).val());
        });

    $.each($("input[name='CurEdu']:checked"), function(){
          CurEduArr.push($(this).val());
         });


//***************ECONOMIC DETAILS*********************//

    $.each($("input[name='emp']:checked"), function(){
          EmpArr.push($(this).val());
         });

    SalaryArr.push($('#SFrom').val());
    SalaryArr.push($('#STo').val());

    $('#tabledata').empty();
    $('#tabledata').append('<thead><tr><th>Residency Status</th><th>Last Name</th><th>First Name</th><th>Gender</th><th>Civil Status</th><th>Height</th><th>Weight</th><th>Health Status</th><th>Currently Studying?</th><th>Current Educational Attainment</th><th>Highest Educational Attainment</th><th>Reading Literacy</th><th>Writing Literacy</th><th>Currently Employed/Earning?</th><th>Occupation</th><th>Salary</th></tr></thead>');

          $.ajax({
              type: 'POST',
              url: 'ResQuery',
              data: {
                    age: age,
                    GenderArr: GenderArr,
                    CivilArr: CivilArr,
                    StatusArr: StatusArr,
                    ResSortBy: ResSortBy,
                    ResOrderBy: ResOrderBy,
                    ResStatus: ResStatus,
                    bdayArr: bdayArr,
                    height: height,
                    weight: weight,
                    HealthArr: HealthArr,
                    WArr: WArr,
                    HArr: HArr,
                    CurStudArr: CurStudArr,
                    HighArr: HighArr,
                    ReadArr: ReadArr,
                    WriteArr: WriteArr,
                    CurEduArr: CurEduArr,
                    wage: wage,
                    EmpArr: EmpArr,
                    SalaryArr: SalaryArr,
                  },
              dataType: 'JSON',
               success: function(data){
                $.each(data.res, function(key3, val3){ 
                  $.each(data.h, function(key4, val4) {
                    $.each(data.w, function(key5, val5) {
                      $.each(data.edu, function(key6, val6) {
                        $.each(data.wage, function(key7, val7) {

                          if (val4.ResidentID==val3.ResidentID && val5.ResidentID==val3.ResidentID && val3.ResidentID==val6.ResidentID && val3.ResidentID==val7.ResidentID) 
                          {
                              $('#tabledata').append('<tbody align="center"><tr><td>'+val3.ResidencyStat+'</td><td>'+val3.LastName+'</td><td>'+val3.FirstName+'</td><td>'+val3.Gender+'</td><td>'+val3.CivilStat+'</td><td>'+val4.Height+'</td><td>'+val5.Weight+'</td><td>'+val3.HealthStat+'</td><td>'+val6.CurrStudy+'</td><td>'+val6.CurrLevel+'</td><td>'+val6.HighLevel+'</td><td>'+val6.ReadLiteracy+'</td><td>'+val6.WriteLiteracy+'</td><td>'+val7.CurrEmployed+'</td><td>'+val7.Occupation+'</td><td>'+val7.Salary+'</td></tr></tbody>');
                          }

                        });
                      });
                    });
                  });
                });
              },error: function(request, error){ }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });  
  });

//*******************************Household**********************************************************************//

      $("#HouseStreet").click(function(){
            $("input[name='street']").not(this).prop('checked', this.checked);
          });

      $("#HouseType").click(function(){
            $("input[name='Htype']").not(this).prop('checked', this.checked);
          });

      $("#HouseStatus").click(function(){
            $("input[name='Hstatus']").not(this).prop('checked', this.checked);
          });

      $('#btnHouse').click(function()
      {
        var HouseSt = [];
        var HouseTy = [];
        var HouseStatus= [];

            $.each($("input[name='street']:checked"), function()
            {            
                HouseSt.push($(this).val()); 
            });

            $.each($("input[name='Htype']:checked"), function()
            {            
                HouseTy.push($(this).val()); 
            });

            $.each($("input[name='Hstatus']:checked"), function()
            {            
                HouseStatus.push($(this).val()); 
            });


            if ($('#dropHouseSort').val()=='1')
              var HouseSortBy= 'HouseOwner';
            if ($('#dropHouseSort').val()=='2')
              var HouseSortBy= 'HouseType';
            if ($('#dropHouseSort').val()=='3')
              var HouseSortBy= 'HouseStreet';
            if ($('#dropHouseSort').val()=='4')
              var HouseSortBy= 'status';
           
            if($("input[name=Horder]:checked").val() == "1")
               var HouseorderBy='asc';
             else
              var HouseorderBy='desc';

            $('#tabledata').empty();
            
            $('#tabledata').append('<thead><tr><th>House ID</th><th>Owner Name</th><th>House Address</th><th>House Type</th><th>Status</th></tr></thead>');

            $.ajax({
                type: 'POST',
                url: 'HouseQuery',
                data: {
                        street: HouseSt,
                        type: HouseTy,
                        status: HouseStatus,
                        Hsort: HouseSortBy,
                        Horder: HouseorderBy,
                      },
                dataType: 'JSON',
                success: function(data){
                  $.each(data.house, function(key4, val4)
                  { 
                    $('#tabledata').append('<tbody align="center"><tr><td>'+val4.HouseID+'</td><td>'+val4.HouseOwner+'</td><td>'+val4.HouseAddNo+' '+val4.HouseStreet+' zone '+val4.HouseZone+'</td><td>'+val4.HouseType+'</td><td>'+val4.status+'</td></tr></tbody>');
                  });
                },error: function(request, error){ }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });  

      });

//******************************OFFICIAL*********************************************************************//

      $("#OfficialPosition").click(function(){
            $("input[name='position']").not(this).prop('checked', this.checked);
          });

      $("#OfficialStatus").click(function(){
            $("input[name='Offtatus']").not(this).prop('checked', this.checked);
          });

      $('#btnofficial').click(function()
      {
        var OfficialPos = [];
        var OfficialStatus= [];

            $.each($("input[name='position']:checked"), function()
            {            
                OfficialPos.push($(this).val()); 
            });

            $.each($("input[name='Offtatus']:checked"), function()
            {            
                OfficialStatus.push($(this).val()); 
            });

            if ($('#dropOfficialSort').val()=='1')
              var OffSortBy= 'OfficialPosition';
            if ($('#dropOfficialSort').val()=='2')
              var OffSortBy= 'OfficialPositionCount';
            if ($('#dropOfficialSort').val()=='3')
              var OffSortBy= 'status';
           
            if($("input[name=Offorder]:checked").val() == "1")
               var OfforderBy='asc';
             else
              var OfforderBy='desc';

            $('#tabledata').empty();
            
            $('#tabledata').append('<thead><tr><th>Official ID</th><th>Position Name</th><th>Position Number</th><th>Position Status</th></tr></thead>');

            $.ajax({
                type: 'POST',
                url: 'OfficialQuery',
                data: {
                        offSort: OffSortBy,
                        offStatus: OfficialStatus,
                        offPos: OfficialPos,
                         OffOrder: OfforderBy,
                      },
                dataType: 'JSON',
                success: function(data){
                  $.each(data.off, function(key5, val5)
                  { 
                    $('#tabledata').append('<tbody align="center"><tr><td>'+val5.OfficialPositionID+'</td><td>'+val5.OfficialPosition+'</td><td>'+val5.OfficialPositionCount+'</td><td>'+val5.status+'</td></tr></tbody>');
                  });
                },error: function(request, error){ }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });  

      });

//***********************DOCUMENTS******************************************************************************//
  $("#checkAllDoc").click(function(){
    $("input[name='DocName']").not(this).prop('checked', this.checked);
  });

  $("#DocStatus").click(function(){
    $("input[name='DocStat']").not(this).prop('checked', this.checked);
  });


  $('#btnDoc').click(function(){
    var DocID = [];
    var DocStat = [];

    $.each($("input[name='DocName']:checked"), function(){            
        DocID.push($(this).val());
    });

    $.each($("input[name='DocStat']:checked"), function(){            
        DocStat.push($(this).val());
    });

    if ($('#DocSort').val()=='1')
      var Docsortby= 'DocumentName';
    if ($('#DocSort').val()=='2')
      var Docsortby= 'DocStatus';
    
    if($("input[name=radioDoc]:checked").val() == "asc")
       var docorder= 'asc';
     else
      var docorder= 'desc';

  $('#tabledata').empty();
  $('#tabledata').append('<thead><tr><th>Document ID</th><th>Document Name</th><th>Document Status</th></tr></thead>');

    $.ajax({
        type: 'POST',
        url: 'DocumentQuery',
        data: {
              DocID: DocID,
              DocStat: DocStat,
              Docsortby: Docsortby,
              docorder: docorder,
            },
        dataType: 'JSON',
        success: function(data){
          $.each(data.documents, function(key, val)
          {
            $('#tabledata').append('<tbody align="center"><tr><td>'+val.DocumentID+'</td><td>'+val.DocumentName+'</td><td>'+val.DocStatus+'</td></tr></tbody>');
          });
        },error: function(request, error){

              }
            }).error(function(ts){
              alert(ts.responseText);
            });  
   });


});//document
</script>

	</section>

@endsection