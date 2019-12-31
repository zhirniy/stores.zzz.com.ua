<?php 
require "config.php";

/**
 * config.php include parameters connect
 */
class DB
{
	protected static $dbh;

	function __construct()
	{
		if($this->dbh == null){
			$dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', USER, PASSWORD);
			$this->dbh = $dbh;
		}
	
	}

	function query($sql){
		return $this->dbh->query($sql);
	}
}

?>