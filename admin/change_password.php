<?php
require_once('header.php');
?>
		<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									<li>Change Password </li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
									<h3 class="w3_inner_tittle two">Change Password </h3>
									<div class="form-body">
										<form method="post" action="codes/changepassword_exe.php"> 
											<div class="form-group"> 
												<label for="exampleInputEmail1">Current Password</label> 
												<input type="Password" class="form-control" required="" id="exampleInputEmail1" placeholder="" name="currentpass">
											</div> 
											<div class="form-group" >
												<label for="exampleInputPassword1">New Password</label> 
												<input type="password"  required="" class="form-control" id="exampleInputPassword1" placeholder="" name="newpass"> 
											</div> 
											<div class="form-group" >
												<label for="exampleInputPassword1">Confirm Password</label> 
												<input type="password"  required="" class="form-control" id="exampleInputPassword1" placeholder="" name="conpass"> 
											</div>   
											<input type="submit" class="btn btn-default" value="Submit"> 
										</form> 
									</div>
								</div>																<!--/forms-inner-->													  				
																	<!--//forms-inner-->
							</div> 
														<!--//forms-->											   
					
							<!-- /social_media-->
						 
						<!-- //social_media-->
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->
<?php
require_once('footer.php');
?>