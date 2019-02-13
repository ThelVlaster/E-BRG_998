@extends('layouts.master')

@section('content')

          <section class="content-header">
            <h1>
              Maintenance
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Maintenance</a></li>
              <li><a href="#">Document</a></li>
              <li class="active">Document Template</li>
            </ol>
          </section>

      <!-- Main content -->
      <section class="content">

            
              <div class="col-md-3">

                <!-- general form elements -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Template</h3>

                    </div><!-- /.box-header -->
                   <form role="form" onsubmit="return false" action = "{{URL::to('addDocumentTemplate')}}" enctype="multipart/form-data" id = "addForm">
                    
                      <div class="box-body">

                        <div class="form-group">
                          <label for="exampleInputEmail1">Name*</label>
                          <input type="text" 
                                 class="form-control" 
                                 id="txtTemplateName" 
                                 name="txtTemplateName" 
                                 placeholder="Name"
                                 required="required">
                        </div>

                         <div class="form-group">
                          <label for="exampleInputEmail1">Size*</label>
                          <select type="text" 
                                 class="form-control" 
                                 id="txtTemplateSize" 
                                 name="txtTemplateSize" 
                                 required="required">

                                 <option value="Short">Short (8.5 in x 11 in)</option>
                                 <option value="Long">Long (8.5 in x 13 in)</option>
                                 <option value="A4">A4 (8.3 x 11.7 in)</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Orientation*</label>
                          <select type="text" 
                                 class="form-control" 
                                 id="txtTemplateOrientation" 
                                 name="txtTemplateOrientation" 
                                 required="required">

                                 <option>Portrait</option>
                                 <option>Landscape</option>
                          </select>
                        </div>

                         <div class="form-group">
                           <label>Template*</label>
                            <img width="100%" 
                                   id="preview"
                                   name="preview">

                            <input type="file" 
                                   class="form-control" 
                                   id="txtTemplate"
                                   name="txtTemplate"
                                   onchange="readURL(this)">
                        </div>
                      


                      </div><!-- /.box-body -->
                  

                      <div class="box-footer">
                        <center><button type="submit" class="btn btn-success btn-flat" id = "btnSubmit" name = "btnSubmit" >Submit</button></center>
                      </div>
                    </form>
                  </div>
              </div>

