<?php
require_once('../ConnectionClass.php');
require_once('header.php');
//session_start();
$obj=new connectionclass();
$email=$_SESSION['email'];

$qry2="select * from customers c inner join company_category cc on c.com_cat_id=cc.cmp_cat_id and c.email='$email'";
//$qry2="select *"
$result2=$obj->GetSingleRow($qry2);
//var_dump($result2);
$cmp_cat_id=$result2['cmp_cat_id'];
$qry="select * from company_category where cmp_cat_id!='$cmp_cat_id'";
$result=$obj->GetTable($qry);
?>
		<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="index.php">Home</a><span>«</span></li>
									<li>Profile </li>
									<li style="float: right">Company: <?php echo $result2['company_name']; ?> </li>
								</ul>
								<ul>

								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->
<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow" style="min-height: 500px;">
									<h3 class="w3_inner_tittle two">View Profile </h3>
									<div class="form-body">
										<form action="codes/profile_exe.php" method="post">
											<div class="col-md-6">
														

											<div class="form-group"> 
												<label for="exampleInputEmail1"> Name [office/company/owner]</label> 
												<input type="text" pattern="[a-zA-Z ]+" title="Characters only" class="form-control" required="" value="<?php echo $result2['company_name'] ?>" id="exampleInputEmail1" placeholder=""name="company_name"> 
											</div>
											
											<div class="form-group">
												<label for="exampleInputPassword1">Company Category</label> 
												<select class="form-control" required="" style="padding: 0px 0px;" name="cmp_cat_id">
													<option value="<?php echo $result2['cmp_cat_id'] ?>"><?php echo $result2['cmp_cat_name'] ?></option>
						 <?php  
                          foreach($result as $r)
                          {
                          ?>
                              <option value="<?php echo $r['cmp_cat_id']?>"><?php echo $r['cmp_cat_name']; ?>
                              </option>
                          <?php
                          }
                          ?>
												</select>
												
											</div>

											<div class="form-group">

												<label for="exampleInputPassword1">Email</label> 
												<input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid Email Format" class="form-control" id="exampleInputPassword1" readonly="" value="<?php echo $result2['email'] ?>" placeholder="" name="email">
											</div>


											<div class="form-group">
												<label for="exampleInputPassword1">Contact Number</label> 
												<input type="text" pattern="[9876][0-9]{9}" title="Enter a valid mobile number" value="<?php echo $result2['phone'] ?>" maxlength="10" minlength="10" class="form-control" id="exampleInputPassword1" required="" placeholder="" name="phone">
											</div>

											
											
										</div>
										<div class="col-md-6">

											<div class="form-group">
												<label for="exampleInputPassword1">State</label> 
												<input type="text" value="<?php echo $result2['state'] ?>" readonly="" class="form-control" id="exampleInputPassword1" placeholder="" name="state">
											</div>
											
											<div class="form-group">
												<label for="exampleInputPassword1">City</label> 
												<input type="text" value="<?php echo $result2['city'] ?>" required="" class="form-control" id="exampleInputPassword1" placeholder="" name="city">
											</div>

											<div class="form-group">
												<label for="exampleInputPassword1">District</label> 
												<select class="form-control" required="" style="padding: 0px 0px;" name="location">
												<option value="<?php echo $result2['location'] ?>"><?php echo $result2['location'] ?></option>
                                        <option value="Trivandrum">Trivandrum</option>
                                        <option value="Kollam">Kollam</option>
                                        <option value="Pathanamthitta">Pathanamthitta</option>
                                        <option value="Alappuzha">Alappuzha</option>
                                        <option value="Kottayam">Kottayam</option>
                                        <option value="Idukki">Idukki</option>
                                        <option value="Ernakulam">Ernakulam</option>
                                        <option value="Thrissur">Thrissur</option>
                                        <option value="Palakkad">Palakkad</option>
                                        <option value="Malappuram">Malappuram</option>
                                        <option value="Kozhikode">Kozhikode</option>
                                        <option value="Wayanad">Wayanad</option>
                                        <option value="Kannur">Kannur</option>
                                        <option value="Kasaragod">Kasaragod</option>
                      </select>


												
											</div>

											<div class="form-group">
												<label for="exampleInputPassword1">Pin Code</label> 
												<input type="text" pattern="[0-9]{6}" title="Invalid format" value="<?php echo $result2['pincode'] ?>" maxlength="6" minlength="6" class="form-control" id="exampleInputPassword1" required="" placeholder="" name="pincode">
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