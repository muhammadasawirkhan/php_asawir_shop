<?php 
include('includes/connection.php');

	$category_name=$_POST['name'];
	$cat_id=$_POST['cat_id'];
	
	if($category_name=="")
	{
		$msg="Name can not be empty.";
	}
	
	//echo $flag;
	if($msg=="")
	{	
		$sql="select * from categories where category_name='$name'"	;
		$records=mysqli_query($connection,$sql);
		if(mysqli_num_rows($records)>0)
		{
			header("location:edit_categories.php?msg=record_exists");
		}
		else{
		$sql="update categories

		SET
			category_name='$category_name'
			
	 	where cat_id='$cat_id'";
	 	mysqli_query($connection,$sql);
		header("location:view_categories.php?option=updated");

	}
}
?>