<?php
include_once ('../controller/book.php');
$bookList = new bookController();
$booklist = $bookList -> getBookList('a');


?>