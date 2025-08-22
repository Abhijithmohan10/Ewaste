<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
//session_start();
$ses=$_SESSION['email'];
$qwey="select emp_id from employee where email='$ses'";
$emp_id=$obj->GetSingleData($qwey);
//echo $emp_id;

$qry="select * from schedule_employee e inner join selling_request r inner join customers c on e.req_id=r.request_id and e.emp_id=$emp_id and e.sch_status='completed' and r.req_status='collected' and c.email=r.comp_email";

//$qry1="select * from selling_request r inner join schedule_employee e inner join customers c on r.request_id=i.req_id where e.emp_id='$emp_id' and r.req_status='progressed' and e.req_id=r.request_id and e.sch_status='assigned' and i.e_cat_id=c.catid and e.emp_id=y.emp_id";
$data=$obj->GetTable($qry);
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
									
									<li>Collected History</li>
									
								</ul>
						</div>



						<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
									<h3 class="w3_inner_tittle two"> Collected E-waste Details</h3>
									<div class="form-body">

										
										<table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Requested Date</th>                  
                  <th>End Date</th>
                  <!--<th>Unit Price</th>-->
                  <th>Company Name</th>
                  <th>Contact Info</th>
                  <th>Actions</th>       
                </tr>
              </thead>
              <tbody>
<?php
$i=0;
foreach($data as $row)
{
	//sch_date
  $i++;
  ?>              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($row["req_date"])); ?></td>
                  <td><?php echo date('d-m-Y',strtotime($row["sch_date"])); ?></td>
                  <td><?php echo $row['company_name']?></td>
                 <!-- <td><?php //echo $row['price']?></td>-->
                  <td><?php echo "Email: ".$row['email']."<br>Contact No: ".$row['phone']?></td>
                 
                 
                  <td><a href="viewitem.php?id=<?php echo $row['request_id']?>&type=collected">View items</a></td>
          
                  
                  
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