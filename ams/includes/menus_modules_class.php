<?php

	Class MenusModules{
	
		protected $_dsn;

		public function __construct($_dsn){
			$this->_dsn = $_dsn;
		} //__construct

		function View_Menus(){
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
		} //View_Menu


		function AddMenus($menu){
			try{

				$sql = "INSERT INTO ams.menus(menu) VALUES(:menu)";

				$stmt = $this->_dsn->prepare($sql);

				$param = array(":menu" => $menu);

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

		function View_Modules(){
			$sql = "SELECT moduleid, module, modulepath FROM ams.modules";
			$stmt = $this->_dsn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch();

			$result = "";

			if($row){
				do { 
					$result.= "<tr>";
					$result.= "<td>".$row['moduleid']."</td>";
					$result.= "<td>".$row['module']."</td>";
					$result.= "<td>".$row['modulepath']."</td>";
					$result.= "</tr>";
				} while ($row = $stmt->fetch()); 	
			}
	    	return $result;
		} //View_Menu


		function AddModules($module,$modulepath){
			try{

				$sql = "INSERT INTO ams.modules(module,modulepath) VALUES(:module,:modulepath)";

				$stmt = $this->_dsn->prepare($sql);

				$param = array(":module" 		=> $module,
							   ":modulepath" 	=> $modulepath);

				$result = $stmt->execute($param);

				$errorInfo = $stmt->errorInfo();

				if(isset($errorInfo[2])){
					$error = $errorInfo[2];
				}

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;
		} //AddModules


	} //MenusModules

?>