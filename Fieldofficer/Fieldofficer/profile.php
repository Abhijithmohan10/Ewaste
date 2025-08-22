<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
$email=$_SESSION['email'];

$qry2="select * from employee inner join login on employee.email=login.username";
$result2=$obj->GetSingleRow($qry2);
//var_dump($result2);
?>
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="index.php">Home</a><span>«</span></li>
									<li>Profile </li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->
<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow" style="min-height: 400px;">
									<h3 class="w3_inner_tittle two">View Profile </h3>
									<div class="form-body">
										<form action="codes/employee_exe.php?action=update" method="post">
											<div class="col-md-6">
														

											<div class="form-group"> 
												<label for="exampleInputEmail1"> Name</label> 
												<input type="text" pattern="[a-zA-Z ]+" title="Characters only" class="form-control" required="" value="<?php echo $result2['emp_name'] ?>" id="exampleInputEmail1" placeholder=""name="emp_name"> 
											</div>
											<div class="form-group">

												<label for="exampleInputPassword1">Email</label> 
												<input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid Email Format" class="form-control" id="exampleInputPassword1" readonly="" value="<?php echo $result2['email'] ?>" placeholder="" name="emp_email">
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Phone Number</label> 
												<input type="text" pattern="[9876][0-9]{9}" title="Enter a valid mobile number" value="<?php echo $result2['phone'] ?>" maxlength="10" minlength="10" class="form-control" id="exampleInputPassword1" required="" placeholder="" name="emp_phn">
											</div>
											
										</div>
										<div class="col-md-6">


											<div class="form-group">
												<label for="exampleInputPassword1">Gender</label>
												<select name="gender" required="" class="form-control" style="min-height: 35px; padding: 0px 12px;">

													<?php 
														$gen=$result2['gender'];
														if($gen=='Male')
														{
															?>
															<option value="Male">Male</option>
													<option value="Female">Female</option>
															<?php
														}
														else
														{
															?>
															<option value="Female">Female</option>
															<option value="Male">Male</option>
													
															
													
															<?php
														}
													 ?>

													<!------------------------>
													
												</select>
											</div>

											<div class="form-group">
												<label for="exampleInputPassword1">City</label> 
												<input type="text" value="<?php echo $result2['city'] ?>" required="" class="form-control" id="exampleInputPassword1" placeholder="" name="emp_city">
											</div>
											
											<div class="form-group">
												<input type="submit" name="submit" class="btn btn-info" value="UPDATE">
											<input type="reset" name="cancel" class="btn btn-danger" value="CANCEL">
											</div>						 	
											
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
				    </div>					<!--//forms-->											   
					
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