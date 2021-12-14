<?php 
include("includes/connection.php");

$msg="";
if(count($_POST)){
	$name=$_POST['name'];
	
	if($name=="")
	{
		$msg="Category name can not be empty.";
	}
	if($msg=="")
	{	
		$sql="select * from categories where name='$name'"	;
		$records=mysqli_query($connection,$sql);
		if(mysqli_num_rows($records)>0)
		{
			header("location:add_categories.php?msg=record_exists");
		}
		else{
			$date1=date("d-m-Y");
			//echo $date1;
			//exit;
		$sql="insert into categories(category_name,date_created,block_category) values('$name','$date1','0')";
		mysqli_query($connection,$sql) or die(mysqli_error($connection));
		header("Location:add_categories.php?msg=insert");
		}
	}
	else {
		header("Location:add_categories.php?msg=$msg");
	}
}



?>