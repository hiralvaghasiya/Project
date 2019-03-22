<?php 
include_once ('../controller/member.php');

$memberObj = new memberController();
if(!empty($_GET['id'])){
	
	$data = $memberObj->deleteMember($_GET['id']);

	header('location:list_member.php');
}

?>