<?php 
include_once ('../config/dbConnect.php');
  class books{
  	public $db;
	public static $tablename = 'book';

	function __construct(){
		$db = new dbConnect();
		$this->db = $db->connect();
	}
	function addBook($data){

		   $db = $this->db;
       $sql="INSERT INTO ".self::$tablename." (name, code, author, created_date, price, rackno, noofbooks, subcode) VALUES ('".$data['name']."', '".$data['code']."', '".$data['auther']."', '".$data['created_date']."', '".$data['price']."', '".$data['rackno']."', '".$data['noofbooks']."', '".$data['subcode']."')";
       $query = $db->prepare($sql);
       $query->execute();

	}

  function checkList($cat_id){

    $db = $this->db;

    $sql = "SELECT c.name as cname, b.name as bname, b.id as bid, b.code, b.author, b.created_date, b.price, b.rackno, b.noofbooks, b.subcode, b.deleted_date, b.category_id FROM ".self::$tablename." as b JOIN category as c on c.id=b.category_id";

    if($cat_id != 0){
      $sql .= ' WHERE category_id = '.$cat_id;
    }

    $query = $db->prepare($sql);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetchAll();
    return $data;
  }

  function getBook($id){

    $db = $this->db;
    $query=$db->prepare("SELECT * FROM ".self::$tablename." WHERE id='".$id."'");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetch();
    return $data;
  }

  function editBook($data,$id){

    $db = $this->db;
    $sql=$db->prepare("UPDATE book SET name='".$data['name']."', code='".$data['code']."', author='".$data['auther']."', created_date='".$data['created_date']."', price='".$data['price']."', rackno='".$data['rackno']."', noofbooks='".$data['noofbooks']."', subcode='".$data['subcode']."' WHERE id='".$id."'");
    $sql->execute();
  }

  function deleteBookDb($id){

    $db = $this->db;
    $sql=$db->prepare("UPDATE book SET deleted_date= now() WHERE id='".$id."' ");
    $sql->execute();

  }

  function getBookList($search){

      $db = $this->db;
      $query=$db->prepare("SELECT * FROM ".self::$tablename." WHERE name LIKE '%".$search."%' OR code LIKE '%".$search."%'");
       $query->execute();
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $data=$query->fetchAll();
      return $data;

  }
  function issue($data){

     $db=$this->db;
     $query="INSERT INTO ".self::$tablename." (book_code, member_id, issue_date, return_date) VALUES ('".$data['bookcode']."', '".$data['membername']."', '".$data['issuedate']."', '".$data['duedate']."')";
     $result=$db->prepare($query);
     $result->execute(); 
  } 

  function checkBookList(){

    $db = $this->db;
    $query = $db->prepare("SELECT * FROM ".self::$tablename." WHERE deleted_date IS NULL");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetchAll();

    return $data;
  }
 
  function arriveList(){

    $db = $this->db;
    $query=$db->prepare("SELECT * FROM ".self::$tablename." WHERE created_date = now()");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetchAll();
    return $data;
  }
  
}
  ?>