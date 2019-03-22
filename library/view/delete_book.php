<?php 
include_once ('../controller/book.php');

$bookObj = new bookController();
if(!empty($_GET['id'])){
	
	$data = $bookObj->deleteBook($_GET['id']);

	header('location:list_books.php');
}

?>