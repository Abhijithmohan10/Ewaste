<?php
require_once('../../ConnectionClass.php');
$obj=new connectionclass();

$page_action=$_REQUEST['action'];
//-------------------------------------INSERT------------------------
if($page_action=='insert')
{
	$category=$_POST['cat_name'];
	$price=$_POST['cat_price'];

	$qry="select count(*) from ewaste_category where catname='$category'";
	$count=$obj->GetSingleData($qry);
	if($count!=0)
	{
		echo $obj->alert("Already Existed","../ewastecategory.php");
	}
	else
	{
		$qry1="insert into ewaste_category(catname,price) values('$category','$price')";
		$exe1=$obj->Manipulation($qry1);
		//var_dump($exe1);
		if($exe1['status']=="true")
		{
			echo $obj->alert("successfull","../ewastecategory.php");

		}
		else
		{
			echo $obj->alert("failed","../ewastecategory.php");
		}
	}
}
//------------------------------------UPDATE------------------------------
elseif($page_action=='update')
{
	$catname=$_POST['cat_name'];
	$catprice=$_POST['cat_price'];
	$catid=$_POST['catid'];
	$qrycnt="select count(*) from ewaste_category where catname='$catname' and catid!='$catid'";
    $count=$obj->GetSingleData($qrycnt);

	if($count!=0)
	{
		echo $obj->alert("Already Existed","../editcategory.php?catid=$catid");
	}
	else
	{
		$qry="update ewaste_category set catname='$catname', price='$catprice' where catid='$catid'";
		$exe=$obj->Manipulation($qry);
		//var_dump($exe);
		if($exe['status']=='true')
		{
			echo $obj->alert("successfully updateed","../ewastecategory.php");
		}
		else
		{
			echo $obj->alert("failed try again","../ewastecategory.php");
		}
	}
	
}
//------------------------------------------DELETE-------------------------------
elseif($page_action=='delete')
{
	$catid=$_REQUEST['catid'];
	$qry="delete from ewaste_category where catid='$catid'";
	$exe=$obj->Manipulation($qry);
	//var_dump($exe);
	if($exe['status']=='true')
	{
		header('location:../ewastecategory.php');
		//echo $obj->alert("Successfully Deleted","../ewastecategory.php");
	}
	else
	{
		echo $obj->alert("Failed, try again","../ewastecategory.php");
	}
}
?>