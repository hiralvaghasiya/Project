<?php 
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'config/dbConnect.php');
  class reqBook{
  	public $db;
	public static $tablename = 'reqbook';

	function __construct(){
		$db = new dbConnect();
		$this->db = $db->connect();
	}

    function addBook($data){
      
     $db=$this->db;
     $query="INSERT INTO ".self::$tablename." (member_id, book, author) VALUES ('".$_SESSION['member_id']."','".$data['book']."', '".$data['author']."')"; 

     $result=$db->prepare($query);
     $result->execute();

    }

    function issuedBookList(){

    $db = $this->db;
    $query=$db->prepare("SELECT m.user_name, rb.book, rb.author  FROM ".self::$tablename." as rb  
      JOIN member as m ON m.id = rb.member_id");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetchAll();

    return $data;
  }

 }
?>