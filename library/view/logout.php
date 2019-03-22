<?php 
include_once ('../controller/login.php');
$logout= new login();

$logout->logout();
header('location: ../index.php');
?>