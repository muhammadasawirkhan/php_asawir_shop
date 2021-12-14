<?php
include("includes/connection.php");

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
		<h1>Shop</h1>
		<hr/>
		<table border="1"> 
			<tr> 

				<td colspan="3">All Products</td>
			</tr>

		
		<?php
		$sql="select * from products";
		$records=mysqli_query($connection,$sql) or die(mysql_error($connection));
		while($record=mysqli_fetch_array($records))
		{
			$prod_id=$record['prod_id'];
			$prod_desc=$record['prod_desc'];
			
			$prod_small_image=$record['prod_small_image'];
				echo "		<tr> 

				<td>
				<img src='admin/product_images/".$prod_small_image."'/>
				</td>
				<td>".$prod_desc."</td>
				<td>
					<form action='add_to_cart.php' method='post'>
					<input type='hidden' id='prod_id' name='prod_id' value='".$prod_id."'/>
					<button id='addbtn'>Add To Cart</button>
					</form>
				</td>
			</tr>
			";
		}
		?>

	</table>

	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>