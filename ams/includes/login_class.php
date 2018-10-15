<?php

	Class Login{

		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct


		function CheckCredentials($username,$password){


			// echo $username.'/'.$password;

			try{

				$sql = " SELECT username, 
							CONCAT(firstname, ', ', lastname) AS name, 
							COUNT(username) AS ctr,
							password_reset
							FROM ams.users 
							WHERE username = :username AND password = :password 
							GROUP BY lastname,firstname,username,password_reset";
				$stmt = $this->_dsn->prepare($sql);
				$param = array(":username" => $username,":password" => $password);
				$stmt->execute($param);
				
				$result = '';

				while($row = $stmt->fetch()){

					$ctr = $row['ctr'];

					$password_stat = ($row['password_reset'] == true ? 1 : 0);

					$result = $ctr.$password_stat;

					$_SESSION['user'] = $row['username'];
					$_SESSION['fullname'] = $row['name'];
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