
 <?php
 
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
$request_id=$_REQUEST['request_id'];

  $qry="select * from request_items inner join selling_request on request_items.req_id=selling_request.request_id inner join ewaste_category on ewaste_category.catid=request_items.e_cat_id
 where req_status='send'and req_id='$request_id'"; 
$data=$obj->GetTable($qry);

?>
	
		<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
							<li><a href="view_customer_request.php">Ewaste Request</a><span>«</span></li>
												<li>Products</li>
								</ul>
							</div>
						</div>
			
							
										 
											<table id="table">
											<thead>
											  <tr>
											  	<th>#</th>
												
												
												<th>Category</th>
												<th>Item Name</th>
												<th>Description</th>
	                                              <th>quantity</th>
										
												<th>Request Date</th>

											
										
												
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
												
												<td><?php echo $r["catname"];?></td>
												<td><?php echo $r["item_title"];?></td>
												
												<td><?php echo $r["description"];?></td>
												<td><?php echo $r["qty"];?></td>
										
												<td><?php echo date('d-m-Y',strtotime($r["req_date"]))?></td>
												
</tr>
<?php
}
?>

<tr>
<td colspan="7">
<a href="emp_scheduling.php?request_id=<?php echo $r["request_id"];?>" class="btn btn-info" style="float: right;">Schedule Employee</a>
</td>
</tr>
</tbody>

</table>
</div>
</div>



<?php
require_once('footer.php');
?>