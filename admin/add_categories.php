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
		<br/>
		<div class="control_panel">
			<h1>Add Category</h1>
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
			<form action="insert_category.php" method="POST">
				<label>Enter Category Name:</label>
				<input type="text" name="name" value=""/>
				
				<input type="submit" name="btnSubmit" value="Add!"/>
			</form>





		</div>		
	</div>

		</div>		
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>