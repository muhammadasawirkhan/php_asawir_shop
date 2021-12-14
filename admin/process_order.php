<?php
include("includes/connection.php");
$record_id=$_GET['record_id'];

$sql="select * from order1 where order_id='$record_id'";

	
$recordset=mysqli_query($connection,$sql);

$record=mysqli_fetch_array($recordset);
if($record['process_order']==0)
{
	$sql="
	UPDATE order1 
	SET 
	process_order='1' where order_id='$record_id';
	";
	//echo $sql;
	//exit;
	mysqli_query($connection,$sql);
	header("location:view_orders.php?block=1");
}
else{
	$sql="
	UPDATE order1 
	SET 
	process_order='0' where order_id='$record_id';
	";
	mysqli_query($connection,$sql);
	header("location:view_orders.php?block=0");
}


?>