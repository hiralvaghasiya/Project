<?php 
include_once ('../controller/book.php');

$bookObj = new bookController();

if(!empty($_GET['id'])){
	
	$data = $bookObj->returnBook($_GET['id']);

	header('location:issued_booklist.php');
}

?>