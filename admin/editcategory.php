<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
$qry1="select * from ewaste_category order by catid desc";
$result=$obj->GetTable($qry1);
//var_dump($result);
$catid=$_REQUEST['catid'];
$qry2="select * from ewaste_category where catid='$catid'";
$result2=$obj->GetSingleRow($qry2);
//echo $result2['catname'];
//var_dump($result2);
?>
		<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									<li>Category <span>«</span></li>
									<li>Edit</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
									 <div style="float: right;" ><a href="ewastecategory.php" class="btn btn-success">Add</a></div>
								
								 <form action="codes/ewastecategory_exe.php?action=update" method="post" action="codes/edit_ewastecategory_exe"> 

									<div class="form-body">
										<div class="row ">
										<div class="form-group col-md-4">

										</div>
										<div class="form-group col-md-4"> 
										
										 <h3 class="w3_inner_tittle two">E-Waste Category-Edit </h3>
											<label for="exampleInputEmail1">Category</label> 
											<input type="text" class="form-control" pattern="[a-zA-Z ]+" title="Characters only" id="exampleInputEmail1" placeholder="Enter category name" name="cat_name" value="<?php echo $result2['catname']; ?>" > <br>
										
										 <label for="exampleInputPassword1">Price</label> 
											 <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="cat_price" value="<?php echo $result2['price']; ?>"><br>
											 <input type="hidden" name="catid" value="<?php echo $catid ?>"> 
										<input type="submit" name="" value="SUBMIT" class="btn btn-default">  

										</div>
										</div>
										</form> 
																	</div>

															</div>
																<!--/forms-inner-->
													  				
																	<!--//forms-inner-->
																</div> 
																


		<!-- /inner_content-->
				
					

					
									
									<div class="agile-tables">
										<div class="w3l-table-info agile_info_shadow">
										 
											<table id="table">
											<thead>
											  <tr>
											  	<th>#</th>
												<th> Category Name</th>
												<th>Price</th>
												<th>Edit</th>
												<th>Delete</th>
												
												
											  </tr>
											</thead>
											<tbody>
												<?php
												$i=0;
												foreach ($result as $r) 
												{
													$i++;
													?>
												


											    <tr>
												<td><?php echo $i;?></td>
												<td><?php echo $r["catname"];?></td>
												<td><?php echo $r["price"];?></td>
												<td><a href="editcategory.php?catid=<?php echo $r['catid'];?>"> EDIT </a></td>
												<td><a onClick='return confirm("Are you sure want to delete ?");' href="codes/ewastecategory_exe.php?action=delete&catid=<?php echo $r['catid'];?>"> DELETE </a></td>
												
											  </tr>
											  <?php
											}
											?>

											 
											 
											</tbody>
										  </table>
									
									  
								</div>
								

						</div>
							<!-- //tables -->
					
							<!-- /social_media-->
						  
						<!-- //social_media-->
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
















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