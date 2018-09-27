<?php

	Class Roles{

		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct


		function View_Roles(){

			$sql = "SELECT roleid , role FROM ams.roles";
			$stmt = $this->_dsn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch();

			$result = "";

			if($row){
				do { 
					$result.= "<tr>";
					$result.= "<td>".$row['roleid']."</td>";
					$result.= "<td>".$row['role']."</td>";
					$result.= "</tr>";
				} while ($row = $stmt->fetch()); 	
			}
	    	return $result;
		} //View_Roles	


		function AddRoles($roles){

			try{

				$sql = " INSERT INTO ams.roles(role) VALUES(:role)";

				$stmt = $this->_dsn->prepare($sql);

				$param = array(":role" => $roles);

				$result = $stmt->execute($param);

				$errorInfo = $stmt->errorInfo();

				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;
		} //AddRoles


	} //Roles



?>


