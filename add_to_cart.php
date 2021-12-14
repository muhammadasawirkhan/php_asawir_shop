<?php
session_start();
include("includes/connection.php");
if(isset($_POST['prod_id']))
{
	$prod_id=$_POST['prod_id'];
	$sql="select * from cart where prod_id='$prod_id'";
	$records=mysqli_query($connection,$sql) or die(mysql_error($connection));

	$record=mysqli_fetch_array($records);
	if($record['prod_id']!="")
	{
		$prod_id=$record['prod_id'];
		$quantity=$record['quantity']+1;

		$sql="update cart set quantity='$quantity' where prod_id='$prod_id'";
		
		mysqli_query($connection,$sql) or die(mysql_error($connection));	
	}
	else{
		$date=date('d-m-Y');
		$session_id=session_id();
		$customer_email=$_SESSION['email'];
	$sql="insert into cart(prod_id,session_id, quantity,date_created,customer_email) values('$prod_id','$session_id','1','$date','$customer_email')";
	mysqli_query($connection,$sql);
	$sql1="select prod_sales_price from products where prod_id='$prod_id'";
	$records1=mysqli_query($connection,$sql1) or die(mysql_error($connection));

	$record1=mysqli_fetch_array($records1);
	
	$_SESSION['cart_total']+=$_SESSION['cart_total']+($record1['prod_sales_price']);
	}	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OSC - Shop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container"> 
	<?php include("includes/header.php");?>
	<div class="row1"> 

	<?php include("includes/menu.php");?>
	<div class="pages">
		<h1>Your Cart</h1>
		<hr/>
		<table border="1"> 
			<tr> 

				<td colspan="3">Selected Products</td>
			</tr>
			<tr> 

				<th>Sr#</th>

				<th>Product Name</th>
				<th>Image</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				
				<th>Total</th>
				
			</tr>
				
		
		<?php
		$sql="select * from cart";
		$records=mysqli_query($connection,$sql) or die(mysql_error($connection));
		$grand_total=0;
		$sr=0;
		while($record=mysqli_fetch_array($records))
		{
			$sr+=1;
			$prod_id=$record['prod_id'];
			$quantity=$record['quantity'];
			$sql1="select * from products where prod_id='$prod_id'";
			//echo $sql;
			$records1=mysqli_query($connection,$sql1) or die(mysql_error($connection));
			$record1=mysqli_fetch_array($records1);
			$prod_name=$record1['prod_name'];

			$prod_unit_price=$record1['prod_purchase_price'];
			$total=$quantity*$prod_unit_price;
			$grand_total+=$total;
			$prod_small_image=$record1['prod_small_image'];
				echo "		<tr> 
				<td>".$sr."</td>
				<td>".$prod_name."</td>
				<td>
				<img src='admin/product_images/".$prod_small_image."'/>
				</td>
				<td>".$prod_unit_price."</td>
				<td>".$quantity."</td>
				
				<td>".$total." PKR</td>
				
			</tr>
			";
		}
		?>
		<tr> 
			<td colspan="5" align="right"><b>Total:</b></td>
			<td><?php echo $grand_total;?> PKR</td>


		</tr>
		<tr> 
			<td colspan="6" align="center">
				<form action='checkout.php' method='post'>

					<button style="width:20vw;height:5vh;background-color:black;color:white;font-weight:bold">Checkout</button>
				</form>
			</td>
			

		</tr>
	</table>

	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>