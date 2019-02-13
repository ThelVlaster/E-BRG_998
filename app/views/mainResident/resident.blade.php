@extends('layouts.master')

@section('content')

		<section class="content-header">
            <h1>
              Maintenance <small>  </small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li class="active">Resident</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content"><br>
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-users"></i>&nbsp;&nbsp;Add Resident</h3>
                  <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->

                <!-- form start -->
                <form role="form" method = POST name = "resident_maint">
                  <div class="box-body">
                   
                    <div class="col-md-12">
                     <div class="well">

                        <div class="form-group">
                          <div class="row">
                            
                            <div class="col-xs-4">
                             <label>Search</label>
                             <select class="form-control"
                                      id = "drop">
                                  <option selected="" disabled="">Select Household</option>
                                  @foreach($house as $hh)
                                      <option value = "{{ $hh -> HouseID}}"> ( {{ $hh -> HouseID}} ) {{ $hh -> HFirstName}} {{ $hh -> HMidName}} {{ $hh -> HLastName}}, {{$hh -> HouseAddNo}} {{$hh -> HouseStreet}} Zone {{$hh -> HouseZone}}</option>
                                  @endforeach

                             </select>

                                &nbsp;&nbsp;<input type="checkbox" onchange="checkOwner(this)"><h9 style="font-size:11px">&nbsp;&nbsp;&nbsp;Select House Owner as the Head</h9>
                            </div>

                            <div class="col-xs-2">
                             <label>House Owner</label>
                             <input type=text class="form-control" id="txtOwner" readonly>
                             <input type=text id="tlast" hidden>
                             <input type=text id="tfirst" hidden>
                             <input type=text id="tmiddle" hidden>
                            </div>

                            <div class="col-xs-4">
                             <label>Address</label>
                             <input type=text class="form-control" id="txtAddress" readonly>
                            </div>

                            <div class="col-xs-2">
                             <label>Type</label>
                             <input type=text class="form-control"  id="txtType" readonly>
                             <input type="text" value=1 id="trytry" name="trytry" hidden>
                            </div>


                          
                          </div>
                        </div>




                    </div><!--well-->
                    </div><!-- /.col -->
                    

                    <div class="col-md-4">
                    
                      <table id="name" style="border-spacing: 0px;border-collapse: collapse;font-size: 12px; margin-top:53px">
                              <thead style="font-size:13px; background-color:#f0f5f5; text-align:center;">
                                <tr>
                                  <th><input type="checkbox" onchange="checkLastName(this)"><h9 style="font-size:10px; font-weight: normal">Apply Last Name to all</h9></th>
                                  <th> Name of <br> Resident</th>
                                  <th></th>
                                </tr>
                              </thead>

                              <tbody>
                              <tr>
                                  <div class="col-sm-4">
                                    <td> <input type="text" class="form-control" id = "txtLName1" placeholder="Last Name*" required></td>
                                    <td><input type="text" class="form-control" id = "txtFName1" placeholder="Given Name*" required></td>
                                    <td><input type="text" class="form-control" id = "txtMName1" placeholder="Middle Name" required></td>
                                  </div>
                              </tr>
                              

                              </tbody>
                        </table>

                    </div>


                    <div class="col-md-8">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Personal Details</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Contact Details</a></li>
                          <li><a href="#tab_3" data-toggle="tab">Health Details</a></li>
                          <li><a href="#tab_4" data-toggle="tab">Education &amp; Literacy</a></li>
                          <li><a href="#tab_5" data-toggle="tab">Economic Details</a></li>
                          <li><a href="#tab_6" data-toggle="tab">Voter Details</a></li>
                        </ul>

                      
                        <div class="tab-content" style="overflow: auto">
                         
                          <div class="tab-pane active" id="tab_1">
                          <div id="dynamicInput3">
                            <table id="table1" style="border-spacing: 0px;border-collapse: collapse;font-size: 12px;">
                              <thead style="font-size:13px; background-color:#f0f5f5">
                                <tr>
                                  <th>Relation to the Head*</th>
                                  <th>Residency Status*</th>
                                  <th>Birthdate*</th>
                                  <th>Age</th>
                                  <th>Birth Place*</th>
                                  <th>Gender*</th>
                                  
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td><input type=text id="txtRelation1" class="form-control" value="Head" readonly></td>
                                  <td><select id="txtResidency1" class="form-control" >
                                      <option>Own house</option>
                                      <option>Renter</option>
                                  </select></td>

                                  <td><input type=date class="form-control" id="txtBday1" onkeyup="getAge(1)" step="any" required></td>
                                  <td><input type=text style="width:50px" class="form-control" id="txtAge1" readonly></td>
                                  <td><input type=text class="form-control" id="txtBPlace1" required></td>
                                  <td style="width:100px;align:center"><input type="radio" name="btnGender1" value="Male" id="btnGender1" checked>Male
                                  	  <input type="radio" id="btnGender1" value="Female" name="btnGender1">Female</td>
                                  
                                </tr>



                              </tbody>
                            </table>
                            </div>

                      <!--      <center><input type="button" value="Add Members"  class="btn btn-warning btn-flat" onClick="addInput('dynamicInput','dynamicInput2', 'dynamicInput3', 'dynamicInput4', 'dynamicInput5');"></center> -->

                          </div><!-- /.tab-pane -->

                           
                          <div class="tab-pane" id="tab_2">
                          <div id="dynamicInput">
                            <table id="table2" style="border-spacing: 0px;border-collapse: collapse;font-size: 12px;" align="center">
                              <thead style="font-size:13px; background-color:#f0f5f5; size:26px">
                                <tr>
                                  <th>Civil Status*</th>
                                  <th>Religion*</th>
                                  <th>Mobile <br> No.</th>
                                  <th>Landline <br> No.</th>
                                  <th>E-mail <br> Address</th>

                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><select class="form-control" id="txtCivil1" required>
                                      <option>Single</option>
                                      <option>Married</option>
                                      <option>Divorced</option>
                                      <option>Widowed</option>
                                      <option>Separated</option>
                                  </select></td>
                                  <td><select class="form-control" id="txtReligion1" required>
                                      <option>Roman Catholic</option>
                                      <option>Born-again Christian</option>
                                      <option>Iglesia ni Cristo</option>
                                      <option>Orthodoxy</option>
                                      <option>Protestantism</option>
                                      <option>Mormon</option>
                                      <option>Islam</option>
                                      <option>Buddhism</option>
                                      <option>Judaism</option>
                                      <option>Hinduism</option>
                                      <option>Islam</option>
                                      <option>Others</option>
                                  </select></td>
                                  <td><input type=text class="form-control" id="txtMobile1"></td>
                                  <td><input type=text class="form-control" id="txtLine1"></td>
                                  <td><input type=email class="form-control" id="txtEmail1"></td>
                                </tr>

                              </tbody>
                          
                            </table>

                            

                          </div><!-- /.tab-pane -->
                          

                          </div>
                          <div class="tab-pane" id="tab_3">
                          <div id="dynamicInput2">
                            <table id="table3" style="border-spacing: 0px;border-collapse: collapse;font-size: 12px;" align="center">
                              <thead style="font-size:13px; background-color:#f0f5f5">
                                <tr>
                                  <th>Height <br> (in meters)*</th>
                                  <th>Weight <br>(in kilograms)*</th>
                                  <th>Body Mass <br>Index</th>
                                  <th>Category</th>
                                
                                </tr>

                              </thead>

                              
                              <tbody>
                                <tr>
                                  <td><input type=text class="form-control" id="txtHeight1" value = 0 required></td>
                                  <td><input type=text class="form-control" id="txtWeight1" value = 0 onkeyup = "getHealth(1)" step="any" required></td>
                                  <td><input type=text class="form-control" readonly id="txtBMI1"></td>
                                  <td><input type=text class="form-control" readonly id="txtHealthStat1"></td>
                                </tr>

                              </tbody>
                        
                            </table>
                            </div>
                          </div><!-- /.tab-pane -->

                          <div class="tab-pane" id="tab_4">
                          <div id="dynamicInput4">
                            <table id="table4" style="border-spacing: 0px;border-collapse: collapse;font-size: 12px;" align="center">
                              <thead style="font-size:13px; background-color:#f0f5f5">
                                <tr>
                                   
                                  <th>Currently Studying?</th>
                                  <th>(If yes) Current Educational Level</th>
                                  <th>(If no) Highest Educational Attainment</th>
                                  <th>Can read in any language? (Reading Literacy)</th>
                                  <th>Can write in any language? (Writing Literacy)</th>

                                </tr>
                              </thead>

                            <tbody>
                                <tr>
                               
                                  <td align="center"><select
                                        class="form-control"
                                        id="txtCurrentStud1"
                                        onclick = "getEduc(1)"
                                        required>
                                            <option>Yes</option>
                                            <option>No</option>
                                    </select></td>

                                  <td><select class="form-control"  id="txtRecentEd1">
                                      <option disabled selected></option>
                                      <option>Pre-school/Day Care/Kinder</option>
                                      <option>Grade 1</option>
                                      <option>Grade 2</option>
                                      <option>Grade 3</option>
                                      <option>Grade 4</option>
                                      <option>Grade 5</option>
                                      <option>Grade 6</option>
                                      <option>Grade 7</option>
                                      <option>Grade 8</option>
                                      <option>Grade 9</option>
                                      <option>Grade 10</option>
                                      <option>Grade 11</option>
                                      <option>Grade 12</option>
                                      <option>Vocational Course</option>
                                      <option>1st Year College</option>
                                      <option>2nd Year College</option>
                                      <option>3rd Year College</option>
                                      <option>4th Year College</option>
                                      <option>5th Year College</option>
                                      <option>Masters-Post Graduate</option>
                                      <option>Doctoral-Post Graduate</option>
                                      </select>
                                  </td>

                                  <td><select class="form-control"  id="txtHighestEd1">
                                      <option disabled selected></option>
                                      <option>Never been in school</option>
                                      <option>Elementary Level</option>
                                      <option>Elementary Graduate</option>
                                      <option>Highschool Level</option>
                                      <option>Highschool Graduate</option>
                                      <option>College Level</option>
                                      <option>College Graduate</option>
                                      <option>Post Graduate Level</option>
                                      <option>Post Graduate Master</option>
                                      <option>Graduate Doctoral</option>
                                  </select></td>


                                   <td align="center"><input type="radio" id="btnRead1" name="btnRead1" value="Yes" checked>Yes
                                      <input type="radio" id="btnRead1" name="btnRead1" value="No">No</td>
                                  <td align="center"><input type="radio" id="btnWrite1" name="btnWrite1" value="Yes" checked>Yes
                                      <input type="radio" id="btnWrite1" name="btnWrite1" value="No">No</td>
                                  </select></td>

                                  
                                </tr>

                               

                              </tbody>
                            </table>
                            </div>
                          </div><!-- /.tab-pane -->

                          <div class="tab-pane" id="tab_5">
                          <div id="dynamicInput5">
                            <table id="table5" style="border-spacing: 0px;border-collapse: collapse;font-size: 12px;" align="center">
                              <thead style="font-size:13px; background-color:#f0f5f5">
                                <tr>

                                  <th>Currently <br>Employed/Earning?</th>
                                  <th>Occupation</th>
                                  <th>Monthly Salary <br>(in peso)</th>

                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td align="center"><select
                                        class="form-control"
                                        id="txtCurrentEmp1"
                                        onclick = "getEcon(1)"
                                        required>
                                            <option>Yes</option>
                                            <option>No</option>
                                    </select></td>
                                  <td><input type=text class="form-control" id="txtOccupation1"></td>
                                  <td><input type=text class="form-control"  id="txtSalary1"></td>
                                  </select></td>
                                </tr>

                              

                              </tbody>
                            </table>
                            </div>
                          </div><!-- /.tab-pane -->

                          <div class="tab-pane" id="tab_6">
                          <div id="dynamicInput6">
                            <table id="table6" style="border-spacing: 0px;border-collapse: collapse;font-size: 12px;" align="center">
                              <thead style="font-size:13px; background-color:#f0f5f5">
                                <tr>

                                  <th>Currently <br>Registered Voter?</th>
                                  <th>PrecintNo</th>
                                  <th>Year Last Voted</th>

                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td align="center"><select
                                        class="form-control"
                                        id="txtVoter1"
                                        onclick = "getVoterClick(1)"
                                        required>
                                            <option>Yes</option>
                                            <option>No</option>
                                    </select></td>
                                  <td><input type=text class="form-control" id="txtPrecintNo1"></td>
                                  <td><input type=date class="form-control" id="txtLastVoted1" step="any" required></td>
                                </tr>

                              

                              </tbody>
                            </table>
                            </div>
                          </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                      </div><!-- nav-tabs-custom -->
                    </div><!-- /.col -->

                  </div><!-- /.box-body -->

                  <center><div class="box-footer">
                    

                    <button type="button" id="btnAdd" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> </button> &nbsp;&nbsp;&nbsp;&nbsp;

                    <button type="submit" class="btn btn-info btn-flat" id="btnSubmit">Submit</button> &nbsp;&nbsp;&nbsp;&nbsp;

                    <button type="button" id="btnRemove" class="btn btn-danger btn-flat"
                    <?php 
                    if (isset($_POST['trytry']) == '1')
                      { echo 'disabled'; } 
                    ?> > <i class="fa fa-remove"></i> </button>

                  </div></center>
                </form>
              </div><!-- /.box -->
                
              </div><!-- /.col -->

             

          </div><!--row -->

          <div class="row" id="viewRes">
              <div class="col-md-12">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">List of Residents</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->

                  <div class="box-body">
                    <div>
                      <div class="col-md-12">
                        <input type="text" id="searchFilter" onkeyup="searchFunction()" placeholder="Search Resident">
                        <input type="checkbox" id="checkVoters" onclick="VoterOnly()">Show Registered Voters only
                      </div>
                    <table id="example2" class="table table-bordered table-striped" style="font-size:13px" >
                      <thead>
                        <tr>
                          <th rowspan="2"></th>
                          <th rowspan="2">House No.</th>
                          <th rowspan="2">Family No.</th>
                          <th rowspan="2">Resident No.</th>
                          <th rowspan="2">Name</th>
                          <th rowspan="2">Address</th>
                          <th colspan="7">Personal Details</th>
                          <th colspan="3">Contact Details</th>
                          <th colspan="3">Health Details</th>
                          <th colspan="5">Education &amp; Literacy</th>
                          <th colspan="3">Economic Details</th>
                          <th colspan="3">Voter Details</th>
                        </tr>
                        <tr>
                          <th bgcolor="#ccffcc">Relation to Head</th>
                          <th bgcolor="#ccffcc">Residency Status</th>
                          <th bgcolor="#ccffcc">Birth Date</th>
                          <th bgcolor="#ccffcc">Birth Place</th>
                          <th bgcolor="#ccffcc">Gender</th>
                          <th bgcolor="#ccffcc">Civil Status</th>
                          <th bgcolor="#ccffcc">Religion</th>
                          <th bgcolor="#ffffcc">Mobile No.</th>
                          <th bgcolor="#ffffcc">Tel No.</th>
                          <th bgcolor="#ffffcc">Email Address</th>
                          <th bgcolor="#ffe6e6">Height</th>
                          <th bgcolor="#ffe6e6">Weight</th>
                          <th bgcolor="#ffe6e6">Health Status</th>
                          <th bgcolor="#e6f5ff">Currently Studying?</th>
                          <th bgcolor="#e6f5ff">Current Educ. Level</th>
                          <th bgcolor="#e6f5ff">Highest Educ. Attainment</th>
                          <th bgcolor="#e6f5ff">Reading Literacy</th>
                          <th bgcolor="#e6f5ff">Writing Literacy</th>
                          <th bgcolor="#e6e6ff">Currently Employed?</th>
                          <th bgcolor="#e6e6ff">Occupation</th>
                          <th bgcolor="#e6e6ff">Income per month</th>
                          <th bgcolor="#ffd884">Voter?</th>
                          <th bgcolor="#ffd884">PrecintNo</th>
                          <th bgcolor="#ffd884">Year Last Voted</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($res as $resi)
                          <tr>
                          	  <td>
                                  <button class="btn btn-xs btn-success btn-flat" 
                                          data-toggle="modal" 
                                          data-target="#edit" 
                                          value = "{{$resi -> ResidentID}}"        
                                          onclick = "modalEdit(this)">
                                            <i class="fa fa-pencil"></i>
                                  </button>
                                  <!-- <button class="btn btn-xs btn-danger btn-flat" 
                                          data-toggle="modal" 
                                          data-target="#delete"
                                          value = "{{$resi -> ResidentID}}"
                                          onclick = "modalDelete(this)">
                                            <i class="fa fa-remove"></i>
                                  </button> --></td>		
                              <td>{{ $resi -> HouseID }}</td>
                              <td>{{ $resi -> FamilyID }}</td>
                              <td>{{ $resi -> ResidentID }}</td>
                              <td>{{ $resi -> LastName}}, {{ $resi -> FirstName}} {{ $resi -> MidName}}</td>
                              <td>{{ $resi -> HouseAddNo}} {{ $resi -> HouseStreet}} St, Zone {{ $resi -> HouseZone}}</td>
                              <td>{{ $resi -> RelationHead }}</td>
                              <td>{{ $resi -> ResidencyStat }}</td>
                              <td>{{ $resi -> Birthdate }}</td>
                              <td>{{ $resi -> Birthplace }}</td>
                              <td>{{ $resi -> Gender }}</td>
                              <td>{{ $resi -> CivilStat }}</td>
                              <td>{{ $resi -> Religion }}</td>
                              <td>{{ $resi -> MobileNo }}</td>
                              <td>{{ $resi -> TelNo }}</td>
                              <td>{{ $resi -> EmailAdd }}</td>
                              <td>{{ $resi -> Height }}</td>
                              <td>{{ $resi -> Weight }}</td>
                              <td>{{ $resi -> HealthStat }}</td>
                              <td>{{ $resi -> CurrStudy }}</td>
                              <td>{{ $resi -> CurrLevel }}</td>
                              <td>{{ $resi -> HighLevel }}</td>
                              <td>{{ $resi -> ReadLiteracy }}</td>
                              <td>{{ $resi -> WriteLiteracy }}</td>
                              <td>{{ $resi -> CurrEmployed }}</td>
                              <td>{{ $resi -> Occupation }}</td>
                              <td>{{ $resi -> Salary }}</td>
                              <td>{{ $resi -> Voter }}</td>
                              <td>{{ $resi -> PrecintNo }}</td>
                              <td>{{ $resi -> YearLastVoted }}</td>
                            
                        </tr>
                        @endforeach
                      </tbody>

                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


              @include('mainResident.resident_modal_edit')



 		<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>




     <script type="text/javascript">
        var ctr=2;

      $(document).ready(function(){

        $('#btnAdd').click(function(){

          $('#name').append('<tr id="rowName' + (ctr) + '"> <div class="col-sm-4"> <td><input type="text" class="form-control" id = "txtLName' + (ctr) + '" placeholder="Last Name*" required></td> <td><input type="text" class="form-control" id = "txtFName' + (ctr) + '" placeholder="Given Name*" required></td> <td><input type="text" class="form-control" id = "txtMName' + (ctr) + '" placeholder="Middle Name*" required></td> </div> </tr>');

          $('#table2').append('<tr id="rowContact' + (ctr) + '"><td><select class="form-control" id="txtCivil' + (ctr) + '" required> <option>Single</option> <option>Married</option> <option>Divorced</option> <option>Widowed</option> <option>Separated</option> </select></td> <td><select class="form-control" id="txtReligion' + (ctr) + '" required> <option>Roman Catholic</option> <option>Born-again Christian</option> <option>Iglesia ni Cristo</option> <option>Orthodoxy</option> <option>Protestantism</option> <option>Mormon</option> <option>Islam</option> <option>Buddhism</option> <option>Judaism</option> <option>Hinduism</option> <option>Islam</option> <option>Others</option> </select></td> <td><input type=text class="form-control" id="txtMobile' + (ctr) + '"></td> <td><input type=text class="form-control" id="txtLine' + (ctr) + '"></td> <td><input type=email class="form-control" id="txtEmail' + (ctr) + '"></td> </tr>');

          $('#table3').append('<tr id="rowHealth' + (ctr) + '"> <td><input type=text class="form-control" id="txtHeight' + (ctr) + '" value = 0  required></td> <td><input type=text class="form-control" id="txtWeight' + (ctr) + '" value = 0 onkeyup = "getHealth('+ctr+')" step="any" required></td> <td><input type=text class="form-control" readonly id="txtBMI' + (ctr) + '"></td> <td><input type=text class="form-control" readonly id="txtHealthStat' + (ctr) + '"></td> </tr>');

          $('#table1').append(' <tr id="rowPersonal' + (ctr) + '"> <td><select id="txtRelation' + (ctr) + '" class="form-control"><option>Husband</option><option>Wife</option><option>Son</option><option>Daughter</option><option>Son-in-law</option><option>Daughter-in-law</option><option>Father-in-law</option><option>Mother-in-law</option><option>Grandson</option><option>Granddaughter</option><option>Father</option><option>Mother</option><option>Brother</option><option>Sister</option><option>Relative-male</option><option>Relative-female</option><option>Househelp-male</option><option>Househelp-female</option><option>Tenant/Boarder</option></select></td> <td><select id="txtResidency' + (ctr) + '" class="form-control"> <option>Own house</option> <option>Renter</option> </select></td> <td><input type=date class="form-control" id="txtBday' + (ctr) + '" onkeyup="getAge('+ctr+')" step="any" required></td> <td><input type=text style="width:50px" class="form-control" id="txtAge' + (ctr) + '" readonly></td> <td><input type=text class="form-control" id="txtBPlace' + (ctr) + '" required></td> <td style="width:100px;align:center"><input type="radio" value="Male" name="btnGender' + (ctr) + '" id="btnGender' + (ctr) + '" checked>Male <input type="radio" value="Female" id="btnGender' + (ctr) + '" name="btnGender' + (ctr) + '">Female</td>  </tr>');

          $('#table4').append(' <tr id="rowEduc' + (ctr) + '"> <td align="center"><select class="form-control" id="txtCurrentStud' + (ctr) + '" onclick = "getEduc('+ctr+')" required> <option>Yes</option> <option>No</option> </select></td> <td><select class="form-control"  id="txtRecentEd' + (ctr) + '">  <option disabled selected></option><option>Pre-school/Day Care/Kinder</option> <option>Grade 1</option> <option>Grade 2</option> <option>Grade 3</option> <option>Grade 4</option> <option>Grade 5</option> <option>Grade 6</option> <option>Grade 7</option> <option>Grade 8</option> <option>Grade 9</option> <option>Grade 10</option> <option>Grade 11</option> <option>Grade 12</option> <option>Vocational Course</option> <option>1st Year College</option> <option>2nd Year College</option> <option>3rd Year College</option> <option>4th Year College</option> <option>5th Year College</option> <option>Masters-Post Graduate</option> <option>Doctoral-Post Graduate</option> </select> </td> <td><select class="form-control"  id="txtHighestEd' + (ctr) + '">  <option disabled selected></option><option>Never been in school</option> <option>Elementary Level</option> <option>Elementary Graduate</option> <option>Highschool Level</option> <option>Highschool Graduate</option> <option>College Level</option> <option>College Graduate</option> <option>Post Graduate Level</option> <option>Post Graduate Master</option> <option>Graduate Doctoral</option> </select></td> <td align="center"><input type="radio" value="Yes" id="btnRead' + (ctr) + '" name="btnRead'+(ctr)+'" checked>Yes <input type="radio" value="No" id="btnRead' + (ctr) + '" name="btnRead'+(ctr)+'">No</td> <td align="center"><input type="radio" value="Yes" id="btnWrite' + (ctr) + '" name="btnWrite'+(ctr)+'" checked>Yes <input type="radio" value="No" id="btnWrite' + (ctr) + '" name="btnWrite'+(ctr)+'">No</td> </select></td> </tr>');

           $('#table5').append('<tr id="rowEcon' + (ctr) + '"> <td align="center"><select class="form-control" id="txtCurrentEmp' + (ctr) + '" onclick = "getEcon('+ctr+')" required> <option>Yes</option> <option>No</option> </select></td> <td><input type=text class="form-control" id="txtOccupation' + (ctr) + '"></td> <td><input type=text class="form-control"  id="txtSalary' + (ctr) + '"></td> </select></td> </tr>');

           $('#table6').append('<tr id="rowVoter' + (ctr) + '"> <td align="center"><select class="form-control" id="txtVoter' + (ctr) + '" onclick = "getVoterClick('+ctr+')" required> <option>Yes</option> <option>No</option> </select></td> <td><input type=text class="form-control" id="txtPrecintNo' + (ctr) + '"></td> <td><input type=date class="form-control" id="txtLastVoted' + (ctr) + '" step="any" required></td> </tr>');

          
            $('#trytry').val(ctr);
             ctr++;

        });//btnadd

        $('#btnRemove').click(function(){
            var x = $('#trytry').val();

            $('#rowName'+x).remove();
            $('#rowContact'+x).remove();
            $('#rowEduc'+x).remove();
            $('#rowPersonal'+x).remove();
            $('#rowEcon'+x).remove();
            $('#rowHealth'+x).remove();
            $('#rowVoter'+x).remove();
            x--;

            $('#trytry').val(x);

        });//btnremove

      });

    </script>


    <script type="text/javascript">
                $(document).ready(function(){
                  
                 var tbl =$('#example2').DataTable({
                              "paging": true,
                              "lengthChange": false,
                              "searching": false,
                              "ordering": true,
                              "info": true,
                              "autoWidth": false,
                              "scrollX":true,
                              "pagingType": "full_numbers",
                              stateSave: true
                            });


                


                   $('#btnSubmit').click(function(e){
                    e.preventDefault();

                    var x = parseInt(document.getElementById("trytry").value); 
                    var houseid = $("#drop").val();

                    $.ajax({
                      type: 'POST',
                      url: 'addFamily',
                      data: {houseid:houseid},
                      success: function(data){
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });

                  
                for(var i = 1; i <= x; i++) {
                



                    var lname = $('#txtLName'+i).val();
                    var fname = $('#txtFName'+i).val();
                    var mname = $('#txtMName'+i).val();
                    var relationhead = $('#txtRelation'+i).val();
                    var restype = $('#txtResidency'+i).val();
                    var bdate = $('#txtBday'+i).val();
                    var bplace = $('#txtBPlace'+i).val();
                    var gender = $("input[name='btnGender" + i +"']:checked").val();
                    var civil = $('#txtCivil'+i).val();
                    var religion = $('#txtReligion'+i).val();
                    var mobileno = $('#txtMobile'+i).val();
                    var telno = $('#txtLine'+i).val();
                    var email = $('#txtEmail'+i).val();
                    var height = $('#txtHeight'+i).val();
                    var weight = $('#txtWeight'+i).val();
                    var healthstat = $('#txtHealthStat'+i).val();
                    var currentstud = $('#txtCurrentStud'+i).val();
                    var currentlevel = $('#txtRecentEd'+i).val();
                    var highestlevel = $('#txtHighestEd'+i).val();
                    var read = $("input[name='btnRead" + i +"']:checked").val();
                    var write = $("input[name='btnWrite" + i +"']:checked").val();
                    var currentemp = $('#txtCurrentEmp'+i).val();
                    var occup = $('#txtOccupation'+i).val();
                    var salary = $('#txtSalary'+i).val();
                    var voter = $('#txtVoter'+i).val();
                    var precintNo = $('#txtPrecintNo'+i).val();
                    var lastVoted = $('#txtLastVoted'+i).val();




                    $.ajax({
                      type: 'POST',
                      url: 'addResident',
                      data: { 
                              houseid:$('#drop').val(),  
                              lname: lname, 
                              fname: fname,
                              mname: mname,
                              relationhead: relationhead,
                              restype: restype,
                              bdate: bdate,
                              bplace: bplace,
                              gender: gender,
                              civil: civil,
                              religion: religion,
                              mobileno: mobileno,
                              telno: telno,
                              email: email,
                              height: height,
                              weight: weight,
                              healthstat: healthstat,
                              currentstud: currentstud,
                              currentlevel: currentlevel,
                              highestlevel: highestlevel,
                              read: read,
                              write: write,
                              currentemp: currentemp,
                              occup: occup,
                              salary: salary,
                              voter: voter,
                              precintNo: precintNo,
                              lastVoted: lastVoted
                            },
                      dataType: 'JSON',
                      success: function(data){
                        alert('Records are successfully added!');
                        tbl.clear().draw();

                        $.each(data.res, function(key, val){
                          tbl.row.add([

                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+val.ResidentID+'" onclick = "modalEdit(this)"> <i class="fa fa-pencil"></i> </button> ',
                            /*'<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" value = "'+val.ResidentID+'" onclick = "modalDelete(this)"><i class="fa fa-remove"></i></button>'*/
                            val.HouseID,
                            val.FamilyID,
                            val.ResidentID,
                            val.LastName+", " + val.FirstName +" "+ val.MidName,
                            val.HouseAddNo+" " + val.HouseStreet +"St. Zone "+ val.HouseZone,
                            val.RelationHead,
                            val.ResidencyStat,
                            val.Birthdate,
                            val.Birthplace,
                            val.Gender,
                            val.CivilStat,
                            val.Religion,
                            val.MobileNo,
                            val.TelNo,
                            val.EmailAdd,
                            val.Height,
                            val.Weight,
                            val.HealthStat,
                            val.CurrStudy,
                            val.CurrLevel,
                            val.HighLevel,
                            val.ReadLiteracy,
                            val.WriteLiteracy,
                            val.CurrEmployed,
                            val.Occupation,
                            val.Salary,                           
                            val.Voter,
                            val.PrecintNo,
                            val.YearLastVoted
                            ]).draw(false);

                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert(error);
                      }//error

                    }).error(function(ts){
                      alert(ts.responseText);
                    });//error



                    $('#txtLName'+i).val("");
                    $('#txtFName'+i).val("");
                    $('#txtMName'+i).val("");
                    $('#txtBday'+i).val("");
                    $('#txtBPlace'+i).val("");
                    $('#txtMobile'+i).val("");
                    $('#txtLine'+i).val("");
                    $('#txtEmail'+i).val("");
                    $('#txtHeight'+i).val("");
                    $('#txtWeight'+i).val("");
                    $('#txtOccupation'+i).val("");
                    $('#txtSalary'+i).val("");



               }//for
               });






              });//document
        </script>

        <script type="text/javascript">
        $(document).ready(function(){

         $("#drop").select2().change(function () {


           // var selectedValue = $(this).val();

                  $.ajax({
                      type: 'POST',
                      url: 'getRInfo',
                      data: {id: $('#drop').val()},
                      dataType: 'JSON',
                      success: function(data){
                        $.each(data.house, function(key, val){
                           $('#txtOwner').val(val.HFirstName+" "+val.HMidName+" "+val.HLastName);
                           $('#txtAddress').val(val.HouseAddNo + " " + val.HouseStreet + " Street, " + "Zone " + val.HouseZone);
                           $('#txtType').val(val.HouseType);
                           $('#tlast').val(val.HLastName);
                           $('#tfirst').val(val.HFirstName);
                           $('#tmiddle').val(val.HMidName);
                           
                        });


                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
          });
        });


        </script>

  <script type="text/javascript">
                function modalEdit(x){



                  $.ajax({
                      type: 'POST',
                      url: 'getResInfo',
                      data: {id: x.value},
                      dataType: 'JSON',
                      success: function(data){
                        $.each(data.resi, function(key, val){
                        //Age Computation
                          var dob = val.Birthdate;
                          dob = new Date(dob);
                          var today = new Date();
                          var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                        //Health
                          var height = parseFloat(val.Height); 
                          var weight = parseInt(val.Weight); 
                          var c = (weight/(height*height));
                          var n = c.toFixed(2);

                          $('#etxtBMI').val(n);
                          $('#etxtAge').val(age);
                          $('#etxtID').val(val.ResidentID);
                           $('#etxtFName').val(val.FirstName);
                          $('#etxtLName').val(val.LastName);
                          $('#etxtMName').val(val.MidName);
                          $('#etxtRelation').val(val.RelationHead);
                          $('#etxtResidency').val(val.ResidencyStat);
                          $('#etxtBday').val(val.Birthdate);
                          $('#etxtBPlace').val(val.Birthplace);
                          $('#ebtnGender').val(val.Gender);
                          $('#etxtCivil').val(val.CivilStat);
                          $('#etxtReligion').val(val.Religion);
                          $('#etxtMobile').val(val.MobileNo);
                          $('#etxtLine').val(val.TelNo);
                          $('#etxtEmail').val(val.EmailAdd);
                          $('#etxtHeight').val(val.Height);
                          $('#etxtWeight').val(val.Weight);
                          $('#etxtHealthStat').val(val.HealthStat);
                          $('#etxtCurrentStud').val(val.CurrStudy);
                          $('#etxtHighestEd').val(val.HighLevel);
                          $('#etxtRecentEd').val(val.CurrLevel);
                          $('#ebtnRead').val(val.ReadLiteracy);
                          $('#ebtnWrite').val(val.WriteLiteracy);
                          $('#etxtCurrentEmp').val(val.CurrEmployed);
                          $('#etxtOccupation').val(val.Occupation);
                          $('#etxtSalary').val(val.Salary);
                          $('#etxtVoter').val(val.Voter);
                          $('#etxtPrecintNo').val(val.PrecintNo);
                          $('#etxtLastVoted').val(val.YearLastVoted);
                        });


                      }
                    });
                }


                function modalDelete(x){

                  $.ajax({
                      type: 'POST',
                      url: 'getResInfo',
                      data: {id: x.value},
                      dataType: 'JSON',
                      success: function(data){
                        $.each(data.resi, function(key, val){
                          $('#dtxtID').val(val.ResidentID);
                          $('#dtxtFName').val(val.FirstName);
                          $('#dtxtMName').val(val.MidName);
                          $('#dtxtLName').val(val.LastName);
                        });


                      }
                    });


                }

</script>


<script type = text/javascript>
    function getHealth(x)
    {
      
       
        var i = parseInt(x);
        var height = parseFloat(document.getElementById("txtHeight"+i).value); 
        var weight = parseInt(document.getElementById("txtWeight"+i).value); 

        var c = (weight/(height*height));
        var n = c.toFixed(2);
        $('#txtBMI'+i).val(n);

        
        if(n < 16){
            document.getElementById('txtHealthStat'+i).value = "Severely Underweight";}
        else if (n >= 16 && n < 18.5){
            document.getElementById('txtHealthStat'+i).value = "Underweight";}
        else if (n >= 18.5 && n < 25){
            document.getElementById('txtHealthStat'+i).value = "Normal";}
       else if (n >= 25 && n < 30){
            document.getElementById('txtHealthStat'+i).value = "Overweight";}
        else if (n >= 30){
            document.getElementById('txtHealthStat'+i).value = "Obese";}
        else if (n == null){
            document.getElementById('txtHealthStat'+i).value = "Jom";}

      
    }//Health


     function getEduc(x)
    {   

        var i = parseInt(x);

        if(document.getElementById('txtCurrentStud'+i).value == "Yes" )
        {
            document.getElementById('txtRecentEd'+i).disabled = false;
            $('#txtRecentEd'+i).val("");
            document.getElementById('txtHighestEd'+i).disabled = true;

        }
        else if(document.getElementById('txtCurrentStud'+i).value == "No" )
        {
            document.getElementById('txtRecentEd'+i).disabled = true;
            document.getElementById('txtHighestEd'+i).disabled = false;
            $('#txtHighestEd'+i).val("");

        }
        else
        {
            document.getElementById('txtRecentEd'+i).disabled = true;
            document.getElementById('txtHighestEd'+i).disabled = true;
        }
    }//Educ

    function getEcon(x)
    {
        var i = parseInt(x);
        
        if(document.getElementById('txtCurrentEmp'+i).value == "Yes" )
        {
            document.getElementById('txtOccupation'+i).disabled = false;
            document.getElementById('txtSalary'+i).disabled = false;

        }
        else if(document.getElementById('txtCurrentEmp'+i).value == "No" )
        {
            document.getElementById('txtOccupation'+i).disabled = true;
            document.getElementById('txtSalary'+i).disabled = true;

        }
    }//Econ

    function getVoterClick(x)
    {
        var i = parseInt(x);
        
        if(document.getElementById('txtVoter'+i).value == "Yes" )
        {
            document.getElementById('txtPrecintNo'+i).disabled = false;
            document.getElementById('txtLastVoted'+i).disabled = false;

        }
        else if(document.getElementById('txtVoter'+i).value == "No" )
        {
            document.getElementById('txtPrecintNo'+i).disabled = true;
            document.getElementById('txtLastVoted'+i).disabled = true;

        }
    }//VoterClick

    function getAge(x)
    {
     
      var dob = $('#txtBday'+x).val();
      dob = new Date(dob);
      var today = new Date();
      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
      $('#txtAge'+x).val(age);
    }//age


    function checkOwner(x) {

      var last =  $('#tlast').val();
      var first =  $('#tfirst').val();
      var mid =  $('#tmiddle').val();


      if (x.checked)
        {
             $('#txtLName1').val(last);
             $('#txtFName1').val(first);
             $('#txtMName1').val(mid);
        }

      else {
        $('#txtLName1').val(" ");
        $('#txtFName1').val(" ");
        $('#txtMName1').val(" ");
      }
}

    function checkLastName(z) {

      var x = parseInt(document.getElementById("trytry").value);
      var last = $('#txtLName1').val(); 


      if (z.checked)
        { 
            for(var i = 1; i <= x; i++) {

              $('#txtLName'+i).val(last);
            }//for
        }//if

      else {
            for(var i = 1; i <= x; i++) {
                  $('#txtLName'+i).val(" ");
                }//for
      }//else
    }//lastname

    function searchFunction() {
    // Declare variables 
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchFilter");
    filter = input.value.toUpperCase();
    table = document.getElementById("example2");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[4];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      } 
    }
  }//searchFunction

    function VoterOnly(cb)
    {
        if (document.getElementById('checkVoters').checked) 
        {
            var input, filter, table, tr, td, i, txtValue;
            input = "Yes";
            filter = input.toUpperCase();
            table = document.getElementById("example2");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[27];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              } 
            }
        } else {
          var input, filter, table, tr, td, i, txtValue;
            input = "";
            filter = input.toUpperCase();
            table = document.getElementById("example2");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[27];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              } 
            }
        }
    }//VoterOnly
</script>


 </section>
 @stop