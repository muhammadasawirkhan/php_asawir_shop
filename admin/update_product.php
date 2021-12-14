<?php 
include("includes/connection.php");

$msg="";
if(count($_POST)){
	$prod_id=$_POST['record_id'];
	$prod_name=$_POST['prod_name'];
	$prod_desc=$_POST['prod_desc'];
	$prod_purchase_price=$_POST['prod_purchase_price'];
	$prod_sales_price=$_POST['prod_sales_price'];
	$prod_stock=$_POST['prod_stock'];
	if($_FILES['prod_small_image']!="" || $_FILES['prod_large_image']!="")
	{
	include("includes/insert_picture.php");
	if($small_img!="")
	$prod_small_image=$small_img;
	if($large_img!="")
	$prod_large_image=$large_img;
	
	}
	
	//echo $small_img;
	//echo $large_img;
	//exit;
	
	if($prod_name=="")
	{
		$msg="Product name can not be empty.";
	}
	else if($prod_desc=="")
	{
		$msg="Product description can not be empty.";
	}
	
	if($msg=="")
	{	
		$sql="update products set prod_name='$prod_name',prod_desc='$prod_desc',prod_small_image='$prod_small_image',prod_large_image='$prod_large_image',prod_purchase_price='$prod_purchase_price',prod_sales_price='$prod_sales_price',prod_stock='$prod_stock' where prod_id='$prod_id'";

		mysqli_query($connection,$sql) or die(mysqli_error($connection));
		header("Location:view_products.php?msg=update");
		
	}
	else {
		header("Location:add_product.php?msg=$msg");
	}
}



?>