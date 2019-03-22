<?php 
//session_start();
include_once ('../model/book.php');
include_once ('../model/issue_book.php');
include_once ('../model/reqbook.php');
include_once ('../model/category.php');

class bookController{
   
	function addBooks(){

        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }

			$data=array(
	         	'name'=>$_POST['bookname'],
	         	'code'=>$_POST['bookcode'],
	         	'auther'=>$_POST['auther'],
	         	'created_date'=>$_POST['date'],
	         	'price'=>$_POST['price'],
	         	'rackno'=>$_POST['RackNo'],
	         	'noofbooks'=>$_POST['NoOfBook'],
	         	'subcode'=>$_POST['subjectcode']
	     	);

		$addBook = new books();
		$addBook->addBook($data);

		 $_SESSION['success_msg'] = 'edit successfully.';
				header('location: ../view/list_books.php');
	}

	function listBook($cat_id){

       if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }

		$obj=new books();
		$list=$obj->checkList($cat_id);

		return $list;

    }

    function getBook($id){

        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }

    	$bookObj=new books();
    	$data=$bookObj->getBook($id);

    	return $data;
    }

    function editBook(){

        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }

    	$data=array(
	         	'name'=>$_POST['bookname'],
	         	'code'=>$_POST['bookcode'],
	         	'auther'=>$_POST['auther'],
	         	'created_date'=>$_POST['date'],
	         	'price'=>$_POST['price'],
	         	'rackno'=>$_POST['RackNo'],
	         	'noofbooks'=>$_POST['NoOfBook'],
	         	'subcode'=>$_POST['subjectcode']
	     	);

    	$bookObj=new books();
    	$bookObj->editbook($data, $_POST['id']);

    	$_SESSION['success_msg'] = 'update successfully.';
				header('location: ../view/list_books.php');
    }

    function deleteBook($id){

      if(empty($_SESSION['user_id'])){
        header('location: ../index.php');
      }
    	$dltBook=new books();
    	$dltBook->deleteBookDb($id);
    }

    function getBookList($name){
        if(empty($_SESSION['user_id'])){
           header('location: ../index.php');
        }
    	$bookList=new books();
    	$list=$bookList->getBookList($name);

    		$data = array();
    	       foreach ($list as $key => $book) {
    		$data[$book['code']] = $book['name'];
    	}
       	echo json_encode($data);
    }

    function issueBooks(){
        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }
    	$data=array(
    		'bookcode'=> $_POST['bookcode'],
    		'membername'=> $_POST['membername'],
    		'issuedate'=> $_POST['issuedate'],
    		'duedate'=> $_POST['duedate']
       	);

       	$issbk=new issueBook();
       	$list=$issbk->issue($_POST);
       	
       	header('location: ../view/issued_booklist.php');
    }
    
    function listIssuedBook(){
        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }
		$obj=new issueBook();
		$list=$obj->checkIssuedBookList();

		return $list;

    }

    function getIssueBookData($id){
       if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }
        $obj = new issueBook();
        $list=$obj->getData($id);

        return $list;
    }
    function changeReturnBookDate(){
        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }
        $data=array(
            'returndate'=> $_POST['returndate']
        );
        $bookObj=new issueBook();
        $bookObj->changeReturnBookDate($data, $_POST['id']);

        $_SESSION['success_msg'] = 'update successfully.';
                header('location: ../view/issued_booklist.php');
    }

    function returnBook($id){
        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }
         $obj = new issueBook();
         $obj->returnBook($id);
    }

    function allBookList(){
        
        if(empty($_SESSION['member_id'])){
            header('location: ../index.php');
        }
        $obj=new books();
        $list=$obj->checkBookList();

        return $list;

    }

    function userIssuedBookList(){
        //print_r($_SESSION);
      if(empty($_SESSION['member_id'])){
        // header('location: ../index.php');
      }

        $obj=new issueBook();
        $list=$obj->UserIssuedBookList($_SESSION['member_id']);

        return $list;

    }

    function addBook(){
        if(!empty($_SESSION['member_id'])){

            $data=array(
                'book'=>$_POST['book'],
                'author'=>$_POST['author']
            );

        $addBook = new reqBook();
        $addBook->addBook($data);

             $_SESSION['success_msg'] = 'edit successfully.';
             header('location: ../view/user_list_books.php');
        } else {
            
            header('location:../user_login.php');
        }
 
    }

    function issuedbook(){
        if(empty($_SESSION['member_id'])){
       // header('location: ../index.php');
      }

        $obj=new reqBook();
        $list=$obj->issuedBookList();
        return $list;
    }

    function addCategory(){

        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }

            $data=array(
                'category'=>$_POST['category'],
            );

        $addCategory = new category();
        $addCategory->addCategory($data);

         $_SESSION['success_msg'] = 'edit successfully.';
                header('location: ../view/list_books.php');
    }

    function listCategory(){
        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }

        $obj=new category();
        $list=$obj->getCategoryList();

        return $list;

    }

     function arriveBook(){

       if(empty($_SESSION['user_id'])){
            //header('location: ../index.php');
        }
       
        $obj=new books();
        $list=$obj->arriveList();

        return $list;

    }
    
}

?>