<?php
session_start();
$_SESSION['cart_total']=0;

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
		<h1>Login</h1>
		<hr/>
		<div class="register-form">
				<?php
				if(isset($_GET['login']))
				{
					echo "<font color='red'>Unable to login. Check your credentials.</font>";
				}
				if(isset($_GET['logout']))
				{
					echo "<font color='red'>You have been logged out. Thank you for using our website.</font>";
				}
				if(isset($_GET['block']))
				{
					echo "<font color='red'>You have been blocked by CPS Admin.</font>";
				}
				?>
				<form action="login_user.php" method="POST" >
				<label>Enter Email:</label>
				<input type="email" name="email" value=""/>
				<br/>
				<label>Enter Password:</label>
				<input type="password" name="password2" value=""/>
				<br/>
				<input type="submit" name="btnLogin" value="Login!"/>
				  New User: <a href="register.php">SignUp Here!</a>
			</form>


		</div>		
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>