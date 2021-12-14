<?php 
include('includes/connection.php');
$prod_id=$_GET['record_id'];
$sql="delete from products where prod_id='$prod_id'"	;
mysqli_query($connection,$sql);
header("location:view_products.php?option=delete");


?>