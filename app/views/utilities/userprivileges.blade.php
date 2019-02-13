@extends('layouts.master')

@section('content')
 <section class="content-header">
   
      <h1>
        User Privileges
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Utilities</li>
        <li class="active">User Privileges</li>
      </ol>
  </section>


     <!-- Main content -->
  <section class="content">
    <div class="row"> 
      <div class="col-md-12">
      
      <div class="box box-warning">
        
          <div class="box-header with-border">
                    <h3 class="box-title">Document Status Access</h3>
                    
                     <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                     
                  </div><!-- /.box-header --> 
                <div class="box-body ">

        <div class="row">
          <form class="form-horizontal" role="form" onsubmit="return false" enctype="multipart/form-data" action = "{{URL::to('updateUP')}}" id = "updateAccess">
            <div class="col-md-12" >
              
            <table id="accesstbl" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name of Official</th>
                          <th>Position</th>
                          <th><h4><span class="label label-primary">New</span></h4></th>
                          <th><h4><span class="label label-warning">Pending</span></h4></th>
                          <th><h4><span class="label label-success">For Approval</span></h4></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($access as $a)
                          <tr>
                            <td>{{ $a->OfficialID }} <input type="text" id="offid_{{ $a->OfficialID }}" name="offid_{{ $a->OfficialID }}" value="{{ $a->OfficialID }}" hidden=""></td>
                            <td>{{ $a->FirstName }} {{ $a->LastName }}</td>
                            <td>{{ $a->OfficialPosition }}</td>
                            <td><center><input type="checkbox" class="check" name="checkNew_{{ $a->OfficialID }}" id="checkNew_{{ $a->OfficialID }}" value="{{ $a->OfficialID }}"></center></td>
                            <td><center><input type="checkbox" class="check" name="checkPen_{{ $a->OfficialID }}" id="checkPen_{{ $a->OfficialID }}"></center></td>
                            <td><center><input type="checkbox" class="check" name="checkApp_{{ $a->OfficialID }}" id="checkApp_{{ $a->OfficialID }}"></center></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                 <center><button type = "submit" class="btn btn-flat btn-danger" id="btnSaveDoc" style="width:100px"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;   Save</button></center>
          </div>
          </form>
          
       </div><!-- row -->



        </div>
      </div>

      </div>
   </div>

<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
   <script type="text/javascript">
      $(document).ready(function() {

          $(".check").bootstrapSwitch();

                      $.ajax({
                      type: 'POST',
                      url: 'getUPInfo',
                      success: function(data){
                        $.each(data.a, function(key, val){
                          if(val.isNew == 1) {
                              $('#checkNew_'+val.OfficialID).bootstrapSwitch('state' , true);
                              
                          } else  $('#checkNew_'+val.OfficialID).bootstrapSwitch('state' , false);

                           if(val.isPend == 1) {
                              $('#checkPen_'+val.OfficialID).bootstrapSwitch('state' , true);
                              
                          } else  $('#checkPen_'+val.OfficialID).bootstrapSwitch('state' , false);

                           if(val.isApp == 1) {
                              $('#checkApp_'+val.OfficialID).bootstrapSwitch('state' , true);
                             
                          } else  $('#checkApp_'+val.OfficialID).bootstrapSwitch('state' , false);
                         
                        });
                      },
                      error: function(request, error){
                        console.log(arguments);
                        alert("cant do this because: " + error);
                      }

                    }).error(function(ts){
                      alert(ts.responseText);
                    });


                
                  
                 


              $('#updateAccess').submit(function(){

                $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  data: new FormData(this),
                  dataType: 'JSON',
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(data){ 
                    alert('Success!');
                    window.location.href = "{{URL::to('userprivilege')}}"
                  },
                  error: function(request, error){
                    console.log(arguments);
                    alert(" Can't do this because: " + error);
                  }
                }).error(function(ts){
                  alert(ts.responseText);
                });

              });

      });//documnet ready
   </script>
	

  </section>


 
@endsection