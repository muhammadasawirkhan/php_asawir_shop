<?php
include("includes/connection.php");
$record_id=$_GET['record_id'];

$sql="select * from products where prod_id='$record_id'";

	
$recordset=mysqli_query($connection,$sql);

$record=mysqli_fetch_array($recordset);
if($record['block_product']==0)
{
	$sql="
	UPDATE products 
	SET 
	block_product='1' where prod_id='$record_id';
	";
	//echo $sql;
	//exit;
	mysqli_query($connection,$sql);
	header("location:view_products.php?block=1");
}
else{
	$sql="
	UPDATE products 
	SET 
	block_product='0' where prod_id='$record_id';
	";
	mysqli_query($connection,$sql);
	header("location:view_products.php?block=0");
}


?>