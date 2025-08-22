<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();


$req_item_id=$_REQUEST['req_item_id'];
$qry="select * from request_items i inner join ewaste_category c on i.e_cat_id=c.catid where i.req_item_id='$req_item_id'";
$res=$obj->GetSingleRow($qry);
//var_dump($res);


$qry1="select * from ewaste_category";
$result=$obj->GetTable($qry1);


//var_dump($result);
?>

<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								
							</div>
							<ul>
									<li><a href="main-page.html">Home</a><span>«</span></li>
									
									<li>Selling</li>
									
								</ul>
						</div>



						<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
									<h3 class="w3_inner_tittle two">Edit Selling Request </h3>
									<div class="form-body">
										<form method="post" action="codes/selling_exe.php?action=edit&req_item_id=<?php echo $req_item_id; ?>"> 
											<label for="exampleInputPassword1">Item Title</label> 
											 <input type="text" class="form-control" value="<?php echo $res['item_title']; ?>" id="exampleInputPassword1" placeholder="" required="" name="item_title">




									<label for="exampleInputEmail1">Category</label> 
									<select class="form-control" required="" style="height: 46px;" name="catid">
										<option value="<?php echo $res['e_cat_id']; ?>"><?php echo $res['catname']; ?></option>
											<?php
											foreach ($result as $r) 
											{
												if($res['e_cat_id']==$r['catid'])
												{
													continue;
												}
												
											?>
											<option value="<?php echo $r['catid'] ?>"><?php echo $r['catname'] ?></option>

											<?php

										}
											?>
										</select>
											
											
											 <label for="exampleInputPassword1">Description</label>
											 <textarea class="form-control" required="" name="description"><?php echo $res['description']; ?></textarea> 
											 
											 <label for="exampleInputPassword1">Quantity</label> 
											 <input type="number" value="<?php echo $res['qty']; ?>" class="form-control" id="exampleInputPassword1" placeholder="" required="" name="qty"> 
											 <br>
											 <input type="submit" name="" value="SUBMIT" class="btn btn-success">
										</form> 
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