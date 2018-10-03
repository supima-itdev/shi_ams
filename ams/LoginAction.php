<?php

	ob_start();
	session_start();
	
	require "../ams/includes/login_class.php";
	include "../ams/includes/dbconfig.php";
	$oLogin = new Login($dbConn);


	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "CheckCredentials"){

		$username = $connObj->{"Username"};
		$password = $connObj->{"Password"};

		echo $oLogin->CheckCredentials($username,$password);			
	}

?>