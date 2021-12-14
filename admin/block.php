<?php
include("includes/connection.php");
$record_id=$_GET['record_id'];

$sql="select * from categories where cat_id='$record_id'";

	
$recordset=mysqli_query($connection,$sql);

$record=mysqli_fetch_array($recordset);
if($record['block_category']==0)
{
	$sql="
	UPDATE categories 
	SET 
	block_category='1' where cat_id='$record_id';
	";
	//echo $sql;
	//exit;
	mysqli_query($connection,$sql);
	header("location:view_categories.php?block=1");
}
else{
	$sql="
	UPDATE categories 
	SET 
	block_category='0' where cat_id='$record_id';
	";
	mysqli_query($connection,$sql);
	header("location:view_categories.php?block=0");
}


?>