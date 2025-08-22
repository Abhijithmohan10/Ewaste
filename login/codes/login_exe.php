<?php
session_start();
require_once("../../connectionclass.php");
$obj=new ConnectionClass();
 $uname=$_POST['username'];
 $pass=$_POST['password'];
 $qry1="select usertype from login where username='$uname' and password='$pass'";
 $exe=$obj->GetSingleData($qry1);

 //echo $exe;
 $_SESSION['email']=$uname;

 //var_dump($exe);
 //echo $exe;
 if($exe=='admin')
 {
 	header("location:../../admin/index.php");
 }
 	elseif ($exe=='company') 
{
	header("location:../../company/index.php");
 }
 
 elseif($exe=='fieldofficer')
{
	header("location:../../fieldofficer/index.php");
}
else
{
   echo $obj->alert("Invalid Username or Password","../login.php");
}








?>