<?php
session_start();
require_once('../../ConnectionClass.php');
$obj=new ConnectionClass();
$action=$_REQUEST['action'];
$id=$_REQUEST['cid'];
$qry="select email from customers where cust_id='$id'";
echo $email=$obj->GetSingleData($qry);
$page_redirect=$_REQUEST['sts'];

if($action=='reject' || $action=='active')
{
	$qry1="update login set status='$action' where username='$email'";
	$exe1=$obj->Manipulation($qry1);
	var_dump($exe1);
	if($exe1['status']=='true')
	{
		echo $obj->alert("Success","../view_customer.php?type=".$page_redirect);
	}
	else
	{
		echo $obj->alert("Something Wrong","../view_customer.php?type=".$page_redirect);
	}
}
elseif($action=='delete')
{
	$qry2="delete from customers where email='$email'";
	$qry3="delete from login where username='$email'";
	$exe2=$obj->Manipulation($qry2);
	$exe3=$obj->Manipulation($qry3);
	if($exe2['status']=='true' && $exe3['status']=='true')
	{
		echo $obj->alert("Success","../view_customer.php?type=".$page_redirect);
	}
	else
	{
		echo $obj->alert("Something Wrong","../view_customer.php?type=".$page_redirect);
	}
}



?>