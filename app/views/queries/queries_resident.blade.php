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
                            <tr><td><input type="checkbox" name="Status" value="Own House">House Owner</td></tr>
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

<!--**********************tab 2**************-->
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

<!--Tab 3-->
            <div class="tab-pane" id="tab_3">
              
               <div class="col-md-3"><br>
                     <label>Currently Studying?</label>
                        <select class="form-control" style="width: 175px" id="CurrentlyStudying">
                          <option value="Yes" checked>Yes</option>
                          <option value="No">No</option>
                        </select>
                </div>

                <div class="col-md-3" id="CurrentEdulevel"><br>
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

                <div class="col-md-3" id="HighestEduAttain" style="display:none"><br>
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
                       <label>Currently Employee / Earning?</label>
                          <select class="form-control" style="width: 175px" id="CurrenltyEmployee">
                            <option value="Yes" checked>Yes</option>
                            <option value="No">No</option>
                          </select>
                  </div>

                    <div class="col-md-3" id="Salary"><br>
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
              <center>
              <div>
                <button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnResident">Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;
                </button>
              </center>
              </div>
</div>

 <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">


//PERSONAL DETAILS
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


//HEALTH DETAILS
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

//EDUCATION DETAILS

    $("#CurrentEdu").click(function(){
        $("input[name='CurEdu']").not(this).prop('checked', this.checked);
    });

    $('#CurrentlyStudying').change(function(){
      if ($('#CurrentlyStudying').val()=='No')
      {
        $('#HighestEduAttain').show();
        $('#CurrentEdulevel').hide();
      }

      else
      {
        $('#HighestEduAttain').hide();
        $('#CurrentEdulevel').show();
      }

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


//ECONOMIC DETAILS

    $("#CurrenltyEmployee").change(function(){
        if ($('#CurrenltyEmployee').val()=='Yes')
          $('#Salary').show();
        else
          $('#Salary').hide();
    
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
    var CurStudArr;
    var ReadArr = [];
    var WriteArr = [];
    var HighArr = [];
    var CurEduArr = [];
    var EmpArr = [];
    var SalaryArr = [];

//PERSONAL DETAILS
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
      GenderArr.push(null);

    var CivilArr= [];
      $.each($("input[name='CivilStatus']:checked"), function(){            
          CivilArr.push($(this).val());
      });
      CivilArr.push(null);

    var StatusArr= [];
      $.each($("input[name='Status']:checked"), function(){            
          StatusArr.push($(this).val());
      });
      StatusArr.push(null);

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

      
//HEALTH DETAILS
    HealthArr= [];
      $.each($("input[name='HealthCat']:checked"), function(){            
          HealthArr.push($(this).val());
      });
      HealthArr.push(null);

    HArr.push($('#HFrom').val());
    HArr.push($('#HTo').val());

    WArr.push($('#WFrom').val());
    WArr.push($('#WTo').val());

//EDUCATION DETAILS

    $.each($("input[name='read']:checked"), function(){            
            ReadArr.push($(this).val());
        });
    ReadArr.push(null);

    $.each($("input[name='write']:checked"), function(){            
           WriteArr.push($(this).val());
        });
    WriteArr.push(null);

    $.each($("input[name='HighEdu']:checked"), function(){            
           HighArr.push($(this).val());
        });
    HighArr.push(null);

    $.each($("input[name='CurEdu']:checked"), function(){
          CurEduArr.push($(this).val());
         });
    CurEduArr.push(null);

    if ($('#CurrentlyStudying').val()=='Yes')
      CurStudArr= "Yes";
    else
      CurStudArr= "No";

//ECONOMIC DETAILS
    if ($('#CurrenltyEmployee').val()=='Yes')
      EmpArr= "Yes";
    else
      EmpArr= "No";

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
</script>