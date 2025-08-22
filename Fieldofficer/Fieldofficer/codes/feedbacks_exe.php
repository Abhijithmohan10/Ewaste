<?php
require_once('../../ConnectionClass.php');
$obj=new connectionclass();

$page_action=$_REQUEST['action'];
//------------------------------------------------------------------------

//----------------------------------------------------------------------------
if($page_action=='replay')
{
	$reply=$_POST['reply'];
	$cur_date=date('Y-m-d');
	//$cur_date=date('d-m-Y',strtotime($user['date_of_birth']));
	$fe_id=$_REQUEST['fid'];
	
	
	$qry="update feedback set rplymessage='$reply',rplydate='$cur_date' where msgid='$fe_id'";
	$exe=$obj->Manipulation($qry);
	//var_dump($exe);
	if($exe['status']=='true')
	{
		echo $obj->alert("Replay Message Sended","../reply_feedback.php");
	}
	else
	{
		echo $obj->alert("Failed try again","../reply_feedback.php");
	}

	
}
//------------------------------------------------------------------------------------
elseif($page_action=='delete')
{
	$fe_id=$_REQUEST['fid'];
	$qry="delete from feedback where msgid='$fe_id'";
	$exe=$obj->Manipulation($qry);
	//var_dump($exe);
	if($exe['status']=='true')
	{
		//header('location:../company_category.php');
		echo $obj->alert("Successfully Deleted","../reply_feedback.php");
	}
	else
	{
		echo $obj->alert("Failed, try again","../reply_feedback.php");
	}

}


?>