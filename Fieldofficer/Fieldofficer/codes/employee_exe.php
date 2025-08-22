<?php
require_once('../../ConnectionClass.php');
$obj=new connectionclass();


	 
	 
	 
	$Name =$_POST['emp_name'];
	$Phone_Number=$_POST['emp_phn'];
	$gender=$_POST['gender'];
	$City =$_POST['emp_city'];
	$email=$_POST['emp_email'];
	
	$qry1="update employee set emp_name='$Name',phone='$Phone_Number',gender='$gender',city='$City' where email='$email'";
	$exe1=$obj->Manipulation($qry1);
	if($exe1['status']=="true")
	{
		echo $obj->alert("successful","../profile.php");
	}
	else
	{
		echo $obj->alert("failed","../profile.php");
	}




//var_dump($exe1);

?>