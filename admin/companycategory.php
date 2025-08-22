
<?php 
require_once('header.php');
require_once('../Connectionclass.php');
$obj=new connectionclass();
$qry="select * from companycategory";
$result=$obj->GetTable($qry);
//var_dump($result);
?>
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="index.php">Home</a><span>«</span></li>
									
									<li>Sample Page</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">

						
					  <h2 class="w3_inner_tittle">Main Heading</h2>
<!--------------------------------------------------------------------------------------------------------------                                                  FORM START HERE -------------------------------------------------------------------------------------------------------------->	
<div class="agile-grids">	
				<!-- validation -->
				<div class="grids">
					
					<div class="forms-grids">
						
		
						<div class="w3agile-validation w3ls-validation">
							<div class="agile-validation agile_info_shadow">
								<div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
									<div class="input-info">
									 <h3 class="w3_inner_tittle two">companycategory add</h3>
									</div>
									<div class="form-body form-body-info row">

										<form  action="codes/ewaste_category_exe.php?action=insert" method="post">
											<div class="col-md-6">
												<div class="form-group valid-form">
													<input type="text" class="form-control" id="inputName" placeholder="category name" required="" name="cat_name">
												</div>
												<div class="form-group">
												  <input type="text" class="form-control" id="inputPassword" placeholder="price" required="" name="cat_price">
												 
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-primary ">Submit</button>
												</div>
											</div>
											<div class="col-md-6">
												

												
											</div>
										</form>

									</div>
								</div>
							</div>
				
						
							
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //validation -->
					
				    </div>
<!--------------------------------------------------------------------------------------------------------------                                                  FORM END HERE -------------------------------------------------------------------------------------------------------------->	
<!--------------------------------------------------------------------------------------------------------------                                                  TABLE START HERE -------------------------------------------------------------------------------------------------------------->								
									<div class="agile-tables">
										<div class="w3l-table-info agile_info_shadow">
										 <h3 class="w3_inner_tittle two">COMPANY CATEGORY</h3>
											<table id="table">
											<thead>
											  <tr>
												<th>#</th>
												<th>category name</th>
												
												
												
											  </tr>
											</thead>
											<tbody>
												<?php
												$i=0;
												foreach($result as $e)
												{
													$i++;
													?>
											
											  <tr>
												<td><?php
												echo $i;
												?>
												</td>
												<td>
												<?php
												echo $e['catname'];
												?>
												</td>
												<td>
													<?php
												echo $e['price'];
												?>
													
													

												</td>
												<td>
													<a href="edit ewastecategory.php?catid=<?php echo $e['catid'];?>" class="btn btn-info">EDIT</a>
													<a href="codes/ewastecategory.exe.php?action=delete&catid=<?php echo $e['catid'];?>">DELETE</a>
												</td>
												
											  </tr>
											 <?php
											}
											?>
											</tbody>
										  </table>
									
									  
								</div>
								</div>
<!--------------------------------------------------------------------------------------------------------------                                                  TABLE END HERE -------------------------------------------------------------------------------------------------------------->							

								
						</div>
							
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
<?php 
require_once('footer.php');
?>