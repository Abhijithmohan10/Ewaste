<?php
require_once('../../ConnectionClass.php');
$obj=new connectionclass();

$page_action=$_REQUEST['action'];
//------------------------------------------------------------------------
if($page_action=='insert')
{
	$category=$_POST['cat_name'];
	$qry="select count(*) from company_category where cmp_cat_name='$category'";
	$count=$obj->GetSingleData($qry);
	if($count!=0)
	{
		echo $obj->alert("Already Existed","../company_category.php");
	}
	else
	{
		$qry1="insert into company_category(cmp_cat_name) values('$category')";
		$exe1=$obj->Manipulation($qry1);
		//var_dump($exe1);
		if($exe1['status']=="true")
		{
			echo $obj->alert("successfull","../company_category.php");
		}
		else
		{
			echo $obj->alert("failed","../company_category.php");
		}
	}
}
//----------------------------------------------------------------------------
elseif($page_action=='update')
{
	$catname=$_POST['cat_name'];	
	$catid=$_POST['cmpcatid'];	
	$qrycnt="select count(*) from company_category where cmp_cat_name='$catname' and cmp_cat_id!='$catid'";
    $count=$obj->GetSingleData($qrycnt);

	if($count!=0)
	{
		echo $obj->alert("Already Existed","../editcompany.php?cmpcatid=$catid");
	}
	else
	{
		$qry="update company_category set cmp_cat_name='$catname' where cmp_cat_id='$catid'";
		$exe=$obj->Manipulation($qry);
		//var_dump($exe);
		if($exe['status']=='true')
		{
			echo $obj->alert("successfully updated","../company_category.php");
		}
		else
		{
			echo $obj->alert("failed try again","../company_category.php");
		}
	}	
}
//------------------------------------------------------------------------------------
elseif($page_action=='delete')
{
	$catid=$_REQUEST['cmp_cat_id'];
	$qry="delete from company_category where cmp_cat_id='$catid'";
	$exe=$obj->Manipulation($qry);
	//var_dump($exe);
	if($exe['status']=='true')
	{
		echo $obj->alert("Successfully Deleted","../company_category.php");
	}
	else
	{
		echo $obj->alert("Failed, try again","../company_category.php");
	}
}
?>