<?php

	ob_start();
	session_start();
	
	require "../ams/includes/users_menus_class.php";
	include "../ams/includes/dbconfig.php";
	$oUsersMenus = new UsersMenus($dbConn);


	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "GetUserMenus"){

		$usersname = $connObj->{"Usersname"};
		
		echo $oUsersMenus->GetUserMenus($usersname);		
	}
	

?>