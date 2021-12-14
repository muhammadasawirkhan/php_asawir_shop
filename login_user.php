<?php 
session_start();
include("includes/connection.php");

function is_empty_cart($connection)
{
	$customer_email=$_SESSION['email'];
	$sql="select customer_email from cart where customer_email='$customer_email'";
//echo $sql;
$records=mysqli_query($connection,$sql);
$record=mysqli_fetch_array($records);
//echo $record['customer_email'];
//exit;

if($record['customer_email']=="")
{
	return true;
}
else return false;	
}
$msg="";
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
		if($record['block_user']==0)
		{


			//echo isset($record['email']);
			//exit;
			if(isset($record['email']))
			{
				$_SESSION['auth']=1;
				$_SESSION['email']=$record['email'];
				echo is_empty_cart($connection);
				//exit;
				if(is_empty_cart($connection))
				{
					header("location:products.php?email=$email&name=".$record['name']);	
				}
				else {header("location:payment.php?email=$email&name=".$record['name']);
				}
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