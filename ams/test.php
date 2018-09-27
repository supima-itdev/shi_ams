<?php
include "../ams/includes/dbconfig.php";



$connObj = json_decode($_POST["data"]);


if($connObj->{"Action"} == "AddUsers"){

		$firstname = $connObj->{"FistName"};
		$lastname = $connObj->{"LastName"};
		$username = $connObj->{"Username"};
		$password = $connObj->{"Password"};


		// var_dump(substr($username,-1));

		if(substr($username,-1) == '0'){
			$username = preg_replace('/([0-9])/', '', $username);

		}


		echo "firstname: ".$firstname."-lastname: ".$lastname."-username:".$username."-password:".$password;

		//AddUsers($dbConn,$firstname,$lastname,$username,$password);
}	


function AddUsers($dbConn,$firstname,$lastname,$username,$password){


			try{

				$sql = " SELECT ams.func_ur_addusers(:first_name,:last_name,:user_name,:user_password)";

				$stmt = $dbConn->prepare($sql);

				$param = array(":first_name" 		=> $firstname,
							   ":last_name" 		=> $lastname,
							   ":user_name" 		=> $username,
							   ":user_password" 	=> $password);

				$result = $stmt->execute($param);

				echo $result;


				$errorInfo = $stmt->errorInfo();

				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			

		} //AddUsers


// echo strlen('apagueligan05');

// echo '<br/>';

// echo substr('apagueligan05' ,0,-1);

// echo '<br/>';

// echo preg_replace('/([a-z])/', '', 'apagueligan05');

 

?>