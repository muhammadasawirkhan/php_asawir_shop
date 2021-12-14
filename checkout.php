<?php
session_start();
if(isset($_SESSION['email']))
	header("location:payment.php");
else header("location:login.php");
?>