<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page" style="background-image: url('{{ asset('bower_components/admin-lte/dist/images/brgy1.png')}}'); background-size: cover;">

@if (Session::get('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif


<div class="register-box">
  <div class="register-logo" style="background-color: white; opacity: 0.8">
    <a> <b>Registration</b></a>
  </div>
  <!-- /.register-logo -->
  <div class="register-box-body" style="opacity: 0.8; height: 500px; ">
      <p class="login-box-msg">Register a new account</p>
    <form method="post" action="{{URL::to('registration')}}" id="formform">
    <!-- <p class="login-box-msg">Register a new official </p> -->
     
      <div class="col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="First Name" id = "fname" name="fname">
          
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
    
            <input type="text" class="form-control" placeholder="Last Name" id = "lname" name="lname">
       
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-venus-mars"></i>
            </div>
            <select type="text" class="form-control" placeholder="Gender" id = "gender" name="gender">
              <option disabled="" selected="">Gender</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control" placeholder="Birthdate" onfocus="(this.type='date')" id = "birthdate" name="birthdate">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-black-tie"></i>
            </div>
            <select type="text" class="form-control" placeholder="Position" id = "position" name="position">
              <option selected="" disabled="">Position</option>
              @foreach($pos as $pos)
                <option value = "{{$pos -> OfficialPositionID}}">{{$pos -> OfficialPosition}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-envelope"></i>
            </div>
            <input type="email" class="form-control" placeholder="Email" id = "email" name="email">
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-at"></i>
            </div>
            <input type="text" class="form-control" placeholder="Username" id = "username" name="username">
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-eye" style="display:none" id="eye"></i>
            </div>
            <input type="password" class="form-control" placeholder="Password" id = "password" name="password">
           
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group ">
            <div class="input-group-addon">
             <i class="fa fa-eye" style="display:none" id="eye2"></i>
            </div>
            <input type="password" class="form-control" placeholder="Re-enter Password" id = "confirmpassword" name="confirmpassword">
          
          </div>
        </div>
      </div>

        

      <div class="row">
        <div class="col-xs-4"></div>
        

        <div class="col-xs-4">
      
          <button type="submit" class="btn btn-primary btn-block btn-flat" id = "btn" name = "btn">Register</button>

        </div>
        <!-- /.col -->
      </div>
 
    </form>
    </div>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.register-box-body -->
<!-- /.register-box -->

<!-- iCheck -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){

          $("#password").on("keyup",function(){
                  if($(this).val())
                      $("#eye").show();
                  else
                      $("#eye").hide();
                  });
              $("#eye").mousedown(function(){
                          $("#password").attr('type','text');
                          }).mouseup(function(){
                            $("#password").attr('type','password');
                          }).mouseout(function(){
                            $("#password").attr('type','password');
                          });

          $("#confirmpassword").on("keyup",function(){
                  if($(this).val())
                      $("#eye2").show();
                  else
                      $("#eye2").hide();
                  });
              $("#eye2").mousedown(function(){
                          $("#confirmpassword").attr('type','text');
                          }).mouseup(function(){
                            $("#confirmpassword").attr('type','password');
                          }).mouseout(function(){
                            $("#confirmpassword").attr('type','password');
                          });





    $('#username').keyup(function(){
      $.ajax({
        type: 'POST',
        url: 'checkUsername',
        data: {username: $('#username').val()},
        dataType:'JSON',
        success: function(data){
          if(data.hey[0] == 1)
          {
            alert('username not available');
          }
        },
         error: function (request, error) {
                        console.log(arguments);
                        alert(" Can't do because: " + error);
        }
      }).error(function(ts){
                      alert(ts.responseText)
                    });
    });

    $('#confirmpassword').keyup(function(){
      var pass = $('#password').val();

      if($('#confirmpassword').val() != pass)
      {
        $(this).parent("div").addClass("has-error");
      }
      else
      {
        $(this).parent("div").removeClass("has-error");
      }
    });
    
  });
</script>


<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ('bower_components/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- InputMask -->
<script src="{{ asset ('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
</body>
</html>
