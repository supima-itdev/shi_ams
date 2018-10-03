<?php

	ob_start();
	session_start();
	
	require "../ams/includes/menus_modules_class.php";
	include "../ams/includes/dbconfig.php";
	$oMenusModules = new MenusModules($dbConn);


	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "AddMenus"){

		$menu = $connObj->{"Menu"};
		
		echo $oMenusModules->AddMenus($menu);		
	}
	else if($connObj->{"Action"} == "AddModules"){

		$module 	= $connObj->{"Modules"};
		$modulepath = $connObj->{"ModulesPath"};
		$menu 		= $connObj->{"Menu"};

		
		echo $oMenusModules->AddModules($module,$modulepath,$menu);		
	}
	




?>