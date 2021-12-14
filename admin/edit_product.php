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
	<title>Control Panel - OSC</title>
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
			<h1>Edit Product</h1>
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
			$prod_name="";
			$prod_desc="";
			$prod_purchase_price="";
			$prod_sales_price="";
			$prod_stock="";
			$prod_small_image="";
			$prod_large_image="";
			
			if(isset($_GET['record_id']))
			{
				$record_id=$_GET['record_id'];
				$sql="select * from products where prod_id='$record_id'";


			$recordset=mysqli_query($connection,$sql);
			$record=mysqli_fetch_array($recordset);

				$prod_name=$record['prod_name'];
				$prod_desc=$record['prod_desc'];
				$prod_purchase_price=$record['prod_purchase_price'];
				$prod_sales_price=$record['prod_sales_price'];
				$prod_stock=$record['prod_stock'];
				$prod_small_image=$record['prod_small_image'];
				$prod_large_image=$record['prod_large_image'];
				
			}
			?>
			</div>
			<form action="update_product.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name='record_id' value='<?php echo $record_id;?>'/>
				<table border="1" style="border-collapse:collapse"> 
					<tr> 
						<td>
					<label>Enter Product Name:</label>
						</td>
						<td>
						<input type="text" name="prod_name" value="<?php echo $prod_name;?>"/>
						</td>
					</tr>
					<tr> 
						<td>
					<label>Product Description:</label>
						</td>
						<td>
						<input type="text" name="prod_desc" value="<?php echo $prod_desc;?>"/>
						</td>
					</tr>
					<tr> 
						<td>
					<label>Small Image:</label>
						</td>
						<td>
						<img src='product_images/<?php echo $prod_small_image;?>' height="50" width="50"/>
						<input type="file" name="prod_small_image" value="<?php echo $prod_small_image;?>"/>
						</td>
					</tr>
					<tr> 
						<td>
					<label>Large Image:</label>
						</td>
						<td>
							<img src='product_images/<?php echo $prod_large_image;?>' height="50" width="50"/>
						<input type="file" name="prod_large_image" value="<?php echo $prod_large_image;?>"/>
						</td>
					</tr>
					<tr> 
						<td>
					<label>Purchase Price:</label>
						</td>
						<td>
						<input type="text" name="prod_purchase_price" value="<?php echo $prod_purchase_price;?>"/>
						</td>
					</tr>
					<tr> 
						<td>
					<label>Sales Price:</label>
						</td>
						<td>
						<input type="text" name="prod_sales_price" value="<?php echo $prod_sales_price;?>"/>
						</td>
					</tr>
					<tr> 
						<td>
					<label>Stock:</label>
						</td>
						<td>
						<input type="text" name="prod_stock" value="<?php echo $prod_stock;?>"/>
						</td>
					</tr>
					<tr> 
						<td></td>
						<td>
					<input type="submit" name="btnSubmit" value="Update Product!"/>
					</td>
				</tr>
		</table>
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