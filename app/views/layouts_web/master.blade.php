<!DOCTYPE html>
<html>
<head>
	
	<title>
		
            {{ Session::get('brgyname') }}
		
	</title>
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
 <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Custom Theme files -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>

<!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	 <!-- daterange picker -->
 	 <link href="{{ asset('bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
 	 <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/select2/select2.min.css') }}">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/admin-lte/plugins/fullcalendar/fullcalendar.min.css')}}">  
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/admin-lte/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">

	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Study Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web 	template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ('bower_components/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!-- CAPTCHA -->
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Kreon' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>

	<!-- date-range-picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="{{ asset ('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>

	<!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- fullCalendar 2.2.5 -->
	<script src="{{ asset ('bower_components/admin-lte/plugins/fullcalendar/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset ('bower_components/admin-lte/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>


	<!-- date-range-picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="{{ asset ('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{ asset('assets/js/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/easing.js') }}"></script>

	
					<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
		</script>
	<!-- //end-smoth-scrolling -->
	<script src="{{ asset('assets/js/menu_jquery.js') }}"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-menu">
		<div class="wrapper">

				<!-- HEADER -->
				@include('layouts_web.header')


				<!-- Full Width Column -->
		  <div class="content-wrapper" style="background-color: #ecf0f5; overflow: hidden;">
		  <div class="container">
		      <!-- Content Header (Page header) -->
		          @yield('content')
		      <!-- /.content -->
		  </div>
		    <!-- /.container -->
		  </div>
		  <!-- /.content-wrapper -->


		<!-- FOOTER -->
		@include('layouts_web.footer')
		</div>

<!-- Select2 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/select2/select2.full.min.js') }}"></script>
</body>
</html>