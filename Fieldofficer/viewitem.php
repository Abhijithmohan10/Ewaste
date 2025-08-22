<?php
//require_once('../ConnectionClass.php');
require_once('header.php');

$type=$_REQUEST['type'];
$req_id=$_REQUEST['id'];

$wer="select * from request_items i inner join ewaste_category c where i.req_id='$req_id' and i.e_cat_id=c.catid";
$res1=$obj->GetTable($wer);
//var_dump($res1);
?>

<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="index.php">Home</a><span>«</span></li>
									<li> 
			<?php
              if($type=='expired')
              {
                $tu='Expired';
              ?>
              <a href="view_expired.php">Expired</a>
              <?php
          }
          elseif($type=='scheduled')
          {
            $tu='Scheduled';
             ?>
              <a href="view_scheduled.php">Scheduled</a>
              <?php  
          }
          elseif($type=='collected')
          	{
              $tu='Collected';
             ?>
              <a href="view_collected.php">Collected</a>
              <?php  
          }
          ?>
          <span>«</span></li>
									<li>Item Details</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in" style="margin-top: 0em;">
					
					 

					   <h3 class="w3_inner_tittle two"><?php echo $tu; ?>  E-Waste Item Details</h3>   
						<div class="agile-tables">
										
											<table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item Name</th>
                  <th>Category, Maximum Amount</th>                  
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Amount</th>
 

                      
                </tr>
              </thead>
              <tbody>
<?php
$i=0;
$amtt=0;
$total=0;
foreach($res1 as $row)
{
	//price
  $i++;
   $total_data=count($res1);
  ?>              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['item_title']?></td>
                  <td><?php echo $row['catname']?> ,<?php echo $row['price']?></td>
                  <td><?php echo $row['description']?></td>
                  <td><?php echo $row['qty']?></td>
                 <td><?php $amount=$row["amount"];
               $result= $row['qty'] *$row['price'];
               

														if($amount=='0')
														{
															?>
															<form method="post" action="codes/update_amt.php?action=amount&req_id=<?php echo $row['req_id'];?>&type=<?php echo $type ?>">
                      <input type="number" name="amount_<?php echo $i?>" max="<?php echo $result ?>" required>
   <input type="hidden"  name="req_item_id_<?php echo $i?>" value="<?php echo $row['req_item_id']?>">
      <input type="hidden"  name="type" value="<?php echo $type ?>">

  
   
																
															<?php
                           

                                 
														}
														else
														{
                              
															echo $amount;
												?> 
												<?php
											}
												?>
								            
                          
                </tr>
    <?php } ?>
           <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><input type="submit" name="submit" value="Update Amount"></td>        <input type="hidden"  name="total_data" value="<?php echo $total_data ?>"> 

                  <?php
                     $qry="select sum(amount) from request_items where req_id='$req_id'";
            $total=$obj->GetSingleData($qry);?> 

                  <td>Net Amount= <b><?php echo $total; ?></b></td>
                            
                          
                </tr> 
				
				

  
          

               </form>
              </tbody>
            </table> 

								</div>
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
		<?php 

		require_once('footer.php');
		?>