<?php
include("includes/connection.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
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
		$email1="";
		if(isset($_GET['name']))
		{
			$name=$_GET['name'];
		}
		if(isset($_GET['email']))
		{
			$email1=$_GET['email'];
		}
		
		?>
		<a href="profile.php?email=<?php echo $email1;?>&name=<?php echo $name;?>">Profile</a>
			| 
		<a href="settings.php?email=<?php echo $email1;?>&name=<?php echo $name;?>">Settings</a>
			| 
		<a href="change_password.php?email=<?php echo $email1;?>&name=<?php echo $name;?>">Change Password</a>
		<?php
		if(isset($_GET['msg']))
		{
			echo $_GET['msg'];
		}
		else{
		?>
		<h1>Welcome <?php echo $name;?></h1>
		<hr/>
		
		<?php

		$sql="select * from users where email='$email1'";
		$records=mysqli_query($connection,$sql);
		$record=mysqli_fetch_array($records);
		


		?>
		<table> 

			<tr>
				<td>
					<img src="user_pictures/<?php echo $record['picture'];?>" height="50" width="50"/>
					<br/>
					<?php echo $record['email'];?>	
					<br/>	
					<?php echo $record['name'];?>
				</td>
				
			</tr>
			
		</table>
		<?php
		}//end if
		?>		
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>