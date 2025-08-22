<?php
//require_once('../ConnectionClass.php');
require_once('header.php');

$type=$_REQUEST['type'];
$req_id=$_REQUEST['req_id'];


$wer="select * from request_items i inner join ewaste_category c where i.req_id='$req_id' and i.e_cat_id=c.catid";
$res1=$obj->GetTable($wer);
//var_dump($res1);
?>

<!-- /inner_content-->
				<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
									<li>Item Details</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in" style="margin-top: 0em;">
					
					  <?php
					  	require_once('report_header.php');
					  ?>
<?php 
if($res1!=NULL)
{
?>
		
					   <h3 class="w3_inner_tittle two"> New E-Waste Request Details</h3>   
						<div class="agile-tables">
										
											<table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item Name</th>
                  <th>Category,Maximun Amount(one Item)</th>                  
                  <th>Description</th>
                  <th>Quantity</th>


                 <th>Amount</th>

              

                </tr>
              </thead>
              <tbody>
<?php
$i=0;

foreach($res1 as $row)
{
	//price
  $i++;
  ?>              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['item_title']?></td>
                  <td><?php echo $row['catname']?>,<?php echo $row['price']?></td>
                  <td><?php echo $row['description']?></td>
                  <td><?php echo $row['qty']?></td>
              
                 <?php
  if($row['amount']!=0)
  {
  	?>
                 <td><?php echo $row['amount']?></td>
                 
                     <?php
              }
              ?>  
                 
                  
                  
                </tr>
    <?php } ?>
                
                
                
              </tbody>
              <a href="report_home.php?type=<?php echo $type; ?>" class="btn btn-info" style="float: right;">Back</a>
            </table> 

								</div>	

<?php 
}
else
{
?>
<h3 class="w3_inner_tittle two"> No Data Found</h3>					  
<?php
}
?>
	
						
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
		<?php 

		require_once('footer.php');
		?>