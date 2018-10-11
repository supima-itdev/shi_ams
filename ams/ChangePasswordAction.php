<?php
	ob_start();
	session_start();
	
	include "../ams/includes/dbconfig.php";

	$connObj = json_decode($_POST["data"]);

	if($connObj->{"Action"} == "ResetPassword"){

		$newpassword = $connObj->{"NewPassword"};
		$user = $connObj->{"Username"};
		
		ResetPassword($dbConn,$newpassword,$user);		
	}


	function ResetPassword($dbConn,$newpassword,$user){
		try{

				$sql = " UPDATE ams.users SET password = :newpassword WHERE username = :user ";

				$stmt = $dbConn->prepare($sql);

				$param = array(":newpassword" => $newpassword,":user" => $user);

				$result = $stmt->execute($param);

				$errorInfo = $stmt->errorInfo();

				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;
	}


?>