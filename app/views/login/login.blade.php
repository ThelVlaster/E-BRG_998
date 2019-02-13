<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $page_title or "Login | Barangay Request and Monitoring System" }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/iCheck/square/blue.css') }}">

  <!-- FONT -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>

  <!-- Bootstrap 3.3.2 -->
  <link href="{{ asset('bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link href="{{ asset('bower_components/admin-lte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
  <link href="{{ asset('bower_components/admin-lte/dist/css/skins/_all-skins.css')}}" rel="stylesheet" type="text/css" />

</head>
<body class="hold-transition login-page" style="background-image: url('{{ asset('bower_components/admin-lte/dist/images/brgy1.png')}}'); background-size: cover;">

@if (Session::get('messageLogin'))
    <div class="alert alert-danger">
        {{ Session::get('messageLogin') }}
    </div>
@endif
<div class="col-md-2">
</div>
<div class="col-md-8">
<div class="login-box" style=" height: 400px;">
  <div class="login-logo" style="background-color: white; opacity: 0.8; ">
    <a href="../../index2.html"><b>SIGN</b>-IN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="opacity: 0.8; height: 350px; ">
  <br>

    <form action="{{URL::to('loginVerification')}}" method="post">
      <div class="form-group has-feedback" style="margin: 20px 20px 20px 20px; color: black;">
        <input type="text" class="form-control" placeholder="Username" style="outline: black 2px;" name = "username" id = "username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" style="margin: 20px 20px 20px 20px; color: black;">
        <input type="password" class="form-control" placeholder="Password" style="outline: black 2px;" name = "password" id = "password" required>
         <i style="display:none; right: 30px; position: absolute; top: 11px;" id="eye" class="fa fa-eye"></i>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
		<br>
          <div class="checkbox" style="margin-left: 20px">
            <label>
              <input type="checkbox" stlye="font-family: Roboto Slab; color: black;"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
		<br>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id = "btn" name = "btn">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
	<br><br>

	<center>
    <a href="#" style=" font-family: Roboto Slab; color: gray; text-decoration: none;">I forgot my password</a><br>
    <a href="{{URL::to('register')}}" style=" font-family: Roboto Slab; color: gray; text-decoration: none;">Register a new account</a><br>
    
	</center>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>
<div class="col-md-2">
</div>

<!-- iCheck -->
<script src="{{ asset ('bower_components/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<!-- jQuery 2.1.3 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ('bower_components/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>


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


        $('#btn').click(function(){
          var checkUsername = $.trim($('#username').val());

          if(checkUsername == "")
          {
            alert('Please complete the forms');
            return false
          }
          else
          {
            return true;
          }

        });
    });
  </script>