<?php

class user_session{
	public $db;
	public static $tablename = 'user_session';

	function __construct(){
		$db = new dbConnect();
		$this->db = $db->connect();
	}

	function addSession($id,$userId){

		$db = $this->db;
		$sql = $db->prepare("INSERT INTO user_session (id, user_id, session_data) VALUES ('".$id."', '".$userId."','')");
		return $sql->execute();
	}

	function checkSession($id){
		$db = $this->db;
		$query = $db->prepare("SELECT * FROM ".self::$tablename." WHERE id='".$id."'");
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$data=$query->fetch();

		return $data;
	}

	function addMemberSession($id,$memberId){

		$db = $this->db;
		$sql = $db->prepare("INSERT INTO user_session (id, member_id, session_data) VALUES ('".$id."', '".$memberId."','')");
		return $sql->execute();
	}

	function checkMemberSession($id){
		$db = $this->db;
		$query = $db->prepare("SELECT * FROM ".self::$tablename." WHERE id='".$id."'");
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$data=$query->fetch();

		return $data;
	}
}

?>