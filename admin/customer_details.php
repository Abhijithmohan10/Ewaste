<?php
require_once('header.php');
require_once('../ConnectionClass.php');
$obj=new connectionclass();
$qry="select * from company_category";
$result=$obj->GetTable($qry);

?>
		<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
									<li>View Customer</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
													<div class="forms-main_agileits">
														
															<div class="graph-form agile_info_shadow">
															 <h3 class="w3_inner_tittle two">Customer Details </h3>
																	<div class="form-body">
																		<form action="codes/addcustomer_exe.php" method="post"> 


																			<div class="form-group"> 
																				<label for="exampleInputEmail1">Company Category</label> 
																				<select>
<option value="">select category</option>
<?php  
 foreach($result as $r)
 {
 	?>
 	<option value="<?php echo $r['cmp_cat_id']?>">
 		<?php echo $r['cmp_cat_name']; ?></option>
 		<?php

 }
 ?>
</select>

																			</div> 





																			<div class="form-group"> 
																				<label for="exampleInputEmail1">Company Name</label> 
																				<input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="cmp_name">
																			</div> 
																				<div class="form-group">
																					 <label for="exampleInputPassword1">Email</label> 
																				 <input type="Email" class="form-control" id="exampleInputPassword1" placeholder="" name="cmp_email"> 
																				 
																				 <label for="exampleInputPassword1">Location</label> 
																				 <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="cmp_loc"> 
																				 <label for="exampleInputPassword1">Mobile</label> 
																				 <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="cmp_mob"> 
																				 <label for="exampleInputPassword1">State</label> 
																				 <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="cmp_state"> 
																				 <label for="exampleInputPassword1">City</label> 
																				 <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="cmp_city"> 
																				 <label for="exampleInputPassword1">PIN</label> 
																				 <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="cmp_pin"> 
																				</div>   
																				<button type="submit" class="btn btn-default">>>Back</button> 
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