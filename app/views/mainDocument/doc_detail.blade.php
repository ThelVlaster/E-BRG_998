@extends('layouts.master')

@section('content')
          <section class="content-header">
            <h1>
              Maintenance <small>Document Details</small>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo 'maintenanceMenu' ?>"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Document</a></li>
              <li class="active">Document Details</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">
        <div class = "row">
          <div class="col-md-12">

            <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Document Template</a></li>
                          <li><a href="#tab_2" data-toggle="tab">List of Document Templates</a></li>
                         
                        </ul>

                      
                <div class="tab-content" style="overflow: auto">
                         
                  <div class="tab-pane active" id="tab_1">
                 


                   <form role="form" onsubmit = "return false">
                    <!--{{Form::open(array('id' => 'formform', 'files' => true, 'url' => '/addDocumentDetails', 'onsubmit' => 'return false'))}}
                      -->
                      <div class="box-body">
                      <div id="Message"></div>

                    <div class="col-md-12">

                      <div class = "col-md-8">
                        <div class = "well">
                          <div class = "row">

                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Name*</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="txtDocName" 
                                       name="txtDocName" 
                                       placeholder="Name"
                                       required="required">
                              </div>
                            </div>

                           
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Type*</label>
                                <select class="form-control"
                                        id = "txtClassification"
                                        name = "txtClassification"
                                        >
                                        <option disabled="" selected="">Select Type</option>
                                        <option value = "1">Regular Document</option>
                                        <option value = "2">Business Document</option>

                                        
                                </select>
                                
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group" id="avail" hidden>
                                <label for="exampleInputEmail1">Availability</label>
                                <select class="form-control"
                                        id = "txtAvail"
                                        name = "txtAvail"
                                        >
                                        <option disabled="" selected="">Select Availability</option>
                                        <option value = "1">Resident only</option>
                                        <option value = "2">All</option>

                                        
                                </select>
                                
                              </div>
                            </div>
                          </div>

                          <div class="row">  
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Select Template*</label>
                                <select class="form-control"
                                        id = "txtTemplate"
                                        name = "txtTemplate"
                                        >
                                        <option disabled="" selected="">Select Template</option>
                                        @foreach($template as $t)
                                            <option value = "{{ $t -> TemplateID}}"> {{ $t -> TemplateName}} ({{$t -> TemplateSize}} {{$t -> TemplateOrientation}})</option>
                                        @endforeach 
                                </select>
                                
                              </div>
                            </div>


                            



                             <div class="col-md-4">
                              <div class="form-group">
                                <label>Regular Fee*</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="txtFee"
                                       name="txtFee"
                                       required="required">
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Duplicate Copy Fee*</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="txtDupFee"
                                       name="txtDupFee"
                                       required="required">
                              </div>
                            </div>


                          </div><!--row-->
                        </div>
                      </div>
                      
                      
                      

                      

                      

                       <div class="col-md-4">
                        <div class = "well">
                          <div class = "row">

                              <div class="col-md-12">
                                  <label>Margin</label>
                                
                                </div>

                             <div class="form-group">
                          
                                <div class="col-md-6">
                                  <label></label>
                                  <div class="input-group">
                                    <span class="input-group-addon">Top</span>
                                    <input type="number" 
                                           class="form-control" 
                                           id="txtMTop"
                                           name="txtMTop"
                                           placeholder="in pixels"
                                           value = "21">
                                  </div>
                                </div>
                            
                                <div class="col-md-6">
                                <label></label>
                                  <div class="input-group">
                                    <span class="input-group-addon">Bottom</span>
                                    <input type="number" 
                                           class="form-control" 
                                           id="txtMBottom"
                                           name="txtMBottom"
                                           placeholder="in pixels"
                                           value="7">
                                    </div>
                                </div>

                             
                                <div class="col-md-6">
                                <label></label>
                                  <div class="input-group">
                                    <span class="input-group-addon">Left</span>
                                  <input type="number" 
                                         class="form-control" 
                                         id="txtMLeft"
                                         name="txtMLeft"
                                         placeholder="in pixels"
                                         value="25"
                                         >
                                </div>
                                </div>
                     
                                <div class="col-md-6">
                                <label></label>
                                  <div class="input-group">
                                    <span class="input-group-addon">Right</span>
                                  <input type="number" 
                                         class="form-control" 
                                         id="txtMRight"
                                         name="txtMRight"
                                         placeholder="in pixels"
                                         value="2"
                                         >
                                </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <center><button type="submit" 
                                        class="btn btn-success btn-flat"
                                        id = "btnSubmit"
                                        disabled>Submit</button></center>
                      </div>
                    </div> <!--col-md-12-->
                  </form>


                  <div class="col-md-12" style="overflow:auto">
                  <div class="box box-solid">
                    <div class="box-header">
                      <h3 class="box-title">Document Template</h3>
                      <button type="button" class="btn btn-success pull-right" id="btnCTemp">Confirm Template</button>
                      <button type="button" class="btn btn-success pull-right" id="btnETemp" disabled="">Edit Template</button>
                    </div><!-- /.box-header -->
                    <center>
                      <div class="box-body pad" style = "position:relative;" id = "hey" center>
                        <div id = "forBG" style=" position: inherit; left: 0; top: 0; right: 0;  ; height: 1120px; width:807px;  border: 1px solid black;">

                        <img id = "actualBG" src = "" width = "100%" height="100%"/>
                          
                          <div id = "forTextArea" style="text-align:left;position: absolute; left: 250px; top: 210px; right: 20px; bottom:70px">
                              <textarea id = "Template" name = "Template" class="textarea" placeholder="Place some text here" style="width: 100%; height: 90%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; overflow: hidden;"></textarea>

                              <div id = "plsWorkJesus"></div>
                           
                          </div>
                        </div>
                      </div>
                    </center>
                  </div>
                </div>

                  </div><!-- tab_1 -->

                  <div class="tab-pane" id="tab_2">
                    <div class="col-md-12" style="position: initial;">
                        <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Regular Fee</th>
                                <th>Duplicate Fee</th>
                                <th>Classification</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($dDetails as $dd)
                              <form>
                                <tr>
                                  <td>{{ $dd ->  DocumentID}}</td>
                                  <td>{{ $dd ->  DocumentName}}</td>
                                  <td>{{ $dd ->  DocumentFee}}</td>
                                  <td>{{ $dd ->  DuplicateFee}}</td>
                                  @if($dd->DocAvail == "1")
                                  <td>{{ $dd ->  DocClass}} (Resident Only)</td>
                                  @elseif($dd->DocAvail == "2")
                                  <td>{{ $dd ->  DocClass}} (All)</td>
                                  @elseif($dd->DocAvail == "0")
                                   <td>{{ $dd ->  DocClass}}</td>
                                  @endif
                                  <td><button class="btn btn-xs btn-primary btn-flat"
                                              data-toggle = "modal"
                                              data-target = "#view"
                                              onclick = "modalView({{ $dd -> DocumentID }})"> <i class="fa fa-eye"></i></button>

                                      <button class="btn btn-xs btn-success btn-flat"
                                              data-toggle = "modal"
                                              data-target = "#edit"
                                              onclick = "modalEdit({{ $dd -> DocumentID }})">
                                                <i class="fa fa-pencil"></i>
                                      </button>
                                    <button class="btn btn-xs btn-danger btn-flat"
                                              data-toggle = "modal"
                                              data-target = "#delete"
                                              onclick = "modalDelete({{ $dd -> DocumentID }})"><i class="fa fa-remove"></i></button></td>
                                </tr>
                                </form>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>

                  </div><!--tab 2-->

                </div><!-- tab-content -->
              </div><!-- nav-tabs-custom -->
              </div><!-- col-md-12 -->

         

         
    </div><!-- row -->

          <div class="modal fade" id="view" >
            <div class="modal-dialog" style="width:1150px">
          
              
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">View Document Details</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">

                        <div class="form-group">
                          <div class="row">
                          <div class="col-sm-3">
                            <label>ID:</label>
                            <input type="text" class="form-control" id = "vID" readonly>
                          </div>
                          
                          <div class="col-sm-3">
                            <label> Name:</label>
                          
                            <input type="text" class="form-control" id = "vName"  readonly>
                          </div>
                       
                          <div class="col-sm-3">
                            <label>Fee:</label>
                         
                            <input type="text" class="form-control" id = "vFee"  readonly>
                          </div>

                          <div class="col-sm-3">
                            <label>Classification:</label>
                          
                            <input type="text" class="form-control" id = "vType"  readonly>
                          </div>
                          </div>
                        </div>

                      <div class="form-group">
                        <div class="row">
                         <div class="col-sm-12" id="viewTemplate" style="overflow:auto">
                          </div>
                        </div>
                      </div>
                        
                      </div>
                      <!-- /.box-body -->
                    
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div><!-- /.modal-content -->
       
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->



          <div class="modal fade" id="delete">
            <div class="modal-dialog">
          
              <form class="form-horizontal" 
                    role = "form"
                    enctype="multipart/form-data"
                    id = "deleteForm"                    
                    action = "{{URL::to('deleteDocumentDetails')}}"
                    onsubmit = "return false">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Document</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                      <div class="box-body">
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">ID:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "dtxt1" name = "dtxt1" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Document Name:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "dtxt2" name = "dtxt2" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Fee:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id = "dtxt3" name = "dtxt3" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Template:</label>
                          <div class="col-sm-8">
                            <img id = "dpic" width="100%">
                          </div>
                        </div>
                        
                      </div>
                      <!-- /.box-body -->
                    
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id = "btnDelete">Delete</button>
                  </div>
                </div><!-- /.modal-content -->
              </form>
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->


              @include('mainDocument.doc_modal')



              <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
              <script src="{{ asset ('bower_components/admin-lte/plugins/jQueryUI/jQuery-ui.min.js') }}"></script>


              <script type="text/javascript">
                $(document).ready(function(){


                  $('#txtClassification').change(function () {
                    if($("#txtClassification").val() == "1") {
                      $('#avail').show();
                    }
                    else {
                      $('#avail').hide();
                    }

                  });


                

                   $('#etxtClassification').change(function () {
                     
                     $('#editTemplate div div .blank ').empty();
                     $('#editTemplate div div .rName').empty();
                     $('#editTemplate div div .Address').empty();
                     $('#editTemplate div div .Purpose').empty();
                     $('#editTemplate div div .Kagawad').empty();
                     $('#editTemplate div div .Name').empty();
                     $('#editTemplate div div .BName').empty();
                     $('#editTemplate div div .BAdd').empty();
                     $('#editTemplate div div .BOwn').empty();
                     $('#editTemplate div div .Kagawad').empty();


                     if($('#etxtClassification').val() == "1")
                    {

                      $('#editTemplate div div .blank ').append('<select><option value="blank" selected>Leave it blank</option><option>Name of Requestor</option><option>Address</option><option>Purpose</option><option>Kagawad on Duty</option><option>Requested for</option> </select>');

                      $('#editTemplate div div .rName').append('<select><option>Leave it blank</option><option value="rName" selected>Name of Requestor</option><option>Address</option><option>Purpose</option><option>Kagawad on Duty</option><option>Requested for</option> </select>');

                      $('#editTemplate div div .Address').append('<select><option>Leave it blank</option><option>Name of Requestor</option><option value="Address" selected>Address</option><option>Purpose</option><option>Kagawad on Duty</option><option>Requested for</option> </select>');

                      $('#editTemplate div div .Purpose').append('<select><option>Leave it blank</option><option>Name of Requestor</option><option>Address</option><option value="Purpose" selected>Purpose</option><option>Kagawad on Duty</option><option>Requested for</option> </select>');

                      $('#editTemplate div div .Kagawad').append('<select><option>Leave it blank</option><option>Name of Requestor</option><option>Address</option><option>Purpose</option><option value="Kagawad" selected>Kagawad on Duty</option><option>Requested for</option></select>');

                      $('#editTemplate div div .Name').append('<select><option>Leave it blank</option><option>Name of Requestor</option><option>Address</option><option>Purpose</option><option>Kagawad on Duty</option><option value="Name" selected>Requested for</option> </select>');
                    }else
                    {

                      $('#editTemplate div div .blank').append('<select><option selected>Leave it blank</option><option>Business Name</option><option>Business Owner</option><option>Business Address</option><option>Kagawad on Duty</option> </select>');

                      $('#editTemplate div div .BName').append('<select><option>Leave it blank</option><option value="BName" selected>Business Name</option><option>Business Owner</option><option>Business Address</option><option>Kagawad on Duty</option> </select>');

                      $('#editTemplate div div .BAdd').append('<select><option>Leave it blank</option><option>Business Name</option><option>Business Owner</option><option value="BAdd" selected>Business Address</option><option>Kagawad on Duty</option> </select>');

                      $('#editTemplate div div .BOwn').append('<select><option>Leave it blank</option><option>Business Name</option><option value="BOwn" selected>Business Owner</option><option>Business Address</option><option>Kagawad on Duty</option> </select>');

                      $('#editTemplate div div .Kagawad').append('<select><option>Leave it blank</option><option>Business Name</option><option>Business Owner</option><option>Business Address</option><option value="Kagawad" selected>Kagawad on Duty</option> </select>');
                    }


                  });

                  //$('#forTextArea').draggable();

                  $('#Template').wysihtml5();
                  //$('.wysihtml5-sandbox').css("resize", "both"); ////make text area resizable
                  $('#Template').val("<blockquote><blockquote><h1>Barangay Certificate</h1></blockquote></blockquote><br><h1><b></b></h1><div>To whom it may concern:<br><br>This certify that <u>___(Name)___</u>, of legal age, is a bonafide resident of this barangay with postal address at <u>____(house no. and street)___</u> Old Sta. Mesa, Manila.<br><br>He/She presently do not have any pending case of any kind in our barangay records.<br><br>This certification is being used upon the request of<u> __(requestor's name)___ </u>for <u>__(purpose)__</u> purpose only.<br><br>Issued <u>_(day)_</u>  day of<u> _(month)_</u>, year<u> __(year)__</u> at Barangay 599, Zone 59, District VI City of Manila.<br><br><br>Certified by:<br><br><br><br><br>Barangay Captain<br><u></u><u></u></div>");
                  /*$('#Template').keyup(function(){
                    $('blockquote').css({"margin" : "0 0 0 40px"});
                    $('blockquote').css({"border" : "none"});
                    $('blockquote').css({"padding" : "0px"});
                  });*/




                  var tbl = $('#example1').DataTable();


                  $('#txtTemplate').change(function(){
                    //alert($('#txtTemplate').val());
                    $.ajax({
                      type:'POST',
                      url: 'getBG',
                      data: { id: $('#txtTemplate').val()},
                      dataType: 'JSON',
                      success: function(data){
                          $('#actualBG').attr("src", "{{ asset('bower_components/admin-lte/dist/images/"+data.BG[0].Template+" ')}}");
                          if(data.BG[0].TemplateOrientation == "Portrait" && data.BG[0].TemplateSize == "Short")
                          {
                            $('#forBG').css({"height":"1032px"});
                            $('#forBG').css({"width":"813px"});

                          }
                          else if(data.BG[0].TemplateOrientation == "Landscape" && data.BG[0].TemplateSize == "Short")
                          {
                            $('#forBG').css({"height":"793px"});
                            $('#forBG').css({"width":"1055px"});
                          }
                          else if(data.BG[0].TemplateOrientation == "Portrait" && data.BG[0].TemplateSize == "Long")
                          {
                            $('#forBG').css({"height":"1226px"});
                            $('#forBG').css({"width":"813px"});

                          }
                          else if(data.BG[0].TemplateOrientation == "Landscape" && data.BG[0].TemplateSize == "Long")
                          {
                            $('#forBG').css({"height":"793px"});
                            $('#forBG').css({"width":"1245px"});
                          }
                          else if(data.BG[0].TemplateOrientation == "Portrait" && data.BG[0].TemplateSize == "A4")
                          {
                            $('#forBG').css({"height":"1101px"});
                            $('#forBG').css({"width":"807px"});

                          }
                          else if(data.BG[0].TemplateOrientation == "Landscape" && data.BG[0].TemplateSize == "A4")
                          {
                            $('#forBG').css({"height":"772px"});
                            $('#forBG').css({"width":"1120px"});
                          }

                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("hfjkshdfh " + error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText)
                    });
                  });


/*EDIT- TEMPLATE CHANGE*/
                  $('#etxtTemplate').change(function(){
                    alert($('#etxtTemplate').val());
                    $.ajax({
                      type:'POST',
                      url: 'getBG',
                      data: { id: $('#etxtTemplate').val()},
                      dataType: 'JSON',
                      success: function(data){
                            
                         // $('#editTemplate #forBG').css({"background-image": "url({{ asset('bower_components/admin-lte/dist/images/"+data.BG[0].Template+" ')}})"});

                          $('#editTemplate #forBG #actualBG').attr("src", "{{ asset('bower_components/admin-lte/dist/images/"+data.BG[0].Template+" ')}}");

                          if(data.BG[0].TemplateOrientation == "Portrait" && data.BG[0].TemplateSize == "Short")
                          {
                            $('#forBG').css({"height":"1032px"});
                            $('#forBG').css({"width":"813px"});

                          }
                          else if(data.BG[0].TemplateOrientation == "Landscape" && data.BG[0].TemplateSize == "Short")
                          {
                            $('#forBG').css({"height":"793px"});
                            $('#forBG').css({"width":"1055px"});
                          }
                          else if(data.BG[0].TemplateOrientation == "Portrait" && data.BG[0].TemplateSize == "Long")
                          {
                            $('#forBG').css({"height":"1226px"});
                            $('#forBG').css({"width":"813px"});

                          }
                          else if(data.BG[0].TemplateOrientation == "Landscape" && data.BG[0].TemplateSize == "Long")
                          {
                            $('#forBG').css({"height":"793px"});
                            $('#forBG').css({"width":"1245px"});
                          }
                          else if(data.BG[0].TemplateOrientation == "Portrait" && data.BG[0].TemplateSize == "A4")
                          {
                            $('#forBG').css({"height":"1101px"});
                            $('#forBG').css({"width":"807px"});

                          }
                          else if(data.BG[0].TemplateOrientation == "Landscape" && data.BG[0].TemplateSize == "A4")
                          {
                            $('#forBG').css({"height":"772px"});
                            $('#forBG').css({"width":"1120px"});
                          }

                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("hfjkshdfh " + error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText)
                    });
                  });

/*EDIT- TEMPLATE CHANGE*/
///MArgin
                  $('#txtMTop').change(function(){
                      //alert($(this).val()+"px");
                      var pixel = ($(this).val()*10) + "px";
                      $('#forTextArea').css({"top": pixel});
                  }).keyup(function(){
                      var pixel = ($(this).val()*10) + "px";
                      $('#forTextArea').css({"top": pixel});
                  });

                  $('#txtMBottom').change(function(){
                      //alert($(this).val()+"px");
                      var pixel = ($(this).val()*10) + "px";
                      $('#forTextArea').css({"bottom": pixel});
                  }).keyup(function(){
                      var pixel = ($(this).val()*10) + "px";
                      $('#forTextArea').css({"bottom": pixel});
                  });

                  $('#txtMLeft').change(function(){
                      //alert($(this).val()+"px");
                      var pixel = ($(this).val()*10) + "px";
                      $('#forTextArea').css({"left": pixel});
                  }).keyup(function(){
                      var pixel = ($(this).val()*10) + "px";
                      $('#forTextArea').css({"left": pixel});
                  });

                  $('#txtMRight').change(function(){
                      //alert($(this).val()+"px");
                      var pixel = ($(this).val()*10) + "px";
                      $('#forTextArea').css({"right": pixel});
                  }).keyup(function(){
                      var pixel = ($(this).val()*10) + "px";
                      $('#forTextArea').css({"right": pixel});
                  });
/////end margin

//complete template button

                  $('#btnCTemp').click(function(){

                    $('#btnSubmit').removeAttr("disabled");

                    $('#forTextArea').html($('#Template').val());// nabura na agad yung template na text area dito
                    $('blockquote').css({"margin" : "0 0 0 40px"});
                    $('blockquote').css({"border" : "none"});
                    $('blockquote').css({"padding" : "0px"});
                    

                    $(this).attr("disabled", "disabled");
                    $('#btnETemp').removeAttr("disabled");


                    $('u').each(function() {
                      var $this = $(this);
                      if($this.html().length == 0)
                          $this.remove();
                    });

                    if($('#txtClassification').val() == "1")
                    {
                      $('u').html('<select>'+
                      ' <option value = "blank" >Leave it blank</option>'+
                      ' <option value = "rName" >Name of Requestor</option>'+
                      '<option value = "Name">Name of Requesting for</option>'+
                      '<option value = "Address">Address</option>'+
                      '<option value = "Purpose">Purpose</option>'+
                      //'<option  value = "Signature">Signature</option>'+
                      //'<option value = "BAdd">Business Address</option>'+
                      //'<option value = "BOwn">Business Owner</option>'+
                      '<option value = "Kagawad">Kagawad on Duty</option>'+
                      '</select>');
                    }
                    else
                    {
                      $('u').html('<select>'+
                      ' <option value = "blank" >Leave it blank</option>'+
                      '<option value = "BName">Business Name</option>'+
                      '<option value = "BAdd">Business Address</option>'+
                      '<option value = "BOwn">Business Owner</option>'+
                      '<option value = "Kagawad">Kagawad on Duty</option>'+
                      '</select>');
                    }

                    

                    $('u').addClass("blank")


                    //alert($('#forTextArea').html());

                    
                    $('#forTextArea select').change(function(){

                      $(this).parents("u").removeClass();
                      $(this).parents("u").addClass($(this).val());
                     // alert($('#forTextArea').html());
                    });
                  });

//EDIT MODAL edit button

               $('#ebtnETemp').click(function(){
                   // alert('jjaja');
                    $('#editTemplate div div select').remove();
                    $('#editTemplate div div u').append('____________');



                    var cont = $('#editTemplate div div').html();

                   // alert(cont);

                    $('#editTemplate div div').html("");

                    $('#editTemplate div div').html('<textarea id = "eTemp" name = "eTemp" class="textarea" placeholder="Place some text here" style="width: 100%; height: 90%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; overflow: hidden;"></textarea> <div id = "plsWorkJesus"></div>');

                   $('#eTemp').wysihtml5();
                   $('#eTemp').val(cont);


                   //  alert($('#eTemp').val());



                    $('#ebtnCTemp').removeAttr("disabled");
                    $('#ebtnETemp').attr("disabled", "disabled");
                  });

//CONFIRM EDIT MODAL

               $('#ebtnCTemp').click(function(){
                    $('#editTemplate div div').html($('#eTemp').val());// nabura na agad yung template na text area dito
                    $('blockquote').css({"margin" : "0 0 0 40px"});
                    $('blockquote').css({"border" : "none"});
                    $('blockquote').css({"padding" : "0px"});
                    

                    $(this).attr("disabled", "disabled");
                    $('#ebtnETemp').removeAttr("disabled");


                    $('u').each(function() {
                      var $this = $(this);
                      if($this.html().length == 0)
                          $this.remove();
                    });

                    if($('#etxtClassification').val() == "1")
                    {
                      $('u').html('<select>'+
                      ' <option value = "blank" >Leave it blank</option>'+
                      ' <option value = "rName" >Name of Requestor</option>'+
                      '<option value = "Name">Name of Requesting for</option>'+
                      '<option value = "Address">Address</option>'+
                      '<option value = "Purpose">Purpose</option>'+
                      //'<option value = "BName">Business Name</option>'+
                      //'<option value = "BAdd">Business Address</option>'+
                      //'<option value = "BOwn">Business Owner</option>'+
                      '<option value = "Kagawad">Kagawad on Duty</option>'+
                      '</select>');
                    }
                    else
                    {
                      $('u').html('<select>'+
                      ' <option value = "blank" >Leave it blank</option>'+
                      '<option value = "BName">Business Name</option>'+
                      '<option value = "BAdd">Business Address</option>'+
                      '<option value = "BOwn">Business Owner</option>'+
                      '<option value = "Kagawad">Kagawad on Duty</option>'+
                      '</select>');
                    }

                    

                    $('u').addClass("blank")


                    //alert($('#editTemplate div div').html());

                    
                    $('#editTemplate div div select').change(function(){

                      $(this).parents("u").removeClass();
                      $(this).parents("u").addClass($(this).val());
                      //alert($('#editTemplate div div').html());
                    });
                  });


                  
///button edit Template
                  $('#btnETemp').click(function(){
                    $('#forTextArea select').remove();
                    $('#forTextArea u').append('_______');



                    var cont = $('#forTextArea').html();

                    $('#forTextArea').html("");

                    $('#forTextArea').html('<textarea id = "Template" name = "Template" class="textarea" placeholder="Place some text here" style="width: 100%; height: 90%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; overflow: hidden;"></textarea><div id = "plsWorkJesus"></div>');

                    $('#Template').wysihtml5();
                    $('#Template').val(cont);


                   // alert($('#Template').val());



                    $('#btnCTemp').removeAttr("disabled");
                    $('#btnETemp').attr("disabled", "disabled");
                  });
///button edit Template




                  $('#btnSubmit').click(function(e){  

                    $('#forTextArea select').remove();
                  //  alert($('#hey').html());
                  //  alert($('#forTextArea').html());



                    e.preventDefault();

                    var orientation;
                    if($('#forBG').height() > $('#forBG').width())
                    {
                      orientation = "Portrait"
                    }
                    else
                    {
                      orientation = "Landscape"
                    }
                    

                    $.ajax({
                      type: 'POST',
                      url: 'addDocumentDetails',
                      data:{ txtDocName: $('#txtDocName').val(),
                              txtFee: $('#txtFee').val(),
                              txtDFee: $('#txtDupFee').val(),
                              txtClass: $('#txtClassification').val(),
                              txtTemplate: $('#hey').html(),
                              txtAvail: $('#txtAvail').val(),
                              txtDocTemplate: $('#forTextArea').html(),
                              txtLayout: $('#txtTemplate').val(),
                              orientation: orientation },
                      dataType: 'JSON',
                      success: function(data){
                        window.location.href = "{{URL::to('documentDetails')}}";
                      },
                      error: function (request, error) {
                        console.log(arguments);
                        alert(" Can't do because: " + error);
                    }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
                  });


                  $('#btnUpdate').click(function(e){  



                    $.ajax({
                      type: 'POST',
                      url: 'updateDocumentDetails',
                      data:{ txtDocName: $('#etxtDocName').val(),
                              txtFee: $('#etxtFee').val(),
                              txtID: $('#etxtDocID').val(),
                              txtDFee: $('#etxtDupFee').val(),
                              txtClass: $('#etxtClassification').val(),
                              txtTemplate: $('#editTemplate').html(),
                              txtAvail: $('#etxtAvail').val(),
                              txtLayout: $('#etxtTemplate').val()},
                      dataType: 'JSON',
                      success: function(data){
                        window.location.href = "{{URL::to('documentDetails')}}";
                      },
                      error: function (request, error) {
                        console.log(arguments);
                        alert(" Can't do because: " + error);
                    }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });
                  });


                  // $('#editForm').on('submit', function(e){ 
                  //   e.preventDefault();

                  //   var content = $('#eTemplate');
                  //   var contentPar = content.parent()
                  //   contentPar.find('.wysihtml5-toolbar').remove()
                  //   contentPar.find('iframe').remove()
                  //   contentPar.find('input[name*="wysihtml5"]').remove()
                  //   content.show()

                  //   $.ajax({
                  //     type: 'POST',
                  //     url: $(this).attr('action'),
                  //     data: new FormData(this),
                  //     dataType: 'JSON',
                  //     cache: false,
                  //     contentType: false,
                  //     processData: false,
                  //     success: function(data){
                  //       tbl.clear().draw();
                  //       $.each(data.oDetails, function(key, val){
                  //         var string1 = "{{asset('bower_components/admin-lte/dist/images/"+val.DocumentTemplate+"')}}";
                  //         tbl.row.add([

                  //             val.DocumentID,
                  //             val.DocumentName,
                  //             val.DocumentFee,
                  //             val.DocClass,
                  //             '<button class="btn btn-xs btn-primary btn-flat"  data-toggle = "modal"  data-target = "#view"  onclick = "modalView('+val.DocumentID+')"> <i class="fa fa-eye"></i></button> '+' '+ '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalEdit('+val.DocumentID+')"> <i class="fa fa-pencil"></i> </button> '+' '+ '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDelete('+val.DocumentID+')"><i class="fa fa-remove"></i></button>'

                  //           ]).draw(false);
                  //       });
                  //     },
                  //     error: function (request, error) {
                  //       console.log(arguments);
                  //       alert(" Can't do because: " + error);
                  //   }
                  //   }).error(function(ts){
                  //     alert(ts.responseText);
                  //   });

                  //   $('#edit').modal('hide');
                  // });


                  $('#deleteForm').on('submit', function(e){ 
                    e.preventDefault();

                    $.ajax({
                      type: 'POST',
                      url: $(this).attr('action'),
                      data: new FormData(this),
                      dataType: 'JSON',
                      cache: false,
                      contentType: false,
                      processData: false,
                      success: function(data){
                        tbl.clear().draw();
                        $.each(data.oDetails, function(key, val){
                          if(val.DocAvail == "1") {
                            var res = val.DocClass+" (Resident Only)"
                          } else if(val.DocAvail == "2") {
                            var res = val.DocClass+" (All)"
                          } else var res = val.DocClass
                          var string1 = "{{asset('bower_components/admin-lte/dist/images/"+val.DocumentTemplate+"')}}";
                          tbl.row.add([

                              val.DocumentID,
                              val.DocumentName,
                              val.DocumentFee,
                              val.DuplicateFee,
                              res,
                              '<button class="btn btn-xs btn-primary btn-flat"  data-toggle = "modal"  data-target = "#view"  onclick = "modalView('+val.DocumentID+')"> <i class="fa fa-eye"></i></button>'+' '+ '<button class="btn btn-xs btn-success btn-flat" data-toggle = "modal" data-target = "#edit" onclick = "modalEdit('+val.DocumentID+')"> <i class="fa fa-pencil"></i> </button> '+' '+ '<button class="btn btn-xs btn-danger btn-flat" data-toggle = "modal" data-target = "#delete" onclick = "modalDelete('+val.DocumentID+')"><i class="fa fa-remove"></i></button>'

                            ]).draw(false);
                        });
                      },
                      error: function (request, error) {
                        console.log(arguments);
                        alert(" Can't do because: " + error);
                    }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });

                    $('#delete').modal('hide');
                  });


                });//document


              
              </script>



              <script type="text/javascript">
                function readURL(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {
                          $('#blah').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#blah').removeAttr('src');
                  }
                }


                function readURLforEdit(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {
                          $('#epic').removeAttr('src');
                          $('#epic').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#epic').removeAttr('src');
                  }
                }

                function modalEdit(x){

                  $.ajax({
                    type: 'POST',
                    url: 'getDocumentDetails',
                    data: {id: x},
                    dataType: 'JSON',
                    success: function(data){


                   $('#etxtDocID').val(data.dDetails[0].DocumentID);
                      $('#etxtDocName').val(data.dDetails[0].DocumentName);
                      $('#etxtFee').val(data.dDetails[0].DocumentFee);
                      $('#etxtDupFee').val(data.dDetails[0].DuplicateFee);
                      $('#etxtTemplate').val(data.dDetails[0].DocLayout);
                      $('#etxtDupFee').val(data.dDetails[0].DuplicateFee);


                      if(data.dDetails[0].DocClass == 'Regular Document') {
                          $('#etxtClassification').val(1); 
                          $('#eavail').show();
                          $('#etxtAvail').val(data.dDetails[0].DocAvail);
                      }
                      else {
                        $('#etxtClassification').val(2);
                        $('#eavail').hide();
                      } 

                     // $('#etxtTemplate').val(data.dDetails[0].DocumentTemplate);
                      //$('#etxt3').val(data.dDetails[0].DocumentFee);
                      var temp = data.dDetails[0].DocumentTemplate;                       
                      
                      $('#editTemplate').html(temp);


                      // var etemp =  $('#editTemplate div div').html();
                      // $('#editTemplate div div').html('<textarea id = "eTemplate" name = "eTemplate" class="textarea" placeholder="Place some text here" style="width: 100%; height: 90%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; overflow: hidden;"></textarea>');

                      //alert(temp);
                      //alert($('#editTemplate').html());

                     

                     
                     // if(data.dDetails[0].DocOrientation == 'Landscape') {
                     //    $('#edit').({"margin" : "0 0 0 40px"});
                     //  }


                        $('#etxtClassification').change(function () {
                          if($("#etxtClassification").val() == "1") {
                            $('#eavail').show();
                          }
                          else {
                            $('#eavail').hide();
                          }

                        });

                  



                    },
                    error: function(request, error){
                      console.log(arguments);
                      alert(" Can't do because: " + error);
                    }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });
                }


                function modalDelete(x){
                  $.ajax({
                    type: 'POST',
                    url: 'getDocumentDetails',
                    data: {id: x},
                    dataType: 'JSON',
                    success: function(data){
                      $('#dtxt1').val(data.dDetails[0].DocumentID);
                      $('#dtxt2').val(data.dDetails[0].DocumentName);
                      $('#dtxt3').val(data.dDetails[0].DocumentFee);
                      
                      $('#dpic').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + data.dDetails[0].DocumentTemplate + "')}}" );


                    },
                    error: function(request, error){
                      console.log(arguments);
                      alert(" Can't do because: " + error);
                    }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });
                }


                 function modalView(x){
                  $.ajax({
                    type: 'POST',
                    url: 'getDocumentDetails',
                    data: {id: x},
                    dataType: 'JSON',
                    success: function(data){
                      $('#vID').val(data.dDetails[0].DocumentID);
                      $('#vName').val(data.dDetails[0].DocumentName);
                      $('#vFee').val(data.dDetails[0].DocumentFee); 
                      $('#vType').val(data.dDetails[0].DocClass);

                       var temp = data.dDetails[0].DocumentTemplate;                       
                      
                      $('#viewTemplate').html(temp);
                      $('#viewTemplate div div u').append('____________');
                    },
                    error: function(request, error){
                      console.log(arguments);
                      alert(" Can't do because: " + error);
                    }
                  }).error(function(ts){
                    alert(ts.responseText);
                  });
                }

                

              </script>
              

      </section>
      <!-- /.content -->
@stop