@extends('layouts_web.master')

@section('content')

<!--typo start here-->
<div class="typrography" style="border-top: 3px solid gold; background-image: url('images/bg.png')">
	<div class="container">
	<div class="page" style="border-top: 3px solid blue;">
		<br>
			<center><h1 style="font-family:Montserrat;">ORGANIZATIONS</h1> </center>
			<br>
			<center>
			<p style="font-family:Segoe UI Semibold; font-size:20px">B.U.N.G.A.</p>
			<img src = "{{ asset('bower_components/web/images/bunga.jpg')}}">
			</center>
			<br>
			<br>
			<center>
			<p style="font-family:Segoe UI Semibold; font-size:20px">SENIOR CITIZENS</p>
			<img src = "{{ asset('bower_components/web/images/senior.jpg')}}">
			</center>
			<br>
			<br>
			<center>
			<p style="font-family:Segoe UI Semibold; font-size:20px">TEATRO DE STA. MESA</p>
			<img src = "{{ asset('bower_components/web/images/teatro.jpg')}}">
			</center>
			<br>
			<br>
			<center>
			<p style="font-family:Segoe UI Semibold; font-size:20px">PERALTA YOUTH ORGANIZATION</p>
			<img src = "{{ asset('bower_components/web/images/peralta.jpg')}}">
			</center>
			<br>
			<br>
			<center>
			<p style="font-family:Segoe UI Semibold; font-size:20px">599 YOUTH DEVELOPMENT AND WELFARE ORGANIZATION INC</p>
			<img src = "{{ asset('bower_components/web/images/599youth.jpg')}}">
			</center>
			<br>
			<br>
			<center>
			<p style="font-family:Segoe UI Semibold; font-size:20px">ST. JOSEPH YOUTH ORGANIZATION</p>
			<img src = "{{ asset('bower_components/web/images/saintjoseph.jpg')}}">
			</center>
			<br>
			<br>
			<center>
			<p style="font-family:Segoe UI Semibold; font-size:20px">BALANGAY NG NAZARENO</p>
			<img src = "{{ asset('bower_components/web/images/balangay.jpg')}}">
			</center><br><br>
	 </div>
	 </div>
	 </div>
<!-- container end --> 
<!--typo end here-->

@stop