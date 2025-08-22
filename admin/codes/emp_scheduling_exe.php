

<?php

require_once('../../ConnectionClass.php');
$obj=new connectionclass();
$employee=$_POST['employee'];
$collected_date=$_POST['collected_date'];
$sch_date=date('Y-m-d');
$request_id=$_REQUEST['request_id'];


$qry="insert into schedule_employee(req_id,emp_id,sch_date,collected_date,sch_status)values('$request_id','$employee','$sch_date','$collected_date','assigned')";
    $exe=$obj->Manipulation($qry);


    $qry1="update selling_request set req_status='progressed' where request_id= '$request_id' ";
  $update=$obj->Manipulation($qry1);

   

     if($exe['status']=='true' &&  $update['status']=='true')
            {
                echo $obj->alert("successfully scheduled Employee","../view_customer_request.php");
            //echo"success";
            }
            else
            {
               echo $obj->alert("Failed.. Try Again","../view_customer_request.php");
           }
           ?>