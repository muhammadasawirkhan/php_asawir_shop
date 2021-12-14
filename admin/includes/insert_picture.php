<?php
include("includes/connection.php");
   $small_img = "";
   $large_img = "";

   if(isset($_FILES['prod_small_image'])){
      $errors= array();
      $file_name = $_FILES['prod_small_image']['name'];
      $small_img =$file_name;
      $file_size =$_FILES['prod_small_image']['size'];
      $file_tmp =$_FILES['prod_small_image']['tmp_name'];
      $file_type=$_FILES['prod_small_image']['type'];
      move_uploaded_file($file_tmp,"product_images/".$small_img);
      }
   if(isset($_FILES['prod_large_image'])){
      $errors= array();
      $file_name = $_FILES['prod_large_image']['name'];
      $large_img =$file_name;
      $file_size =$_FILES['prod_large_image']['size'];
      $file_tmp =$_FILES['prod_large_image']['tmp_name'];
      $file_type=$_FILES['prod_large_image']['type'];
      move_uploaded_file($file_tmp,"product_images/".$large_img);
      }


      
   
?>