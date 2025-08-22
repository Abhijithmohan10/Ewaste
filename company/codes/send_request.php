<?php
//session_start();
require_once('../../ConnectionClass.php');
$obj=new connectionclass();
$request_id=$_GET['request_id'];


$qry1="update selling_request set req_status='send' where request_id='$request_id'";
$res=$obj->Manipulation($qry1);

if($res['status']=='true')
{
	//echo "success";
	echo $obj->alert("Success","../index.php");
}



else
{
//	echo "failed";
	echo $obj->alert("Failed","../demo_new_selling.php");
}
