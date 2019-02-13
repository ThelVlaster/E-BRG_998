@extends('layouts_web.master')

@section('content')

<!--news start here-->
		 <div class="single" style="background-color: #fff;">
			<div class="container">
			<div class="col-md-8 ">
				<div class=" single-grid">
					<img class="img-responsive" src="{{ asset('assets/images/4.jpg')}}" alt="">
					<div class="lone-line">
						<h4>Barangay General Assembly</h4>
						<div class="cal">
							<ul>
								<li><span ><i class="glyphicon glyphicon-calendar"> </i>22.08.2014</span></li>
								<li><a href="#" ><i class="glyphicon glyphicon-comment"> </i>24</a></li>
							</ul>
						</div>
						<p>Dahil sa modernong teknolohiya  ng ating henerasyon ngayon, ay nagkaroon ng pagkakataon ang ating Barangay 599 na mailathala sa world-wide web (www.) ang ating unang website (www.sanggunian599.webnode.com)  noong 2009 na naglalaman ng mga impormasyom tungkol sa mga naunang administrasyon.</p>
 		
						<p>Dahil dito ay nagkaroon ng interes ang mga estudyante ng ibat' ibang unibersidad, partikular na ang PUP, Ateneo, San Beda, UP at CEU, at dinayo ang ating barangay para sa kanilang outreach programs, thesis, seminars &amp; trainings, medical and health missions.</p>
 
						<p>Gayundin ay naging focus of attention ang ating komunidad sa ilang mga ahensya ng gobyerno, private sectors, at mga media companies dahil sa mga aktibidades na nailathala dito na may kaugnayan sa kanilang mga misyon at proyekto. </p>


					</div>
				</div>
					<div class=" single-profile">
				<h4> Related Posts</h4>
				<div class="single-left ">					
					<div class="col-md-3 post-top">
					<img class="img-responsive " src="{{ asset('assets/images/s1.jpg')}}" alt="">
						<h6>Gift Giving</h6>
					</div>
					<div class="col-md-3 post-top">
					<img class="img-responsive " src="{{ asset('assets/images/s2.jpg')}}" alt="">
						<h6>PUP IT Students</h6>
						
					</div>
					<div class="col-md-3 post-top">
					<img class="img-responsive " src="{{ asset('assets/images/s3.jpg')}}" alt="">
						<h6>General Assembly</h6>
					</div>
					<div class="col-md-3 post-top">
					<img class="img-responsive " src="{{ asset('assets/images/s4.jpg')}}" alt="">
						<h6>Rice Giving</h6>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="single-bottom">
		
			<h3>Leave a Comment</h3>
				<form>
						<div class="col-md-6 comment">
							<input type="text" placeholder="Name">
						</div>
						<div class="col-md-6 comment">
							<input type="text" placeholder="email">
						</div>
						<div class="clearfix"> </div>
							<textarea placeholder="Message" required=""></textarea>	
							<input type="submit" value="Send">
						
				</form>
			
		</div>
				</div>
					<div class="col-md-3 categories-grid">
				<div class="grid-categories">
					<h4>Achievements</h4>
					<ul class="popular popular-in">
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>DEC 2015</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>OCT 2015</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>JAN 2015</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>MAY 2014</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-ok"> </i>SEP 2012</a></li>
					</ul>
				</div>
			</div>
				<div class="clearfix"> </div>
			
			</div>
	</div>

<!--//news end here-->

@stop