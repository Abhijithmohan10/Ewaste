<?php
session_start();
require_once('../../ConnectionClass.php');
$obj=new connectionclass();

echo $page_action=$_REQUEST['action'];
$email=$_SESSION['email'];
//------------------------------------------------------------------------

//----------------------------------------------------------------------------
if($page_action=='insert')
{
	$subject=$_POST['subject'];
	$cur_date=date('Y-m-d');
	$description=$_POST['description'];
	//$cur_date=date('d-m-Y',strtotime($user['date_of_birth']));
	//$fe_id=$_REQUEST['fid'];
	
	$qry="insert into feedback(subject,message,senddate,email)values('$subject','$description','$cur_date','$email')";

	
	//$qry="update feedback set rplymessage='$reply',rplydate='$cur_date' where msgid='$fe_id'";
	$exe=$obj->Manipulation($qry);
	//var_dump($exe);
	if($exe['status']=='true')
	{
		echo $obj->alert("feedback Sended","../addfeedback.php");
	}
	else
	{
		echo $obj->alert("Failed try again","../addfeedback.php");
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
		echo $obj->alert("Successfully Deleted","../addfeedback.php");
	}
	else
	{
		echo $obj->alert("Failed, try again","../addfeedback.php");
	}

}


?>