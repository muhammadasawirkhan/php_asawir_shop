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
		<h1>View Orders</h1>
		<table border="1" width="80%" align="center"> 
			<tr>
				<td>Order ID</td>
				<td>Customer Email</td>
				<td>Order Date</td>
				
				<td>Order status</td>
				<td>Order Detail</td>
				
				
			</tr>

			<?php
			$sql="select * from order1";


			$recordset=mysqli_query($connection,$sql);
while($record=mysqli_fetch_array($recordset))
{
	echo '<tr>';
	echo "<td><a href='order_detail.php?order_id=".$record['order_id']."'>".$record['order_id']."</a></td>";
	echo "<td>".$record['customer_email']."</td>";
	
	echo "<td>".$record['date_created']."</td>";
	
	if($record['process_order']==0)
	{
	echo "<td><a href='process_order.php?record_id=".$record['order_id']."&option=block'>Process</a></td>";
	}
	else{
		echo "<td><a href='process_order.php?record_id=".$record['order_id']."&option=block'>Unprocess</a></td>";
		
	}
	
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