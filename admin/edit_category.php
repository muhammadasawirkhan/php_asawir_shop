<?php
session_start();
include("includes/connection.php");
if($_SESSION['admin_auth']==1);
else{
	header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Control Panel - Online Profile System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/control_panel_css.css">
</head>
<body>
<div class="container"> 
	<?php include("includes/header.php");?>
	<div class="row1"> 

	<?php include("includes/menu.php");?>
	<div class="pages">
		<h1>Edit Category</h1>
		<hr/>
		Welcome to our OSC
		<br/>
		<div class="control_panel">
			<div class="categories">
			<form action="update_category.php" method="post"> 
				<h1>Edit Category</h1>
				<?php
				$cat_id="";
				//check the url if cat_id present
				if(isset($_GET['record_id']))
				{
					$cat_id=$_GET['record_id'];
					//get categories from db
					$sql="select * from categories where cat_id='$cat_id' and block_category<>1";
					$records=mysqli_query($connection,$sql);
				$record=mysqli_fetch_array($records)
				?>
				Category Name:
				<input type="text" name="name" value="<?php echo $record['category_name'];?>"/>
				<input type="hidden" name="cat_id" value="<?php echo $record['cat_id'];?>"/>
				<input type="submit" name="btnsubmit" value="Update"/>
				
				
				
				<?php

			}
				?>
			</form>
			</div>

		</div>		
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>