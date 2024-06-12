<?php include('../config/constant.php');?>
<?php


session_destroy();


header('location:'.SITEURL.'login/login.php');

?>