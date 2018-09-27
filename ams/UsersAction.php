<?php
	ob_start();
	session_start();
	
	require "../ams/includes/users_class.php";
	include "../ams/includes/dbconfig.php";
	$oUsers = new Users($dbConn);


	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "GetUsernameCount"){

		$sysgen_username = $connObj->{"SysGen_Username"};
		
		echo $oUsers->GetUsernameCount($sysgen_username);		
	}
	else if($connObj->{"Action"} == "AddUsers"){

		$firstname = $connObj->{"FistName"};
		$lastname = $connObj->{"LastName"};
		$username = $connObj->{"Username"};

		if(substr($username,-1) == '0'){
			$username = preg_replace('/([0-9])/', '', $username);
		}

		$password = $connObj->{"Password"};

		echo $oUsers->AddUsers($firstname,$lastname,$username,$password);			
	}


?>