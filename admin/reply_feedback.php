<?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
$qry1="select * from feedback f inner join customers c on f.email=c.email";
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
									
									<li>Feedbacks</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Feedbacks</h2>
									<!-- tables -->
									
									<div class="agile-tables">
										<div class="w3l-table-info agile_info_shadow">
										 
											<table id="table">
											<thead>
											  <tr>
											  	<th>#</th>
											  	<th>Date</th>
												<th>Customer or Company Name</th>
												<th>Message</th>
												<th>Replay Message</th>
												
												<th>Action</th>
												
												
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
												<td><?php
													echo date('d-m-Y',strtotime($r["senddate"]));
												 ?></td>
												<td><?php echo $r["company_name"];?></td>
												<td><b><?php echo $r["subject"];?></b><br><?php echo $r["message"];?></td>
												<td><?php $rply=$r["rplymessage"];
														if($rply=='')
														{
															?>
															<form method="post" action="codes/feedbacks_exe.php?action=replay&fid=<?php echo $r['msgid'];?>">
																<input type="text" name="reply">
																<input type="submit" name="submit" value="Send">

															</form>
															<?php
														}
														else
														{
															echo $rply;
												?> (On : <?php echo date('d-m-Y',strtotime($r["rplydate"])); ?>)
												<?php
											}
												?>
											</td>
												<td><a href="codes/feedbacks_exe.php?action=delete&fid=<?php echo $r['msgid'];?>" onClick="return confirm('Are You Sure want to delete?');"> DELETE </a></td>
											  </tr>
											  <?php
											}
											  ?>
											  
											</tbody>
										  </table>
									
									
								</div>
								

						</div>
							<!-- //tables -->
					
							<!-- /social_media-->
						  
						<!-- //social_media-->
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->















<?php
require_once('footer.php');
?>