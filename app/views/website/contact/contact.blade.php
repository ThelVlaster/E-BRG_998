@extends('layouts_web.master')

@section('content')

<div class="contact">
		<div class="container">
			<div class="contact-top">
				<h2><img src="{{ asset('assets/images/c.png')}}" alt="">Contact Us</h2>
				<p>Whether you're looking for answers, would like to solve a problem, or just want to let us know how we did, you'll find many ways to contact us right here. </p>
				</div>
			<div class="map">
				<h1>GET IN TOUCH</h1>
				<center><iframe style="margin-top: 50px;"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61781.0815794649!2d120.95817324588943!3d14.580969910825747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9d943d8ddab%3A0x853191d7ec0ab524!2s596+Barangay+Hall+(Manila)!5e0!3m2!1sen!2sph!4v1457718091404" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
				</center>
				</div>
			<div class="contact-infom">
				<h4>CONTACT INFO</h4>
				<p></p>
			</div>	
			<div class="contact-form">
				<form>
					<input type="text" placeholder="Name">
					<input type="text"  class="email" placeholder="email">
                    <input type="text" placeholder="Telephone">
					<textarea placeholder="Message" required=""></textarea>								
					<input type="submit" value="Submit" >
				</form>
			</div>
			
		</div>
	</div>
<!--contact end here-->

@stop