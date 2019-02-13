@extends('layouts_web.master')

@section('content')

<!--gallery-starts-->
	<div class="gallery">
		<div class="container">
			<div class="gallery-top heading">
				<h2>Our Gallery</h2>
				<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra</p>
			</div>
			<section>
				<ul id="da-thumbs" class="da-thumbs">
					<li>
						<a href="{{ asset('assets/images/g1.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g1.jpg')}}" alt="" class="img-responsive">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ asset('assets/images/g2.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g2.jpg')}}" alt="">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ asset('assets/images/g3.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g3.jpg')}}" alt="">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ asset('assets/images/g4.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g4.jpg')}}" alt="">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<li>	
						<a href="{{ asset('assets/images/g5.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g5.jpg')}}" alt="">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ asset('assets/images/g6.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g6.jpg')}}" alt="">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ asset('assets/images/g7.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g7.jpg')}}" alt="">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ asset('assets/images/g8.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g8.jpg')}}" alt="">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ asset('assets/images/g9.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="{{ asset('assets/images/g9.jpg')}}" alt="">
							<div>
								<h5>Education</h5>
								<span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
							</div>
						</a>
					</li>
					<div class="clearfix"> </div>
				</ul>
			</section>
				
		<script type="text/javascript">
			$(function() {
			
				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

			});
		</script>
        </div>
	</div>
<!--gallery-end-->

@stop