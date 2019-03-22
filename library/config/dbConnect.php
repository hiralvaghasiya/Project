<?php 

class dbConnect
{
	
	function connect()
	{
		include_once ('dbconfig.php');

		try{
			$dbObj = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USERNAME, DB_PASSWORD);
			$dbObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $dbObj;
		}
		catch(PDOException $e){
			//echo "ERROR:" $e->getmessage();
		}
	}
}

?>