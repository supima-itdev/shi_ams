<?php
	$servername = "localhost";
	$username = "postgres";
	$password = "root";
	$dbname = "shi";

	$dns = "pgsql:host=$servername;dbname=$dbname";

	try {
		$dbConn = new PDO($dns, $username, $password);
	    // set the PDO error mode to exception
	    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    // echo "Connected successfully"; 
	}
	catch(PDOException $e){
	    echo "Connection failed: " . $e->getMessage();
	}



?>