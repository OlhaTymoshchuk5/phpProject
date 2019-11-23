<?php
	/*
	   File: db_connection.php
	   Purpose: Create the connection with database Lab2
	   Authors: Barbara Bianca Zacchi
			    Millene Cesconetto
			    Olha Tymoshchuk 
	*/
	define("DBHOST", "localhost");
	define("DBDB",   "lamp1_survey");
	define("DBUSER", "lamp1_survey");
	define("DBPW", "!Survey9!");

	function connectDB(){
		$dsn = "mysql:host=".DBHOST.";dbname=".DBDB.";charset=utf8";
		try{
			$db_conn = new PDO($dsn, DBUSER, DBPW);
			return $db_conn;
		} catch (PDOException $e){
			echo "<p>Error opening database <br/>\n".$e->getMessage()."</p>\n";
			exit(1);
		}
	}

?>
