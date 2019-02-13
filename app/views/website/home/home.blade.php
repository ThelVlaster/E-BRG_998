@extends('layouts_web.master')

@section('content')

<div class="bann-bottom">
				<h1 style="font-family: Oswald; margin-top: -7%;">
            {{ Session::get('brgyname') }}
				</h1><hr style="width: 550px;">
				<p style="font-family: Montserrat;">STA. MESA, MANILA </p>
				<div class="bann-main">
					<!--
					<div class="col-md-2 bann-grid" style="margin-left: 10%;">
						<img src="images/i1.png" alt="">
						<a href="officials.html"><h4>Officials</h4></a>
					</div>-->
					<div class="col-md-2 bann-grid" style="margin-left: 13%;">
						<img src="{{ asset('bower_components/web/images/i1.png')}}" alt="">
						<a href="profile.html"><h4>Profile</h4></a>
					</div>
					<div class="col-md-2 bann-grid" style="margin-left: 10%;">
						<img src="{{ asset('bower_components/web/images/i3.png')}}" alt="">
						<a href="service.html"><h4>Services</h4></a>
					</div>
					<div class="col-md-2 bann-grid" style="margin-left: 10%;">
						<img src="{{ asset('bower_components/web/images/i4.png')}}" alt="">
						<a href="organization.html"><h4>Organizations</h4></a>
				</div>
				<div class="clearfix"> </div>
			</div>
		 </div>
	 </div>
   </div>
</div>
<!--header end here-->
<!--baner-info start here-->
<div class="banner-info" style="border-top: 4px solid gold;">
	<div class="container">
		<div class="banner-info-main">
		<h1 style="font-family: Montserrat; color: #fc5c5c; margin-left: -5px;"><center>
		<img src="{{ asset('bower_components/web/images/n.png')}}" alt=""> NEWS </center></h1>
		<br><br>
			<div class="col-md-6 bann-info-left">
				<img src="{{ asset('bower_components/web/images/2.jpg')}}" alt="" class="img-responsive">
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
			</div>
			<div class="col-md-6 bann-info-left">
				<img src="{{ asset('bower_components/web/images/balance.jpg')}}" alt="" class="img-responsive">
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
			</div>
		  <div class="clearfix"> </div>
		</div>
		<div class="bann-info-btn"><a href="single.html" class="hvr-bounce-to-right">Read More</a></div>
	</div>
</div>
<!--banner-info end here-->
<!--testimonal start here-->
<div class="testimonal" style="border-top: 4px solid gold;">
	<div class="container">
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
				<h3><img src="{{ asset('bower_components/web/images/a.png')}}" alt=""> ANNOUNCEMENTS</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			</div>
			<div class="we-work-bottom">
				 <div class="col-md-6 we-work-left">
				 	<div class="col-md-6 we-left-img1">
				 		<img src="{{ asset('bower_components/web/images/w1.jpg')}}" alt="" class="img-responsive">
				 	</div>
				 	<div class="col-md-6 we-left-img2">
				 		<img src="{{ asset('bower_components/web/images/w2.jpg')}}" alt="" class="img-responsive">
				 	</div>
				 	<div class="clearfix"> </div>
				 </div>
				 <div class="col-md-6 we-work-right">
				 	<p> Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
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
			  	 <h3><img src="{{ asset('bower_components/web/images/e.png')}}" alt=""> EVENTS</h3>
			  	 <p> </p>
			  </div>
			  <div class="features-bottom">
			  	 <div class="col-md-3 feature-grid">
			  	 	<img src="{{ asset('bower_components/web/images/f1.jpg')}}" alt="" class="img-responsive">
			  	 	<center><h4>ASSEMBLY 
					<p style="font-size: 15px; color: black; font-family: Kreon;">08/22/2015</p>
					</h4></center>
			  	 	<p>quae ab illo inventore veritatis et quasi architecto beatae vitae</p>
			  	 </div>
			  	  <div class="col-md-3 feature-grid">
			  	 	<img src="{{ asset('bower_components/web/images/f2.jpg')}}" alt="" class="img-responsive">
			  	 	<center><h4>RICE GIVING 
					<p style="font-size: 15px; color: black; font-family: Kreon;">09/03/2015</p>
					</h4></center>
			  	 	<p>quae ab illo inventore veritatis et quasi architecto beatae vitae</p>
			  	 </div>
			  	  <div class="col-md-3 feature-grid">
			  	 	<img src="{{ asset('bower_components/web/images/f3.jpg')}}" alt="" class="img-responsive">
			  	 	<center><h4>GIFT GIVING 
					<p style="font-size: 15px; color: black; font-family: Kreon;">06/13/2016</p>
					</h4></center>
			  	 	<p>quae ab illo inventore veritatis et quasi architecto beatae vitae</p>
			  	 </div>
			  	  <div class="col-md-3 feature-grid">
			  	 	<img src="{{ asset('bower_components/web/images/f4.jpg')}}" alt="" class="img-responsive">
			  	 	<center><h4>FIESTA 
					<p style="font-size: 15px; color: black; font-family: Kreon;">10/13/2015</p>
					</h4></center>
			  	 	<p>quae ab illo inventore veritatis et quasi architecto beatae vitae</p>
			  	 </div>
			  	 <div class="clearfix"> </div>
			  </div>
		</div>
	</div>
</div>
<!--services end here-->

@stop