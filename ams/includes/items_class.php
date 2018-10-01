<?php

	Class Items{

		public $element_name;

		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct


		function List_Measures(){

		    $sql = "SELECT measureid , measure FROM ams.measures";
		    $stmt = $this->_dsn->prepare($sql);
		    $stmt->execute();
		    
		    $result = "";

		    $result .= "<select id='".$this->element_name."'>";
		    $result .= "<option value=></option>";
		    while($row = $stmt->fetch()){
		      $result .="<option value=".$row['measureid'].">".$row['measure']."</option>";
		    }
		    $result .= "</select>";
		    return $result;
		}//List_Measures


		function View_Items(){

			$sql = "SELECT itemid , item FROM ams.items";
			$stmt = $this->_dsn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch();

			$result = "";

			if($row){
				do { 
					$result.= "<tr>";
					$result.= "<td>".$row['itemid']."</td>";
					$result.= "<td>".$row['item']."</td>";
					$result.= "</tr>";
				} while ($row = $stmt->fetch()); 	
			}
	    	return $result;
		} //View_Items


		function AddItems($item,$list_measure){

			try{

				$sql = " INSERT INTO ams.items(item,measureid) VALUES(:item,:measureid)";

				$stmt = $this->_dsn->prepare($sql);

				$param = array(":item" => $item,":measureid" => $list_measure);

				$result = $stmt->execute($param);

				$errorInfo = $stmt->errorInfo();

				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;
		} //AddItems


	} //Items



?>


