<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container"> 
	<?php include("includes/header.php");?>
	<div class="row1"> 

	<?php include("includes/menu.php");?>
	<div class="pages">
		<h1>Register</h1>
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
			<form action="register_user.php" method="POST" enctype="multipart/form-data">
				<label>Enter Name:</label>
				<input type="text" name="name" value=""/>
				<br/>
				<label>Enter Email:</label>
				<input type="email" name="email" value=""/>
				<br/>
				<label>Enter Password:</label>
				<input type="password" name="password2" value=""/>
				<br/>
				<label>Enter Phone:</label>
				<input type="text" name="phone" value=""/>
				<br/>
				<label>Enter Billing Address:</label>
				<textarea rows="5" cols="30" name="billing_address"></textarea>
				<br/>
				<label>Enter Shipping Address:</label>
				<textarea rows="5" cols="30" name="shipping_address"></textarea>
				<br/>
				<br/>
				<input type="submit" name="btnSubmit" value="Register!"/>
			</form>





		</div>		
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>