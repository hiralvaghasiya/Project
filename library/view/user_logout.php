<?php 
include_once ('../controller/login.php');
$logout= new login();

$logout->userLogout();
header('location: ../index.php');
?>