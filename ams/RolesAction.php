<?php

	ob_start();
	session_start();
	
	require "../ams/includes/roles_class.php";
	include "../ams/includes/dbconfig.php";
	$oRoles = new Roles($dbConn);


	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "AddRoles"){

		$role = $connObj->{"Role"};
		
		echo $oRoles->AddRoles($role);		
	}
	




?>