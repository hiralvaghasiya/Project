<?php

class category{

	public $db;
	public static $tablename = 'category';

	function __construct(){

		$db = new dbConnect();
		$this->db = $db->connect();
	}

	function addCategory($data){

	   $db = $this->db;
       $sql="INSERT INTO ".self::$tablename." (name) VALUES ('".$data['category']."')";
       $query = $db->prepare($sql);
       $query->execute();

	}
	function getCategoryList(){
		$db = $this->db;
      $query=$db->prepare("SELECT * FROM ".self::$tablename." ");
       $query->execute();
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $data=$query->fetchAll();
      return $data;
	}		
}

?>