<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
$type=$_REQUEST['type'];
$qry1="select * from customers c inner join login l inner join company_category cc on c.email=l.username and l.status='$type' and c.com_cat_id=cc.cmp_cat_id";
$result=$obj->GetTable($qry1);
//var_dump($result);
?>
<!-- /inner_content-->
<div class="inner_content" style="background-image: url(images/home1.png);">
    <!-- /inner_content_w3_agile_info-->
	<!-- breadcrumbs -->
	<div class="w3l_agileits_breadcrumbs">
		<div class="w3l_agileits_breadcrumbs_inner">
			<ul>
				<li><a href="adminhome.php">Home</a><span>«</span></li>
				
				<li>Customers</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->

	<div class="inner_content_w3_agile_info two_in">
	  <h2 class="w3_inner_tittle">
	  	<?php
		if($type=='active')
		{
			?>
			Approved Requests
			<?php
		}
		elseif($type=='inactive')
		{
			?>
			New Requests
			<?php
		}
		?>
		</h2>

		<!-- tables -->					
		<div class="agile-tables">
			<div class="w3l-table-info agile_info_shadow">
			 
				<table id="table">
				<thead>
				  <tr>
				  	<th>#</th>
					<th> Customer Name</th>
					<th> Category</th>
					<th> Email</th>
					<th> Contact No</th>
					<th> District</th>
					<th> City</th>						
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
					<td><?php echo $r["cmp_cat_name"];?></td>
					<td><?php echo $r["email"];?></td>
					<td><?php echo $r["phone"];?></td>
					<td><?php echo $r["location"];?></td>
					<td><?php echo $r["city"];?></td>
					<td><?php
							if($type=='active')
							{								
							}
							elseif($type=='inactive')
							{
								?>
								  <a href="codes/request_exe.php?cid=<?php echo $r['cust_id'];?>&action=active&sts=<?php echo $type; ?>" class="btn btn-success btn-xs"> APPROVE </a>
							    <?php
							}
						    ?>                                                                   
						<a href="codes/request_exe.php?cid=<?php echo $r['cust_id'];?>&action=delete&sts=<?php echo $type; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are You Sure want to delete?');"> DELETE </a>
						</td>
				</tr>
				<?php
				}
				?>
					</tbody>
			  </table>
		
	      </div>
        </div>
			<!-- //tables -->
	
	</div>
	<!-- //inner_content_w3_agile_info-->
</div>
<!-- //inner_content-->

<?php
require_once('footer.php');
?>