
<?php
require_once('header.php');
require_once('../ConnectionClass.php');

$obj=new connectionclass();

echo $start_date;
$start=date('Y-m-d', strtotime($start_date));
echo $start; 

$end=date('Y-m-d', strtotime($end_date));
}


?><?
if($result!=NULL)
                    {
                    ?>    
                    <!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="main-page.html">Home</a><span>«</span></li>
									
									<li>Reports</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
				<div class="forms-main_agileits">
					
						<div class="graph-form agile_info_shadow">
                                   <h3 class="w3_inner_tittle two"> E-Waste Details </h3>   
                                <div class="agile-tables">
                                        
                                          <table class="table table-bordered table-responsive">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Company Name</th>
                                      <th>Requested Date</th>                  
                                      <th>Total Amount</th>
                                      <th>Assigned To</th>
                                    
                                      <th>End Date</th>
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
                                      <td><a href="viewitems.php?req_id=<?php echo $row['request_id']; ?>&type=progressed">View Item Details</a></td>
                              
                                      
                                      
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
require_once('footer.php');
?>