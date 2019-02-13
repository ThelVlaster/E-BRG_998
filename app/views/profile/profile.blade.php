@extends('layouts.master')

@section('content')

<section class="content-header">
   
   <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-solid">
            <div class="box-body box-profile">
            @foreach($loginInfo as $login)
              <img class="profile-user-img img-responsive img-circle" src="{{ asset ('bower_components/admin-lte/dist/images/') . '/' . $login->Image}} " alt="User profile picture">

              <h3 class="profile-username text-center">{{$login->FirstName}} {{$login->LastName}}</h3>

              <p class="text-muted text-center">Barangay {{$login->OfficialPosition}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Gender</b> <a class="pull-right">{{$login->Gender}}</a>
                </li>
                <li class="list-group-item">
                  <b>Birthday</b> <a class="pull-right">{{$login->Birthdate}}</a>
                </li>
                <li class="list-group-item">
                  <b>Address</b> <a class="pull-right">{{$login -> HouseAddNo}} {{$login-> HouseStreet}}, Manila</a>
                </li>
                <li class="list-group-item">
                  <b>Contact Number</b> <a class="pull-right">{{$login-> MobileNo}}</a>
                </li>
                <li class="list-group-item">
                  <b>Civil Status</b> <a class="pull-right">{{$login-> CivilStat}}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

       
        </div>

          <div class="col-md-9">
                 <div class="box box-solid">
                    <div class="box-body">
                      <h4 class="box-title"><span class="label label-danger">Profile Settings</span></h4>
                      <form class="form-horizontal" role="form" method="POST" action = "{{URL::to('changeDPSignature')}}" enctype="multipart/form-data">
                      <div class="row">
                       <div class="col-md-6">
                          <label>Profile Image*</label>
                          <img width="100%" 
                                 id="preview"
                                 name="preview"
                                 width="100px"
                                 height="200px"
                                 src = "{{ asset ('bower_components/admin-lte/dist/images/') . '/' . Session::get('image')}} ">

                          <input type="file" 
                                 class="form-control" 
                                 id="txtProfileImage"
                                 name="txtProfileImage"

                                 onchange="readURL(this)">
                      
                          
                        </div>

                         <div class="col-md-6">
                          <label>Signature*</label>
                          <img width="100%" 
                                 id="preview1"
                                 name="preview1"
                                 src = "{{ asset ('bower_components/admin-lte/dist/images/') . '/' . $login->Signature}} ">
                                 
                          <input type="file" 
                                 class="form-control" 
                                 id="txtSignature" 
                                 name="txtSignature" 

                                 onchange="readURL1(this)">
                      
                          
                        </div>
                      </div><br>
                        
              @endforeach             

                      <div class="row">
                        <div class="box-body">
                        <h4><span class="label label-danger">Account Settings</span></h4>
                        <div class="form-group">
                          <label class="col-sm-3 control-label"> Username</label>
                          <div class="col-sm-7">
                            <input type="text" 
                                   class="form-control" 
                                   id="txtUsername" 
                                   name="txtUsername" 
                                   value="{{$account[0]-> Username}}">
                          </div>
                         </div>

                         <div class="form-group">
                          <label class="col-sm-3 control-label"> Password</label>
                          <div class="col-sm-7">
                            <input type="password" 
                                   class="form-control" 
                                   id="txtPass" 
                                   name="txtPass" 
                                   value="{{$account[0]-> Password}}">
                             <i style="display:none; right: 20px; position: absolute; top: 11px;" id="eye" class="fa fa-eye"></i>
                          </div>
                         </div>

                       
                         </div>
                      </div><br><br>

                         <center><button type="submit" 
                                        class="btn btn-danger btn-flat"
                                        >Save Changes</button></center>
                </form>
              </div>
            </div>
          </div><!--col-9-->



    <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <script type="text/javascript">
          $(document).ready(function(){
              $("#txtPass").on("keyup",function(){
                  if($(this).val())
                      $("#eye").show();
                  else
                      $("#eye").hide();
                  });
              $("#eye").mousedown(function(){
                          $("#txtPass").attr('type','text');
                          }).mouseup(function(){
                            $("#txtPass").attr('type','password');
                          }).mouseout(function(){
                            $("#txtPass").attr('type','password');
                          });

           


          });
        </script>

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

                 function readURL1(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      
                      reader.onload = function (e) {
                          $('#preview1').attr('src', e.target.result);
                      }
                      
                      reader.readAsDataURL(input.files[0]);
                  }
                  else{
                    $('#preview1').removeAttr('src');
                  }
                }
        </script>

  </section>

@endsection