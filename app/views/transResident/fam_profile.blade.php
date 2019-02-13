@extends('layouts.master')

@section('content')


	
		<section class="content-header">
            <h1>
              Manage Residents
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
              <li><a href="#"> Manage Residents</a></li>
              <li class="active">Family Profile</li>
            </ol>
          </section>

         <section class = "content">

		<div class="row">


              <!--right side-->
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Family Profile</h3>
                     <button class="btn btn-flat btn-danger pull-right" id="btnDeact" data-toggle="modal" data-target="#deactivate"><i class="fa fa-user-times"></i>    Deactivate</button>&nbsp;&nbsp;
                     <button class="btn btn-flat  pull-right" id="btnChange" data-toggle="modal" data-target="#changeHouse"><i class="fa fa-pencil"></i>    Edit House </button>
                     
                  </div><!-- /.box-header --> 
                  
                  <div class="box-body">


                     <div class="well">
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-6">
                              <table>
                                <tbody>
                                  <tr>
                                      <td width="200px"><label><span class="label label-warning">Family ID</span> </label> <input type=text value = "{{ $fam[0] -> FamilyID}}" id="txtfamID" hidden><input type=text value = "{{ $fam[0] -> HouseID}}" id="txtHouseID" hidden></td>
                                      <td> {{ $fam[0] -> FamilyID}}</td>
                                  </tr>

                                  <tr>
                                      <td width="200px"><label><span class="label label-warning">House ID</span></label></td>
                                      <td> {{ $fam[0] -> HouseID}}</td><br>
                                  </tr>
                                  
                                  <tr>
                                      <td width="200px"><label><span class="label label-warning">House Owner</span> </label></td>
                                      <td> {{ $fam[0] -> HFirstName}} {{ $fam[0] -> HMidName}} {{ $fam[0] -> HLastName}} </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-6">
                               <table>
                                <tbody>
                                  <tr>
                                    <td width="200px"><label><span class="label label-warning">House Address</span> </label></td>
                                    <td> {{ $fam[0] -> HouseAddNo}} {{ $fam[0] -> subdivisionName}} {{ $fam[0] -> compName}} {{ $fam[0] -> StreetName}} St, Zone {{ $fam[0] -> HouseZone}} </td>
                                  </tr>
                                  <tr>
                                    <td width="200px"><label><span class="label label-warning">House Type</span> </label></td>
                                    <td> {{ $fam[0] -> HouseType}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                     </div>

                     <div class="col-md-12">
                      <div class="box-header">
                        <span style="font-size: 18px"><i class="fa fa-users"></i> &nbsp; &nbsp;Family Members</span>
                        <button class="btn btn-info btn-flat pull-right" data-toggle="modal" data-target="#edit">   Add New Member</button><br><br>
                      </div>
                        <table id="tblFam" class="table table-bordered">
                          <thead> 
                            <tr>
                              <th>Resident ID</th>
                              <th>Name</th>
                              <th>Relation to the Head</th>
                              <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                          @foreach($fam as $fam)
                            <tr>
                                <td align="center"><span class="label label-warning">{{ $fam -> ResidentID}}</span></td>
                                <td>{{ $fam -> FirstName}} {{ $fam ->  MidName}} {{ $fam -> LastName}} </td>
                                <td>{{ $fam -> RelationHead}}</td>
                                <td><button class="btn btn-flat btn-primary btn-xs" id="btnMove" data-toggle="modal" data-target="#moveMember" onclick = "moveRes({{$fam->ResidentID}})"><i class="fa fa-share"></i>    Move </button>
                                    <button class="btn btn-flat btn-danger btn-xs" id="btnfaminfo" data-toggle="modal" data-target="#faminfo"  onclick="deactRes({{ $fam -> ResidentID}})"><i class="fa fa-times"></i>     Delete</button>
                                </td>

                            </tr>
                          @endforeach
                          </tbody>
                        </table>
                     </div>
                   
                  </div> <!-- box-body -->
                </div>
              </div>
            </div><!--row-->

          @include('transResident.new_member')



        <div class="modal fade" id="changeHouse">
          <div class="modal-dialog">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Move to Another House</h4>
              </div>
              <!-- modal content -->
              <div class="modal-body">
            
                  <div class="box-body">

                    <div class="form-group">
                            
                            <div class="col-md-6">
                             <label>Search</label>
                             <select  class="form-control select2" style="width: 100%"
                                      id = "drop">
                                  <option selected="" disabled="">Select Household</option>
                                  @foreach($house as $hh)
                                      <option value = "{{ $hh -> HouseID}}"> ( {{ $hh -> HouseID}} ) {{ $hh -> HFirstName}} {{ $hh -> HMidName}} {{ $hh -> HLastName}}, {{ $hh -> HouseAddNo}} {{ $hh -> subdivisionName}} {{ $hh -> compName}} {{ $hh -> StreetName}} St, Zone {{ $hh -> HouseZone}} </option>
                                  @endforeach

                             </select>
                            </div>
 
                            <div class="col-md-6">
                             <label>House Owner</label>
                             <input type=text class="form-control" id="txtOwner" readonly>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-6">
                             <label>Address</label>
                             <input type=text class="form-control" id="txtAddress" readonly>
                            </div>

                             <div class="col-md-6">
                             <label>Type</label>
                             <input type=text class="form-control"  id="txtType" readonly>
                             <input type="text" value=1 id="trytry" name="trytry" hidden>
                            </div>
                    </div>

                  </div>

              </div>
                  <!-- /.box-body -->

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btnHouse" data-dismiss="modal">Save</button>

              </div><!-- /.modal-content -->
              
                </div>
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        
        </div>


        <!-- second button -->
        <div class="modal fade" id="faminfo">
          <div class="modal-dialog">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
                <div class="form-horizontal" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you you want to deactivate this record? </h4>
              </div>
              <!-- modal content -->
              <div class="modal-body">
            
                  <div class="box-body" id = "faminfoBody">
                    

                    <div class="form-group">
                            
                            <div class="col-md-4 form-inline">
                                <label>Name: </label>
                                <input type=text class="form-control"  id="deactResName" readonly>
                            </div>

                            <div class="col-md-4 form-inline">
                                <label>Head: </label>
                                <input type=text class="form-control"  id="deactResRelation" readonly>
                            </div>

                            <div class="col-md-4 form-inline">
                              <label>Reason: </label>
                              <select class="form-control" style="width: 150px;" id = "reason">
                                  <option >Deceased</option>
                                  <option >Moved out</option>

                              </select>
                            </div>

                      </div>

                      <input type = "text" value="0" id = "famID">
                  </div>
                </div>
                  <!-- /.box-body -->


              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btnLilipatNa" data-dismiss="modal">Save</button>

              </div><!-- /.modal-content -->
              
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
      </div>


          <!-- move button -->
        <div class="modal fade" id="Movefamily">
          <div class="modal-dialog">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
                <div class="form-horizontal" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> </h4>
              </div>
              <!-- modal content -->
              <div class="modal-body">
            
                  <div class="box-body">

                    <div class="form-group">
                            
                            <div class="col-md-6 form-inline">
                                <label>Name: </label>
                                <input type=text class="form-control"  id="txtType" readonly>
                            </div>

                            <div class="col-md-6 form-inline">
                              <select class="form-control" style="width: 150px;">
                                  <option value="#">Drop</option>
                                  <option value="#">Drop</option>
                              </select>
                            </div>
                      </div>
                  </div>
                </div>
              </div>
                  <!-- /.box-body -->


              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btnHouse" data-dismiss="modal">Save</button>

              </div><!-- /.modal-content -->
              
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>


         <div class="modal fade" id="deactivate">
          <div class="modal-dialog">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
                <div class="form-horizontal" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you want to DEACTIVATE this family?
                </h4>
              </div>
              <!-- modal content -->
              <div class="modal-body">
            
                  <div class="box-body">

                    <!-- s -->
                  </div>

                </div>
                  <!-- /.box-body -->


              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id = "btnDeactivate" data-dismiss="modal">Delete</button>
              </div><!-- /.modal-content -->
              
            </div></div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        
        </div>
      

        

        <!-- move button -->
        <!-- second button -->
        <div class="modal fade" id="moveMember">
          <div class="modal-dialog" style="width:450px">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
                <div class="form-horizontal" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Move Resident</h4>
              </div>
              <!-- modal content -->
              <div class="modal-body">
            
                  <div class="box-body">
                    <form>

                    <div class="form-group">
                        <div class="form-group">

                            <div class="col-md-6">

                                <input type="radio" class="radiobtn" name="radioMove" id="radioMove" value="member" checked>&nbsp;As Member<br>
                                    <br>
                            </div>

                            <div class="col-md-6">
                                <input type="radio" class="radiobtn" name="radioMove" id="radioMove" value="new">&nbsp;As New Family<br>
                                     <br>
                            </div>
                            <input type = "hidden"  id = "hiddenRes">
                            <div class="col-md-12">
                                <label>New House</label>
                                <select class="form-control select2" style="width:100%" id="autoHouse" name="autoHouse">
                                          <!-- <option value="#">Household</option> -->
                                      </select><br>
                            </div>
                        </div>

                        <hr>

                          <div class="form-group" id="formMember">
                            <div class="col-md-12">
                                  <label>New Family</label>
                                     <select class="form-control" id="mtxtFam" name="mtxtFam" style="width:100%">
                                          <option value="#">Family</option>
                                      </select><br>
                            </div>

                          
                            <div class="col-md-6">
                                <label>New Family ID</label>
                                <input class="form-control" type="text" id="mtxtFamID" name="mtxtFamID" disabled><br>
                                     
                            </div>

                            <div class="col-md-6">
                                <label>Head of the New Family</label>
                                <input class="form-control" type="text" id="mtxtHead" name="mtxtHead" disabled><br>
                                     
                            </div>

                            <div class="col-md-12">
                                <label>Relation to the Head</label>
                                <select class="form-control" type="text" id="mtxtRelation" name="mtxtRelation" align="center"><option>Husband</option><option>Wife</option><option>Son</option><option>Daughter</option><option>Son-in-law</option><option>Daughter-in-law</option><option>Father-in-law</option><option>Mother-in-law</option><option>Grandson</option><option>Granddaughter</option><option>Father</option><option>Mother</option><option>Relative-male</option><option>Relative-female</option><option>Househelp-male</option><option>Househelp-female</option><option>Tenant/Boarder</option></select><br>
                                     
                            </div>
                          </div>


                          <div class="form-group" id="formNew" hidden>
                            <div class="col-md-6">
                                <label>House ID</label>
                                <input class="form-control" type="text" id="mtxtHouseID" name="mtxtHouseID" disabled><br>
                                     
                            </div>

                            <div class="col-md-6">
                                <label>Owner</label>
                                <input class="form-control" type="text" id="mtxtOwner" name="mtxtOwner" disabled><br>
                                     
                            </div>

                            <div class="col-md-6">
                                <label>Address</label>
                                <input class="form-control" type="text" id="mtxtAdd" name="mtxtAdd" disabled><br>
                                     
                            </div>

                            <div class="col-md-6">
                                <label>Type</label>
                                <input class="form-control" type="text" id="mtxtType" name="mtxtType" disabled><br>
                                     
                            </div>

                            
                          </div>
                      </div>
                  </div>
                </div>
                  <!-- /.box-body -->


              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btnTransfer" data-dismiss="modal">Save</button>

              </div><!-- /.modal-content -->
              
            </div>
            <!-- /.modal-dialog -->
            </div>
            </div>
          </div>
          <!-- /.modal -->




          <script type="text/javascript">
        $(document).ready(function(){

            $(".radiobtn").change(function(e) {  
          
               if ($("input[name=radioMove]:checked").val() == "new") { 
                 
                  $("#formNew").show(); 
                 $("#formMember").hide(); 



               
               } else { 

                 $("#formMember").show();
                $("#formNew").hide();

                 }

            });


         $("#drop").select2().change(function () {


           // var selectedValue = $(this).val();

                  $.ajax({
                      type: 'POST',
                      url: 'getInfo',
                      data: {id: $('#drop').val()},
                      dataType: 'JSON',
                      success: function(data){
                        $.each(data.house, function(key, val){
                           $('#txtOwner').val(val.HFirstName +" "+ val.HMidName +" "+ val.HLastName);
                           $('#txtAddress').val(val.HouseAddNo + " " + val.HouseStreet + " Street, " + "Zone " + val.HouseZone);
                           $('#txtType').val(val.HouseType);
                           
                        });


                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
          });//drop
          });//document

          </script>

      <script type="text/javascript">
        $(document).ready(function(){

          $('#autoHouse').select2();
          $('#mtxtFam').select2();

          $('#autoHouse').change(function(){
            $('#mtxtFam').empty();
            $.ajax({
              type:'POST',
              url: 'getfamilyperhouse',
              data: {houseid: $(this).val()},
              dataType: 'JSON',
              success: function(data){
                //alert(JSON.stringify(data));
                 $.each(data.fam, function(key, val){
                   $('#mtxtFam').append('<option value = "'+val.FamilyID+'">('+val.FamilyID+') '+val.FirstName+' '+val.LastName+'</option>');

                 });

                 $.each(data.house, function(key, val){
                          $('#mtxtHouseID').val(val.HouseID);
                           $('#mtxtOwner').val(val.HFirstName +" "+ val.HMidName +" "+ val.HLastName);
                           $('#mtxtAdd').val(val.HouseAddNo + " " + val.HouseStreet + " Street, " + "Zone " + val.HouseZone);
                           $('#mtxtType').val(val.HouseType);
                           
                        });



                  
              },error: function(request, error)
              {
                alert(error);
              }
            }).error(function(ts){
              alert(ts.responseText);
            });
          });

          $('#mtxtFam').change(function(){
            $.ajax({
              type: 'POST',
              url: 'getfamilyinfo',
              data: {famid: $(this).val()},
              dataType: 'JSON',
              success: function(data){

                $('#mtxtFamID').val(data.famInfo[0].FamilyID);
                $('#mtxtHead').val(data.famInfo[0].FirstName+" "+data.famInfo[0].LastName);

              }
            });
          });

          $('#btnTransfer').click(function(){
            alert($('input[name=radioMove]:checked').val());
            if($('input[name=radioMove]:checked').val()=="member")
            {
              alert("member " +$('#hiddenRes').val());

              $.ajax({
                type: 'POST',
                url: 'transferResident',
                data: {
                        newhouseid: $('#autoHouse').val(),
                        newfamid: $('#mtxtFam').val(),
                        relation: $('#mtxtRelation').val(),
                        resid: $('#hiddenRes').val(),
                        oldfamid: $('#txtfamID').val(),
                        oldhouseid: $('#txtHouseID').val()},
                dataType: 'JSON',
                success: function(data){
                    alert(newhouseid);
                    alert(newfamid);
                    alert(relation);
                    window.location.href = "{{URL::to('transRes')}}";
                },error: function(request, error){
                  alert(error);
                }
              }).error(function(ts){
                alert(ts.responseText);
              });
            }
            else
            {
              $.ajax({
                type: 'POST',
                url: 'transferNewResident',
                data: {newhouseid: $('#autoHouse').val(),
                        resid: $('#hiddenRes').val(),
                        oldfamid: $('#txtfamID').val(),
                        oldhouseid: $('#txtHouseID').val()},
                dataType: 'JSON',
                success: function(data){
                    alert(JSON.stringify(data));
                    window.location.href = "{{URL::to('transRes')}}";
                },error: function(request, error){
                  alert(error);
                }
              }).error(function(ts){
                alert(ts.responseText);
              });
            }
          });

          




                $('#btnHouse').click(function(e){
                 // alert('haha');
                    e.preventDefault();
                    //var txt1 = $('#drop').val();


                    $.ajax({
                      type: 'POST',
                      url: 'updateHouse',
                      data: {txt1: $('#drop').val(),
                              txtfamID: $('#txtfamID').val()},
                      dataType: 'JSON',
                      success: function(data){
                     //   alert(JSON.stringify(data));
                        alert("Moving on successful!");
                        //redirect
                        window.location.href = "{{URL::to('famProfile')}}?houseid="+$('#drop').val()+"&familyid="+$('#txtfamID').val()+"";


                      },
                      error: function(request, error){
                        alert(error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
                  //update
            });


                  $('#btnDeactivate').click(function(e){
                    e.preventDefault();
                    //var txt1 = $('#drop').val();


                    $.ajax({
                      type: 'POST',
                      url: 'deactFam',
                      data: {txt1: $('#drop').val(),
                              txtfamID: $('#txtfamID').val()},
                      dataType: 'JSON',
                      success: function(data){
                        alert("Deactivating successful!");
                     
                        window.location.href = "{{URL::to('transRes')}}"


                      },
                      error: function(request, error){
                        alert(error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
                  //update

        });//deact

        $('#btnLilipatNa').click(function(){
          $.ajax({
            type: 'POST',
            url: 'changeRelation',
            data: {famID: $('#famID').val(),
                    reason: $('#reason').val()},
            dataType: 'JSON',
            success: function(data){
                   // alert(JSON.stringify(data));

              $.each(data.rID, function(key, val){
                $.ajax({
                  type:'POST', 
                  url: 'changeRelation2',
                  data:{relation: $('#select_'+val.ResidentID).val(),
                        resID: val.ResidentID},
                  dataType: 'JSON',
                  success: function(data2){
                   // alert(JSON.stringify(data2));
                    window.location.href = "{{URL::to('famProfile')}}?houseid="+$('#txtHouseID').val()+"&familyid="+$('#txtfamID').val()+"";
                  }
                });
              });
              
            },error: function(request, error){
                        alert(error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
        });
});//document

        </script>

        <script type="text/javascript">
          function deactRes(id)
          {
            $.ajax({
              type: 'POST',
              url: 'getRes',
              data: {resID: id},
              dataType: 'JSON',
              success: function(data){
                $('#faminfoBody h4').remove();
                $('#faminfoBody table').remove();
                if(data.res[0].RelationHead == "Head")
                {
                  $('#deactResName').val(data.res[0].FirstName+ " " + data.res[0].LastName);
                  $('#deactResRelation').val(data.res[0].RelationHead);


                  $('#faminfoBody').append('<h4>Edit Members Relation</h4>');
                  //$('#faminfoBody').append('<input type = "text" value = "'+data.res[0].FamilyID+'" id = "famID">');
                  $('#famID').val(data.res[0].FamilyID);

                     $('#faminfoBody').append('<table class="table table-bordered" id = "tblmembers"> <thead> <th>Name</th> <th>Relation to the Head</th> </thead> <tbody>  </tbody> </table>');  

                  $.each(data.members, function(key, val){

                    if(val.RelationHead != "Head"){
                      $('#tblmembers tbody').append('<tr>  <td>'+val.FirstName + " " + val.LastName+'</td>  <td><select class="form-control" id = "select_'+val.ResidentID+'"><option>Head</option><option>Husband</option><option>Wife</option><option>Son</option><option>Daughter</option><option>Son-in-law</option><option>Daughter-in-law</option><option>Father-in-law</option><option>Mother-in-law</option><option>Grandson</option><option>Granddaughter</option><option>Father</option><option>Mother</option><option>Relative-male</option><option>Relative-female</option><option>Househelp-male</option><option>Househelp-female</option><option>Tenant/Boarder</option></select></td> </tr>')
                      }
                  });
                  


                } 
                else
                {
                  $('#deactResName').val(data.res[0].FirstName+ " " + data.res[0].LastName);
                  $('#deactResRelation').val(data.res[0].RelationHead);
                }
              },
              error: function(request, error){
                alert(error);
              }
            });
          }


          function moveRes(x)
          {
            $.ajax({
              type: 'GET',
              url: 'gethousefamily',
              dataType: 'JSON',
              success: function(data){
                $('#hiddenRes').val(x);
                //alert(JSON.stringify(data));
                $.each(data.house, function(key, val){
                  if(val.HouseID != $('#txtHouseID').val())
                  {
                    $('#autoHouse').append('<option value = "'+val.HouseID+'">('+val.HouseID+') '+val.HFirstName +" "+ val.HMidName +" "+ val.HLastName+', '+val.HouseAddNo+' '+val.HouseStreet+' Zone '+val.HouseZone+'</option>');
                  }
                });

                // $.each(data.family, function(key, val){
                //   if(val.FamilyID != $('#txtfamID').val())
                //   {
                //     $('#mtxtFam').append('<option value = "'+val.HouseID+'">('+val.FamilyID+') '+val.FirstName+'</option>');
                //   }
                // });
              }
            }).error(function(ts){
              alert(ts.responseText);
            });
          }
        </script>

    </section>

     




@stop