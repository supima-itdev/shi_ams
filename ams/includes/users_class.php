<?php

	Class Users{
	
		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct


		function View_Users(){


			$sql = "SELECT username, CONCAT  (firstname, ', ', lastname) AS name FROM ams.users";
			$stmt = $this->_dsn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch();

			$result = "";

			if($row){
				do { 
					$result.= "<tr>";
					$result.= "<td>".$row['username']."</td>";
					$result.= "<td>".$row['name']."</td>";
					$result.= "</tr>";
				} while ($row = $stmt->fetch()); 	
			}
	    	return $result;
		} //View_Roles	

		function GetUsernameCount($initial_username){

			try{

				$sql = " SELECT ams.func_ur_usernamecount(:initial_username) as username_count ";
				$stmt = $this->_dsn->prepare($sql);
				$param = array(":initial_username" => $initial_username);
				$stmt->execute($param);
				$result = $stmt->fetch();

				$total_count = $result['username_count'];
					
				$errorInfo = $stmt->errorInfo();
				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $total_count;
		} //GetUsernameCount

		function AddUsers($firstname,$lastname,$username,$password){

			try{

				$sql = " SELECT ams.func_ur_addusers(:first_name,:last_name,:user_name,:user_password)";

				$stmt = $this->_dsn->prepare($sql);

				$param = array(":first_name" 		=> $firstname,
							   ":last_name" 		=> $lastname,
							   ":user_name" 		=> $username,
							   ":user_password" 	=> $password);

				$result = $stmt->execute($param);

				$errorInfo = $stmt->errorInfo();

				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;
		} //AddUsers

	} //Users

?>

