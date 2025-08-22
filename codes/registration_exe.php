<?php
require_once('../Connectionclass.php');
$obj=new connectionclass();
//var_dump($_POST);
$comp_cat=$_POST['cmp_cat'];

//echo $comp_cat;
$companyname =$_POST['companyname'];
$district =$_POST['district'];
$city =$_POST['city'];
$pin =$_POST['pin'];
$contact =$_POST['contact'];
$email =$_POST['email'];
$pass=$_POST['password'];
$cpass=$_POST['confirmpassword'];



if($pass!=$cpass)
{
	echo $obj->alert("Password Missmatch","../registration.php");
}
else 
{
	$qry1="select count(*) from login where username='$email'";
	$exe1=$obj->GetSingleData($qry1);
	if($exe1==0)
	{
   $qry2="insert into customers(com_cat_id,company_name,state,city,location,phone,email,pincode)
	values('$comp_cat','$companyname','Kerala','$city','$district','$contact','$email','$pin')";
	//var_dump($qry2);




$qry3="insert into login(username,password,usertype,status)values('$email','$pass','company','inactive')";
$res2=$obj->Manipulation($qry2);
$res3=$obj->Manipulation($qry3);



//$res3['status']=='true';
if($res2['status']=='true'&& $res3['status']=='true')
{
	//echo "success";
	echo $obj->alert("Success","../login/login.php");
}



else
{
//	echo "failed";
	echo $obj->alert("Failed","../registration.php");
}


}
else
{
	//echo "Email id already exist";
	echo $obj->alert("Email id already exist","../registration.php");
}
}