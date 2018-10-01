<?php

	ob_start();
	session_start();
	
	require "../ams/includes/measures_class.php";
	include "../ams/includes/dbconfig.php";
	$oMeasures = new Measures($dbConn);

	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "AddMeasures"){

		$measure = $connObj->{"Measures"};
		
		echo $oMeasures->AddMeasures($measure);		
	}

?>