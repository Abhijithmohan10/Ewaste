<?php
require_once('header.php');
require_once('../ConnectionClass.php');
$obj=new connectionclass();

if(isset($_POST['submit']))
{

  



   $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];

 echo $query="select * from selling_request r inner join customers c
 inner join schedule_employee e inner join employee y on r.comp_email=c.email
  where e.req_id=r.request_id
   and e.sch_status='completed' and e.emp_id=y.emp_id and e.collected_date between '$start_date' and  '$end_date'";
$result=$obj->GetTable($query);
//var_dump($result);

}






else
{


  
  $result=NULL;

}
?>



		<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
									<li>Reports</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
				<div class="forms-main_agileits">
					    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
						<div class="graph-form agile_info_shadow">
						 <h3 class="w3_inner_tittle two">Report</h3>
								<div class="form-body">
								
										<div class="form-group"> 
											<label for="exampleInputEmail1">Start Date</label> 
											<input type="Date" class="form-control" name="start_date" id="exampleInputEmail1"> </div> 
											<div class="form-group">
											 <label for="exampleInputPassword1">End Date</label> 
											 <input type="Date" class="form-control"  name="end_date" id="exampleInputPassword1" placeholder=""> 
											</div>   
											<button type="submit" name="submit" class="btn btn-default">Search</button> 
										</form> 
								</div>

						</div>
																<!--/forms-inner-->
													  				
																	<!--//forms-inner-->
																</div>
																

				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>

<?php

  

  ?>
<div>
	<?php
if($result==NULL)
{
  ?>


 <table class="table table-bordered table-responsive">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Company Name</th>
                                      <th>Requested Date</th>                  
                                      <th>Total Amount</th>
                                        <th>Employee Name</th>
                                    
                                      <th>Collected Date</th>
                                      <th>Item Details</th>
                                          
                                    </tr>
                                  </thead>
	 <tbody>
                           
                          
                            <tr>
                               
                                <td colspan="7" align="center">No data available</td>
                                
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!--// table1 -->
            </section>

  <?php
}
else
{
  ?>
	     <table class="table table-bordered table-responsive">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Company Name</th>
                                      <th>Requested Date</th>                  
                                      <th>Total Amount</th>
                                      <th>Employee Name</th>
                                    
                                      <th>Collected Date</th>
                                      <th>Item Details</th>
                                          
                                    </tr>
                                  </thead>
                                  <tbody>
                    <?php
                    $i=0;
                    foreach($result as $row)
                    {
                      //price
                      $i++;
                      ?>              <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $row['company_name']?> (<?php echo $row['location']?>)</td>
                                      <td><?php echo date('d-m-Y',strtotime($row["req_date"])); ?></td>                 
                                      <td><?php
                                         $itemdata="select * from request_items where req_id=".$row['request_id'];
                                         $unt=$obj->GetTable($itemdata);
                                         //var_dump($unt);
                                         $amt=0;
                                         foreach ($unt as $k) 
                                         {
                                           $amt=$amt+$k['amount'];
                                         }
                                         echo $amt; 
                                         ?>
                                      </td>
                                      <td><?php echo "Field Officer: ".$row['emp_name']?><br><?php echo "Email: ".$row['email']."<br>Contact No: ".$row['phone']; ?></td>
                                      <!-- <td><?php
                                      // $sch_by=$row['sch_by'];
                                       //$fr="select * from employee where emp_id='$sch_by'";
                                       // $r=$obj->GetSingleRow($fr);
                                       // echo "Front Officer: ".$r['emp_name']."<br>Email: ".$r['email']."<br>Contact No: ".$r['phone'];
                                       ?></td>-->
                                      <td><?php echo date('d-m-Y',strtotime($row["sch_date"])); ?></td>   
                                      <td><a href="viewitemsreport.php?req_id=<?php echo $row['request_id']; ?>&type=collected">View Item Details</a></td>
                              
                                      
                                      
                                    </tr>
                        <?php } ?>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div> 
                                        </div>
                                        </div></div>
                                               
   <?php
}

?> 
    </section>             
                                    
                                    
<!-- banner -->
<?php

require_once('footer.php');
?>