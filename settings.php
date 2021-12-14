<?php
include("includes/connection.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Settings</title>
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
		<form action="update_profile.php" method="post" enctype="multipart/form-data">
		<table> 

			<tr>
				<td>
					<img src="user_pictures/<?php echo $record['picture'];?>" height="50" width="50"/>
					<br/> 
					<input type="file" name="image"/>
					<br/>
					<input type="text" name="email" value="<?php echo $record['email'];?>"/>	
					<br/>	
					<input type="text" name="name" value="<?php echo $record['name'];?>"/>
					<input type="submit" value="Update Profile"/>
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