<?php
require_once('../ConnectionClass.php');
$obj=new connectionclass();

$page_action=$_REQUEST['action'];
if($page_action=='insert')
{
	$name=$_POST['name'];
	$email=$_POST['Email'];
	$subject=$_POST['Subject'];
	$message=$_POST['Message'];

	
	$qrys="select count(*)from contact where name='$name'and email='$email'and subject='$subject'and message='$message'" ;
	$count=$obj->GetSingleData($qrys);
	if($count!=0)
	{
		echo $obj->alert("Already Existed","contact.php");
	}
	else
	{
	$qry1="insert into contact(name,subject,message,email)values('$name','$email','$subject','$message')";
	$exe1=$obj->Manipulation($qry1);
	//var_dump($exe1);
	if($exe1['status']=="true")
	{
		echo $obj->alert("Successfull","../contact.php");
	}
	else
	{
		echo $obj->alert("failed","../contact.php");
	}
}
}