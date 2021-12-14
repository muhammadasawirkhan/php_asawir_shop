<?php 
include("includes/connection.php");

$msg="";
if(count($_POST)){
	$prod_name=$_POST['prod_name'];
	$prod_desc=$_POST['prod_desc'];
	$prod_purchase_price=$_POST['prod_purchase_price'];
	$prod_sales_price=$_POST['prod_sales_price'];
	$prod_stock=$_POST['prod_stock'];
	
	include("includes/insert_picture.php");
	//echo $small_img;
	//
	$prod_small_image=$small_img;
	$prod_large_image=$large_img;
	
	
	
	if($prod_name=="")
	{
		$msg="Product name can not be empty.";
	}
	else if($prod_desc=="")
	{
		$msg="Product description can not be empty.";
	}
	else if($prod_small_image=="")
	{
		$msg="Product small image can not be empty.";
	}
	else if($prod_large_image=="")
	{
		$msg="Product large image can not be empty.";
	}

	if($msg=="")
	{	
		$sql="select * from  where prod_name='$prod_name'"	;
		$records=mysqli_query($connection,$sql);
		if(mysqli_num_rows($records)>0)
		{
			header("location:add_product.php?msg=record_exists");
		}
		else{
			
	
			$date1=date("d-m-Y");
			//echo $date1;
			//exit;
		$sql="insert into products(prod_name,prod_desc,prod_small_image,prod_large_image,prod_purchase_price,prod_sales_price,prod_stock,date_created,block_product) values('$prod_name','$prod_desc','$prod_small_image','$prod_large_image','$prod_purchase_price','$prod_sales_price','$prod_stock','$date1','0')";
		mysqli_query($connection,$sql) or die(mysqli_error($connection));
		header("Location:add_product.php?msg=insert");
		}
	}
	else {
		header("Location:add_product.php?msg=$msg");
	}
}



?>