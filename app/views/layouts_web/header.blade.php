				<!---->
					<div class="header-logo" style="background-color:#3CB371">
						
						<div class="top-nav" style="background-color:">
							<span class="icon"><img src="{{ asset('assets/images/menu.png')}}" alt=""> </span>
							<ul style="background-color:#737373">
								<li ><a href="<?php echo 'index' ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a> </li>
								<li ><a href="<?php echo 'about' ?>" ><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;About  </a> </li>
								<li><a href="<?php echo 'news' ?>" ><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;&nbsp;News </a></li>
								<li><a href="<?php echo 'contact' ?>" ><i class="fa  fa-phone"></i>&nbsp;&nbsp;&nbsp;Contact Us</a></li>
								<li><a href="<?php echo 'request' ?>"  ><i class="fa  fa-plus-square"></i>&nbsp;&nbsp;&nbsp;iRequest</a></li>
								<li><a href="<?php echo 'login' ?>" ><i class="fa fa-external-link"></i>&nbsp;&nbsp;&nbsp;Login</a></li>
								<li><a href="<?php echo 'register' ?>" ><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Register</a></li>
								
							</ul>
							<!--script-->
						<script>
							$("span.icon").click(function(){
								$(".top-nav ul").slideToggle(500, function(){
								});
							});
					</script>				
				</div>
				<div class="clearfix"> </div>
					</div>
			<!---->
			<div class="top-menu">					
					<ul><li><a href="<?php //echo 'index' ?>"> <img style="width:75px;height:75px" src="{{ asset('assets/images/lo1.png')}}" alt="" > </a></li>
						<li><a href="<?php echo 'index' ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a> </li>
						<li><a href="<?php echo 'about' ?>"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;&nbsp;About  </a> </li>
						
						
						<li><a href="<?php echo 'news' ?>"><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;&nbsp;News </a></li>
						<li><a href="<?php echo 'contact' ?>"><i class="fa  fa-phone"></i>&nbsp;&nbsp;&nbsp;Contact Us</a></li>
						<li><a href="<?php echo 'request' ?>"><i class="fa  fa-plus-square"></i>&nbsp;&nbsp;&nbsp;iRequest</a></li>

						<li align="right"><a href="<?php echo 'login' ?>"><i class="fa fa-external-link"></i>&nbsp;&nbsp;&nbsp;Login</a></li>
						<li align="right"><a href="<?php echo 'register' ?>"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Register</a></li>
					</ul>
				</div>
					<!--script-->