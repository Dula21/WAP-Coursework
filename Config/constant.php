<?php


//start the session 
session_start(); 

//create constant for header
//create constant to Store non repeting values 
//because of being constant we write in capital letters.
define("SITEURL","http://localhost/OuterCloveRestaurant/");
define("LOCALHOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","outer clove restaurant");

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error($conn));
?>