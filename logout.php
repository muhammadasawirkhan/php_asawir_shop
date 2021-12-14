<?php
session_start();
session_destroy();
unset($_SESSION['auth']);
header("location:login.php?logout=1");

?>