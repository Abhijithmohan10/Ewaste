<?php
require_once('header.php');

 
 $req_id=$_REQUEST['req_id'];
 //var_dump($req_id);


?>
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="index.php">Home</a><span>«</span></li>
									<li>Payment </li>
									
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow" style="min-height: 400px;">
									<h3 class="w3_inner_tittle two">Enter Companies Bank Account Details </h3>
									<div class="form-body">
										<form action="codes/payment_exe.php" method="get">
											<div class="col-md-6">
											<div class="form-group">
											
											<input type="hidden" name="req_id" value="<?php echo $req_id; ?>"> 
												<label for="exampleInputPassword1">Account Number</label>
																				 
												<input type="number" class="form-control" id="exampleInputPassword1" required="" placeholder="" name="acc_no">
											</div>				

											<div class="form-group"> 
												<label for="exampleInputEmail1"> Owner Name</label> 
												<input type="text" pattern="[a-zA-Z. ]+" title="Characters only" class="form-control" required="" id="exampleInputEmail1" placeholder=""name="owner"> 
											</div>
											<div class="form-group">

												<label for="exampleInputPassword1">IFSC Code</label> 
												<input type="text" class="form-control" id="exampleInputPassword1" required="" placeholder="" name="ifsc" maxlength="11">
											</div>
											<input type="submit" name="submit" class="btn btn-info" value="SUBMIT">
											<input type="reset" name="cancel" class="btn btn-danger" value="CANCEL">
											
										</div>
										

											
                                          

											
																	 	
											
										
												<!--<label for="exampleInputPassword1">Password</label> 
												<input type="password" class="form-control" id="exampleInputPassword1" required="" placeholder=""name="emp_pass"> 
												
												<label for="exampleInputPassword1">Confirm Password</label> 
												<input type="password" class="form-control" id="exampleInputPassword1" placeholder=""name="cng_pass"> -->
											   
											
											
										</form> 
									</div>

								</div>
																<!--/forms-inner-->
													  				
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