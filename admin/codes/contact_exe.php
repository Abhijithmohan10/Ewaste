<?php
require_once('../../ConnectionClass.php');
$obj=new connectionclass();
$cid=$_REQUEST['cid'];

$qry="delete from contact where con_id='$cid'";
$exe=$obj->Manipulation($qry);
//var_dump($exe);
if($exe['status']=='true')
{
	echo $obj->alert("Successfully Deleted","../adminhome.php");
}
else
{
	echo $obj->alert("Failed, try again","../adminhome.php");
}
?>