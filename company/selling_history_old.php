<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
//session_start();
 $ses=$_SESSION['email'];
$qwey="select cust_id from customers where email='$ses'";
$comp_id=$obj->GetSingleData($qwey);


/*
Tables:
	1. selling_request--------------req_status=collected
	2. request_items----------------Total amount based on req_id
	3. schedule_employee------------sch_status=completed
	4. employee
	5. ewaste_category


*/
	//$qry="select sum(amount) from request_items where "
$qry1="select * from selling_request r inner join request_items i inner join ewaste_category c inner join schedule_employee e inner join employee y on r.request_id=i.req_id where r.comp_email='$ses' and r.req_status='collected' and e.req_id=r.request_id and e.sch_status='completed' and i.e_cat_id=c.catid and e.emp_id=y.emp_id";
$data=$obj->GetTable($qry1);
//var_dump($data);
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
									
									<li>History</li>
									
								</ul>
						</div>



						<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
									<h3 class="w3_inner_tittle two"> E-Waste Selling History</h3>
									<div class="form-body">

										
										<table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Requested Date</th>                  
                  <th>Item Name</th>
                  <!--<th>Unit Price</th>-->
                  <th>Quantity</th>
                  <th>Collected On</th>
                  <th>Collected By</th>
                  <th>Transfered Amount</th>       
                </tr>
              </thead>
              <tbody>
<?php
$i=0;
foreach($data as $row)
{
	//price
  $i++;
  ?>              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($row["req_date"])); ?></td>
                  <td><?php echo $row['item_title']?></td>
                 <!-- <td><?php //echo $row['price']?></td>-->
                  <td><?php echo $row['qty']?></td>
                  <td><?php echo date('d-m-Y',strtotime($row["sch_date"])); ?></td>
                  <td><?php echo $row['emp_name']?><br>Contact No:<?php echo $row['phone']?></td>
                  <td><?php echo $row['amount']?></td>
          
                  
                  
                </tr>
    <?php } ?>
                
                
                
              </tbody>
            </table> 
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