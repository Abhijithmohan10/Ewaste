<?php
require_once('header.php');
require_once('../Connectionclass.php');
$obj=new connectionclass();
$type=$_REQUEST['type'];
if($type=='approved')
{
$qry="select * from customers s inner join login l on s.email=l.username where l.status='active'";
}
else
{
$qry="select * from customers s inner join login l on s.email=l.username where l.status='inactive'";
}
$result=$obj->GetTable($qry);
//var_dump($result);
?>
<div class="agile-tables">
										<div class="w3l-table-info agile_info_shadow">
										 <h3 class="w3_inner_tittle two">TABLE NAME HERE</h3>
<table id="table">
											<thead>
											  <tr>
												<th>#</th>
												<th>Company name</th>
												<th>Category</th>
												<th>Contact</th>
												<th>Email</th>
												<th>Location</th>
												<th>Pincode</th>
												
												<th>more</th>
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
												echo $e['company_name'];
												?>
												</td>
												<td>
												<?php
												echo $e['com_cat_id'];
												?>
												</td>
												<td>
												<?php
												echo $e['phone'];
												?>
												</td>
												<td>
												<?php
												echo $e['email'];
												?>
												</td>
												<td>
												<?php
												echo $e['location'];
												?>
												</td>
												<td>
												<?php
												echo $e['pincode'];
												?>
												</td>
												<td>
											<?php
											if($type=='approved')
{
	?>
	<a href="codes/request_exe.php?action=inactive&custid=<?php echo $e['cust_id'];?>&sts=approved">INACTIVATE</a>
	<?php
}
else
{
	?>
	<a href="codes/request_exe.php?action=active&custid=<?php echo $e['cust_id'];?>&sts=new">ACTIVE</a>
	<?php
}
											?>
													
												</td>
											</tr>
											<?php
										}
											?>
										</tbody>
										</table>
									  
								</div>
								</div>
								<?php
require_once('footer.php');
?>