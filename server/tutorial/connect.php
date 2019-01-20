<?php

	function Connection(){
		
		$server="localhost";
		$user="id8508724_admin";
		$pass="123456";
		$db="id8508724_0000000000";
	   	
	   	
	   	$conn = new mysqli($server, $user, $pass, $db);
		if (!$conn) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>
