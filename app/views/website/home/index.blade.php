@extends('layouts_web.master')

@section('content')

<header class="main-header">
<div class="header">
	<div class="container-fluid">
		 <div class="header-main">
			<div class="bann-bottom">
				<h1 style="font-family: Montserrat; font-size: 50px; font-size: 5.4vw; ">
            {{ Session::get('brgyname') }}
				</h1><hr style="width: 550px;">
				<p style="font-family: Montserrat;">
            	{{ Session::get('brgyadd') }}	
				</p>
				<div class="bann-main">
				<!--
					<div class="col-md-2 bann-grid" style="margin-left: 10%;">
						<img src="images/i1.png" alt="">
						<a href="officials.html"><h4>Officials</h4></a>
					</div>
					<div class="col-md-2 bann-grid" style="margin-left: 13%;">
						<img src="{{ asset('assets/images/i1.png')}}" alt="">
						<a href="profile.html"><h4>Profile</h4></a>
					</div>
					<div class="col-md-2 bann-grid" style="margin-left: 10%;">
						<img src="{{ asset('assets/images/i3.png')}}" alt="">
						<a href="service.html"><h4>Services</h4></a>
					</div>
					<div class="col-md-2 bann-grid" style="margin-left: 10%;">
						<img src="{{ asset('assets/images/i4.png')}}" alt="">
						<a href="organization.html"><h4>Organizations</h4></a>
					</div>
					-->
				<div class="clearfix"> </div>
			</div>
		 </div>
	 </div>
   </div>
 </div>
</div>


<!--header end here-->
<!--baner-info start here-->
<div class="banner-info" style="background-color: #fff; margin-top: -20%; border-top: 4px solid gold">
	<div class="container-fluid">
		<div class="banner-info-main">
		<h1 style="font-family: Montserrat; color: #fc5c5c; margin-left: -5px;"><center>
		<img src="{{ asset('assets/images/n.png')}}" alt=""> NEWS </center></h1>
		<br><br>
			<div class="col-md-6 bann-info-left">
				<img src="{{ asset('assets/images/2.jpg')}}" alt="" class="img-responsive"><br>
				<h3 style="font-family: Montserrat; font-size:18px">PUP IT students to develop Barangay System</h3><br>
				<h5>December 1, 2015 by <i>by ADMIN</i></h5>
				<hr>
				<p>3rd year Information Technology students from Polytechnic University of the Philippines, Sta. Mesa, Manila will be developing the Barangay's Database System. This will be helpful on achieving automated processes in the near future. </p>
			</div>
			<div class="col-md-6 bann-info-left">
				<img src="{{ asset('assets/images/balance.jpg')}}" alt="" class="img-responsive"><br>
				<h3 style="font-family: Montserrat; font-size:18px">General Assembly 2015</h3><br>
				<h5>December 1, 2015 by <i>by ADMIN</i></h5>
				<hr>
				<p>The annual general assembly of Barangay 599 Zone 59, Sta. Mesa, Manila was headed by the Barangay Chairman, Hon. Salvador Onanad together with our Kagawads. This event ended successfully of course with the help of our one-of-a-kind Congresswoman Sandy Ocampo</p> 
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--banner-info end here-->
<!--testimonal start here-->
<div class="testimonal" style="border-top: 4px solid gold;">
	<div class="container-fluid">
		<div class="testimonal-main">
			 <h2>MISSION</h2>
			 <p style="font-family: Kreon;">
                      Tugunan ang pangangailangan ng mga nasasakupan lalo na ang mga kabataan upang
					  maisa-alang-alang sa mga programa at proyektong barangay and kanilang kinabukasan.
              </p>
			<br>  
			<hr style="width: 800px;">
			<h2>VISION</h2>
			 <p style="font-family: Kreon;">
                      Isang barangay na may kumpletong pasilidad upang maibigay lahat ng serbisyo para sa 
					  isang mapayapa at masayang komunidad. Isang barangay kung saan and lahat ay nagtutulung-tulong 
					  upsang masigurong matulungan ang kalusugan, edukasyon, proteksyon at partisipasyon ng mga kabataan.
              </p>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--testimonal end here-->
<!--we work strat her-->
<div class="we-work" style="border-top: 4px solid gold;">
	<div class="container">
		<div class="we-work-main">
			<div class="we-work-top">
				<h3><img src="{{ asset('assets/images/a.png')}}" alt=""> ANNOUNCEMENTS</h3>
				<p>Sa ikalawang pagkakataon,  sa ilalim ng pamamahala ng bagong halal na Kagalang-galang na Punong Barangay Salvador “Buddy” Onanad, ay muli tayong nakapagpalathala ng ikalawang official barangay website na magsasalamin naman ng mga kaganapan sa bagong pamunuan.</p>
			</div>
			<div class="we-work-bottom">
				 <div class="col-md-6 we-work-left">
				 	<div class="col-md-6 we-left-img1">
				 		<img src="{{ asset('assets/images/w1.jpg')}}" alt="" class="img-responsive">
				 	</div>
				 	<div class="col-md-6 we-left-img2">
				 		<img src="{{ asset('assets/images/w2.jpg')}}" alt="" class="img-responsive">
				 	</div>
				 	<div class="clearfix"> </div>
				 </div>
				 <div class="col-md-6 we-work-right">
				 	<p> Layunin ng bawat pahina rito na maiparating sa inyong lahat ang mga mga mahahalagang datus na  nais malaman na hindi na kailangan pang bumisita sa tanggapan ng Barangay 599, bagaman kayo po ay bukas–palad na pagsisilbihan anumang oras na inyong bisitahin ang barangay at kailanganin ang serbisyo ng mga opisyal.</p>
				 </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--we work end here-->
<!--feature start here-->
<hr style="height: 3px;">
<div class="features">
	<div class="container">
		<div class="features-main">
			  <div class="features-top">
			  	 <h3><img src="{{ asset('assets/images/e.png')}}" alt=""> EVENTS</h3>
			  	 <p> </p>
			  </div>
			  <div class="features-bottom">
			  	 <div class="col-md-3 feature-grid">
			  	 	<img src="{{ asset('assets/images/f1.jpg')}}" alt="" class="img-responsive">
			  	 	<center><h4>ASSEMBLY 
					<p style="font-size: 15px; color: black; font-family: Kreon;">08/22/2015</p>
					</h4></center>
			  	 	
			  	 </div>
			  	  <div class="col-md-3 feature-grid">
			  	 	<img src="{{ asset('assets/images/f2.jpg')}}" alt="" class="img-responsive">
			  	 	<center><h4>RICE GIVING 
					<p style="font-size: 15px; color: black; font-family: Kreon;">09/03/2015</p>
					</h4></center>
			  	 	
			  	 </div>
			  	  <div class="col-md-3 feature-grid">
			  	 	<img src="{{ asset('assets/images/f3.jpg')}}" alt="" class="img-responsive">
			  	 	<center><h4>GIFT GIVING 
					<p style="font-size: 15px; color: black; font-family: Kreon;">06/13/2016</p>
					</h4></center>
			  	 </div>
			  	  <div class="col-md-3 feature-grid">
			  	 	<img src="{{ asset('assets/images/f4.jpg')}}" alt="" class="img-responsive">
			  	 	<center><h4>FIESTA 
					<p style="font-size: 15px; color: black; font-family: Kreon;">10/13/2015</p>
					</h4></center>
			  	 </div>
			  	 <div class="clearfix"> </div>
			  </div>
		</div>
	</div>
</div>
<!--services end here-->

@stop