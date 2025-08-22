<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
$qry1="select * from ewaste_category";
$result=$obj->GetTable($qry1);
//var_dump($result);
?>

<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								
							</div>
							<ul>
									<li><a href="main-page.html">Home</a><span>«</span></li>
									
									<li>Selling</li>
									
								</ul>
						</div>



						<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
									<h3 class="w3_inner_tittle two">New Selling Request </h3>
									<div class="form-body">
										<form method="post" action="codes/selling_exe.php?action=insert"> 
											<label for="exampleInputPassword1">Item Title</label> 
											 <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" required="" name="item_title">

											<label for="exampleInputEmail1">Category</label> 
										<select class="form-control" required="" style="height: 46px;" name="catid">
											<option value="">--select--</option>
											<?php
											foreach ($result as $r) 
											{
												
											?>
											<option value="<?php echo $r['catid'] ?>"><?php echo $r['catname'] ?></option>

											<?php

										}
											?>
										</select>
											
											
											 <label for="exampleInputPassword1">Description</label> 
											 <textarea class="form-control" required="" name="description"></textarea> 
											 <label for="exampleInputPassword1">Quantity</label> 
											 <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" required="" name="qty"> 
											 <br>
											 <input type="submit" name="" value="SUBMIT" class="btn btn-success">
										</form> 
									</div>
								</div>																
							</div> 
													
				    </div>



</div>


<?php
require_once('footer.php');
?>