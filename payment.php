<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container"> 
	<?php include("includes/header.php");?>
	<div class="row1"> 

	<?php include("includes/menu.php");?>
	<div class="pages">
		<h1>Payment Gateway OSC</h1>
		<hr/>
		<div class="register-form">
			<div class="message">
				<?php
			if(isset($_GET['msg'])&&$_GET['msg']=='record_exists'){
				echo "<font color='red'>Record already exists.</font>";
	
			}
			else if(isset($_GET['msg']) && $_GET['msg']=='insert')
			{
				echo "<font color='green'>Record has been inserted.</font>";


			}
			else if(isset($_GET['msg'])){
				echo "<font color='red'>".$_GET['msg']."</font>";
	
			}
			?>
			</div>
			<form action="check_payment.php" method="POST" >
				<?php
				if(isset($_GET['cart']))
				{
					echo "<font color='red'>The cart is empty.</font> <a href='view_products.php'>Go to Shop</a>";
				}

				?>
				<label>Enter Credit Card Number:</label>
				<input type="text" name="card_number" value=""/>
				<br/>
				<label>Enter PIN:</label>
				<input type="text" name="pin" value=""/>
				<br/>
				<br/>
				<input type="submit" name="btnSubmit" value="Pay!"/>
			</form>





		</div>		
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>