<!--datatable-->
              <div class="col-md-9">
                <div class="box box-success">
                  <div class="box-header">
                    <h3 class="box-title">Template Table</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">

                    <table id="example1" class="table table-bordered table-striped">

                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Size</th>
                          <th>Orientation</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($temp as $temp)
                            <tr>
                              <td>{{ $temp -> TemplateID }}</td>
                              <td>{{ $temp -> TemplateName }}</td>
                              <td>{{ $temp -> TemplateSize }}</td>
                              <td>{{ $temp -> TemplateOrientation }}</td>

                              <td><button type = "button" 
                                        class = "btn btn-xs btn-primary btn-flat"
                                        data-toggle = "modal"
                                        data-target = "#viewImage"
                                        onclick = "modalEdit({{ $temp -> TemplateID }})"> <i class="fa fa-eye"></i></button>

                                  <button class="btn btn-xs btn-success btn-flat" 
                                        data-toggle="modal" 
                                        data-target="#edit"
                                        onclick = "modalEdit({{ $temp -> TemplateID }})">
                                          <i class="fa fa-pencil"></i>
                                </button>

                                <button class="btn btn-xs btn-danger btn-flat"
                                        data-toggle="modal" 
                                        data-target="#delete"
                                        onclick = "modalDelete({{ $temp -> TemplateID }})">
                                          <i class="fa fa-remove"></i>
                                </button>
                            </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<!--datatable-->

        <div class="modal fade" id="viewImage">
            <div class="modal-dialog">
          
              
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Template</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <img width="100%" id="vImage">
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

           <div class="modal fade" id="edit">
                <div class="modal-dialog">
              
                  <form class="form-horizontal" onsubmit="return false" action = "{{URL::to('updateDocumentTemplate')}}" enctype="multipart/form-data" id = "updateForm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Template</h4>
                      </div>
                    <!-- modal content -->
                      <div class="modal-body">
                    
                          <div class="box-body">
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">ID:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "etxtID" name = "etxtID" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Name:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "etxtTemplateName" name = "etxtTemplateName" >
                              </div>
                            </div>

                             <div class="form-group">
                              <label  class="col-sm-3 control-label">Size:</label>

                              <div class="col-sm-8">
                               <select type="text" 
                                 class="form-control" 
                                 id="etxtTemplateSize" 
                                 name="etxtTemplateSize" 
                                 required="required">

                                 <option value="Short">Short</option>
                                 <option value="Long">Long</option>
                                 <option value="A4">A4</option>
                                </select>
                              </div>
                            </div>

                             <div class="form-group">
                              <label  class="col-sm-3 control-label">Orientation:</label>

                              <div class="col-sm-8">
                                 <select type="text" 
                                 class="form-control" 
                                 id="etxtTemplateOrient" 
                                 name="etxtTemplateOrient" 
                                 required="required">

                                 <option value="Portrait">Portrait</option>
                                 <option value="Landscape">Landscape</option>
                                </select>
                              </div>
                            </div>

                           
                          

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Image:</label>
                              <div class="col-sm-8">
                                <img id = "etxtTemplateImage" name = "etxtTemplateImage" width="100%">
                              </div>
                            </div>

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Change Image:</label>

                              <div class="col-sm-8">
                                <input type="file" class="form-control" id = "etxtImageChange" name = "etxtImageChange" onchange="readURLforEdit(this)">
                              </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                        
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id = "btnUpdate">Save Changes</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </form>
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->


              <div class="modal fade" id="delete">
                <div class="modal-dialog">
              
                  <form class="form-horizontal" onsubmit="return false" action = "{{URL::to('deleteDocumentTemplate')}}" enctype="multipart/form-data" id = "deleteForm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Template</h4>
                      </div>
                    <!-- modal content -->
                      <div class="modal-body">
                    
                          <div class="box-body">
                           <div class="form-group">
                              <label  class="col-sm-3 control-label">ID:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "dtxtID" name = "dtxtID" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Name:</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id = "dtxtTemplateName" name = "dtxtTemplateName" readonly>
                              </div>
                            </div>
                          

                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Image:</label>
                              <div class="col-sm-8">
                                <img id = "dtxtTemplateImage" name = "dtxtTemplateImage" width="100%">
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
          <!-- /.modal -->


               <script type="text/javascript">

                function readURL(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {
                          $('#preview').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#preview').removeAttr('src');
                  }
                }


                  function readURLforEdit(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {
                          $('#etxtTemplateImage').removeAttr('src');
                          $('#etxtTemplateImage').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#etxtTemplateImage').removeAttr('src');
                  }
                }


                function modalEdit(x)
                {
                  $.ajax({
                    type: 'POST',
                    url: 'getTemplateInfo',
                    data: { id : x },
                    dataType: 'JSON',
                    success: function(data){
                      $.each(data.temp, function(key, val){
                        $('#etxtID').val(val.TemplateID);
                        $('#etxtTemplateName').val(val.TemplateName);
                        $('#etxtTemplateSize').val(val.TemplateSize);
                        $('#etxtTemplateOrient').val(val.TemplateOrientation);
                        $('#etxtTemplateImage').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + val.Template + "')}}");
                        

                        $('#vImage').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + val.Template + "')}}");
                      });
                    }
                  });
                }

                function modalDelete(x)
                {
                  $.ajax({
                    type: 'POST',
                    url: 'getTemplateInfo',
                    data: { id : x },
                    dataType: 'JSON',
                    success: function(data){
                       $.each(data.temp, function(key, val){
                        $('#dtxtID').val(val.TemplateID);
                        $('#dtxtTemplateName').val(val.TemplateName);
                        $('#dtxtTemplateImage').attr('src', "{{ asset ('bower_components/admin-lte/dist/images/" + val.Template + "')}}");

                      });
                    }
                  });
                }
              </script>

      <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                  
                  var tbl = $('#example1').DataTable();

                  $('#addForm').submit(function(){
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
                        $.each(data.temp, function(key, val){
                          tbl.row.add([
                            val.TemplateID,
                            val.TemplateName,
                            val.TemplateSize,
                            val.TemplateOrientation,
                            '<button type = "button" class = "btn btn-xs btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalEdit('+ val.TemplateID +')"><i class="fa fa-eye"></i></button>' +
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick = "modalEdit('+ val.TemplateID +')"><i class="fa fa-pencil"></i></button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" onclick = "modalDelete('+ val.TemplateID +')"> <i class="fa fa-remove"></i></button>'

                            
                          ]).draw(false);
                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("can't do this because: " + error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });//error

                    $('#txtTemplateName').val("");
                    $('#preview').removeAttr("src");
                    $('#txtTemplate').val("");

                  });//addform

                   $('#updateForm').submit(function(){

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
                        $.each(data.temp, function(key, val){
                         tbl.row.add([
                            val.TemplateID,
                            val.TemplateName,
                            val.TemplateSize,
                            val.TemplateOrientation,
                            '<button type = "button" class = "btn btn-xs btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalEdit('+ val.TemplateID +')"><i class="fa fa-eye"></i></button>' +
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick = "modalEdit('+ val.TemplateID +')"><i class="fa fa-pencil"></i></button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" onclick = "modalDelete('+ val.TemplateID +')"> <i class="fa fa-remove"></i></button>'
                            
                          ]).draw(false);
                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("can't do this because: " + error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });

                    $('#edit').modal('hide');
                  });

                 $('#deleteForm').submit(function(){

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
                        $.each(data.temp, function(key, val){
                          tbl.row.add([
                           val.TemplateID,
                            val.TemplateName,
                            val.TemplateSize,
                            val.TemplateOrientation,
                            '<button type = "button" class = "btn btn-xs btn-info btn-xs" data-toggle = "modal" data-target = "#viewImage" onclick = "modalEdit('+ val.TemplateID +')"><i class="fa fa-eye"></i></button>' +
                            '<button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" onclick = "modalEdit('+ val.TemplateID +')"><i class="fa fa-pencil"></i></button> ' +
                                '<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete" onclick = "modalDelete('+ val.TemplateID +')"> <i class="fa fa-remove"></i></button>'

                            
                          ]).draw(false);
                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("can't do this because: " + error);
                      }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });

                    $('#delete').modal('hide');
                  });






                });//document

          </script>



      </section>
      <!-- /.content -->
@stop