<?php 
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'config/dbConnect.php');
  class members{
  	public $db;
	public static $tablename = 'member';

	function __construct(){
		$db = new dbConnect();
		$this->db = $db->connect();
	}

    function addMember($data){

     $db=$this->db;
     $query="INSERT INTO ".self::$tablename." (fname, lname, age, address, gender) VALUES ('".$data['firstname']."', '".$data['lastname']."', '".$data['age']."', '".$data['address']."', '".$data['gender']."')"; 

     $result=$db->prepare($query);
     $result->execute();

    }

    function listMember(){

      $db = $this->db;
      $query = $db->prepare("SELECT * FROM ".self::$tablename." WHERE deleted_date is NULL ");
      $query->execute();
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $data=$query->fetchAll();

    return $data;
  }

  function getMemberData($id){
    $db = $this->db;
      $query = $db->prepare("SELECT * FROM ".self::$tablename." WHERE id='".$id."'");
      $query->execute();
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $data=$query->fetch();

    return $data;
    }

    function editMember($data,$id){
         $db = $this->db;
         $sql=$db->prepare("UPDATE ".self::$tablename." SET fname='".$data['firstname']."', lname='".$data['lastname']."', age='".$data['age']."', address='".$data['address']."', gender='".$data['gender']."', image_path='".$data['image_path']."' WHERE id='".$id."'");

    $sql->execute();
    }
    function deleteMemberDb($id){

    $db = $this->db;
    $sql=$db->prepare("UPDATE ".self::$tablename." SET deleted_date= now() WHERE id='".$id."' ");
    $sql->execute();

  }

    function getMemberList($search){

      $db = $this->db;
      $query=$db->prepare("SELECT * FROM ".self::$tablename." WHERE fname LIKE '%".$search."%' OR lname LIKE '%".$search."%'");
      $query->execute();
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $data=$query->fetchAll();

      return $data;

  } 

  function addUser($data){

    $db=$this->db;
     $query="INSERT INTO ".self::$tablename." (email, password) VALUES ('".$data['email']."', '".$data['password']."')"; 
     $result=$db->prepare($query);
     $result->execute();
  } 

  function userLogin($email,$password){

    $db = $this->db;

    $query = $db->prepare("SELECT * FROM ".self::$tablename." WHERE email='".$email."' AND password='".$password."' ");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data=$query->fetch();

    return $data;
  }

  function userLogout(){

    $db = $this->db;
    $id=$_SESSION['user_id'];
        $sql=$db->prepare("UPDATE ".self::$tablename." SET deleted_date= now() WHERE id='".$id."'");
        $result = $sql->execute();
  } 

     
}
?>