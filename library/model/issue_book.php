<?php 
include_once ('../config/dbConnect.php');

class issueBook{
  	public $db;
	public static $tablename = 'issuebook';

	function __construct(){
		$db = new dbConnect();
		$this->db = $db->connect();
	}
	 
  function issue($data){

     $db=$this->db;
     $query="INSERT INTO ".self::$tablename." (book_code, member_id, issue_date, return_date) VALUES ('".$data['bookcode']."', '".$data['membername']."', '".$data['issuedate']."', '".$data['duedate']."')"; 

     $result=$db->prepare($query);
     $result->execute(); 
  } 

  function checkIssuedBookList(){
    $db = $this->db;
    $query = $db->prepare("SELECT * FROM ".self::$tablename." as ib 
      JOIN book as b ON ib.book_code = b.code
      JOIN member as m ON m.id = ib.member_id 
      WHERE ib.deleted_date IS NULL ");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetchAll();

    return $data;
  }

  function getData($id){
     $db = $this->db;
    $query=$db->prepare("SELECT * FROM ".self::$tablename." as ib JOIN book as b ON ib.book_code = b.code WHERE ib.id='".$id."' AND ib.deleted_date IS NULL");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetch();

    return $data;
  }

  function changeReturnBookDate($data,$id){
    $db = $this->db;
    $sql=$db->prepare("UPDATE issuebook SET return_date='".$data['returndate']."' WHERE id='".$id."'");

    $sql->execute();
  
  }

  function returnBook($id){
    $db = $this->db;
    $sql=$db->prepare("UPDATE ".self::$tablename." SET deleted_date= now() WHERE id='".$id."' ");
    $sql->execute();

  }

  function UserIssuedBookList($id){

    $db = $this->db;
    $query=$db->prepare("SELECT * FROM ".self::$tablename." as ib 
      JOIN book as b ON b.code = ib.book_code 
      JOIN member as m ON m.id = ib.member_id
      WHERE ib.member_id='".$id."'");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetchAll();

    return $data;
  }

}
?>