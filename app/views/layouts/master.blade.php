<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "Barangay Request and Monitoring System" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- daterange picker -->
  <link href="{{ asset('bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />

  <!-- Bootstrap time Picker -->
  <link href="{{ asset('bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
     <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/select2/select2.min.css') }}">
   
   <!-- switch -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/switch/css/bootstrap3/bootstrap-switch.css') }}">
 
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

     <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/select2/select2.min.css') }}">
      <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/morris/morris.css')}}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css')}}">



    <link href="{{ asset('bower_components/admin-lte/dist/css/skins/_all-skins.css')}}" rel="stylesheet" type="text/css" />
    <!-- FONT FAMILY -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">

    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/admin-lte/plugins/fullcalendar/fullcalendar.min.css')}}">  
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/admin-lte/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">


     <style type="text/css">

      th {text-align:center}
      
    </style>


  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/iCheck/all.css')}}">

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

    <!-- Header -->
    @include('layouts.header')


  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
          @yield('content')
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 

    <!-- Footer -->
    @include('layouts.footer')

</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="{{ asset ('bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<!-- Select2 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/select2/select2.full.min.js') }}"></script>


<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ('bower_components/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('bower_components/admin-lte/dist/js/app.min.js') }}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{ asset ('bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{ asset ('bower_components/admin-lte/plugins/fastclick/fastclick.js') }}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{ asset ('bower_components/admin-lte/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{ asset ('bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/chartjs/Chart.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('bower_components/admin-lte/dist/js/demo.js') }}" type="text/javascript"></script>

<!-- Select2 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/select2/select2.full.min.js') }}"></script>


<!-- DataTables -->
<script src="{{ asset ('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<!-- fullCalendar 2.2.5 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/fullcalendar/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/fullcalendar/fullcalendar.min.js') }}" ype="text/javascript"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>



  <!-- InputMask -->
<script src="{{ asset ('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset ('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>


<!-- iCheck 1.0.1 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset ('bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>

<!-- JS COLOR-->
<script src="{{ asset ('bower_components/admin-lte/plugins/jscolor/jscolor.js') }}"></script>

 <!-- switch -->
<script src="{{ asset('bower_components/admin-lte/plugins/switch/js/bootstrap-switch.js') }}"></script>

<script>
      $(function () {
        $("#example1").DataTable();
        
      });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->



</body>
</html>
