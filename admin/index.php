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
		<h1>Home</h1>
		<hr/>
		Welcome to our Profile System
		<br/>
		<div class="box">
			<div class="categories"> 
				<h1>Categories</h1>
				<ul> 
					<li>
					<a href="add_categories.php">Add Category</a>
				</li>
					<li><a href="view_categories.php">View All</a>
					</li>
				</ul>
			</div>
			<div class="categories"> 
				<h1>Products</h1>
				<ul> 
					<li>
					<a href="add_product.php">Add Product</a>
				</li>
					<li><a href="view_products.php">View All</a>
					</li>
				</ul>
			</div>
			<div class="categories"> 
				<h1>Orders</h1>
				<ul> 
					<li>
					<a href="view_orders.php">View Orders</a>
				</li>
					
				</ul>
			</div>

		</div>		
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>