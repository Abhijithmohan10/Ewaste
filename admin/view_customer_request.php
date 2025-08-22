 <?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();

 $qry="select * from customers  inner join company_category  on customers.com_cat_id=company_category.cmp_cat_id inner join selling_request on customers.email=selling_request.comp_email where req_status ='send'"; 
$data=$obj->GetTable($qry);

?>
	
									
		<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
									<li>Ewaste Request</li>
								</ul>
							</div>
						</div>
										 
											<table id="table">
											<thead>
											  <tr>
											  	<th>#</th>
												
												<th>Company Name</th>
												<th>Category</th>
												<th>Email</th>
	                                              <th>Phone NUMBER</th>
												<th>Location</th>
												<th>State</th>
													<th>City</th>
												<th>Pincode</th>
											<th>Actions</th>
											  </tr>
											</thead>
											<tbody>

												<?php
												$i=0;
												foreach ($data as $r) 
												{
													$i++;
													?>
											  <tr>
												<td><?php echo $i;?></td>
												
												<td><?php echo $r["company_name"];?></td>
												<td><?php echo $r["cmp_cat_name"];?></td>
												<td><?php echo $r["email"];?></td>
												<td><?php echo $r["phone"];?></td>
												<td><?php echo $r["location"];?></td>
												<td><?php echo $r["state"];?></td>
												<td><?php echo $r["city"];?></td>
                                                 <td><?php echo $r["pincode"];?></td>
                                                 <td>
 <a href="view_request.php?request_id=<?php echo $r["request_id"];?>" class="btn btn-info" style="float: right;">View More Details</a>
                                                 </td>
													

</tr>
</tbody>

<?php
}
?>
</table>
</div>
</div>



<?php
require_once('footer.php');
?>