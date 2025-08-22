<?php
require_once('header.php');
require_once('../ConnectionClass.php');
$obj=new connectionclass();

$query="SELECT *
FROM customers
INNER JOIN selling_request ON selling_request.comp_email = customers.email
INNER JOIN schedule_employee ON selling_request.request_id = schedule_employee.req_id
INNER JOIN employee ON schedule_employee.emp_id = employee.emp_id
WHERE schedule_employee.sch_status = 'assigned'";
$result=$obj->GetTable($query);
?>
	
									
		<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
									<li>Employee Scheduling</li>
								</ul>
							</div>
						</div>
										 
											<table id="table">
											<thead>
											  <tr>
											  	<th>#</th>
												
												<th>Company Name</th>
										
												<th>Email</th>
	                                             <th>Phone NUMBER</th>
												<th>Location</th>
												<th>State</th>
												<th>Scheduled Employee</th>
												<th>Collecting Date</th>
											<th>Actions</th>
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
												
												<td><?php echo $r["company_name"];?></td>
										
												<td><?php echo $r["email"];?></td>
												<td><?php echo $r["phone"];?></td>
												<td><?php echo $r["location"];?></td>
												<td><?php echo $r["state"];?></td>
												<td><?php echo $r["emp_name"];?></td>
                                         
                                 <td><?php echo date('d-m-Y',strtotime($r["collected_date"]));?></td>
                                                 <td>
 <a href="emp_scheduling_edit.php?request_id=<?php echo $r["request_id"];?>" class="btn btn-info" style="float: right;">Edit Scheduled Employee</a>
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