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
		<h1>View Categories</h1>
		<table border="1" width="80%" align="center"> 
			<tr>
				<td>ID</td>
				<td>Product Name</td>
				<td>Product Description</td>
				<td>Product Image</td>
				<td>Purchase Price</td>
				<td>Sales Price</td>			
				<td>Stock</td>			
				<td>Date Created</td>
				<td>Status</td>
				<td>Edit</td>
				<td>Delete</td>
				
				
			</tr>

			<?php
			$sql="select * from products";


			$recordset=mysqli_query($connection,$sql);
while($record=mysqli_fetch_array($recordset))
{
	echo '<tr>';
	echo "<td>".$record['prod_id']."</td>";
	echo "<td>".$record['prod_name']."</td>";
	
	echo "<td>".$record['prod_desc']."</td>";
	echo "<td><img src='product_images/".$record['prod_small_image']."'  width='50'/></td>";
	echo "<td>".$record['prod_purchase_price']."</td>";
	echo "<td>".$record['prod_sales_price']."</td>";
	echo "<td>".$record['prod_stock']."</td>";
	
	echo "<td>".$record['date_created']."</td>";
	
	if($record['block_product']==0)
	{
	echo "<td><a href='block_product.php?record_id=".$record['prod_id']."&option=block'>Block</a></td>";
	}
	else{
		echo "<td><a href='block_product.php?record_id=".$record['prod_id']."&option=block'>Unblock</a></td>";
		
	}
	echo "<td><a href='edit_product.php?record_id=".$record['prod_id']."&option=edit'>Edit</a></td>";
	echo "<td><a href='delete_product.php?record_id=".$record['prod_id']."&option=edit'>Delete</a></td>";
	
	echo '</tr>';

}

			?>
			
		</table>
		</div>		
	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>