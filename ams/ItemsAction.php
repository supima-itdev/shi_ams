<?php

	ob_start();
	session_start();
	
	require "../ams/includes/items_class.php";
	include "../ams/includes/dbconfig.php";
	$oItems = new Items($dbConn);


	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "AddItems"){

		$item = $connObj->{"Items"};
		$list_measure = $connObj->{"List_Measure"};
		
		echo $oItems->AddItems($item,$list_measure);		
	}
	




?>