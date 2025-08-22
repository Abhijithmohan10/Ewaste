<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
$qry1="select * from ewaste_category order by catid desc";
$result=$obj->GetTable($qry1);

?>
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
									<li>Ewaste Category</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
								 
								 <form action="codes/ewastecategory_exe.php?action=insert" method="post">

									<div class="form-body ">
									<div class="row ">
										<div class="form-group col-md-4">

										</div>
										<div class="form-group col-md-4"> 
											<h3 class="w3_inner_tittle two">E-Waste Category </h3>
										<label for="exampleInputEmail1">Category</label> 
											<input pattern="[a-zA-Z ]+" title="Characters only" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" name="cat_name" required=""> 
											<br>
											<label for="exampleInputPassword1">Price</label> 
											 <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Price Details" required="" name="cat_price"> 
											 <br>
											 <input type="submit" name="" value="SUBMIT" class="btn btn-success">
										<input type="reset" name="" value="CANCEL" class="btn btn-danger">
										</div>		

										
										</div>
									</div>
									</form> 
									

															</div>
																
																</div> 
																								
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
							
				    </div>
				
				</div>
	






				    </div>
				
				</div>
		
	</div>
<!-- banner -->

<?php
require_once('footer.php');
?>