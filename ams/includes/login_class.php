<?php

	Class Login{

		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct


		function CheckCredentials($username,$password){


			// echo $username.'/'.$password;

			try{

				$sql = " SELECT CONCAT  (firstname, ', ', lastname) AS name, COUNT(username) AS ctr 
							FROM ams.users 
							WHERE username = :username AND password = :password 
							GROUP BY lastname,firstname";
				$stmt = $this->_dsn->prepare($sql);
				$param = array(":username" => $username,":password" => $password);
				$stmt->execute($param);
				
				$result = '';

				while($row = $stmt->fetch()){

					$result = $row['ctr'];

					$_SESSION['user'] = $row['name'];
				}
				

				$errorInfo = $stmt->errorInfo();
				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;

		} //CheckCredentials

	}//Login
?>