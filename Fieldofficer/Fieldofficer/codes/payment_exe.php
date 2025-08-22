<?php 
session_start(); 
require_once('../../ConnectionClass.php');
$obj=new Connectionclass();

$ses=$_SESSION['email'];
$qwey="select emp_id from employee where email='$ses'";
$emp_id=$obj->GetSingleData($qwey);

$acc_no=$_REQUEST['acc_no'];
$owner=$_REQUEST['owner'];
$str = strtoupper($owner);
$ifsc=$_REQUEST['ifsc'];

$req_id=$_REQUEST['req_id'];
$sr="select sum(amount) from request_items where req_id='$req_id'";
$sum=$obj->GetSingleData($sr);

$qry="select count(*) from bank where acc_no='$acc_no' and ownername='$str' and ifsccode='$ifsc'";
$res=$obj->GetSingleData($qry);
//var_dump($res);
if($res!=0)
{
	$qry="select * from bank where ownername='ADMIN'";
	$sourse=$obj->GetSingleRow($qry);
	$acc_no_src=$sourse['acc_no'];
	$amt_src=$sourse['amount'];
	if($amt_src>=$sum)
	{
		$client_amt=$res['amount'];
		$new_cl_amt=$client_amt+$sum;
		$new_admin_amt=$amt_src-$sum;
		//echo "okk";
		$up_admin_qry="update bank set amount='$new_admin_amt' where acc_no='12345678901' and ownername='ADMIN' and ifsccode='1111'";
		$admin_exe=$obj->Manipulation($up_admin_qry);
		$up_cl_qry="update bank set amount='$new_cl_amt' where acc_no='$acc_no' and ownername='$str' and ifsccode='$ifsc'";
		$cl_exe=$obj->Manipulation($up_cl_qry);
		if($admin_exe['status']=='true' && $cl_exe['status']=='true')
		{
			$date=date('Y-m-d');
			 $up_sch_emp="update schedule_employee set sch_status='completed',collected_date='$date' where req_id='$req_id' and sch_status='assigned' and emp_id='$emp_id'";
			$exe_sch=$obj->Manipulation($up_sch_emp);

			 $up_sel_req="update selling_request set req_status='collected' where req_id='$req_id'";			
			$exe_sel_req=$obj->Manipulation($up_sel_req);
			//
			$qry1="update selling_request set req_status='collected' where request_id='$req_id'";
			$exe1=$obj->Manipulation($qry1);

			//echo "Transaction Successful";
			echo $obj->alert("Transaction Successful","../view_scheduled.php");
		}
		else
		{
			//echo "Transaction Failed";
			echo $obj->alert("Transaction Failed","../payment.php?id=".$req_id);
		}
	}
	else
	{
		echo $obj->alert("Insufficient Balance in E-waste Account","../payment.php?id=".$req_id);
	}
	//$qry1="update scheduled_list set status='collected' where sheduled_list_id='$s_lst_id'";
	//$exe1=$obj->Manipulation($qry1);
}
else
{
	//echo "ssssssssssss";
	echo $obj->alert("Check Account Details that you entered","../payment.php?id=".$req_id);
	//echo $obj->alert("Can't find Account Details","../payment.php?id=".$req_id);
}
?>