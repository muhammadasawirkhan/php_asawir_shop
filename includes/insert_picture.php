<?php
include("includes/connection.php");
   $newfilename = "newfilename";
//$flag=0;
//echo $_FILES['image']['name'];
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $newfilename =$file_name;
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      move_uploaded_file($file_tmp,"user_pictures/".$file_name);
      }

      else{
         print_r($errors);
      }
   
?>