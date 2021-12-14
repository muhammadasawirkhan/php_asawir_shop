<?php 
session_start();
include("includes/connection.php");
$msg="";
//echo "aaaa";
//exit;
if(count($_POST)){
	$email=$_POST['email'];
	$password2=$_POST['password2'];
	//echo $password2;
	//exit;
	if($email=="")
	{
		$msg="Email can not be empty.";
	}
	
	else if($password2=="")
	{
		$msg="Password can not be empty.1";
	}
	//echo $flag;
	if($msg=="")
	{	
		$sql="select * from users where email='$email' and password='$password2'"	;
		$records=mysqli_query($connection,$sql);
		$record=mysqli_fetch_array($records);
		//echo $record['block_user'];
		//exit;
		if($record['block_user']=='0')
		{


			//echo $record['email'];
			//exit;
			if(isset($record['email']))
			{

				$_SESSION['admin_auth']=1;
				header("location:index.php?email=$email&name=".$record['name']);
			}
			else{
				header("location:login.php?login=0");	
			}
		}
		else{
				header("location:login.php?block=1");	
		}

	}
	
}



?>