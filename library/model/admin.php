<?php

class admin{
	public $db;
	public static $tablename = 'admin';

	function __construct(){
		$db = new dbConnect();
		$this->db = $db->connect();
	}

	function checkLogin($email,$password){

		$db = $this->db;
		$query = $db->prepare("SELECT * FROM ".self::$tablename." WHERE email='".$email."' AND password='".$password."' ");
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$data=$query->fetch();

		return $data;
	}

	function logout(){
		
		$db = $this->db;
		$id=$_SESSION['user_id'];
        $sql=$db->prepare("DELETE FROM user_session WHERE id= '$id'");
        $result = $sql->execute();
	}

	function getAdminData($id){
    $db = $this->db;
      $query = $db->prepare("SELECT * FROM ".self::$tablename." WHERE id='".$id."'");
      $query->execute();
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $data=$query->fetch();

    return $data;
    }

    function editAdmin($data,$id){
         $db = $this->db;
         $sql=$db->prepare("UPDATE ".self::$tablename." SET fname='".$data['fname']."', lname='".$data['lname']."', age='".$data['age']."', address='".$data['address']."', gender='".$data['gender']."', image_path='".$data['image_path']."' WHERE id='".$id."'");

    $sql->execute();
    }
	
	}


