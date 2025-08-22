<?php
require_once('../../ConnectionClass.php');
$obj=new connectionclass();


$page_action=$_REQUEST['action'];

//------------------------------------------------------------------------

//----------------------------------------------------------------------------
if($page_action=='amount')
{
	$total_data=$_POST['total_data'];

	//echo $total_data;
	 $type=$_REQUEST['type'];

 $req_id=$_REQUEST['req_id'];
	
for($i=1;$i<=$total_data;$i++)
{
	$amount=$_POST['amount_'.$i];

	//var_dump($amount);
//$req_item_id=$_POST['req_item_id'];
	$req_item_id=$_POST['req_item_id_'.$i];

	//var_dump($req_item_id);


	//die();
$qry="update request_items set amount='$amount' where req_item_id='$req_item_id'";
$exe=$obj->Manipulation($qry);



$qry="update schedule_employee set sch_status='update' where req_id='$req_id'";
$exe2=$obj->Manipulation($qry);
	//var_dump($exe);
	if($exe['status']=='true' && $exe2['status']=='true')
	{
		echo $obj->alert("AMOUNT UPDATED","../viewitem.php?id=$req_id&type=$type");
	}


	else
	{
		echo $obj->alert("Failed try again","../viewitem.php?id= $req_id&type=$type");
	}
}
	
}


?>