
<?php
require_once('header1.php');
require_once('Connectionclass.php');
$obj=new connectionclass();
$qry1="select * from company_category";
$category=$obj->GetTable($qry1);
			?>

	<div class="navbar-inner">
		<div class="container">
			<?php
require_once('nav.php');
			?>
		</div>
	</div>
	<!-- //navigation -->

	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>R</span>egistration
				
			</h3>
			<!-- form -->
			<form action="codes/registration_exe.php" method="post">
				<div class="contact-grids1 w3agile-6">
					<div class="row">
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Company category</label>
						<select class="form-control" name="cmp_cat" required="">
							<option value="Select">Select</option>

							<?php
							foreach($category as $company)
							{

							?>

							
     
<option value="<?php echo $company["cmp_cat_id"]?>"> <?php echo $company["cmp_cat_name"]?></option>
	  <?php
	  }
	  ?>
    </select>
						</div>
						
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Contact number</label>
							<input type="text" class="form-control" name="contact" placeholder="" required="" pattern="[9876][0-9]{9}" maxlength="10" minlength="10">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Company name</label>
							<input type="text" class="form-control" name="companyname" placeholder="" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" name="email" placeholder="" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Select District</label>


							<select class="form-control" name="district" required="">
							<option value="">--Select--</option>
							<option value="Thiruvananthapuram">Thiruvananthapuram</option>
							<option value="Kollam">Kollam</option>
							<option value="Pathanamthitta">Pathanamthitta</option>
							<option value="Alappuzha">Alappuzha</option>

							<option value="Kottayam">Kottayam</option>
							<option value="Idukki">Idukki</option>
							<option value="Ernakulam">Ernakulam</option>
							<option value="Thrissur">Thrissur</option>
							<option value="Palakkad">Palakkad</option>
							<option value="Malappuram">Malappuram</option>
							<option value="Kozhikkode">Kozhikkode</option>
							<option value="Kannur">Kannur</option>
							<option value="Kasargode">Kasargode</option>
						
							</select>
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">City</label>
							<input type="text" class="form-control" name="city" placeholder="" required="" pattern="[a-zA-Z ]+" title="Characters Only">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Confirm Password</label>
							<input type="password" class="form-control" name="confirmpassword" placeholder="" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Pin Code</label>
							<input type="text" class="form-control" name="pin" placeholder="" maxlength="6" minlength="6" pattern="[0-9]{6}" required="">
						</div>
						
					</div>
					
					<div class="contact-form">
						<input type="submit" value="Register">
					</div>
				</div>
			</form>
			<!-- //form -->
		</div>
	</div>
	<!-- //contact -->

	<!-- middle section -->

	<!-- footer -->
	<?php
	require_once('footer.php');
	?>