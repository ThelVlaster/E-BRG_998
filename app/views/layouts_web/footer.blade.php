<!--footer start here-->
<div class="footer">
	<div class="container">
		<div class="footer-main">
			 <div class="col-md-4 ftr-grid">
			 	<div class="ftr-grid-left">
			 	    <img src="{{ asset('assets/images/location.png')}}" alt="">
			 	</div>
			 	<div class="ftr-grid-right">
			 		<p> 
            		{{ Session::get('brgyadd') }}
			 		</p>
			 	</div>
			   <div class="clearfix"> </div>
			 </div>
			 <div class="col-md-4 ftr-grid">
			 	 <div class="ftr-grid-left">
			 	    <img src="{{ asset('assets/images/email.png')}}" alt="">
			 	</div>
			 	<div class="ftr-grid-right">
			 		<p><a href="#">
            		{{ Session::get('brgyemail') }}
			 		</a><span class="local">E-mail</span></p>
			 	</div>
			   <div class="clearfix"> </div>
			 </div>
			 <div class="col-md-4 ftr-grid">
			 	 <div class="ftr-grid-left">
			 	    <img src="{{ asset('assets/images/phone.png')}}" alt="">
			 	</div>
			 	<div class="ftr-grid-right">
			 		<p>+639 15 890 5468 <span class="local">501-48-32</span></p>
			 	</div>
			   <div class="clearfix"> </div>
			 </div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--footer end here-->
<!--copyright start here-->
<div class="copyright">
	<div class="container">
		<div class="copyright-main">
			   <p>© 2016 All rights reserved | Coded with <i class="fa fa-heart"></i> and lots of <i class="fa fa-coffee"></i> by  <a href="#" target="_blank"> BSIT 4-2 #TEAMBarangay </a></p>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--copyright end here-->