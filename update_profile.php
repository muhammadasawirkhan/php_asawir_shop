<?php 
include('includes/connection.php');

$email=$_POST['email'];
	$name=$_POST['name'];
	$password2=$_POST['password2'];
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
	
	//echo $flag;
	if($msg=="")
	{	
		$sql="select * from users where email='$email'"	;
		$records=mysqli_query($connection,$sql);
		if(mysqli_num_rows($records)>0)
		{
			header("location:register.php?msg=record_exists");
		}
	if($file_name=="")
	{
	$sql="update users

		SET
			email='$email',
			name='$name'
		where email='$email'";
	}
	else{
		$sql="update users

		SET
			email='$email',
			name='$name',
			picture='$file_name'

	 	where email='$email'";
	}
mysqli_query($connection,$sql);
header("location:profile.php?email=$email&option=updated");
}
?>