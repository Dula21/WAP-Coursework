<?php
//authorization acess control
//check wather the user is logged in or not

if(!isset($_SESSION['username'])){



    //user is not logged in
    //redirect to login with message

    $_SESSION['no-login-message']="<div class='error'>Please login to access admin panel</div>";

//redirect to login Page
header('location:'.SITEURL.'login/login.php');


}
//




?>