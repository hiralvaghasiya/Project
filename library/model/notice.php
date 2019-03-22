<?php
include_once ('../config/dbConnect.php');

class notice{
	public $db;
	public static $tablename = 'notice';

	function __construct(){
		$db = new dbConnect();
		$this->db = $db->connect();
	}

	function addNotice($data){

	   $db = $this->db;
       $sql="INSERT INTO ".self::$tablename." (message, from_date, to_date) VALUES ('".$data['message']."', '".$data['from_date']."', '".$data['to_date']."')";
       $query = $db->prepare($sql);
       $query->execute();

	}

	function listDb(){

		$db = $this->db;
	    $query=$db->prepare("SELECT * FROM ".self::$tablename."");
	    $query->execute();
	    $query->setFetchMode(PDO::FETCH_ASSOC);
	    $data=$query->fetchAll();
	    return $data;

	}				
}

?>