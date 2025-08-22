 <?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();

$req_id=$_REQUEST['id'];


?>

<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									<li><a href="view_scheduled.php">View Scheduled</a><span>«</span></li>	
					
							
									<li>add Amount</li>
												
								</ul>

							</div>
						</div>

<form action="codes/emp_scheduling_exe.php" method="post">
	<div class="form-group"> 
							
<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Amount</label>
							<input type="text" class="form-control" name="amount" placeholder="" required="">
						</div>
						

<input type="hidden" name="req_id" value="<?php echo $req_id ?>">
<br>
	<button class="btn btn-info">Update Amount</button>

</form>
											</div>				
</div>


<?php
require_once('footer.php');
?>