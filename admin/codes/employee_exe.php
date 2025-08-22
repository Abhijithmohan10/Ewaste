<?php
require_once('../../ConnectionClass.php');
$obj=new connectionclass();

$action=$_REQUEST['action'];

//=============================INSERT===========================
if($action=='insert')
{
	$employee_type=$_POST['employee_type'];
	$Name =$_POST['emp_name'];
	$Phone_Number=$_POST['emp_phn'];
	$gender=$_POST['gender'];
	$City =$_POST['emp_city'];
	$Email =$_POST['emp_email'];
	$district=$_POST['district'];
	$qrys="select count(*) from login where username='$Email'";
	$cnt=$obj->GetSingleData($qrys);
	$qrys="select count(*) from employee where phone='$Phone_Number'";
	$mobile=$obj->GetSingleData($qrys);
	if($cnt==0)
	{
		if($mobile==0)
		{
		$qry1="insert into employee(emp_name,phone,gender,city,email,district) values('$Name','$Phone_Number','$gender','$City','$Email','$district')";
		
		$qry2="insert into login(username,password,usertype,status) value('$Email','$Phone_Number','$employee_type','active')";
		
		$exe1=$obj->Manipulation($qry1);
		$exe2=$obj->Manipulation($qry2);
	    
	    if($exe1['status']=="true" && $exe2['status']=="true")
		{

			//echo "successful";
			echo $obj->alert("Employee Registration Successful.","../employee.php");
		}
		else
		{
			echo $obj->alert("Failed","../employee.php");
		}
	}
	else
	{
		echo $obj->alert("Phone Number already exist","../employee.php");
	}
	}
	else
	{
		echo $obj->alert("Email ID already exist","../employee.php");
	}
}

//=======================================UPDATE=====================================
elseif($action=='update')
{
	$empid=$_POST['empid'];
	$usertype=$_REQUEST['emptype'];
	$employee_type=$_POST['employee_type'];
	$Name =$_POST['emp_name'];
	$Phone_Number=$_POST['emp_phn'];
	$gender=$_POST['gender'];
	$City =$_POST['emp_city'];
	$email=$_POST['emp_email'];
	$district=$_POST['district'];

	$qry="update login set usertype='$employee_type' where username='$email'";
	$exe=$obj->Manipulation($qry);
	$qry1="update employee set emp_name='$Name',phone='$Phone_Number',gender='$gender',city='$City',district='$district' where emp_id='$empid'";
	$exe1=$obj->Manipulation($qry1);
	if($exe1['status']=="true" && $exe['status']=="true")
	{
		echo $obj->alert("successful","../employee_view.php?emp=".$usertype);
	}
	else
	{
		echo $obj->alert("failed","../employee_view.php?emp=".$usertype);
	}
}
//================================================Change Status==============
elseif($action=='changestatus')
{
	$val=$_REQUEST['val'];
	$sid=$_REQUEST['eid'];

	$qr="select * from employee inner join login where employee.emp_id='$sid' and employee.email=login.username";
	$data=$obj->GetSingleRow($qr);
	$email=$data['email'];
	$usertype=$data['usertype'];

	$qry="update login set status='$val' where username='$email'";
	//echo $qry="update login set status='$val' where username=(select email from employee where emp_id='$sid')";
	$exe=$obj->Manipulation($qry);
	//var_dump($exe);
	if($exe['status']=='true')
	{
	   //echo "Status Changed";
	   echo $obj->alert('Status Changed','../employee_view.php?emp='.$usertype);
	}
	else
	{
		//echo "Failed";
	  echo $obj->alert('Failed','../employee_view.php?emp='.$usertype);
	}
}
//==================================================DELETE============================

elseif($action=='delete')
{
	$empid=$_REQUEST['empid'];
	$qr="select * from employee inner join login where employee.emp_id='$empid' and employee.email=login.username";
	$data=$obj->GetSingleRow($qr);
	$email=$data['email'];
	$usertype=$data['usertype'];
	$qry="delete from login where username='$email'";
	$exe=$obj->Manipulation($qry);
	$qry1="delete from employee where emp_id='$empid'";
	$exes=$obj->Manipulation($qry1);
	if($exe['status']=="true" && $exes['status']=="true")
	{
		echo $obj->alert("Deleted","../employee_view.php?emp=".$usertype);
	}
	else
	{
		echo $obj->alert("Failed","../employee_view.php?emp=".$usertype);
	}
}

?>