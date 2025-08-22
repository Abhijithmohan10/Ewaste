<?php
require_once('../../ConnectionClass.php');
$obj=new connectionclass();
$cmp_cat_id =$_POST['cmp_cat_id'];
$company_name=$_POST['company_name'];
$email =$_POST['email'];
$phone=$_POST['phone'];
//$gender=$_POST['gender'];
$city =$_POST['city'];
$location =$_POST['location'];
$pincode=$_POST['pincode'];

$qry1="update customers set com_cat_id='$cmp_cat_id',company_name='$company_name',phone='$phone',city='$city',location='$location',pincode='$pincode' where email='$email'";
	$exe1=$obj->Manipulation($qry1);
	//var_dump($exe1);
	if($exe1['status']=="true")
	{
		echo $obj->alert("Profile Updated","../profile.php");
	}
	else
	{
		echo $obj->alert("failed","../profile.php");
	}
?>