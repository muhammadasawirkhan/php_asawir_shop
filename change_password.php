<?php
include("includes/connection.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password - Online Profile System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container"> 
	<?php include("includes/header.php");?>
	<div class="row1"> 

	<?php include("includes/menu.php");?>
	<div class="pages">
		<?php
		$name="";
		$email="";
		if(isset($_GET['name']))
		{
			$name=$_GET['name'];
		}
		if(isset($_GET['email']))
		{
			$email=$_GET['email'];
		}
		
		?>
		
		<a href="profile.php?email=<?php echo $email1;?>&name=<?php echo $name;?>">Profile</a>
			| 
		<a href="settings.php?email=<?php echo $email1;?>&name=<?php echo $name;?>">Settings</a>
			| 
		<a href="change_password.php?email=<?php echo $email1;?>&name=<?php echo $name;?>">Change Password</a>
		
		<hr/>
		
		<?php

		$sql="select * from users where email='$email'";
		$records=mysqli_query($connection,$sql);
		$record=mysqli_fetch_array($records);
		


		?>
		<form action="update_password.php" method="post">
			<?php
			if(isset($_GET['msg']) &&$_GET['msg']==1)
			{
				echo "Your Password has been successfully changed";
			}
			else{
				if(isset($_GET['msg']))echo $_GET['msg'];
			}
			?>
		<table> 

			<tr>
				<td>
					Old Password:<input type="text" name="old_password" value="<?php echo $record['password'];?>"/>
					<br/>
					New Password:<input type="text" name="new_password"/>	
					<br/>	
					Confirm Password:<input type="text" name="confirm_password" value=""/>
					<input type="hidden" name="email" value="<?php echo $email;?>"/>
					<br/>
					<input type="submit" value="Update Password"/>
				</td>
				
			</tr>
				
		</table>
		</form>
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>