 <?php
require_once('../ConnectionClass.php');
require_once('header.php');
$obj=new connectionclass();

$request_id=$_REQUEST['request_id'];

 $qry="select * from employee"; 
$employees=$obj->GetTable($qry);


$query="SELECT *
FROM customers
INNER JOIN selling_request ON selling_request.comp_email = customers.email
INNER JOIN schedule_employee ON selling_request.request_id = schedule_employee.req_id
INNER JOIN employee ON schedule_employee.emp_id = employee.emp_id
WHERE schedule_employee.sch_status = 'assigned' and schedule_employee.req_id='$request_id'";
$result=$obj->GetSingleRow($query);




?>

<script src="js/jquery-2.1.4.min.js"></script>
<script>
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    //alert(maxDate);
    $('#inputdate').attr('min', maxDate);
});
</script>

<div class="inner_content" style="background-image: url(images/home1.png);">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="adminhome.php">Home</a><span>«</span></li>
									
									<li>Edit Scheduled Employee</li>
								</ul>
							</div>
						</div>



						<div class="agile-grids">	
				<!-- validation -->
				<div class="grids">
					
					<div class="forms-grids">
						
		
						<div class="w3agile-validation w3ls-validation">
							<div class="agile-validation agile_info_shadow">
								<div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
									<div class="input-info">
									 <h3 class="w3_inner_tittle two">Scheduling Employee</h3>
									</div>
									<div class="form-body form-body-info row">

									<form action="codes/edit_emp_scheduling_exe.php" method="post">
											<div class="col-md-6">
												<div class="form-group valid-form">
												<label for="exampleInputPassword1">Select Employee</label>
																			 
										 <select name="employee" required="" class="form-control" style="min-height: 35px; padding: 0px 12px;">
								
													
        <option value="<?php echo $result['emp_id']?>"><?php echo $result['emp_name']?>,<?php echo $result['city']?>
        </option>
        <?php
       foreach($employees as $employee)
																					 
				{																		 
            if($result['emp_id']==$employee['emp_id']){
                continue;
            }
        ?>
        <option value="<?php echo $employee['emp_id']?>"><?php echo $employee ['emp_name']?></option>
            <?php
        }
            ?>
    </select>
																	 
																												
												</div>
												<div class="form-group">
												<label for="exampleInputPassword1">Collected Date</label>

<input type="date" id="inputdate" name="collected_date" value="<?php echo $result['collected_date']?>">


												</div>
												<div class="form-group">
										
<input type="hidden" name="request_id" value="<?php echo $request_id ?>">

<button class="btn btn-info">Scheduling</button>

</form>
		
												</div>
											</div>
											<div class="col-md-6">
												

												
											</div>
										</form>

									</div>
								</div>
							</div>
				
						
							
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //validation -->
																					</div>

	
			


									


<?php
require_once('footer.php');
?>