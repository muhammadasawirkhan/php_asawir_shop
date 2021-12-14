<?php 
$msg="";
if(count($_POST)){
	$email=$_POST['email'];
	$name=$_POST['name'];
	$password2=$_POST['password2'];
	$phone=$_POST['phone'];
	$billing_address=$_POST['billing_address'];
	$shipping_address=$_POST['shipping_address'];
	//echo $password;
	include("includes/insert_picture.php");
	//echo $flag;
	//exit;
	
	if($email=="")
	{
		$msg="Email can not be empty.";
	}
	else if($name=="")
	{
		$msg="Name can not be empty.";
	}
	else if($password2=="")
	{
		$msg="Password can not be empty.1";
	}
	else if($billing_address=="")
	{
		$msg="Billing Address can not be empty.";
	}
	
	//echo $flag;
	if($msg=="")
	{	
		$sql="select * from users where email='$email'"	;
		$records=mysqli_query($connection,$sql);
		if(mysqli_num_rows($records)>0)
		{
			header("location:register.php?msg=record_exists");
		}
		else{
			$date1=date("d-m-Y");
			//echo $date1;
			//exit;
		$sql="insert into users(email,name,password,picture,date_created,block_user,phone,billing_address,shipping_address) values('$email','$name','$password2','$newfilename','$date1','0','$phone','$billing_address','$shipping_address')";
		mysqli_query($connection,$sql);
		header("Location:login.php?msg=insert");
		}
	}
	else {
		header("Location:register.php?msg=$msg");
	}
}



?>