<?php
session_start();
session_destroy();
unset($_SESSION['admin_auth']);
header("location:login.php?logout=1");

?>