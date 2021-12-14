<?php
session_start();
include("includes/connection.php");
//delete the database cart for this session_id,
$customer_email=$_SESSION['email'];
$date=date("d-m-Y");
$sql2="insert into order1(customer_email,date_created,process_order) values('$customer_email','$date','0')";
mysqli_query($connection,$sql2);
$insert_id=mysqli_insert_id($connection);
	

$sql="select customer_email,date_created,prod_id,quantity from cart where customer_email='$customer_email'";
$records=mysqli_query($connection,$sql);
while($record=mysqli_fetch_array($records))
{
	$prod_id=$record['prod_id'];
	$date=$record['date_created'];
	//insert order
	//get last inserted record
	$sql="insert into order_detail(prod_id,date_created,quantity,customer_email,order_id) values('$prod_id','$date','1','$customer_email','$insert_id')";
	mysqli_query($connection,$sql);
}
//delete cart for this customer

$sql="delete from cart where customer_email='$customer_email'";
mysqli_query($connection,$sql);





?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Login System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container"> 
	<?php include("includes/header.php");?>
	<div class="row1"> 

	<?php include("includes/menu.php");?>
	<div class="pages">
		<h1>Order</h1>
		<hr/>
		Your order has been placed. Thank for your shopping.	
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>