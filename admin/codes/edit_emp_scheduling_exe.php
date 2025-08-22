

<?php

require_once('../../ConnectionClass.php');
$obj=new connectionclass();
$employee=$_POST['employee'];
$collected_date=$_POST['collected_date'];
$sch_date=date('Y-m-d');
$request_id=$_REQUEST['request_id'];



    $qry="update schedule_employee set emp_id='$employee' ,collected_date='$collected_date',sch_date='$sch_date' where req_id= '$request_id' ";
    $exe=$obj->Manipulation($qry);



     if($exe['status']=='true')
            {
                echo $obj->alert("successfully scheduled Employee","../schedule_employee_details.php?request_id=<?php echo $request_id?>");
            //echo"success";
            }
            else
            {
               echo $obj->alert("Failed.. Try Again","../schedule_employee_details.php?request_id=<?php echo $request_id?>");
           }
           ?>