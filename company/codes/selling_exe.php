<?php
session_start();
require_once('../../ConnectionClass.php');
$obj=new connectionclass();

$email=$_SESSION['email'];
$qwey="select cust_id from customers where email='$email'";
$comp_id=$obj->GetSingleData($qwey);

$page_action=$_REQUEST['action'];
//==================================================================================

if($page_action=='insert')
{
	$cur_date=date('Y-m-d');
	$Item_Title =$_POST['item_title'];
	$Category=$_POST['catid'];
	$Description =$_POST['description'];
	$Quantity=$_POST['qty'];
	$qry_amt="select price from ewaste_category where catid='$Category'";
	$amt=$obj->GetSingleData($qry_amt);
	//$amount=$Quantity*$amt;

	$qry="select count(*) from selling_request where comp_email='$email' and (req_status='pending' or req_status='progressed')";
	$count=$obj->GetSingleData($qry);
	//echo $count;
	if($count==0)
	{
		$qry1="insert into selling_request(comp_email,req_date,req_status)values('$email','$cur_date','pending')";
		$res=$obj->Manipulation($qry1);
		//var_dump($res);
	}
	$qry2="select request_id from selling_request where comp_email='$email' and (req_status='pending' or req_status='progressed')";
	$request_id=$obj->GetSingleData($qry2);
	//echo $request_id;

	 $qry3="insert into request_items(req_id,item_title,e_cat_id,description,qty,amount) values('$request_id','$Item_Title','$Category','$Description','$Quantity','0')";

	$res3=$obj->Manipulation($qry3);
	//var_dump($res3);

	if($res3['status']=="true")
	{
		echo $obj->alert("successfull","../request_history.php?request_id=$request_id");
	}
	else
	{
		echo $obj->alert("failed","../request_history.php?request_id=$request_id");		
	}
}
//==================================================================================
elseif($page_action=='cancel')
{
	$req_item_id=$_REQUEST['req_item_id'];
	$qry="select count(*) from request_items where req_id=(select req_id from request_items where req_item_id='$req_item_id')";
	 $count=$obj->GetSingleData($qry);
	/*$qry2="select * from request_items where req_id=(select req_id from request_items where req_item_id='$req_item_id')";
	$val=$obj->GetTable($qry2);	*/
	if($count==1)
	{
		$qry4="delete from selling_request where request_id=(select req_id from request_items where req_item_id='$req_item_id')";
		$reslt=$obj->Manipulation($qry4);
		//var_dump($reslt);
	}
	$qry3="delete from request_items where req_item_id='$req_item_id'";
	$res=$obj->Manipulation($qry3);
	//var_dump($res);
	if($res3['status']=="true")
	{
		echo $obj->alert("Cancelled","../request_history.php");
	}
	else
	{
		echo $obj->alert("something wrong","../request_history.php");	
	}	
}

//==========================================================================
elseif($page_action=='edit')
{
	$req_item_id=$_REQUEST['req_item_id'];
	$qry="select * from request_items i inner join ewaste_category c on i.e_cat_id=c.catid where i.req_item_id='$req_item_id'";
	$res=$obj->GetSingleRow($qry);
	//var_dump($res);
	$Item_Title =$_POST['item_title'];
	$Category=$_POST['catid'];
	$Description =$_POST['description'];
	$Quantity=$_POST['qty'];
	$qry_amt="select price from ewaste_category where catid='$Category'";
	$amt=$obj->GetSingleData($qry_amt);
	//$amount=$Quantity*$amt;

	$qry1="update request_items set item_title='$Item_Title',e_cat_id='$Category',description='$Description',qty='$Quantity',amount='0' where req_item_id='$req_item_id'";
	$res=$obj->Manipulation($qry1);
	//var_dump($res);
	if($res['status']=='true')
	{
		echo $obj->alert("Successfully updated","../request_history.php");
	}
	else
	{
		echo $obj->alert("something wrong","../request_history.php");	
	}
}
?>