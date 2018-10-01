<?php

	Class Measures{

		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct


		function View_Measures(){

			$sql = "SELECT measureid , measure FROM ams.measures";
			$stmt = $this->_dsn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch();

			$result = "";

			if($row){
				do { 
					$result.= "<tr>";
					$result.= "<td>".$row['measureid']."</td>";
					$result.= "<td>".$row['measure']."</td>";
					$result.= "</tr>";
				} while ($row = $stmt->fetch()); 	
			}
	    	return $result;
		} //View_Measures	


		function AddMeasures($measures){

			try{

				$sql = " INSERT INTO ams.measures(measure) VALUES(:measure)";

				$stmt = $this->_dsn->prepare($sql);

				$param = array(":measure" => $measures);

				$result = $stmt->execute($param);

				$errorInfo = $stmt->errorInfo();

				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;
		} //AddMeasures


	} //Measures



?>


