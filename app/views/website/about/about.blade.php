@extends('layouts_web.master')

@section('content')

	<div class="about" style="background-color: #fff; margin-right: -5%;">
	<div class="container">
		<div class="about-main">
			    <div class="about-top">
					<h2>HISTORY</h2>
					</div>
				<div class="about-bottom">
					<div class="col-md-7 about-left">
						<h6><!--<a href="single.html">Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci donec.</a>--></h6>
						<p>Kung ating babalikan ang panahon bago dumating ang Kastila (1521), mayroon ng mga barangay (villages) na binubuo ng mga tatlumpu (30) hanggang isang daang (100) pamilya at ito ay pinamumunuan ng "datu". Ang pinunong ito ang siyang humahawak ng lehislatibo, ehekutibo at judicial na kapangyarihan para sa kanyang pinanghahawakang barangay.
 Dumaan ang ibat-ibang pangulo ng Pilipinas, at nang dumating ang panahon ng dating Pangulong Ferdinand Marcos, lalong pinalakas ang barangayan. Ang pagtatalga ng mga namumuno ng barangay noon na kinalaunan ay tinawag na Kapitan de Barangay, ay hindi pa idinadaan sa halalan
Sa barangay na ito, ang kauna-unahang Barangay Chairman ay isang babae, sa katauhan nng dating Kgg. Consolacion Lucas. Humigit-kumulang tatlumpu (30) lamang ang bilang ng pamilyang naninirahan sa lugar na ito ng Old Sta. Mesa, na ngayon ay Barangay 599 na.
 Nang magkaroon na ng regular na halalan para sa pagpapalit ng mamumuno, sinundan si Kgg. C. Lucas ni  Kgg. Ramon Pascual, sumunod si Kgg. Wilfredo Tana, at dalawang beses na pamumuno ni Kgg. Benjamin Macalinao.</p>
					</div>
					<hr>
					<div class="col-md-5 about-right">
						<a href="single.html" >
							<img src="{{ asset('assets/images/1.jpg')}}" alt="" class="img-responsive ">
						</a>								
					</div>
					

					
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="team-mem">
			 <h1><img src="{{ asset('assets/images/o.png')}}" alt="" style="margin-top: -5px;"> OFFICIALS</h1>
			<div class="col-md-3 team-grid">
				<img src="{{ asset('assets/images/t1.jpg')}}" style="border: 2px solid black;"  alt="" class="img-responsive">
				    <ul class="img-social-stags">
							<li><a class="twitter" href="#"><span> </span></a><li>
							<li><a class="facebook" href="#"><span> </span></a><li>
							<div class="clearfix"> </div>
					</ul>
				<br>
				<p><center> BARANGAY CHAIRMAN </center></p>
			</div>
			<div class="col-md-3 team-grid">
				<img src="{{ asset('assets/images/t2.jpg')}}" style="border: 2px solid black;"  alt="" class="img-responsive">
				    <ul class="img-social-stags">
							<li><a class="twitter" href="#"><span> </span></a><li>
							<li><a class="facebook" href="#"><span> </span></a><li>
							<div class="clearfix"> </div>
					</ul>
				<br>	
				<p><center> BARANGAY SECRETARY </center></p>
			</div>
			<div class="col-md-3 team-grid">
				<img src="{{ asset('assets/images/t3.jpg')}}" style="border: 2px solid black;" alt="" class="img-responsive">
				    <ul class="img-social-stags">
							<li><a class="twitter" href="#"><span> </span></a><li>
							<li><a class="facebook" href="#"><span> </span></a><li>
							<div class="clearfix"> </div>
					</ul>
				<br>
				<p><center> BARANGAY KAGAWAD </center></p>
			</div>
			<div class="col-md-3 team-grid">
				<img src="{{ asset('assets/images/t4.jpg')}}" style="border: 2px solid black;"  alt="" class="img-responsive">
				     <ul class="img-social-stags">
							<li><a class="twitter" href="#"><span> </span></a><li>
							<li><a class="facebook" href="#"><span> </span></a><li>
							<div class="clearfix"> </div>
					</ul>
				<br>
				<p><center> BARANGAY KAGAWAD </center></p>
			</div>
		   <div class="clearfix"> </div>
		</div>
		</div>
		<!-- <div class="advantages" style="margin-bottom: 40px;">
			<div class="container">
				<div class="advantage-main">
					<div class="advance-top">
						<h3>Services</h3>
					</div>
					<div class="advance-bottom">
					   <div class="col-md-6 advantage-left">
					   	<div class="advanc-grid">
					   	  <div class="col-md-3 advanc-icons">
					   		<img src="{{ asset('assets/images/a1.png')}}" alt="">
					   	  </div>
					   	  <div class="col-md-9 advanc-text">
					   		<h4>Open Access</h4>
					   		<p>Praesent nunc nunc, egestas eget elementum sed; rutrum eget metus! Vestibulum congue congue dui</p>
					   	  </div>
					   	  <div class="clearfix"> </div>
					   	</div>
					   	<div class="advanc-grid">
					   	  <div class="col-md-3 advanc-icons">
					   		<img src="{{ asset('assets/images/a2.png')}}" alt="">
					   	  </div>
					   	  <div class="col-md-9 advanc-text">
					   		<h4>Open Access</h4>
					   		<p>Praesent nunc nunc, egestas eget elementum sed; rutrum eget metus! Vestibulum congue congue dui</p>
					   	  </div>
					   	  <div class="clearfix"> </div>
					   	</div>
					   </div>
					   <div class="col-md-6 advantage-right">
					   	<div class="advanc-grid">
					   	  <div class="col-md-3 advanc-icons">
					   		 <img src="{{ asset('assets/images/a3.png')}}" alt="">
					   	  </div>
					   	  <div class="col-md-9 advanc-text">
					   		<h4>Open Access</h4>
					   		<p>Praesent nunc nunc, egestas eget elementum sed; rutrum eget metus! Vestibulum congue congue dui</p>
					   	  </div>
					   	  <div class="clearfix"> </div>
					   	</div>
					   	<div class="advanc-grid">
					   	  <div class="col-md-3 advanc-icons">
					   		 <img src="{{ asset('assets/images/a4.png')}}" alt="">
					   	  </div>
					   	  <div class="col-md-9 advanc-text">
					   		<h4>Open Access</h4>
					   		<p>Praesent nunc nunc, egestas eget elementum sed; rutrum eget metus! Vestibulum congue congue dui</p>
					   	  </div>
					   	  <div class="clearfix"> </div>
					   	</div>
					   </div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div> -->
</div>
<!--about end here-->

@stop