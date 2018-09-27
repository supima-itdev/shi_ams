<?php

	Class MenusModules{
	
		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct

		function View_Menu(){
			$sql = "SELECT menuid, menu FROM ams.menus";
			$stmt = $this->_dsn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch();

			$result = "";

			if($row){
				do { 
					$result.= "<tr>";
					$result.= "<td>".$row['menuid']."</td>";
					$result.= "<td>".$row['menu']."</td>";
					$result.= "</tr>";
				} while ($row = $stmt->fetch()); 	
			}
	    	return $result;
		}

	}

?>