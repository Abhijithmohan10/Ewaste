<?php
require_once("../../connectionclass.php");
echo $email_id=$_POST['username'];
//echo $email_id;
$obj=new connectionclass();
$qry="select count(*) from login where username='$email_id' and status='active'";
//echo $qry;
$count=$obj->GetSingleData($qry);
if($count==0)
{
	echo $obj->alert("Email ID doesnot exist","../forgotpassword.php");
}
else
{
	session_start();
	$_SESSION['email_id']=$email_id;
	$random=rand(999999,888888);

	$_SESSION['random']=$random;
	$qry3="insert into forgotpassword(email_id,random_number)values('$email_id','$random')";
	//echo $qry3;
	$result1=$obj->Manipulation($qry3);
	if($result1['status']=="true")
	{
		
		//require_once("phpmailer/gmail.php");
		//$mail_code="Note your random number : ".$random;
		//sendmail($mail_code,"FORGOT PASSWORD",$email_id);
		echo $obj->alert("please check ","../entercode.php");
	}
	else{
		echo "create table";
	}
}
?>