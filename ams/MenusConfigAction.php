<?php
	ob_start();
	session_start();
	
	require "../ams/includes/menusconfig_class.php";
	include "../ams/includes/dbconfig.php";
	$oMenuConfig = new MenuConfig($dbConn);


	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "GetUserMenus"){

		$usersname = $connObj->{"Usersname"};
		
		echo $oMenuConfig->GetUserMenus($usersname);		

	}else if($connObj->{"Action"} == "AddUserMenus"){
		$username = $connObj->{"Username"};
		$menu = $connObj->{"Menu"};
		$module = $connObj->{"Module"};

		echo $oMenuConfig->AddUserMenus($username,$menu,$module);		
	}
	

?>