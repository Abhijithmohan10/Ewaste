<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
session_start();
 $ses=$_SESSION['email'];
$qwey="select cust_id from customers where email='$ses'";
$comp_id=$obj->GetSingleData($qwey);

$qwey="select request_id from selling_request where comp_email='$ses' and req_status='pending'";
$request_id=$obj->GetSingleData($qwey);



 $qry="select * from selling_request r inner join request_items i on r.request_id=i.req_id where r.comp_email='$ses' and r.req_status!='collected' and r.req_status!='send' and r.request_id='$request_id'";
$data=$obj->GetTable($qry);

//$request_id=$_GET['request_id'];



?>




<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								
							</div>
							<ul>
									<li><a href="index.php">Home</a><span>«</span></li>
									
									<li>Request Items</li>
									
								</ul>
						</div>



						<div class="inner_content_w3_agile_info two_in">
					
<a href="demo_new_selling.php" class="btn btn-info">Add more Items</a>
							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
									<h3 class="w3_inner_tittle two">  Request Items</h3>
									<div class="form-body">
										
										<table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Requested Date</th>                  
                  <th>Item Name</th>
                  <th>Quantity</th>

                  <th>Action</th>
                 
                </tr>
              </thead>
              <tbody>
<?php
$i=0;
foreach($data as $row)
{
  $i++;
  ?>              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php
                  echo date('d-m-Y',strtotime($row["req_date"]));
                   //echo $row['date']?></td>
                  <td><?php echo $row['item_title']?></td>
                  <td><?php echo $row['qty']?></td>
           <td><?php //echo $row['req_status']?>
           	<a href="codes/selling_exe.php?action=cancel&req_item_id=<?php echo $row['req_item_id']; ?>" onClick="return confirm('Are you sure want to Cancel..?');">CANCEL</a><br>
           	<a href="edit_selling.php?req_item_id=<?php echo $row['req_item_id']; ?>">EDIT</a>
           		

           </td>
                  
                  
                </tr>
    <?php } ?>
                
                
                
              </tbody>
            </table> 


   <a href="codes/send_request.php?request_id=<?php echo $request_id ?>"  class="btn btn-success">Submit Request</a>
									</div>
								</div>																<!--/forms-inner-->													  				
																	<!--//forms-inner-->
							</div> 
														<!--//forms-->											   
					
							<!-- /social_media-->
						 
						<!-- //social_media-->
				    </div>

</div>




<?php
require_once('footer.php');
?>