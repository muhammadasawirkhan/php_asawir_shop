<?php 
session_start();
include("includes/connection.php");
$msg="";
if(isset($_SESSION['cart_total']))
{
	//if there is something in the cart_total
	if($_SESSION['cart_total']>0);
	else{
		header("Location:payment.php?cart=0");
	}

}
if(count($_POST)){
	$card_number=$_POST['card_number'];
	$pin=$_POST['pin'];
	;
	
	if($card_number=="")
	{
		$msg="Card Number can not be empty.";
	}
	else if($pin=="")
	{
		$msg="PIN can not be empty.";
	}
	
	//echo $flag;
	if($msg=="")
	{	
			$date1=date("d-m-Y");
			//echo $date1;
			//exit;
		$sql="update users set card_number='$card_number',pin='$pin' where email='".$_SESSION['email']."'";
		//echo $sql;
		//exit;
		mysqli_query($connection,$sql) or die(mysqli_error($connection));
		header("Location:order.php?msg=insert");
		
	}
	else {
		header("Location:register.php?msg=$msg");
	}
}



?>

