
<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
$qry1="select * from Contact";
$result=$obj->GetTable($qry1);


?>
<!-- /inner_content-->
				<div class="inner_content"  style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
									<li>Contact Us</li>
								</ul>
							</div>
						</div>
					 <!--breadcrumbs -->


<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Contact us Details</h2>
									<!-- tables -->
									
									<div class="agile-tables">
										<div class="w3l-table-info agile_info_shadow">
										 
											<table id="table">
											<thead>
											  <tr>
											  	<th>#</th>
											  	<th>Name</th>
											  	<th>Email</th>
												<th>Message</th>
												
												
												<th>Action</th>
												
												
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
												<td><?php echo $r["name"]; ?></td>
												<td><?php echo $r["email"];?></td>
												<td><b><?php echo $r["message"];?></td>
																											
											     
													
															
														
												
												<?php
											
												?>
											</td>
												<td><a href="codes/contact_exe.php?cid=<?php echo $r['con_id'];?>" onClick="return confirm('Are You Sure want to delete?');"> DELETE </a></td>
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




<?php
require_once('footer.php');
?>