<?php 
include('includes/connection.php');
$cat_id=$_GET['record_id'];
$sql="delete from categories where cat_id='$cat_id'"	;
mysqli_query($connection,$sql);
header("location:view_categories.php?option=delete");


?>