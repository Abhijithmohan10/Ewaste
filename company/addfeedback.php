<?php
//session_start();
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();
echo $ses_email=$_SESSION['email'];
$qry1="select * from feedback where email='$ses_email' order by msgid desc";
$result=$obj->GetTable($qry1);
//var_dump($result);
?>
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="main-page.html">Home</a><span>«</span></li>
									<li>Feedback <span>«</span></li>
									<li>Add</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					

							<!--/forms-->
							<div class="forms-main_agileits">
								<div class="graph-form agile_info_shadow">
								 
								 <form action="codes/feedbacks_exe.php?action=insert" method="post">

									<div class="form-body ">
									<div class="row ">
										<div class="form-group col-md-3">

										</div>
										<div class="form-group col-md-6"> 
											<h3 class="w3_inner_tittle two">New Feedback </h3>
										<label for="exampleInputEmail1">Subject</label> 
											<input pattern="[a-zA-Z ]+" title="Characters only" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Subject name" name="subject" required=""> 
											<br>
											<label for="exampleInputPassword1">Description</label> 
											<textarea class="form-control" required="" name="description"></textarea>
											 
											 <br>
											 <input type="submit" name="" value="SUBMIT" class="btn btn-success">
										<input type="reset" name="" value="CANCEL" class="btn btn-danger">
										</div>		

										
										</div>
									</div>
									</form> 
									

															</div>
																
																</div> 
																								
									<div class="agile-tables">
										<div class="w3l-table-info agile_info_shadow">
										 
											<table id="table">
											<thead>
											  <tr>
											  	<th>#</th>
											  	<th>Date</th>
												
												<th>Message</th>
												<th>Replay Message</th>
												
												<th>Action</th>
												
												
											  </tr>
											</thead>
											<tbody>
												<?php
												$i=0;
												foreach($result as $r) 
												{
													$i++;
													?>
											  <tr>
												<td><?php echo $i;?></td>
												<td><?php
													echo date('d-m-Y',strtotime($r["senddate"]));
												 ?></td>
												
												<td><b><?php echo $r["subject"];?></b><br><?php echo $r["message"];?></td>
												<td><?php $rply=$r["rplymessage"];
														if($rply=='')
														{
															
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
							</div>
						</div>

									
									  
								
<!-- banner -->

<?php
require_once('footer.php');
?>
