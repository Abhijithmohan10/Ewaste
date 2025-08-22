<?php
session_start();
requie_once("../../connectionclass.php");
$obj=new connectionclass();
$email=$_SESSION['email'];
$currentpassword=$_POST["currentpass"];
$newpassword=$_POST["newpass"];
$confirmpassword=$_POST["conpass"];
$qry="select password from login where username='$email'";
$password=$obj->GetSingleData($qry);
if($password==$currentpassword)
{
	if($newpassword==$confirmpassword)
	{
		$qry="upadate login set password='$newpassword' where username='$email'";
		$result=$obj->Manipulation($qry);
		if($result['status']=="true")
		{
          echo $obj->alert("successfully updated","../adminhome.php");
      }
    else
      {
      	echo $obj->alert("Failed,try again","../changepassword.php");
      }
  }
  else
  {
  	echo $obj->alert("Failed,try again","../changepassword.php");
  }
}
else
{
	echo $obj->alert("Checkn Current Password","../changepassword.php");
}
?>